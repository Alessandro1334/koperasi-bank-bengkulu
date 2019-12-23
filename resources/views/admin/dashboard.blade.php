@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-dashboard"></i>&nbsp;DASHBOARD
@endsection
@section('user-login','Administrator')
@section('sidebar-menu')
    @include('admin/sidebar-menu')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>SELAMAT DATANG!</h4>
        <p>
            Sistem Informasi Koperasi adalah aplikasi yang digunakan untuk memanajemen data investor pada koperasi Bank Bengkulu,
            anda dapat menggunakan menu-menu yang sudah disediakan pada aplikasi.
            <br>
            <b><i>Catatan:</i></b> Untuk keamanan, jangan lupa keluar setelah menggunakan aplikasi
        </p>
    </div>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $admins }}</h3>

                    <p>Jumlah Administrator</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="{{ route('administrator.manajemen_operator') }}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $operators }}</h3>

                    <p>Jumlah Operator</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="{{ route('administrator.manajemen_operator') }}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                    <div class="inner">
                    <h3>{{ $manajers }}</h3>

                    <p>Jumlah Manajer</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="{{ route('administrator.manajemen_manajer') }}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $barcodes }}</h3>

                    <p>Jumlah Barcode</p>
                </div>
                <div class="icon">
                    <i class="fa fa-barcode"></i>
                </div>
                <a href="{{ route('administrator.manajemen_barcode') }}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection