@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-wpforms"></i>&nbsp;Form Tambah Ahli Waris
@endsection
@section('user-login','Operator')
@section('sidebar-menu')
    @include('operator/sidebar-menu')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                <li class="active"><a href="#timeline" data-toggle="tab"><i class="fa fa-user"></i>&nbsp;Form Tambah Data Ahli Waris Investor <b>({{ $investor->nm_investor }})</b></a></li>
                </ul>
                <div class="tab-content">
                    <form action="{{ route('operator.tambah_ahli_waris_investor_post') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="active tab-pane" id="timeline">
                            <ul class="timeline timeline-inverse" id="informasi-pribadi">
                                <li class="time-label">
                                        <span class="bg-red">
                                            Data Ahli Waris
                                        </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                        <h3 class="timeline-header">Silahkan Tambahkan Daftar Ahli Waris Investor <b>({{ $investor->nm_investor }})</b> di Bawah Ini</h3>

                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <input type="hidden" name="investor_id" value="{{ $investor->id }}">

                                                <div class="form-group col-md-6">
                                                    <label for="">Nama Ahli Waris:</label>
                                                    <input type="text" name="nm_ahli_waris" class="form-control" placeholder="Masukan nama ahli waris">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="">Hubungan Ahli Waris:</label>
                                                    <input type="text" name="hubungan_ahli_waris" class="form-control" placeholder="Masukan nama lengkap">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="{{ route('operator.form_pembukaan_rekening') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Batalkan</a>
                                            <button type="reset" class="btn btn-warning "><i class="fa fa-refresh"></i>&nbsp;Reset</button>
                                            <button type="submit" class="btn btn-primary "><i class="fa fa-save"></i>&nbsp;Simpan</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>
@endsection
@push('scripts')
@endpush
