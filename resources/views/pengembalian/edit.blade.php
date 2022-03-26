@extends('adminlte::page')
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Edit Data Pengembalian</h1>
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
                    <div class="card-header">Data Pengembalian</div>
                    <div class="card-body">
                        <form action="{{ route('pengembalian.update', $pengembalian->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Masukan Tanggal Pinjam</label>
                                <input type="date" name="tgl_pinjam" value="{{ $pengembalian->tgl_pinjam }}"
                                    class="form-control @error('tgl_pinjam') is-invalid @enderror">
                                @error('tgl_pinjam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Tanggal Pengembalian</label>
                                <input type="date" name="tgl_pengembalian" value="{{ $pengembalian->tgl_pengembalian }}"
                                    class="form-control @error('tgl_pengembalian') is-invalid @enderror">
                                @error('tgl_pengembalian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Masukan Nama Pelanggan</label>
                                <select name="pelanggan_id" class="form-control @error('nama') is-invalid @enderror" >
                                    @foreach($pelanggan as $data)
                                        <option value="{{$data->id}}" {{$data->id == $pengembalian->nama ? 'selected="selected"' : '' }}>{{$data->id}}</option>
                                    @endforeach
                                </select>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Merk Mobil</label>
                                <select name="kendaraan_id" class="form-control @error('merk') is-invalid @enderror" >
                                    @foreach($kendaraan as $data)
                                        <option value="{{$data->id}}" {{$data->id == $pengembalian->merk ? 'selected="selected"' : '' }}>{{$data->id}}</option>
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
                                <input type="text" name="denda" value="{{$pengembalian->denda}}" class="form-control @error('denda') is-invalid @enderror">
                                 @error('denda')
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
