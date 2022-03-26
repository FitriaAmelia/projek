@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Halaman Pengembalian

@stop

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Pengembalian</div>
                    <div class="card-body">
                       <form action="{{route('pengembalian.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                        <div class="form-group">
                            <label for="">Masukan Tanggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" class="form-control @error('tgl_pinjam') is-invalid @enderror">
                             @error('tgl_pinjam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Tanggal Pengembalian</label>
                            <input type="date" name="tgl_pengembalian" class="form-control @error('tgl_pengembalian') is-invalid @enderror">
                             @error('tgl_pengembalian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Masukan Nama Pelanggan</label>
                            <select name="pelanggan_id" class="form-control @error('nama') is-invalid @enderror">
                                @foreach($pelanggan as $data)
                                <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Merk Mobil</label>
                            <select name="kendaraan_id" class="form-control @error('merk') is-invalid @enderror" >
                                @foreach($kendaraan as $data)
                                    <option value="{{$data->id}}">{{$data->merk}}</option>
                                @endforeach
                            </select>
                            @error('merk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                        <label for="">Denda</label>
                        <input type="number" name="denda" class="form-control @error('denda') is-invalid @enderror">
                        @error('denda')
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

@stop

@section('css')

@stop

@section('js')

@stop

