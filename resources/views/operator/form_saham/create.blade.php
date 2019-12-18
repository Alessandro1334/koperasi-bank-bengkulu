@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-suitcase"></i>&nbsp;Pembelian/Pengalihan Saham
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
                <li class="active"><a href="#timeline" data-toggle="tab"><i class="fa fa-user"></i>&nbsp;Form Tambah Data Saham Baru</a></li>
                </ul>
                <div class="tab-content">
                    <form action="{{ route('operator.tambah_saham_post') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="active tab-pane" id="timeline">
                            <ul class="timeline timeline-inverse" id="informasi-pribadi">
                                <li class="time-label">
                                        <span class="bg-red">
                                            Informasi Pribadi
                                        </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                        <h3 class="timeline-header">Silahkan Lengkapi Informasi Saham di Bawah Ini</h3>

                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Nomor SK3S</label>
                                                    <input type="text" name="no_sk3s" class="form-control" placeholder="Masukan Nomor SK3S">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Nomor Seri SPMPKOP</label>
                                                    <input type="text" name="no_register" class="form-control" id="exampleInputEmail1" placeholder="Masukan nomor register">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Jumlah Saham</label>
                                                    <input type="text" name="jumlah_saham" class="form-control" placeholder="Masukan Jumlah Saham">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Terbilang Saham</label>
                                                    <input type="text" name="terbilang_saham" class="form-control" id="exampleInputEmail1" placeholder="Masukan Terbilang Saham">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Jenis Mata Uang</label>
                                                    <select name="jenis_mata_uang" class="form-control">
                                                        <option value="">Pilih Mata Uang</option>
                                                        <option value="idr">IDR</option>
                                                        <option value="usd">USD</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Nomor Rekening</label>
                                                    <input type="text" name="pembayaran_no_rek" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor Rekening">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Nama Rekening</label>
                                                    <input type="text" name="pembayaran_nm_rek" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Pemilik Rekening">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Nama Bank</label>
                                                    <input type="text" name="no_npwp" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Bank">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Nomor SK3S Lama</label>
                                                    <input type="text" name="no_sk3s_lama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor SK3S Lama">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Perubahan Ke</label>
                                                    <input type="number" min="0" name="tempat_lahir" class="form-control" id="exampleInputEmail1" placeholder="Masukan Perubahan Ke">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary "><i class="fa fa-arrow-right"></i>&nbsp;Simpan</a>
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
    <script>
        function alamatKtp(){
            $('#alamatktp').show(500);
            $('#informasi-pribadi').hide(500);
        }

        function backToInformasiPribadi(){
            $('#alamatktp').hide(500);
            $('#informasi-pribadi').show(500);
        }

        function alamatTempatTinggal(){
            $('#alamattempattinggal').show(500);
            $('#alamatktp').hide(500);
            $('#informasi-pribadi').hide(500);
        }

        function backToAlamatKtp(){
            $('#alamattempattinggal').hide(500);
            $('#alamatktp').show(500);
            $('#informasi-pribadi').hide(500);
        }

        function agamaDanPendidikan(){
            $('#agamadanpendidikan').show(500);
            $('#alamattempattinggal').hide(500);
            $('#alamatktp').hide(500);
            $('#informasi-pribadi').hide(500);
        }

        function backToAlamatTempatTinggal(){
            $('#agamadanpendidikan').hide(500);
            $('#alamattempattinggal').show(500);
            $('#alamatktp').hide(500);
            $('#informasi-pribadi').hide(500);
        }

    </script>
@endpush
