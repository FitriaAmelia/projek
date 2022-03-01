@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Tambah Data Kendaraan</h1>
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
                   <form action="{{route('kendaraan.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="form-group">
                            <label for="">Kode Kendaraan</label>
                            <input type="number" name="kode_kendaraan" class="form-control @error('kode_kendaraan') is-invalid @enderror">
                             @error('kode_kendaraan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="">Merk Mobil</label>
                            <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror">
                             @error('merk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Plat Nomor</label>
                            <input type="text" name="plat_no" class="form-control @error('plat_no') is-invalid @enderror">
                             @error('plat_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="">Tarif Pinjam</label>
                        <input type="text" name="tarif_pinjam" class="form-control @error('tarif_pinjam') is-invalid @enderror" value="{{ old("tarif_pinjam") }}">
                        @error('tarif_pinjam')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                     <div class="form-group">
                            <label for="status">Status Mobil :</label> <br>
                        <div class="form-check form-check-inline">
                            <label for="status">
                                <input type="radio" name="status" value="ADA" id="status">ADA
                                <input type="radio" name="status" value="TIDAK" id="status">TIDAK

                            </label>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="">Deskripsi Mobil</label>
                            <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">
                             @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                         <div class="form-group">
                            <label for="">Gambar Mobil</label>
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                             @error('gambar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
