@extends('adminlte::page')

@section('title', 'Data Pelanggan')

@section('content_header')

Data Pelanggan

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
                   Beranda Data Pelanggan
                    <a href="{{route('pelanggan.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Pelanggan</a>
                </div>
                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <div class="table-responsive">
                        <table class="table" id="pelanggan">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>No KTP</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>No Telpon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($pelanggan as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->no_ktp}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->alamat}}</td>
                                <td>0{{$data->telpon}}</td>
                                <td>
                                    <form action="{{route('pelanggan.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('pelanggan.edit',$data->id)}}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('pelanggan.show',$data->id)}}" class="btn btn-outline-warning"><i class="fa fa-search"></i></a>
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
            $('#pelanggan').DataTable();
        });
    </script>
@endsection
