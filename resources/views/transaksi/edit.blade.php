@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data Rransaksi</h1>
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
                   <form action="{{route('transaksi.update',$transaksi->id)}}" method="post">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="">No Transaksi</label>
                            <input type="number" name="no_transaksi" value="{{$transaksi->no_transaksi}}" class="form-control @error('no_transaksi') is-invalid @enderror">
                             @error('no_transaksi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                         <div class="form-group">
                            <label for="">Masukan Tangggal Pesan</label>
                            <input type="date" name="tgl_pesan" value="{{$transaksi->tgl_pesan}}" class="form-control @error('tgl_pesan') is-invalid @enderror">
                             @error('tgl_pesan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Tangggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" value="{{$transaksi->tgl_pinjam}}" class="form-control @error('tgl_pinjam') is-invalid @enderror">
                             @error('tgl_pinjam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Tangggal Kembali Rencana</label>
                            <input type="date" name="tgl_rencana" value="{{$transaksi->tgl_rencana}}" class="form-control @error('tgl_rencana') is-invalid @enderror">
                             @error('tgl_rencana')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Nama Pelanggan</label>
                            <select name="pelanggan_id" class="form-control @error('nama') is-invalid @enderror" >
                                @foreach($pelanggan as $data)
                                    <option value="{{$data->id}}" {{$data->id == $transaksi->nama ? 'selected="selected"' : '' }}>{{$data->id}}</option>
                                @endforeach
                            </select>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                         <div class="form-group">
                            <label for="">Nama Supir</label>
                            <select name="supir_id" class="form-control @error('nama_supir') is-invalid @enderror" >
                                @foreach($supir as $data)
                                    <option value="{{$data->id}}" {{$data->id == $transaksi->nama_supir ? 'selected="selected"' : '' }}>{{$data->id}}</option>
                                @endforeach
                            </select>
                            @error('nama_supir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                         <div class="form-group">
                            <label for="">Merk Mobil</label>
                            <select name="kendaraan_id" class="form-control @error('merk') is-invalid @enderror" >
                                @foreach($kendaraan as $data)
                                    <option value="{{$data->id}}" {{$data->id == $transaksi->merk ? 'selected="selected"' : '' }}>{{$data->id}}</option>
                                @endforeach
                            </select>
                            @error('merk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Lama Pemakaian</label>
                            <input type="text" name="lama_pakai" value="{{$transaksi->lama_pakai}}" class="form-control @error('lama_pakai') is-invalid @enderror">
                             @error('lama_pakai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Total Bayar</label>
                            <input type="text" name="total_bayar" value="{{$transaksi->total_bayar}}" class="form-control @error('total_bayar') is-invalid @enderror">
                             @error('total_bayar')
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

