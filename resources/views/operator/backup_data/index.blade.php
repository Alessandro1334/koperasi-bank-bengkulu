@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-dashboard"></i>&nbsp;Backup Data
@endsection
@section('user-login','Operator')
@section('sidebar-menu')
    @include('operator/sidebar-menu')
@endsection
@section('content')
<div class="callout callout-info ">
    <h4>Perhatian!</h4>
    <p>
        Silahkan Gunakan Menu Backup Data Jika Diperlukan!!
        <br>
    </p>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active a"><a href="#a" data-toggle="tab"><i class="fa fa-cloud"></i>&nbsp;Backup Data</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <i class="fa fa-success-circle"></i><strong>Berhasil :</strong> {{ $message }}
                        </div>
                    @endif
                    <table class="table table-bordered table-hover investor">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Investor</th>
                                <th>Jenis Rekening</th>
                                <th>Jenis Kelamin</th>
                                <th>No. KTP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
