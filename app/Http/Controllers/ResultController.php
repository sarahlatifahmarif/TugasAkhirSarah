<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JurusanSekolah;
use App\Models\TabelPilihan;
use App\Models\Prodi;
use App\Models\Kriteria;
use App\Models\Preference;

class ResultController extends Controller
{
    public function index()
    {
        $jurusanSekolah = JurusanSekolah::all();
        return view('welcome', compact('jurusanSekolah'));
    }

    public function store(Request $request)
    {
        session(['name' => $request->name]);
        return ($request->jurusansekolah_id)
            ? redirect()->route('select')->with(['id' => $request->jurusansekolah_id])
            : redirect()->route('index');
    }

    public function select(Request $request)
    {
        if ($request->session()->get('id')) {
            $id = $request->session()->get('id');
            $sekolah = JurusanSekolah::whereId($id)->first();
            $available = TabelPilihan::whereIdJurusanSekolah($id)->get();

            return view('result.select', compact('available', 'sekolah'));
        } else {
            return redirect()->route('index');
        }
    }

    public function storeSelect(Request $request)
    {
        return ($request->id_prodi)
            ? redirect()->route('criteria')->with('prodi_id', $request->id_prodi)
            : redirect()->route('index');;
    }

    public function criteria(Request $request)
    {
        if ($request->session()->get('prodi_id')) {
            $idProdi = $request->session()->get('prodi_id');
            $prodi = Prodi::whereIn('id', $idProdi)->get();
            $kriteria = Kriteria::all();
            return view('result.criteria', compact('prodi', 'kriteria'));
        } else {
            return redirect()->route('index');
        }
    }

    public function storeCriteria(Request $request)
    {
        return ($request->data)
            ? redirect()->route('result')->with('data', $request->data)
            : redirect()->route('index');
    }

    public function result(Request $request)
    {
        if (!$request->session()->get('data')) {
            return redirect()->route('index');
        }
        $kriteria = Kriteria::all();
        $preference = Preference::all();

        $kriteria[0]->bobot = 1;
        $i = 0;
        $nama = array();
        foreach ($kriteria as $item) {
            $nama[$i] = $item->nama_kriteria;
            $i++;
        }

        //get value Pairwise Comparisons
        $comparation = array();
        for ($i = 0; $i < $kriteria->count(); $i++) { //looping 5x
            for ($j = 0; $j < $kriteria->count(); $j++) { // setiap looping akan melooping 5x
                if ($i == 0) { // cek index = 0 (index pertama)
                    $comparation[$i][$j] = $kriteria[$j]->bobot;
                    //comparasi array diisi, $comparation[0][0] = 6 (minat:6)
                    if ($j > $i) {
                        foreach ($preference as $value) {
                            //i=0 j=0, looping sebanyak total preferensi
                            //i=0 j=1, looping sebanyak total preferensi
                            //i=0 j=2, looping sebanyak total preferensi
                            if ($kriteria[$i]->id == $value->kriteria1 && $kriteria[$j]->id == $value->kriteria2) {
                                $comparation[$i][$j] = $value->bobot;
                            }
                        }
                    }
                    //comparasi array diisi, $comparation[0][1] = 5 (bakat:5)
                    //comparasi array diisi, $comparation[0][2] = 3 (minat:3)
                    //comparasi array diisi, $comparation[0][3] = 8 (minat:8)
                    //comparasi array diisi, $comparation[0][4] = 8 (minat:8)
                } else {
                    if ($i == $j) {
                        $comparation[$i][$j] = 1;   // i==j; 
                        //$comparation[1][1] = 1
                        //$comparation[2][2] = 1
                        //$comparation[3][3] = 1
                        //$comparation[4][4] = 1
                        //$comparation[5][5] = 1
                    } elseif ($i > $j) {
                        $comparation[$i][$j] = 1 / $comparation[$j][$i];
                        //$comparation[1][0] = segitiga kiri bawah
                    } else {
                        if ($j > $i) {
                            foreach ($preference as $value) {
                                if ($kriteria[$i]->id == $value->kriteria1 && $kriteria[$j]->id == $value->kriteria2) {
                                    $comparation[$i][$j] = $value->bobot;
                                }
                            }
                        }
                        // $comparation[$i][$j] = $comparation[$i - 1][$j - 1]; // segitiga kanan atas
                        //$comparation[1][2] = $comparation[$i - 1][$j - 1]; == $comparation[0][1]
                        //$comparation[1][3] = segitiga kanan atas
                        //$comparation[1][4] = segitiga kanan atas
                    }
                }
            }
        }
        $index = 0;
        $jumlahComparation = array();

        while ($index < $kriteria->count()) {
            $tmp = 0;
            for ($i = 0; $i < $kriteria->count(); $i++) {
                $tmp += $comparation[$i][$index];
            }
            $jumlahComparation[$index] = $tmp;
            $index++;
        }
        $comparation['total'] = $jumlahComparation;

        //Pencarian Eigen Vektor Normalisasi
        $eigenIndex = 0;
        $eigen = array();

        while ($eigenIndex < $kriteria->count()) {
            $rowTotal = 0;
            for ($i = 0; $i < $kriteria->count(); $i++) {
                $total = 0;
                for ($j = 0; $j < $kriteria->count(); $j++) {
                    $eigen[$eigenIndex][$i][$j] = $comparation[$eigenIndex][$j] * $comparation[$j][$i];
                    $total += $eigen[$eigenIndex][$i][$j];
                }
                $eigen[$eigenIndex][$i]['total'] = $total;
                $rowTotal += $eigen[$eigenIndex][$i]['total'];
            }
            $eigen[$eigenIndex]['total'] = $rowTotal;
            $eigenIndex++;
        }

        //Pencarian EVN : Eigen Vektor Normalisasi
        $evnEigen = array();
        $totalEvnEigen = 0;
        for ($i = 0; $i < $kriteria->count(); $i++) {
            for ($j = 0; $j < $kriteria->count(); $j++) {
                $evnEigen[$i][$j] = $eigen[$i][$j]['total'];
            }
            $evnEigen[$i]['total'] = $eigen[$i]['total'];
            $totalEvnEigen += $evnEigen[$i]['total'];
        }

        $evnEigen['total'] = $totalEvnEigen;

        for ($i = 0; $i < $kriteria->count(); $i++) {
            for ($j = 0; $j < $kriteria->count(); $j++) {
                $evnEigen[$i]['evn'] = $eigen[$i]['total'] / $evnEigen['total'];
            }
        }
        //pecarian rasio konsistensi
        $emax = 0;
        for ($i = 0; $i < $kriteria->count(); $i++) {
            $emax += $comparation['total'][$i] * $evnEigen[$i]['evn'];
        }
        $cl = ($emax - $kriteria->count()) / ($kriteria->count() - 1);
        $cr = $cl / 0.58;
        $rasio = [
            'emaks' => $emax,
            'cl' => $cl,
            'cr' => $cr
        ];

        //result
        $ahp = [
            'nama' => $nama,
            'pairwise' => $comparation,
            'eigen_vector' => $eigen,
            'evn_eigen' => $evnEigen,
            'rasio' => $rasio
        ];
        // dd($ahp);

        //SAW metoda
        $data = $request->session()->get('data');
        $maxArr = array();
        for ($i = 0; $i < (count($data[0]) - 1); $i++) {
            $max = 0;
            for ($j = 0; $j < count($data); $j++) {
                if ($data[$j][$i] > $max) {
                    $max = $data[$j][$i];
                }
            }
            $maxArr[$i] = $max;
        }

        $next = array();
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($ahp['nama']); $j++) {
                $next[$i][$j] = $data[$i][$j] / $maxArr[$j];
            }
        }

        $final = array();
        for ($i = 0; $i < count($data); $i++) {
            $tmp = 0;
            for ($j = 0; $j < count($ahp['nama']); $j++) {
                $final[$i][$j] = $next[$i][$j] * $ahp['evn_eigen'][$j]['evn'];
                $tmp += $final[$i][$j];
            }
            $final[$i]['total'] = $tmp;
            $final[$i]['nama'] = $data[$i]['nama'];
        }

        //mencari hasil yang paling tinggi
        usort($final, function ($first, $second) {
            // return strlen($first['total']) <=> strlen($second['total']);
            return $first['total'] < $second['total'];
        });

        $saw = [
            'data' => $data,
            'max_value' => $maxArr,
            'next' => $next,
            'final' => $final,
            'name' => $request->session()->get('name')
        ];
        return view('result.result', compact('ahp', 'saw'));
    }
}
