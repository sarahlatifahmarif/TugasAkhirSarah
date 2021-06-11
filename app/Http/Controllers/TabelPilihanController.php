<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TabelPilihan;
use App\Models\JurusanSekolah;
use App\Models\Prodi;
use App\Models\Jurusan;


class TabelPilihanController extends Controller
{
    public function create($id){
        $arrayIndex = 0;
        $idJurusanSekolah = $id;
        $jurusans = Jurusan::all();
        return view('pilihan.add', compact('jurusans', 'arrayIndex', 'idJurusanSekolah'));
    }

    public function store($id){
        TabelPilihan::whereIdJurusanSekolah($id)->delete();
        $pilihan = request('pilihan');

        if($pilihan != null){
            foreach ($pilihan as $item) {
                TabelPilihan::create([
                    'id_jurusan_sekolah' => $id,
                    'prodi_id' => $item
                ]);
            }
        }
        return redirect()->route('jurusansekolah.index');
    }
    // public function index()
    // {
    //     $no = 1;
    //     $prodi = Prodi::all();
    //     return view('tabelpilihan.index',compact('no','tabelpilihan'));
    // }

    // public function create(){
    //     $jurusansekolah = JurusanSekolah::all();
    //     return view('tabelpilihan.create', compact('jurusansekolah'));
    //     $prodi = Prodi::all();
    //     return view('tabelpilihan.create', compact('prodi'));
    // }

    // public function store(){
    //     TabelPilihan::create([
    //         'id_jurusan_sekolah' => request('id_jurusan_sekolah'),
    //         'prodi_id ' => request('prodi_id')
    //     ]);
    //     return redirect()->route('tabelpilihan.index');
    // }

    // public function edit($id){

    //     $prodi = Prodi::all();
    //     $jurusansekolah = JurusanSekolah::all();
    //     $tabelpilihan = TabelPilihan::find($id);

    //     return view('tabelpilihan.edit', compact('tabelpilihan','jurusansekolah','prodi'));
    // }

    // public function update($id){
    //     $tabelpilihan = TabelPilihan::find($id);
    //     $tabelpilihan->update([
    //         'id_jurusan_sekolah' => request('id_jurusan_sekolah'),
    //         'prodi_id' => request('prodi_id')
    //     ]);
    //     return redirect()->route('tabelpilihan.index');
    // }

    // public function delete($id){
    //     $tabelpilihan = TabelPilihan::find($id);
    //     $tabelpilihan->delete();
    //     return redirect()->route('tabelpilihan.index');
    // }
}
