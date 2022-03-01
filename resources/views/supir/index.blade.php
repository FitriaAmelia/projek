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
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Nama Supir</th>
                                <th>Alamat Supir</th>
                                <th>No Telpon</th>
                                <th>No SIM</th>
                                <th>Tarif Per Hari</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($supir as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->nama_supir}}</td>
                                <td>{{$data->alamat}}</td>
                                <td>0{{$data->no_telpon}}</td>
                                <td>{{$data->no_sim}}</td>
                                <td>Rp. {{number_format($data->tarif, 0, ',','.')}}</td>
                                <td>
                                    <form action="{{route('supir.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('supir.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{route('supir.show',$data->id)}}" class="btn btn-outline-warning">Show</a>
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
