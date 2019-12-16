@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-dashboard"></i>&nbsp;DASHBOARD
@endsection
@section('user-login','Operator')
@section('sidebar-menu')
    @include('operator/sidebar-menu')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut adalah data saham
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user"></i>&nbsp;Data Pembelian dan Pengalihan Saham Seri B</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('operator.tambah_investor') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover" id="investor">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Investor</th>
                                <th>Jumlah Saham</th>
                                <th>Terbilang Saham</th>
                                <th>Status Saham</th>
                                <th>Status Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach($sahams as $saham)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $saham->nm_investor }} </td>
                                    <td> {{ $saham->jumlah_saham }} </td>
                                    <td> {{ $saham->terbilang_saham }} </td>
                                    <td>
                                        @if($saham->no_sk3s_lama == NULL)
                                            <span class="label label-success">saham pembelian baru</span>
                                            @else
                                                <span class="label label-primary">saham pengalihan</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($saham->status_verifikasi == '0')
                                            <span class="label label-warning"><i class="fa fa-clock-o"></i>&nbsp;belum diverifikasi</span>
                                            @elseif($saham->status_verifikasi == '1')
                                                <span class="label fa-success"><i class="fa fa-check"></i>&nbsp;disetujui</span>
                                                @else
                                                    <span class="label label-danger"><i class="fa fa-close"></i>&nbsp;tidak disetujui</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
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
