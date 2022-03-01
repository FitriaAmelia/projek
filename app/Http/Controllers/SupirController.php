<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\supir;
use Illuminate\Http\Request;
use Validator;

class SupirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supir = Supir::all();
        return view('supir.index', compact('supir'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supir.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'nama_supir' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required|numeric',
            'no_sim' => 'required|numeric',
            'tarif' => 'required',
        ];

        $message = [
            'nama_supir.required' => 'nama supir harus di isi',
            'alamat.required' => 'alamat supir harus di isi',
            'no_telpon.numeric' => 'no telpon harus diisi oleh angka',
            'no_sim.numeric' => 'no sim harus di isi',
            'tarif.required' => 'tarif mobil harus di isi',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        // $validated = $request->validate([
        //     'nama_supir' => 'required',
        //     'alamat' => 'required',
        //     'no_telpon' => 'required|numeric',
        //     'no_sim' => 'required|numeric',
        //     'tarif' => 'required',

        // ]);

        $supir = new Supir;
        $supir->nama_supir = $request->nama_supir;
        $supir->alamat = $request->alamat;
        $supir->no_telpon = $request->no_telpon;
        $supir->no_sim = $request->no_sim;
        $supir->tarif = $request->tarif;
        $supir->save();
        Alert::success('Good Job', 'Data successfully');
        return redirect()->route('supir.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supir = Supir::findOrFail($id);
        return view('supir.show', compact('supir'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supir = Supir::findOrFail($id);
        return view('supir.edit', compact('supir'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_supir' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required|numeric',
            'no_sim' => 'required|numeric',
            'tarif' => 'required',

        ]);

        $supir = Supir::findOrFail($id);
        $supir->nama_supir = $request->nama_supir;
        $supir->alamat = $request->alamat;
        $supir->no_telpon = $request->no_telpon;
        $supir->no_sim = $request->no_sim;
        $supir->tarif = $request->tarif;
        $supir->save();
        //Alert::success('Good Job', 'Data successfully');
        return redirect()->route('supir.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Supir::destroy($id)) {
            return redirect()->back();
        } else {
            Alert::success('Berhasil', 'Menghapus Data ');
            return redirect()->back();
        }

        // $supir = Supir::findOrFail($id);
        // $supir->delete();
        // return redirect()->route('supir.index')->with('status', 'Data Berhasil dihapus!');

    }
}
