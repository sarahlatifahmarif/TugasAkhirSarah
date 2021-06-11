<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pertanyaan;
use App\Models\Prodi;
use App\Models\Kriteria;
use Illuminate\Support\Facades\DB;



class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $pertanyaan = DB::table('pertanyaans')
        ->join('prodis', 'pertanyaans.id_prodi', '=', 'prodis.id')
        ->join('kriterias', 'pertanyaans.id_kriteria', '=', 'kriterias.id')
        ->select('pertanyaans.*' ,'prodis.nama_prodi','kriterias.nama_kriteria')
        ->get();
        // dd($pertanyaan);
        return view('Pertanyaan.index',compact('no','pertanyaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodis = Prodi::all();
        $kriterias = Kriteria::all();
        // dd($prodis,$kriterias);
        return view('Pertanyaan.create',compact('prodis','kriterias'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $cek = DB::table('pertanyaans')
        ->where('id_prodi', '=', request('prodiid'))
        ->where('id_kriteria', '=', request('kriteriaid'))
        ->get();
        if(!empty($cek[0])){
            // dd($cek);
            return redirect()->route('Pertanyaan.create')->with('message','Data Sudah Ada');
        }else{
        pertanyaan::create([
            'id_prodi' => request('prodiid'),
            'id_kriteria' => request('kriteriaid'),
            'pertanyaan' => request('pertanyaan')
        ]);
        return redirect()->route('Pertanyaan.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $pertanyaan = pertanyaan::find($id);
        $prodis = Prodi::find($pertanyaan->id_prodi);
        $kriterias = Kriteria::find($pertanyaan->id_kriteria);
        // dd($prodis,$kriterias,$pertanyaan);
        return view('Pertanyaan.edit', compact('prodis','kriterias','pertanyaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $pertanyaan = pertanyaan::find($id);
        $pertanyaan->update([
            'pertanyaan' => request('pertanyaan')
        ]);
        return redirect()->route('Pertanyaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $pertanyaan = pertanyaan::find($id);
        $prodi = Prodi::find($pertanyaan->id_prodi);
        $kriteria = Kriteria::find($pertanyaan->id_kriteria);
        $datahapus = "'".$pertanyaan->pertanyaan."' Pada Prodi ".$prodi->nama_prodi." Kriteria ".$kriteria->nama_kriteria;
        // dd($datahapus);
        $pertanyaan->delete();
        return redirect()->route('Pertanyaan.index')->with('message','Pertanyaan '.$datahapus.' Berhasil Di Hapus!!');
    }
}
