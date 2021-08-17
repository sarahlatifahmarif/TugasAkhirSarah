<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preference;

class PreferenceController extends Controller
{
    public function index()
    {
        $no = 1;
        $preference = Preference::all();
        return view('preference.index',compact('no','preference'));
    }

    public function create(){
        return view('preference.create');
    }

    public function store(){
        Preference::create([
            'lable' => request('lable'),
            'bobot' => request('bobot')
        ]);
        return redirect()->route('preference.index');
    }

    public function edit($id){

        $preference = Preference::find($id);

        return view('preference.edit', compact('preference'));
    }

    public function update($id){
        $preference = Preference::find($id);
        $preference->update([
            'lable' => request('lable'),
            'bobot' => request('bobot')
        ]);
        return redirect()->route('preference.index');
    }

    public function delete($id){
        $preference = Preference::find($id);
        $preference->delete();
        return redirect()->route('preference.index');
    }
}
