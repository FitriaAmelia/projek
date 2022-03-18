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
                        <table class="table" id="kendaraan">
                            <thead>
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
                        </thead>
                        <tbody>
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
                                        <a href="{{route('kendaraan.edit',$data->id)}}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('kendaraan.show',$data->id)}}" class="btn btn-outline-warning"><i class="fa fa-search"></i></a>
                                        <button type="submit" class="btn btn-outline-danger delete-confirm"><i class="fa fa-window-close"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#kendaraan').DataTable();
        });
    </script>
@endsection
