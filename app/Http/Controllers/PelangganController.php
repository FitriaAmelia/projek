<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\pelanggan;
use Illuminate\Http\Request;
use Validator;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');

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
            'no_ktp' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'telpon' => 'required|numeric',

        ];

        $message = [
            'no_ktp.numeric' => 'no ktp harus di isi',
            'nama.required' => 'nama harus di isi',
            'alamat.required' => 'alamat harus di isi',
            'telpon.numeric' => 'telpon harus di isi',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }


        // $validated = $request->validate([
        //     'no_ktp' => 'required|numeric',
        //     'nama' => 'required',
        //     'alamat' => 'required',
        //     'telpon' => 'required|numeric',

        // ]);

        $pelanggan = new Pelanggan;
        $pelanggan->no_ktp = $request->no_ktp;
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->telpon = $request->telpon;
        $pelanggan->save();
        Alert::success('Good Job', 'Data successfully');
        return redirect()->route('pelanggan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_ktp' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'telpon' => 'required|numeric',

        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->no_ktp = $request->no_ktp;
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->telpon = $request->telpon;
        $pelanggan->save();
        Alert::success('Good Job', 'Data successfully');
        return redirect()->route('pelanggan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Pelanggan::destroy($id)) {
            return redirect()->back();
        }
            Alert::success('Berhasil', 'Menghapus Data ');
            return redirect()->back();


        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('status', 'Data Berhasil dihapus!');

    }
}
