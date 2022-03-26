<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Models\kendaraan;
use App\Models\pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalian = Pengembalian::with('pelanggan', 'kendaraan')->get();
        return view('pengembalian.index', compact('pengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $kendaraan = Kendaraan::all();
        return view('pengembalian.create', compact('pelanggan', 'kendaraan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'tgl_pinjam' => 'required',
            'tgl_pengembalian' => 'rrequired',
            'pelanggan_id' => 'required',
            'kendaraan_id' => 'required',
            'denda' => 'required',

        ]);

        $pengembalian = new Pengembalian;
        $pengembalian->tgl_pinjam = $request->tgl_pinjam;
        $pengembalian->tgl_pengembalian = $request->tgl_pengembalian;
        $pengembalian->pelanggan_id = $request->pelanggan_id;
        $pengembalian->kendaraan_id = $request->kendaraan_id;
        $pengembalian->denda = $request->denda;
        $pengembalian->save();
        Alert::success('Data '.$pengembalian->tgl_pinjam.' Berhasil Ditambahkan');
        return redirect()->route('pengmbalian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(pengembalian $pengembalian)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        return view('pengembalian.show', compact('pengembalian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(pengembalian $pengembalian)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $pelanggan = Pelanggan::all();
        $kendaraan = Kendaraan::all();
        return view('pengembalian.edit', compact('pelanggan', 'kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengembalian $pengembalian)
    {
        $validate = $request->validate([
            'tgl_pinjam' => 'required',
            'tgl_pengembalian' => 'rrequired',
            'pelanggan_id' => 'required',
            'kendaraan_id' => 'required',
            'denda' => 'denda',

        ]);

        $pengembalian = new Pengembalian;
        $pengembalian->tgl_pinjam = $request->tgl_pinjam;
        $pengembalian->tgl_pengembalian = $request->tgl_pengembalian;
        $pengembalian->pelanggan_id = $request->pelanggan_id;
        $pengembalian->kendaraan_id = $request->kendaraan_id;
        $pengembalian->denda = $request->denda;
        Alert::success('Data '.$pengembalian->tgl_pengembalian.' Berhasil Di Update');
        $pengembalian->save();
        return redirect()->route('pengmbalian.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengembalian $pengembalian)
    {
        $pengembalian = Pengembalian::find($id);
        if (!pengembalian::destroy($id)) {
            return redirect()->back;
        } else {
            Alert::success('Berhasil', 'Menghapus Data '. $pengembalian->tgl_pengembalian);
            return redirect()->back();
        }
    }
}
