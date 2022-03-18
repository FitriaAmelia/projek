@extends('adminlte::page')

@section('title', 'Data Supir')

@section('content_header')

Data Supir

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
                   Beranda Data Supir
                    <a href="{{route('supir.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Supir</a>
                </div>
                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <div class="table-responsive">
                        <table class="table" id="supir">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Supir</th>
                                <th>Nama Supir</th>
                                <th>Alamat Supir</th>
                                <th>No Telpon</th>
                                <th>No SIM</th>
                                <th>Tarif Per Hari</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($supir as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td><img src="{{$data->image()}}" alt="" style="width:160px; height:100px;" alt="gambar"></td>
                                <td>{{$data->nama_supir}}</td>
                                <td>{{$data->alamat}}</td>
                                <td>0{{$data->no_telpon}}</td>
                                <td>{{$data->no_sim}}</td>
                                <td>Rp. {{number_format($data->tarif, 0, ',','.')}}</td>
                                <td>
                                    <form action="{{route('supir.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('supir.edit',$data->id)}}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('supir.show',$data->id)}}" class="btn btn-outline-warning"><i class="fa fa-search"></i></a>
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
            $('#supir').DataTable();
        });
    </script>
@endsection
