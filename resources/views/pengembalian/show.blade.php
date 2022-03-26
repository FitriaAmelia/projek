@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data pelanggan</h1>
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
                <div class="card-header">Data pelanggan</div>
                 <div class="card-body">

                    <div class="form-group">
                        <label for="">Tanggal Pinjam</label>
                        <input type="date" name="tgl_pinjam" value="{{$pelanggan->tgl_pinjam}}" class="form-control" readonly>
                    </div>
                     <div class="form-group">
                        <label for="">Tanggal Kembali </label>
                        <input type="date" name="tgl_pengembalian" value="{{$pelanggan->tgl_rpengembalian}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Pelanggan</label>
                        <input type="text" name="nama" class="form-control" value="{{$pengembalian->pelanggans->nama}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Merk Mobil</label>
                        <input type="text" name="merk" class="form-control" value="{{$pengembalian->kendaraans->merk}}" readonly>
                    </div>


                <div class="form-group">
                    <label for="">Denda</label>
                    <input type="text" name="denda" class="form-control" value="{{$pengembalian->denda}}" readonly>
                </div>
                <div class="form-group">
                    <a href="{{url('/admin/pengembalian')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>
@endsection
