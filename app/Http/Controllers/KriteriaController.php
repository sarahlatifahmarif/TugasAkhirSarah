<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $no = 1;
        $kriteria = Kriteria::all();
        return view('kriteria.index',compact('no','kriteria'));
    }

    public function create(){
        return view('kriteria.create');
    }

    public function store(){
        Kriteria::create([
            'nama_kriteria' => request('nama_kriteria'),
            'bobot' => request('bobot')
        ]);
        return redirect()->route('kriteria.index');
    }

    public function edit($id){

        $kriteria = Kriteria::find($id);

        return view('kriteria.edit', compact('kriteria'));
    }

    public function update($id){
        $kriteria = Kriteria::find($id);
        $kriteria->update([
            'nama_kriteria' => request('nama_kriteria'),
            'bobot' => request('bobot')
        ]);
        return redirect()->route('kriteria.index');
    }

    public function delete($id){
        $kriteria = Kriteria::find($id);
        $kriteria->delete();
        return redirect()->route('kriteria.index');
    }
}
