<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preference;
use App\Models\Kriteria;
use Illuminate\Support\Facades\DB;

class PreferenceController extends Controller
{
    public function index()
    {
        $no = 1;
        $preference = Preference::all();
        foreach ($preference as $p) {
            $p['kriteria1'] = DB::table('kriterias')->where('id', $p->kriteria1)->first()->nama_kriteria;
            $p['kriteria2'] = DB::table('kriterias')->where('id', $p->kriteria2)->first()->nama_kriteria;
        }
        return view('preference.index', compact('no', 'preference'));
    }

    public function create()
    {
        $kriterias = Kriteria::all();
        return view('preference.create', compact('kriterias'));
    }

    public function store(Request $request)
    {
        Preference::create([
            'kriteria1' => request('kriteria1'),
            'lable' => request('lable'),
            'bobot' => request('bobot'),
            'kriteria2' => request('kriteria2')
        ]);
        return redirect()->route('preference.index');
    }

    public function edit($id)
    {

        $preference = Preference::find($id);
        $kriterias = Kriteria::all();

        return view('preference.edit', compact('preference', 'kriterias'));
    }

    public function update($id)
    {
        $kriterias = Kriteria::all();
        $preference = Preference::find($id);
        $preference->update([
            'kriteria1' => request('kriteria1'),
            'lable' => request('lable'),
            'bobot' => request('bobot'),
            'kriteria2' => request('kriteria2')
        ]);
        return redirect()->route('preference.index');
    }

    public function delete($id)
    {
        $preference = Preference::find($id);
        $preference->delete();
        return redirect()->route('preference.index');
    }
}
