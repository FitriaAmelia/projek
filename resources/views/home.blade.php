@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<center><b>SELAMAT DATANG DIRENTAL MOBIL KAMI</b></center><br>

@endsection

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
                  <sup style="font-size: 20px"></sup>
              <p>Lihat Mobil</p>
              <h4>{{ DB::table('kendaraans')->count() }}</h4>
            </span>
            </div>
            <div class="icon">
              <i class="ion fas fa-car"></i>
            </div>
            <a href="admin/kendaraan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                  <sup style="font-size: 20px"></sup>
                <p>Data Driver</p>
                <h4>{{ DB::table('supirs')->count() }}</h4>
              </div>
              <div class="icon">
                <i class="ion fas fa-user"></i>
              </div>
              <a href="{{ route('supir.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
                <sup style="font-size: 20px"></sup>
              <p>Data Pelanggan</p>
              <h4>{{ DB::table('pelanggans')->count() }}</h4>
            </div>
            <div class="icon">
              <i class="ion fas fa-users"></i>
            </div>
            <a href="admin/pelanggan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{-- <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
                <sup style="font-size: 20px"></sup>
              <p>Data Driver</p>
              <h4>{{ DB::table('supirs')->count() }}</h4>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('supir.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div> --}}
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
                <sup style="font-size: 20px"></sup>
              <p>Data Transaksi</p>
              <h4>{{ DB::table('transaksis')->count() }}</h4>
            </div>
            <div class="icon">
              <i class="ion far far-fw fad fa-list-alt"></i>
            </div>
            <a href="admin/transaksi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{-- <div class="card-body">
            <p class="card-title">
                <center>
                    <img src="assets/img/1.jpg" alt="" style="width:1200px; height:400px" alt="Cover"
                          class="card-img-top" alt="...">
                </center>
            </p>
        </div> --}}
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

@endsection

@section('css')

@endsection

@section('js')

@endsection
