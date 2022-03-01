@extends('adminlte::page')

@section('title', 'Data Kendaraan')

@section('content_header')

Data Kendaraan

@endsection

{{-- @section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <script src="{{asset('js/sweetalert2.js')}}"></script>
    <script src="{{asset('js/delete.js')}}"></script>
</script>
@endsection --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   Beranda Data Kendaraan
                    <a href="{{route('kendaraan.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Kendaraan</a>
                </div>
                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Kode Kendaraan</th>
                                <th>Merk Mobil</th>
                                <th>Plat Nomor</th>
                                <th>Tarif Pinjam</th>
                                <th>Status</th>
                                <th>Deskripsi</th>
                                <th>Gambar Mobil</th>
                                <th>Aksi</th>

                            </tr>
                            @php $no=1; @endphp
                            @foreach($kendaraan as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->kode_kendaraan}}</td>
                                <td>{{$data->merk}}</td>
                                <td>{{$data->plat_no}}</td>
                                <td>Rp. {{number_format($data->tarif_pinjam, 0, ',','.')}}</td>
                                <td>{{$data->status}}</td>
                                 <td>{{$data->deskripsi}}</td>
                                <td><img src="{{$data->image()}}" alt="" style="width:160px; height:100px;" alt="Gambar"></td>



                                <td>
                                    <form action="{{route('kendaraan.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('kendaraan.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{route('kendaraan.show',$data->id)}}" class="btn btn-outline-warning">Show</a>
                                        <button type="submit" class="btn btn-outline-danger delete-confirm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
