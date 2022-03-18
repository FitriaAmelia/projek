@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data Transaksi</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Transaksi</div>
                 <div class="card-body">

                        <div class="form-group">
                        <label for="">No Transaksi</label>
                        <input type="number" name="no_transaksi" value="{{$transaksi->no_transaksi}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Pesan</label>
                        <input type="date" name="tgl_pesan" value="{{$transaksi->tgl_pesan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Pinjam</label>
                        <input type="date" name="tgl_pinjam" value="{{$transaksi->tgl_pinjam}}" class="form-control" readonly>
                    </div>
                     <div class="form-group">
                        <label for="">Tanggal Kembali Rencana</label>
                        <input type="date" name="tgl_rencana" value="{{$transaksi->tgl_rencana}}" class="form-control" readonly>
                    </div>

                        <div class="form-group">
                        <label for="">Nama Pelanggan</label>
                        <input type="text" name="nama" class="form-control" value="{{$transaksi->pelanggans->nama}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Supir</label>
                        <input type="text" name="nama_supir" class="form-control" value="{{$transaksi->supirs->nama_supir}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Merk Mobil</label>
                        <input type="text" name="merk" class="form-control" value="{{$transaksi->kendaraans->merk}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Lama Pemakaian</label>
                        <input type="text" name="lama_pakai" value="{{$transaksi->lama_pakai}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Total Bayar</label>
                        <input type="text" name="total_bayar" class="form-control" value="{{$transaksi->total_bayar}}" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url('/admin/transaksi')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
