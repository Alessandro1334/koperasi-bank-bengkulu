@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-dashboard"></i>&nbsp;Verifikasi Data Investor
@endsection
@section('user-login','Manajer')
@section('sidebar-menu')
    @include('manajer/sidebar-menu')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut menu Verifikasi Data Investor
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
                                <th>Nama Investor</th>
                                <th>Kode Nasabah</th>
                                <th>No Cif</th>
                                <th>Jenis Kelamin</th>
                                <th>No KTP</th>
                            </tr>
                        </thead>
                        @foreach($investors as $investor)
                            <tr>
                                <td> {{ $loop->count }} </td>
                                <td> {{ $investor->nm_investor }} </td>
                                <td> {{ $investor->kode_nasabah }} </td>
                                <td> {{ $investor->no_cif }} </td>
                                <td> {{ $investor->jenis_kelamin }} </td>
                                <td> {{ $investor->no_ktp }} </td>
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
