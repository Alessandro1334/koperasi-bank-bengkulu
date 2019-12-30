@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-wpforms"></i>&nbsp;Form Pembuka Rekening
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
            display: none;
        }
    </style>
@endpush
@section('content')
<div class="callout callout-info ">
    <h4>Perhatian!</h4>
    <p>
        Berikut adalah data Form Pembukaan Rekening, silahkan tambah data jika ada data rekening yang baru.
        <br>
    </p>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active a"><a href="#a" data-toggle="tab">Rekening Institusi Terverifikasi</a></li>
                <li class="b"><a href="#b" data-toggle="tab">Rekening Institusi Belum Terverifikasi</a></li>
                <div class="btn-tambah">
                    <a href="{{ route('operator.tambah_institusi') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
               </div>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="a">

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
                                <th>Nama Institusi</th>
                                <th>Karakteristik</th>
                                <th>Bidang Usaha</th>
                                <th>Tipe Perusahaan</th>
                                <th>Status Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach($investors_acc as $investor)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $investor->nm_investor }} </td>
                                    <td> {{ $investor->nm_institusi }} </td>
                                    <td> {{ $investor->karakteristik }} </td>
                                    <td> {{ $investor->bidang_usaha }} </td>
                                    <td> {{ $investor->tipe_perusahaan }} </td>
                                    <td>
                                        @if ($investor->status_verifikasi == '1')
                                            <span class="label label-primary"><i class="fa fa-check-circle"></i>&nbsp; Aktif</span>
                                            @else
                                                <span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title"><i class="fa fa-info-circle"></i>&nbsp;Perhatian</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Apakah anda yakin ingin menghapus data?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                                <form method="POST" action="{{ route('operator.tambah_investor_delete', [$investor->id]) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i>&nbsp; Ya, Hapus Data !</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane" id="b">
                    <table class="table table-bordered table-hover investor">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Investor</th>
                                <th>Nama Institusi</th>
                                <th>Karakteristik</th>
                                <th>Bidang Usaha</th>
                                <th>Tipe Perusahaan</th>
                                <th>Status Verifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach($investors as $investor)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $investor->nm_investor }} </td>
                                    <td> {{ $investor->nm_institusi }} </td>
                                    <td> {{ $investor->karakteristik }} </td>
                                    <td> {{ $investor->bidang_usaha }} </td>
                                    <td> {{ $investor->tipe_perusahaan }} </td>
                                    <td>
                                        @if ($investor->status_verifikasi == '1')
                                            <span class="label label-primary"><i class="fa fa-check-circle"></i>&nbsp; Aktif</span>
                                            @else
                                                <span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a style="float:left;" href="{{ route('operator.tambah_institusi_post.edit',[$investor->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title"><i class="fa fa-info-circle"></i>&nbsp;Perhatian</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Apakah anda yakin ingin menghapus data?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                                <form method="POST" action="{{ route('operator.tambah_institusi_delete', [$investor->id]) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i>&nbsp; Ya, Hapus Data !</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

            $(".a").click( function () {
                $(".btn-tambah").fadeOut(200);
            });

            $(".b").click( function () {
                $(".btn-tambah").fadeIn(200);
            });
        } );
    </script>
@endpush
