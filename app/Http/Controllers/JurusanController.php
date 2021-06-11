<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $no = 1;
        $jurusan = Jurusan::all();
        return view('jurusan.index',compact('no','jurusan'));
    }

    public function create(){
        return view('jurusan.create');
    }

    public function store(){
        Jurusan::create([
            'nama_jurusan' => request('nama_jurusan')
        ]);
        return redirect()->route('jurusan.index');
    }

    public function edit($id){

        $jurusan = Jurusan::find($id);

        return view('jurusan.edit', compact('jurusan'));
    }

    public function update($id){
        $jurusan = Jurusan::find($id);
        $jurusan->update([
            'nama_jurusan' => request('nama_jurusan'),
        ]);
        return redirect()->route('jurusan.index');
    }

    public function delete($id){
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        return redirect()->route('jurusan.index');
    }
}
