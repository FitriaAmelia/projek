@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data Supir</h1>
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
                <div class="card-header">Data Supir</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Supir</label>
                        <input type="text" name="nama_supir" value="{{$supir->nama_supir}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat Supir</label>
                        <input type="text" name="alamat" value="{{$supir->alamat}}" class="form-control" readonly>
                    </div>

                     <div class="form-group">
                        <label for="">No Telpon</label>
                        <input type="number" name="no_telpon" value="0{{$supir->no_telpon}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">No SIM</label>
                        <input type="text" name="no_sim" value="{{$supir->no_sim}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Tarif Per Hari</label>
                        <input type="text" name="tarif" value="Rp. {{number_format($supir->tarif, 0, ',','.')}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url('admin/supir')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
