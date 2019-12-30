@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-suitcase"></i>&nbsp;Pembelian/Pengalihan Saham
@endsection
@section('user-login','Operator')
@section('sidebar-menu')
    @include('operator/sidebar-menu')
@endsection
@push('styles')
    <style>
        .btn-tambah {
            float: right;
            margin: 5px 5px 5px 5px;
        }
    </style>
@endpush
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut adalah Data Pembelian dan Pengalihan Saham Seri B, silahkan tambah data jika ada pembelihan/pengalihan baru
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active a"><a href="#a" data-toggle="tab">Data Belum Terverifikasi</a></li>
                    <li class="b"><a href="#b" data-toggle="tab">Data Terverifikasi</a></li>
                    <div class="btn-tambah">
                        <a href="{{ route('operator.tambah_saham_institusi') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                   </div>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="a">
                        <table class="table table-bordered table-hover investor">
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
                                                <span class="label label-warning"><i class="fa fa-clock-o"></i>&nbsp;menunggu diverifikasi</span>
                                            @elseif($saham->status_verifikasi == '1')
                                                <span class="label label-success"><i class="fa fa-check"></i>&nbsp;disetujui</span>
                                            @elseif($saham->status_verifikasi == '2')
                                                <span class="label label-danger"><i class="fa fa-close"></i>&nbsp;tidak disetujui</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class=" tab-pane" id="b">

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
                                    <th>Jumlah Saham</th>
                                    <th>Terbilang Saham</th>
                                    <th>Status Saham</th>
                                    <th>Status Verifikasi</th>
                                    <th>Hasil Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach($sahams_acc as $saham)
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
                                                <span class="label label-danger"><i class="fa fa-clock-o"></i>&nbsp;belum diverifikasi</span>
                                                    @else
                                                        <span class="label label-primary"><i class="fa fa-check-circle"></i>&nbsp;sudah diverifikasi</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($saham->status_verifikasi == '0')
                                                <span class="label label-warning"><i class="fa fa-clock-o"></i>&nbsp;menunggu diverifikasi</span>
                                            @elseif($saham->status_verifikasi == '1')
                                                <span class="label label-success"><i class="fa fa-check"></i>&nbsp;disetujui</span>
                                            @elseif($saham->status_verifikasi == '2')
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
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            $('.investor').DataTable();
        } );
    </script>
@endpush
