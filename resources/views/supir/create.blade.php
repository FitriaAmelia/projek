@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Tambah Data Supir</h1>
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
                   <form action="{{route('supir.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Supir</label>
                            <input type="text" name="nama_supir" class="form-control @error('nama_supir') is-invalid @enderror">
                             @error('nama_supir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Alamat Supir</label>
                            <textarea type="file" name="alamat" class="form-control"></textarea>
                             @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                        <label for="">No Telpon</label>
                        <input type="number" name="no_telpon" class="form-control @error('no_telpon') is-invalid @enderror" value="{{ old("no_telpon") }}">
                        @error('no_telpon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                        <div class="form-group">
                            <label for="">No SIM</label>
                            <input type="text" name="no_sim" class="form-control @error('no_sim') is-invalid @enderror">
                             @error('no_sim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                        <label for="">Tarif Per Hari</label>
                        <input type="text" name="tarif" class="form-control @error('tarif') is-invalid @enderror" value="{{ old("tarif") }}">
                        @error('tarif')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
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
