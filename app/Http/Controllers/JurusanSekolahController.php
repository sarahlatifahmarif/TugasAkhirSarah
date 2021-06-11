<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JurusanSekolah;

class JurusanSekolahController extends Controller
{
    public function index()
    {
        $no = 1;
        $jurusansekolah = JurusanSekolah::all();
        return view('jurusansekolah.index',compact('no','jurusansekolah'));
    }

    public function create(){
        return view('jurusansekolah.create');
    }

    public function store(){
        JurusanSekolah::create([
            'nama_jurusan' => request('nama_jurusan')
        ]);
        return redirect()->route('jurusansekolah.index');
    }

    public function edit($id){

        $jurusansekolah = JurusanSekolah::find($id);

        return view('jurusansekolah.edit', compact('jurusansekolah'));
    }

    public function update($id){
        $jurusansekolah = JurusanSekolah::find($id);
        $jurusansekolah->update([
            'nama_jurusan' => request('nama_jurusan')
        ]);
        return redirect()->route('jurusansekolah.index');
    }

    public function delete($id){
        $jurusansekolah = JurusanSekolah::find($id);
        $jurusansekolah->delete();
        return redirect()->route('jurusansekolah.index');
    }
    public function indexfront()
    {
        $no = 1;
        // $jurusansekolah = JurusanSekolah::all();
        $jurusansekolah = DB::table('jurusan_sekolahs')
        ->orderBy('nama_jurusan', 'asc')
        ->get();
        return view('layouts.frontend',compact('no','jurusansekolah'));
    }
}
