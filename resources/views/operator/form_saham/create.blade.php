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
                                                    <label for="exampleInputEmail1">Nomor KTP/Paspor</label>
                                                    <input type="text" name="no_ktp" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor ktp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Tanggal Kadaluarsa KTP</label>
                                                    <input type="date" name="tgl_kadaluarsa_ktp" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Nomor NPWP</label>
                                                    <input type="text" name="no_npwp" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Tanggal Registrasi NPWP</label>
                                                    <input type="date" name="tgl_registrasi_npwp" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Tempat Lahir</label>
                                                    <input type="text" name="tempat_lahir" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                                                    <input type="date" name="tamggal_lahir" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Status Perkawinan</label>
                                                    <select name="status_pernikahan" id="" class="form-control">
                                                        <option value="menikah">Menikah</option>
                                                        <option value="belum_menikah">Belum Menikah</option>
                                                        <option value="janda/duda">Janda / Duda</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Kewarganegaraan</label>
                                                    <input type="text" name="kewarganegaraan" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor npwp">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="alamatKtp()" class="btn btn-primary "><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="timeline timeline-inverse" id="alamatktp" style="display:none;">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Informasi Pribadi
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>

                                    <div class="timeline-item">

                                        <h3 class="timeline-header">Silahkan Lengkapi Data Alamat KTP Investor di Bawah Ini</h3>

                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Alamat Sesuai KTP/KITAS:</label>
                                                    <input type="text" name="alamat" class="form-control" placeholder="Masukan nama lengkap">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Alamat Sesuai KTP</label>
                                                    <input type="date" name="alamat_ktp" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">RT Sesuai KTP</label>
                                                    <input type="" name="rt_ktp" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Kelurahan Sesuai KTP</label>
                                                    <input type="date" name="alamat_ktp" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Kecamatan Sesuai KTP</label>
                                                    <input type="date" name="kecamatan_ktp" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Kota Sesuai KTP</label>
                                                    <input type="" name="kota_ktp" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Provinsi Sesuai KTP</label>
                                                    <input type="date" name="provinsi_ktp" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Kode Pos Sesuai KTP</label>
                                                    <input type="date" name="kode_pos_ktp" class="form-control" id="exampleInputEmail1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                        <div class="timeline-footer">
                                            <a onclick="backToInformasiPribadi()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="alamatTempatTinggal()" class="btn btn-primary"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                        </div>
                                    </div>
                                </li>

                            </ul>

                            <ul class="timeline timeline-inverse" id="alamattempattinggal" style="display:none;">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Informasi Pribadi
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>

                                    <div class="timeline-item">

                                        <h3 class="timeline-header">Silahkan Lengkapi Data Alamat Tempat Tinggal Investor di Bawah Ini</h3>

                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Alamat Tempat Tinggal:</label>
                                                    <input type="text" name="alamat" class="form-control" placeholder="Masukan nama lengkap">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Alamat Tempat Tinggal</label>
                                                    <input type="date" name="alamat_tempat_tinggal" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">RT Tempat Tinggal</label>
                                                    <input type="" name="rt_tempat_tinggal" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Kelurahan Tempat Tinggal</label>
                                                    <input type="date" name="alamat_tempat_tinggal" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Kecamatan Tempat Tinggal</label>
                                                    <input type="date" name="kecamatan_tempat_tinggal" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Kota Tempat Tinggal</label>
                                                    <input type="" name="kota_tempat_tinggal" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Provinsi Tempat Tinggal</label>
                                                    <input type="date" name="provinsi_tempat_tinggal" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Kode Pos Tempat Tinggal</label>
                                                    <input type="date" name="kode_pos_tempat_tinggal" class="form-control" id="exampleInputEmail1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToAlamatKtp()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="agamaDanPendidikan()" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Selanjutnya</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="timeline timeline-inverse" id="agamadanpendidikan" style="display:none;">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Informasi Pribadi
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>

                                    <div class="timeline-item">

                                        <h3 class="timeline-header">Silahkan Lengkapi Data Agama dan Pendidikan Investor di Bawah Ini</h3>

                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Alamat Tempat Tinggal:</label>
                                                    <input type="text" name="alamat" class="form-control" placeholder="Masukan nama lengkap">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Alamat Tempat Tinggal</label>
                                                    <input type="date" name="alamat_tempat_tinggal" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">RT Tempat Tinggal</label>
                                                    <input type="" name="rt_tempat_tinggal" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Kelurahan Tempat Tinggal</label>
                                                    <input type="date" name="alamat_tempat_tinggal" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Kecamatan Tempat Tinggal</label>
                                                    <input type="date" name="kecamatan_tempat_tinggal" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Kota Tempat Tinggal</label>
                                                    <input type="" name="kota_tempat_tinggal" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Provinsi Tempat Tinggal</label>
                                                    <input type="date" name="provinsi_tempat_tinggal" class="form-control" id="exampleInputEmail1">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Kode Pos Tempat Tinggal</label>
                                                    <input type="date" name="kode_pos_tempat_tinggal" class="form-control" id="exampleInputEmail1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToAlamatTempatTinggal()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="agamaDanPendidikan()" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Selanjutnya</a>
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
