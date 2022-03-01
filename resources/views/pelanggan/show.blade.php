@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data Pelanggan</h1>
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
                <div class="card-header">Data Pelanggan</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">No KTP</label>
                        <input type="number" name="no_ktp" value="{{$pelanggan->no_ktp}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pelanggan</label>
                        <input type="text" name="nama" value="{{$pelanggan->nama}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">alamat</label>
                        <input type="text" name="alamat" value="{{$pelanggan->alamat}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">No Telpon</label>
                        <input type="number" name="telpon" value="0{{$pelanggan->telpon}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url('admin/pelanggan')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
