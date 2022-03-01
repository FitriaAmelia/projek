<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\kendaraan;
use Illuminate\Http\Request;
use Validator;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraan = Kendaraan::all();
        return view('kendaraan.index', compact('kendaraan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kendaraan.create');

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
            'merk' => 'required',
            'plat_no' => 'required|unique',
            'tarif_pinjam' => 'required',
            'status' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|max:2048',

        ];

        $message = [
            'merk.required' => 'merk mobil harus di isi',
            'plat_no.required' => 'plat nomor mobil harus di isi',
            'plat_no.unique' => 'plat nomor mobil sudah digunakan',
            'plat_no.max' => 'no maksimal 255 karakter',
            'tarif_pinjam.required' => 'tarif pinjam mobil harus di isi',
            'status.required' => 'status mobil harus di isi',
            'deskripsi.required' => 'deskripsi mobil harus di isi',
            'gambar.image|' => 'gambar harus diisi oleh foto',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        // $validated = $request->validate([
        //     'merk' => 'required',
        //     'plat_no' => 'required',
        //     'tarif_pinjam' => 'required',
        //     'status' => 'required',
        //     'deskripsi' => 'required',
        //     'gambar' => 'required|image|max:2048',

        // ]);

        $kendaraan = new Kendaraan;
        $kendaraan->kode_kendaraan = mt_rand(1000, 9999);
        $kendaraan->merk = $request->merk;
        $kendaraan->plat_no = $request->plat_no;
        $kendaraan->tarif_pinjam = $request->tarif_pinjam;
        $kendaraan->status = $request->status;
        $kendaraan->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar')) {
            $kendaraan->deleteImage();
            $image = $request->file('gambar');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/mobil/', $name);
            $kendaraan->gambar = $name;
        }
        $kendaraan->save();
        Alert::success('Good Job', 'Data successfully');
        return redirect()->route('kendaraan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('kendaraan.show', compact('kendaraan'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('kendaraan.edit', compact('kendaraan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_kendaraan' => 'required|numeric',
            'merk' => 'required',
            'plat_no' => 'required',
            'tarif_pinjam' => 'required',
            'status' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|max:2048',

        ]);

        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->kode_kendaraan = $request->kode_kendaraan;
        $kendaraan->merk = $request->merk;
        $kendaraan->plat_no = $request->plat_no;
        $kendaraan->tarif_pinjam = $request->tarif_pinjam;
        $kendaraan->status = $request->status;
        $kendaraan->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar')) {
            $kendaraan->deleteImage();
            $image = $request->file('gambar');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/mobil/', $name);
            $kendaraan->gambar = $name;
        }
        $kendaraan->save();
        return redirect()->route('kendaraan.index')->with('status', 'Data Berhasil ditambah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Kendaraan::destroy($id)) {
            return redirect()->back();
        }
            Alert::success('Berhasil', 'Menghapus Data ' );
            return redirect()->back();


        // $kendaraan = Kendaraan::findOrFail($id);
        // $kendaraan->delete();
        // return redirect()->route('kendaraan.index')->with('status', 'Data Berhasil dihapus!');

    }
}
