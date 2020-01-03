@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-bar-chart"></i>&nbsp;Laporan Saham Non Perorangan
@endsection
@section('user-login','Manajer')
@section('sidebar-menu')
    @include('manajer/sidebar-menu')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user"></i>&nbsp;Laporan Saham Nasabah\Investor NonPerorangan</h3>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <i class="fa fa-success-circle"></i><strong>Berhasil :</strong> {{ $message }}
                    </div>
                @endif
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    @if (isset($_GET['tanggal1']))
                        @if (isset($_GET['tanggal2']))
                            <div class="alert alert-success alert-block" style="display:none;" id="berhasil">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <i class="fa fa-success-circle"></i><strong>Berhasil :</strong> Menampilkan Semua Data dari {{ $_GET['tamggal1'] }} - {{ $_GET['tanggal2'] }}!!
                            </div>
                        @endif
                    @endif

                    <form role="form" method="POST" action="{{ route('manajer.laporan_nonperorangan_import') }}">
                        {{ csrf_field() }}
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Dari Tanggal</label>
                                <input type="date" name="date1" class="form-control" id="date1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="date" name="date2" class="form-control" id="date2" required>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp; Cari Data</button>
                            </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
