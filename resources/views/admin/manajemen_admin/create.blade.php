@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-suitcase"></i>&nbsp;Tambah Data Administrator
@endsection
@section('user-login','Administrator')
@section('sidebar-menu')
    @include('operator/sidebar-menu')
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Administrator</h3>
        </div>
        <form role="form" method="POST" action="{{ route('administrator.manajemen_admin_tambah_post') }}">
            {{ csrf_field() }} @method('POST')
            <div class="box-body">
                <div class="form-group">
                    <label for="nm_admin">Nama</label>
                    <input type="text" class="form-control" name="nm_admin" id="nm_admin" placeholder="Masukan Nama">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Password" placeholder="Masukan Email">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="Masukan Password">
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('administrator.manajemen_admin') }}" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
   
@endpush
