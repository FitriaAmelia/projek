<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\transaksi;
use Illuminate\Http\Request;
use App\Models\pelanggan;
use App\Models\kendaraan;
use App\Models\supir;
use Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with('pelanggans', 'supirs', 'kendaraans')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $supir = Supir::all();
        $kendaraan = Kendaraan::all();
        return view('transaksi.create', compact('pelanggan', 'supir', 'kendaraan'));
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
            'tgl_pesan' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_rencana' => 'required',
            'pelanggan_id' => 'required',
            'supir_id' => 'required|numeric',
            'kendaraan_id' => 'required',
            'total_bayar' => 'required',


        ];

        $message = [
            'tgl_pesan.required' => 'tanggal pesan harus di isi',
            'tgl_pinjam.required' => 'tanggal pinjam mobil harus di isi',
            'tgl_rencana.required' => 'tanggal rencana mobil harus di isi',
            'pelanggan_id.required' => 'id pelanggan harus di isi',
            'supir_id.required' => 'id supir harus diisi oleh angka',
            'kendaraan_id.required' => 'id kendaraan harus di isi',
            'total_bayar.required' => 'tanggal bayar harus di isi',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }


        // $request->validate([

        //     'tgl_pesan' => 'required',
        //     'tgl_pinjam' => 'required',
        //     'tgl_rencana' => 'required',
        //     'pelanggan_id' => 'required',
        //     'supir_id' => 'required',
        //     'kendaraan_id' => 'required',
        //     'total_bayar' => 'required',

        // ]);

        $transaksi = new Transaksi;
        $transaksi->no_transaksi = mt_rand(1000, 9999);
        $transaksi->tgl_pesan = $request->tgl_pesan;
        $transaksi->tgl_pinjam = $request->tgl_pinjam;
        $transaksi->tgl_rencana = $request->tgl_rencana;
        $transaksi->pelanggan_id = $request->pelanggan_id;
        $transaksi->supir_id = $request->supir_id;
        $transaksi->kendaraan_id = $request->kendaraan_id;
        $transaksi->total_bayar = $request->total_bayar;

        $transaksi->save();
        Alert::success('Good Job', 'Data successfully');
        return redirect()->route('transaksi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pelanggan = Pelanggan::all();
        $supir = Supir::all();
        $kendaraan = Kendaraan::all();
        return view('admin.transaksi.edit', compact('transaksi', 'pelanggan', 'supir', 'kendaraan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_transaksi' => 'required',
            'tgl_pesan' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_rencana' => 'required',
            'pelanggan_id' => 'required',
            'supir_id' => 'required',
            'kendaraan_id' => 'required',
            'total_bayar' => 'required',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->no_transaksi = $request->no_transaksi;
        $transaksi->tgl_pesan = $request->tgl_pesan;
        $transaksi->tgl_pinjam = $request->tgl_pinjam;
        $transaksi->tgl_rencana = $request->tgl_rencana;
        $transaksi->pelanggan_id = $request->pelanggan_id;
        $transaksi->supir_id = $request->supir_id;
        $transaksi->kendaraan_id = $request->kendaraan_id;
        $transaksi->total_bayar = $request->total_bayar;

        $transaksi->save();
        return redirect()->route('transaksi.index')->with('status', 'Data Berhasil ditambah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Transaksi::destroy($id)) {
            return redirect()->back();
        }
            Alert::success('Berhasil', 'Menghapus Data ');
            return redirect()->back();


        // $transaksi = Transaksi::findOrFail($id);
        // $transaksi->delete();
        // return redirect()->route('transaksi.index')->with('status', 'Data Berhasil dihapus!');

    }
}
