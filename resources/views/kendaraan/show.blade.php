@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data Kendaraan</h1>
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
                <div class="card-header">Data Kendaraan</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Kode Kendaraan</label>
                        <input type="number" name="kode_kendaraan" value="{{$kendaraan->kode_kendaraan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Merk Mobil</label>
                        <input type="text" name="merk" value="{{$kendaraan->merk}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Plat Nomor</label>
                        <input type="text" name="plat_no" value="{{$kendaraan->plat_no}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tarif Pinjam</label>
                        <input type="text" name="tarif_pinjam" value="Rp. {{number_format($kendaraan->tarif_pinjam, 0, ',','.')}}" class="form-control" readonly>
                    </div>
                     <div class="form-group">
                        <label for="">Status Mobil</label>
                        <input type="text" name="status" value="{{$kendaraan->status}}" class="form-control" readonly>
                    </div>
                     <div class="form-group">
                        <label for="">Deskripsi Mobil</label>
                        <input type="text" name="deskripsi" value="{{$kendaraan->deskripsi}}" class="form-control" readonly>
                    </div>
                     <div class="form-group">
                        <label for="">Gambar Mobil</label>
                        <br>
                        <img src="{{ $kendaraan->image() }}" style="width:350px; height:350px; padding:10px;" />
                    </div>
                    <div class="form-group">
                        <a href="{{url('admin/kendaraan')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
