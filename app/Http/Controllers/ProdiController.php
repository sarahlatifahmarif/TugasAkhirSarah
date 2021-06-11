<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\Jurusan;

class ProdiController extends Controller
{
    public function index()
    {
        $no = 1;
        $prodi = Prodi::all();
        // dd($prodi);
        return view('prodi.index',compact('no','prodi'));
    }

    public function create(){
        $jurusans = Jurusan::all();
        return view('prodi.create', compact('jurusans'));
    }

    public function store(){
        Prodi::create([
            'jurusan_id' => request('jurusan_id'),
            'nama_prodi' => request('nama_prodi')
        ]);
        return redirect()->route('prodi.index');
    }

    public function edit($id){

        $jurusans = Jurusan::all();
        $prodi = Prodi::find($id);

        return view('prodi.edit', compact('prodi','jurusans'));
    }

    public function update($id){
        $jurusans = Jurusan::all();
        $prodi = Prodi::find($id);
        $prodi->update([
            'jurusan_id' => request('jurusan_id'),
            'nama_prodi' => request('nama_prodi')
        ]);
        return redirect()->route('prodi.index');
    }

    public function delete($id){
        $prodi = Prodi::find($id);
        $prodi->delete();
        return redirect()->route('prodi.index');
    }
}
