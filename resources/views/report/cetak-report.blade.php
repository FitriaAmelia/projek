<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
        }

        td {
            padding: 5px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
        }

        th{
            padding: 5px;
            background: pink;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
        }

        p{
            font-size: 16px;
        }
    </style>
</head>

<body>
    <center>
     <div class="card-body">
                        <div class="table-responsive">
                            <center>
                                <br>Laporan Pesanan Bulanan
                            </center>

                           <p> <table class="table" border="1" >
                                <tr>
                                    <th>Nomor</th>
                                    <th>No Transaksi</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali Rencana</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Supir</th>
                                    <th>Merk Mobil</th>
                                    <th>Lama Pemakaian</th>
                                    <th>Total Bayar</th>
                                </tr>
                                @php $no=1; @endphp
                                @foreach ($transaksi  ?? '' as $data)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$data->no_transaksi}}</td>
                                        <td>{{$data->tgl_pesan}}</td>
                                        <td>{{$data->tgl_pinjam}}</td>
                                        <td>{{$data->tgl_rencana}}</td>
                                        <td>{{$data->pelanggans->nama}}</td>
                                        <td>{{$data->supirs->nama_supir}}</td>
                                        <td>{{$data->kendaraans->merk}}</td>
                                        <td>{{$data->lama_pakai}}</td>
                                        <td>Rp. {{number_format($data->total_bayar, 0, ',','.')}}</td>

                                    </tr>
                                @endforeach
                                {{-- <tr>
                                    <th colspan="6">Total Keseluruhan</th>
                                    <td>Rp. {{ number_format($total, 0, ',', '.') }}</td>
                                </tr> --}}
                            </table></p>
                          {{-- <p>
                           <center>TOTAL KESELURUHAN = Rp. {{ number_format($total, 0, ',', '.') }}</center>
                         </p> --}}
                        </div>
                    </div>
                    </center>
    <script type="text/javascript">
    window.print()
    $
    </script>
</body>

</html>
