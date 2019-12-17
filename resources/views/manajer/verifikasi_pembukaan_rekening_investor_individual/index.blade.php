@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-dashboard"></i>&nbsp;Verifikasi Rekening Investor 
@endsection
@section('user-login','Manajer')
@section('sidebar-menu')
    @include('manajer/sidebar-menu')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut menu Verifikasi Rekening Investor
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user"></i>&nbsp;Data Verifikasi Data Investor</h3>
                    
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover" id="investor">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Seri SPMPKOP</th>
                                <th>Seri Formulir</th>
                                <th>Jumlah Saham</th>
                                <th>Terbilang Saham</th>
                                <th>Mata Uang</th>
                            </tr>
                        </thead>
                        @foreach($sahams as $saham)
                            <tr>
                                <td> {{ $loop->count }} </td>
                                <td> {{ $saham->seri_spmpkop }} </td>
                                <td> {{ $saham->seri_formulir }} </td>
                                <td> {{ $saham->jumlah_saham }} </td>
                                <td> {{ $saham->terbilang_saham }} </td>
                                <td> {{ $saham->jenis_mata_uang }} </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            $('#investor').DataTable();
        } );
    </script>
@endpush
