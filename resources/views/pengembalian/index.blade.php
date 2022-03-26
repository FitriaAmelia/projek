@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   Beranda Data pengembalian
                    <a href="{{route('pengembalian.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah pengembalian</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table" id="pengembalian">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali </th>
                                <th>Nama Pelanggan</th>
                                <th>Merk Mobil</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($pengembalian as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->tgl_pinjam}}</td>
                                <td>{{$data->tgl_pengembalian}}</td>
                                <td>{{$data->pelanggans->nama}}</td>
                                <td>{{$data->kendaraans->merk}}</td>
                                 <td>Rp. {{number_format($data->denda, 0, ',','.')}}</td>
                                <td>
                                    <form action="{{route('pengembalian.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        {{-- <a href="{{route('pengembalian.edit',$data->id)}}" class="btn btn-outline-info">Edit</a> --}}
                                        <a href="{{route('pengembalian.show',$data->id)}}" class="btn btn-outline-warning"><i class="fa fa-search"></i></a>
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus ini?');"><i class="fa fa-window-close"></i></button>
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
            $('#pengembalian').DataTable();
        });
    </script>
@endsection
