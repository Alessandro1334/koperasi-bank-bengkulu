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
            Berikut Adalah Status Verifikasi Data Investor, Silahkan Verifikasi Data Investor Jika Belum di Verifikasi Pada Daftar Dibawah Ini !!
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active a"><a href="#a" data-toggle="tab">Data Belum Terverifikasi</a></li>
                    <li class="b"><a href="#b" data-toggle="tab">Data Terverifikasi</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="a">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <i class="fa fa-success-circle"></i><strong>Berhasil :</strong> {{ $message }}
                            </div>
                        @endif
                        <table class="table table-bordered table-hover verifikasi-investor">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Investor</th>
                                    <th>Jenis Rekening</th>
                                    <th>No Cif</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No KTP</th>
                                    <th>Hasil Verifikasi</th>
                                    <th>Status Verifikasi</th>
                                    <th>Detail</th>
                                    <th>Ubah Status</th>
                                </tr>
                            </thead>
                            @php
                                $no=1;
                            @endphp
                            @foreach($investors as $investor)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $investor->nm_investor }} </td>
                                    <td> {{ $investor->jenis_rekening }} </td>
                                    <td>
                                        @if ($investor->no_cif == "" || $investor->no_cif == NULL)
                                            <span class="label label-danger">tidak ada no cif</span>
                                            @else
                                            {{ $investor->no_cif }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($investor->jenis_kelamin == "L")
                                            <span class="label label-primary"><i class="fa fa-male"></i>&nbsp; Laki-Laki</span>
                                            @else
                                                <span class="label label-warning"><i class="fa fa-female"></i>&nbsp; Perempuan</span>
                                        @endif
                                    </td>
                                    <td> {{ $investor->no_ktp }} </td>
                                    <td>
                                        @if($investor->status_verifikasi == "0")
                                            <span class="label label-warning"><i class="fa fa-clock-o"></i>&nbsp; Menunggu Verifikasi</span>
                                        @elseif($investor->status_verifikasi == "1")
                                            <span class="label label-primary"><i class="fa fa-check-circle"></i>&nbsp; Disetujui</span>
                                        @else
                                            <span class="label label-danger"><i class="fa fa-close"></i>&nbsp; Tidak Disetujui</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($investor->status_verifikasi == "0")
                                            <span class="label label-danger"><i class="fa fa-clock-o"></i>&nbsp; Belum Diverifikasi</span>
                                            @else
                                                <span class="label label-success"><i class="fa fa-check-circle"></i>&nbsp; Sudah Diverifikasi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm detail" data-id_investor="{{ $investor->id }}" data-toggle="modal" data-target=".modal-detail">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if($investor->status_verifikasi == "0")
                                            <a onclick="verifikasi({{ $investor->id }})" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Verifikasi</a>
                                            @else
                                                <a onclick="verifikasi({{ $investor->id }})" class="btn btn-primary disabled" style="cursor:not-allowed;"><i class="fa fa-check-circle"></i>&nbsp; Verifikasi</a>
                                        @endif
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form method="POST" action="{{ route('manajer.verifikasi_data_investor_update',[$investor->id]) }}">
                                        {{ csrf_field() }} {{ method_field('PATCH') }}
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check-circle"></i>&nbsp;Form Verifikasi Data Investor <b id="nm_investor"></b></h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="hidden" name="investor_id" id="investor_id">
                                                    <label for="recipient-name" class="col-form-label">Verifikasi:</label>
                                                    <select name="status_verifikasi" id="status_verifikasi" class="form-control">
                                                        <option value="" selected disabled>-- silahkan lakukan verifikasi data --</option>
                                                        <option value="1">Setujui</option>
                                                        <option value="2">Tidak Setuju</option>
                                                    </select>
                                                    <small id="emailHelp" class="form-text text-danger"><i>Data yang terverifikasi tidak dapat diubah kembali !!</i></small>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp;Verifikasi</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </table>
                    </div>
                    <div class="tab-pane" id="b">
                        <table class="table table-bordered table-hover verifikasi-investor">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Investor</th>
                                    <th>Jenis Rekening</th>
                                    <th>No Cif</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No KTP</th>
                                    <th>Hasil Verifikasi</th>
                                    <th>Status Verifikasi</th>
                                    <th>Detail</th>
                                    <th>Ubah Status</th>
                                </tr>
                            </thead>
                            @php
                                $no=1;
                            @endphp
                            @foreach($investors_acc as $investor)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $investor->nm_investor }} </td>
                                    <td> {{ $investor->jenis_rekening }} </td>
                                    <td>
                                        @if ($investor->no_cif == "" || $investor->no_cif == NULL)
                                            <span class="label label-danger">tidak ada no cif</span>
                                            @else
                                            {{ $investor->no_cif }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($investor->jenis_kelamin == "L")
                                            <span class="label label-primary"><i class="fa fa-male"></i>&nbsp; Laki-Laki</span>
                                            @else
                                                <span class="label label-warning"><i class="fa fa-female"></i>&nbsp; Perempuan</span>
                                        @endif
                                    </td>
                                    <td> {{ $investor->no_ktp }} </td>
                                    <td>
                                        @if($investor->status_verifikasi == "0")
                                            <span class="label label-warning"><i class="fa fa-clock-o"></i>&nbsp; Menunggu Verifikasi</span>
                                            @elseif($investor->status_verifikasi == "1")
                                                <span class="label label-primary"><i class="fa fa-check-circle"></i>&nbsp; Disetujui</span>
                                                @else
                                                    <span class="label label-danger"><i class="fa fa-close"></i>&nbsp; Tidak Disetujui</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($investor->status_verifikasi == "0")
                                            <span class="label label-danger"><i class="fa fa-clock-o"></i>&nbsp; Belum Diverifikasi</span>
                                            @else
                                                <span class="label label-success"><i class="fa fa-check-circle"></i>&nbsp; Sudah Diverifikasi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm detail" data-id_investor="{{ $investor->id }}" data-toggle="modal" data-target=".modal-detail">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if($investor->status_verifikasi == "0")
                                            <a onclick="verifikasi({{ $investor->id }})" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Verifikasi</a>
                                            @else
                                                <a onclick="verifikasi({{ $investor->id }})" class="btn btn-primary disabled" style="cursor:not-allowed;"><i class="fa fa-check-circle"></i>&nbsp; Verifikasi</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                <div class="modal fade modal-detail">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"><i class="fa fa-search"></i>&nbsp;Detail</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b>Informasi Diri</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Nama Lengkap KTP/Paspor: <a style="color:red">(*)</a> </label>
                                            <input type="text" name="nm_investor" id="nm_investor1" class="form-control" placeholder="Masukan nama lengkap" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">No Register:  <a style="color:red">(*)</a><a id="noreg_error" style="display:none;color:red;"><i>sudah digunakan</i></a></label>
                                            <input type="number" name="no_register" id="no_register" class="form-control" placeholder="Masukan nomor register" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Jenis Kelamin:  <a style="color:red">(*)</a></label>
                                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" disabled>
                                                <option value="" selected disabled>-- pilih jenis kelamin --</option>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Jenis Rekening: <a style="color:red">(*)</a></label>
                                            <select name="jenis_rekening" class="form-control" id="jenis_rekening" disabled>
                                                <option value="perorangan" selected>Perorangan</option>
                                                <option value="nonperorangan">Non Perorangan</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Profil Resiko Nasabah: <a style="color:red">(*)</a></label>
                                            <select name="profil_resiko_nasabah" class="form-control" id="profil_resiko_nasabah" disabled>
                                                <option value="">-- pilih profil resiko nasabah --</option>
                                                <option value="konservatif">Konservatif</option>
                                                <option value="menengah">Menengah</option>
                                                <option value="cukup_agresif">Cukup Agresif</option>
                                                <option value="agresif">Agresif</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Nomor KTP/Paspor: <a style="color:red">(*)</a></label>
                                            <input type="number" name="no_ktp" class="form-control" id="no_ktp" placeholder="Masukan Nomor ktp" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanggal Kadaluarsa KTP: <a style="color:red">(*)</a></label>
                                            <input type="date" name="tgl_kadaluarsa_ktp" class="form-control" id="tgl_kadaluarsa_ktp" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Nomor NPWP: <a style="color:red">(*)</a></label>
                                            <input type="number" name="no_npwp" class="form-control" id="no_npwp" placeholder="Masukan Nomor npwp" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanggal Registrasi NPWP: <a style="color:red">(*)</a></label>
                                            <input type="date" name="tgl_registrasi_npwp" class="form-control" id="tgl_registrasi_npwp" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tempat Lahir: <a style="color:red">(*)</a></label>
                                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Masukan Nomor npwp" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanggal Lahir: <a style="color:red">(*)</a></label>
                                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Status Perkawinan: <a style="color:red">(*)</a></label>
                                            <select name="status_perkawinan" id="status_perkawinan" class="form-control" disabled>
                                                <option value="" selected disabled>-- pilih status perkawinan --</option>
                                                <option value="menikah">Menikah</option>
                                                <option value="belum_menikah">Belum Menikah</option>
                                                <option value="janda/duda">Janda / Duda</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Kewarganegaraan: <a style="color:red">(*)</a></label>
                                            <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" disabled>
                                                <option value="" selected disabled>-- pilih kewarganegaraan --</option>
                                                <option value="wni">Warga Negara Indonesia</option>
                                                <option value="wna">Warga Negara Asing</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b>Alamat KTP</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Alamat Sesuai KTP/KITAS: <a style="color:red">(*)</a></label>
                                            <input type="text" name="alamat_ktp" id="alamat_ktp" class="form-control" disabled placeholder="Masukan nama lengkap">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">RT Sesuai KTP: <a style="color:red">(* hanya angka)</a></label>
                                            <input type="number" name="rt_ktp" class="form-control" id="rt_ktp" disabled placeholder="Masukan Nomor npwp">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">RW Sesuai KTP: <a style="color:red">(* hanya angka)</a></label>
                                            <input type="number" name="rw_ktp" class="form-control" id="rw_ktp" disabled placeholder="Masukan Nomor npwp">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Kelurahan Sesuai KTP: <a style="color:red">(*)</a></label>
                                            <input type="text" name="kelurahan_ktp" class="form-control" id="kelurahan_ktp" disabled placeholder="masukan keluarahan">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Kecamatan Sesuai KTP: <a style="color:red">(*)</a></label>
                                            <input type="text" name="kecamatan_ktp" class="form-control" id="kecamatan_ktp" disabled placeholder="masukan kecamatan">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Kota Sesuai KTP: <a style="color:red">(*)</a></label>
                                            <input type="text" name="kota_ktp" class="form-control" id="kota_ktp" disabled placeholder="Masukan Nomor npwp">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Provinsi Sesuai KTP: <a style="color:red">(*)</a></label>
                                            <input type="text" name="provinsi_ktp" class="form-control" id="provinsi_ktp" disabled placeholder="masukan provinsi">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Kode Pos Sesuai KTP: <a style="color:red">(* hanya angka)</a></label>
                                            <input type="text" name="kode_pos_ktp" class="form-control" id="kode_pos_ktp" disabled placeholder="masukan kode pos">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b>Alamat Tempat Tinggal</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Alamat Tempat Tinggal: <a style="color:red">(*)</a></label>
                                            <input type="text" name="alamat_tempat_tinggal" id="alamat_tempat_tinggal" class="form-control" disabled placeholder="Masukan nama lengkap">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">RT Tempat Tinggal: <a style="color:red">(* hanya angka)</a></label>
                                            <input type="text" name="rt_tempat_tinggal" class="form-control" id="rt_tempat_tinggal" disabled placeholder="Masukan Nomor npwp">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">RW Tempat Tinggal: <a style="color:red">(* hanya angka)</a></label>
                                            <input type="text" name="rw_tempat_tinggal" id="rw_tempat_tinggal" class="form-control" disabled placeholder="Masukan alamat tempat tinggal">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Kelurahan Tempat Tinggal: <a style="color:red">(*)</a></label>
                                            <input type="text" name="kelurahan_tempat_tinggal" class="form-control" id="kelurahan_tempat_tinggal" disabled placeholder="masukan kelurahan tempat tinggal">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Kecamatan Tempat Tinggal: <a style="color:red">(*)</a></label>
                                            <input type="text" name="kecamatan_tempat_tinggal" class="form-control" id="kecamatan_tempat_tinggal" disabled placeholder="masukan kecamatan tempat tinggal">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Kota Tempat Tinggal: <a style="color:red">(*)</a></label>
                                            <input type="text" name="kota_tempat_tinggal" class="form-control" id="kota_tempat_tinggal" disabled placeholder="Masukan kota tempat tinggal">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Provinsi Tempat Tinggal: <a style="color:red">(*)</a></label>
                                            <input type="text" name="provinsi_tempat_tinggal" class="form-control" id="provinsi_tempat_tinggal" disabled placeholder="masukan provinsi tempat tinggal">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Kode Pos Tempat Tinggal: <a style="color:red">(*)</a></label>
                                            <input type="text" name="kode_pos_tempat_tinggal" class="form-control" id="kode_pos_tempat_tinggal" disabled placeholder="masukan kode pos tempat tinggal">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Telp. Rumah: <a style="color:red">(*)</a></label>
                                            <input type="number" name="telp_rumah" class="form-control" id="telp_rumah" disabled placeholder="telephone rumah">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Ponsel: <a style="color:red">(*)</a></label>
                                            <input type="number" name="ponsel" class="form-control" id="ponsel" disabled placeholder="ponsel">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Lama Menempati: <a style="color:red"> dalam tahun (* hanya angka)</a></label>
                                            <input type="number" name="lama_menempati" class="form-control" id="lama_menempati" disabled placeholder="lama menemoati">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Status Rumah Tinggal: <a style="color:red">(*)</a></label>
                                            <select name="status_rumah_tinggal" id="status_rumah_tinggal" class="form-control" disabled>
                                                <option value="" disabled selected>-- pilih status rumah tinggal --</option>
                                                <option value="milik_sendiri">Milik Pribadi</option>
                                                <option value="sewa">Sewa</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b>Agama dan Pendidikan</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Agama: <a style="color:red">(*)</a></label>
                                            <select name="agama" id="agama" class="form-control" disabled>
                                                <option value="" selected disabled>-- pilih agama --</option>
                                                <option value="islam">Islam</option>
                                                <option value="protestan">Protestan</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Budha</option>
                                                <option value="konghucu">Kong Hu Cu</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Pendidikan Terakhir: <a style="color:red">(*)</a></label>
                                            <select name="pendidikan_terakhir" id="pendidikan_terakhir" disabled class="form-control">
                                                <option value="" selected disabled>-- pilih pendidikan_terakhir --</option>
                                                <option value="sma">SMA</option>
                                                <option value="d3">D3</option>
                                                <option value="s1">S1</option>
                                                <option value="s2">S2</option>
                                                <option value="s3">S3</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Nama Gadis Ibu Kandung: <a style="color:red">(*)</a></label>
                                            <input type="text" name="nm_gadis_ibu_kandung" class="form-control" id="nm_gadis_ibu_kandung" disabled placeholder="Masukan nama gadis ibu kandung">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Emergency Kontak: <a style="color:red">(* hanya angka)</a></label>
                                            <input type="number" name="emergency_kontak" class="form-control" id="emergency_kontak" disabled placeholder="Masukan emergency kontak">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b>Korespondensi</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Alamat Surat Menyurat Sesuai KTP: <a style="color:red">(*)</a></label>
                                            <input type="text" name="alamat_surat_menyurat_ktp" id="alamat_surat_menyurat_ktp"  class="form-control" disabled placeholder="Masukan alamat surat menyurat sesuai ktp">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Alamat Surat Menyurat Tempat Tinggal:</label>
                                            <input type="text" name="alamat_surat_menyurat_tempat_tinggal" id="alamat_surat_menyurat_tempat_tinggal"  class="form-control" placeholder="Masukan alamat surat menyurat tempat tinggal" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Alamat Surat Menyurat Lainnya:</label>
                                            <input type="text" name="alamat_surat_menyurat_lainnya" id="alamat_surat_menyurat_lainnya"  class="form-control" placeholder="Masukan alamat surat menyurat lainnya" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Pengiriman Konfirmasi Melalui Email:</label>
                                            <input type="text" name="pengiriman_konfirmasi_melalui_email" id="pengiriman_konfirmasi_melalui_email"  class="form-control" placeholder="Masukan kofirmasi melalui email" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Pengiriman Konfirmasi Melalui Fax:</label>
                                            <input type="text" name="pengiriman_konfirmasi_melalui_fax" id="pengiriman_konfirmasi_melalui_fax"  class="form-control" placeholder="Masukan kofirmasi melalui fax" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Konfirmasi Melalui Alamat Surat Menyurat</label>
                                            <input type="text" name="pengiriman_konfirmasi_melalui_alamat_surat_menyurat" id="pengiriman_konfirmasi_melalui_alamat_surat_menyurat"  class="form-control" placeholder="Masukan kofirmasi melalui fax" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tujuan Investarsi: <a style="color:red">(*)</a></label>
                                            <select name="tujuan_investasi" id="tujuan_investasi" class="form-control" disabled>
                                                <option value="" selected disabled>-- pilih tujuan investasi --</option>
                                                <option value="kenaikan_harga">Mendapatkan Kenaikan Harga</option>
                                                <option value="penghasilan">Mendapatkan Penghasilan</option>
                                                <option value="investasi">Investasi</option>
                                                <option value="spekulasi">Spekulasi</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b>Informasi Pekerjaan</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Pekerjaan: <a style="color:red">(*)</a></label>
                                            <select name="pekerjaan" id="pekerjaan" class="form-control" disabled>
                                                <option value="">-- pilih pekerjaan --</option>
                                                <option value="tidak_bekerja">Tidak Bekerja</option>
                                                <option value="advokat">Advokat</option>
                                                <option value="akuntan">Akuntan</option>
                                                <option value="apoteker">Apoteker</option>
                                                <option value="arsitek">Arsitek</option>
                                                <option value="atlet">Atlet</option>
                                                <option value="dokter">Dokter</option>
                                                <option value="ilmuwan">Ilmuwan</option>
                                                <option value="pengusaha">Pengusaha</option>
                                                <option value="karyawan">Karyawan</option>
                                                <option value="manajer">Manajer</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>

                                        <div id="info-pekerjaan">
                                            <div class="form-group col-md-4">
                                                <label for="">Nama Perusahaan:</label>
                                                <input type="text" name="nm_perusahaan" class="form-control" id="nm_perusahaan" placeholder="Masukan nama perusahaan" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Alamat Perusahaan:</label>
                                                <input type="text" name="alamat_perusahaan" class="form-control" id="alamat_perusahaan" placeholder="Masukan Alamat Perusahaan" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Kota Perusahaan</label>
                                                <input type="text" name="kota_perusahaan" class="form-control" id="kota_perusahaan" placeholder="Masukan kota perusahaan" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Provinsi Perusahaan</label>
                                                <input type="text" name="provinsi_perusahaan" class="form-control" id="provinsi_perusahaan" placeholder="Masukan provinsi perusahaan" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Kode Pos Perusahaan</label>
                                                <input type="text" name="kode_pos_perusahaan" class="form-control" id="kode_pos_perusahaan" placeholder="Masukan Kode Pos Perusahaan" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Telephone</label>
                                                <input type="text" name="telp_perusahaan" class="form-control" id="telp_perusahaan" placeholder="Masukan Telephone" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Email Perusahaan</label>
                                                <input type="text" name="email_perusahaan" class="form-control" id="email_perusahaan" placeholder="Masukan Email Perusahaan" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Fax Perusahaan</label>
                                                <input type="text" name="fax_perusahaan" class="form-control" id="fax_perusahaan" placeholder="Masukan Fax Perusahaan" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Jabatan</label>
                                                <select name="jabatan" id="jabatan" class="form-control" disabled>
                                                    <option value="komisaris">Komisaris</option>
                                                    <option value="direksi">Direksi</option>
                                                    <option value="manajer">Manajer</option>
                                                    <option value="staf">Staf</option>
                                                    <option value="pemilik">Pemilik</option>
                                                    <option value="pengawas">Pengawas</option>
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Jenis Usaha</label>
                                                <input type="text" name="jenis_usaha" class="form-control" id="jenis_usaha" placeholder="Masukan Jenis Usaha" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Lama Bekerja: dalam tahun <a style="color:red;">hanya angka</a></label>
                                                <input type="text" name="lama_bekerja" class="form-control" id="lama_bekerja" placeholder="Lama Bekerja" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Nominal Penghasilan Lain: <a style="color:red;">hanya angka</a></label>
                                                <input type="text" name="penghasilan_lain" class="form-control" id="penghasilan_lain" placeholder="Masukan Nominal Penghasilan Lain" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Sumber Penghasilan Lainnya:</label>
                                                <select name="sumber_penghasilan_lain" class="form-control" id="sumber_penghasilan_lainnya" disabled>
                                                    <option value="">-- pilih sumber penghasilan lainnya --</option>
                                                    <option value="gaji">Gaji</option>
                                                    <option value="hasil_usaha">Hasil Usaha</option>
                                                    <option value="warisan">Warisan</option>
                                                    <option value="dari_orang_tua/anak">Dari Orang Tua/Anak</option>
                                                    <option value="hibah">Hibah</option>
                                                    <option value="dari_suami/istri">Dari Suami/Istri</option>
                                                    <option value="hasil_investasi">Hasil Investasi</option>
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Sumber Penghasilan Utama: <a style="color:red">(*)</a></label>
                                            <select name="sumber_penghasilan_utama" class="form-control" id="sumber_penghasilan_utama" disabled>
                                                <option value="" selected disabled>-- pilih sumber penghasilan utama --</option>
                                                <option value="gaji">Gaji</option>
                                                <option value="hasil_usaha">Hasil Usaha</option>
                                                <option value="warisan">Warisan</option>
                                                <option value="dari_orang_tua/anak">Dari Orang Tua/Anak</option>
                                                <option value="hibah">Hibah</option>
                                                <option value="dari_suami/istri">Dari Suami/Istri</option>
                                                <option value="hasil_investasi">Hasil Investasi</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Sumber Dana Investasi: <a style="color:red">(*)</a></label>
                                            <select name="sumber_dana_investasi" id="sumber_dana_investasi" class="form-control" disabled>
                                                <option value="" selected disabled>-- pilih sumber dana investasi --</option>
                                                <option value="gaji">Gaji</option>
                                                <option value="hasil_usaha">Hasil Usaha</option>
                                                <option value="warisan">Warisan</option>
                                                <option value="dari_orang_tua/anak">Dari Orang Tua/Anak</option>
                                                <option value="hibah">Hibah</option>
                                                <option value="dari_suami/istri">Dari Suami/Istri</option>
                                                <option value="hasil_investasi">Hasil Investasi</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b>Pasangan atau Orang Tua</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Nama Pasangan Atau Orang Tua: <a style="color:red">(*)</a></label>
                                            <input type="text" name="nm_pasangan_atau_orang_tua" id="nm_pasangan_atau_orang_tua" class="form-control" placeholder="Masukan Nama Pasangan Atau Orang Tua" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Hubungan: <a style="color:red">(*)</a></label>
                                            <select name="hubungan" id="hubungan" class="form-control" disabled>
                                                <option value="" selected disabled>-- pilih hubungan --</option>
                                                <option value="suami">Suami</option>
                                                <option value="istri">Istri</option>
                                                <option value="orang_tua">Orang Tua</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Alamat Tempat Tinggal: <a style="color:red">(*)</a></label>
                                            <input type="text" name="alamat_tempat_tinggal_pasangan_atau_orang_tua" id="alamat_tempat_tinggal_pasangan_atau_orang_tua" class="form-control" disabled placeholder="Masukan Alamat Tempat Tinggal">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Telephone Rumah: <a style="color:red;">hanya angka</a></label>
                                            <input type="text" name="telp_rumah_pasangan_atau_orang_tua" class="form-control" id="telp_rumah_pasangan_atau_orang_tua" placeholder="Masukan Telephone Rumah Pasangan / Orang Tua" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Ponsel: <a style="color:red">(* hanya angka)</a></label>
                                            <input type="text" name="ponsel_pasangan_atau_orang_tua" class="form-control" id="ponsel_pasangan_atau_orang_tua" placeholder="Masukan Ponsel" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Pekerjaan: <a style="color:red">(*)</a></label>
                                            <select name="pekerjaan_pasangan_atau_orang_tua" id="pekerjaan_pasangan_atau_orang_tua" class="form-control" disabled>
                                                <option value="" selected disabled>-- pilih pekerjaan pasangan atau orang tua --</option>
                                                <option value="tidak_bekerja">Tidak Bekerja</option>
                                                <option value="advokat">Advokat</option>
                                                <option value="akuntan">Akuntan</option>
                                                <option value="apoteker">Apoteker</option>
                                                <option value="arsitek">Arsitek</option>
                                                <option value="atlet">Atlet</option>
                                                <option value="dokter">Dokter</option>
                                                <option value="ilmuwan">Ilmuwan</option>
                                                <option value="pengusaha">Pengusaha</option>
                                                <option value="karyawan">Karyawan</option>
                                                <option value="manajer">Manajer</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>

                                        <div id="pekerjaan-pasangan">
                                            <div class="form-group col-md-4">
                                                <label for="">Nama Perusahaan</label>
                                                <input type="text" name="nm_perusahaan_pasangan_atau_orang_tua" class="form-control" id="nm_perusahaan_pasangan_atau_orang_tua" placeholder="Masukan Nama Perusahaan" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Alamat Perusahaan</label>
                                                <input type="text" name="alamat_perusahaan_pasangan_atau_orang_tua" class="form-control" id="alamat_perusahaan_pasangan_atau_orang_tua" placeholder="Masukan Alamat Perusahaan" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Kota Perusahaan</label>
                                                <input type="text" name="kota_perusahaan_pasangan_atau_orang_tua" class="form-control" id="kota_perusahaan_pasangan_atau_orang_tua" placeholder="Masukan Kota Perusahaan" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Provinsi Perusahaan</label>
                                                <input type="text" name="provinsi_perusahaan_pasangan_atau_orang_tua" class="form-control" id="provinsi_perusahaan_pasangan_atau_orang_tua" placeholder="Masukan Provinsi Perusahaan" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Kode Pos: <a style="color:red;">hanya angka</a> </label>
                                                <input type="text" name="kode_pos_perusahaan_pasangan_atau_orang_tua" class="form-control" id="kode_pos_perusahaan_pasangan_atau_orang_tua" placeholder="Masukan Kode Pos " disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Telephone: <a style="color:red;">hanya angka</a></label>
                                                <input type="text" name="telp_perusahaan_pasangan_atau_orang_tua" class="form-control" id="telp_perusahaan_pasangan_atau_orang_tua" placeholder="Telephone" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Email</label>
                                                <input type="text" name="email_perusahaan_pasangan_atau_orang_tua" class="form-control" id="email_perusahaan_pasangan_atau_orang_tua" placeholder="Masukan Email" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Fax</label>
                                                <input type="text" name="fax_perusahaan_pasangan_atau_orang_tua" class="form-control" id="fax_perusahaan_pasangan_atau_orang_tua" placeholder="Masukan Fax" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Jabatan</label>
                                                <select name="jabatan_pasangan_atau_orang_tua" id="jabatan_pasangan_atau_orang_tua" class="form-control" disabled>
                                                    <option value="">-- pilih jabatan --</option>
                                                    <option value="komisaris">Komisaris</option>
                                                    <option value="direksi">Direksi</option>
                                                    <option value="manajer">Manajer</option>
                                                    <option value="staf">Staf</option>
                                                    <option value="pemilik">Pemilik</option>
                                                    <option value="pengawas">Pengawas</option>
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Jenis Usaha</label>
                                                <input type="text" name="jenis_usaha_pasangan_atau_orang_tua" class="form-control" id="jenis_usaha_pasangan_atau_orang_tua" placeholder="Masukan Jenis Usaha" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Lama Bekerja: dalam tahun <a style="color:red;">hanya angka</a></label>
                                                <input type="text" name="lama_bekerja_pasangan_atau_orang_tua" class="form-control" id="lama_bekerja_pasangan_atau_orang_tua" placeholder="Masukan Lama Bekerja" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Pengasilan Kotor Per Tahun</label>
                                                <select name="penghasilan_kotor_per_tahun_pasangan_atau_orang_tua" id="penghasilan_kotor_per_tahun_pasangan_atau_orang_tua" class="form-control" disabled>
                                                    <option value="<10">< Rp 10 Juta</option>
                                                    <option value=">10-50">> Rp 10 - 50 Juta</option>
                                                    <option value=">10-100">> 10 - 100 Juta</option>
                                                    <option value=">100-500">> 100 - 500 Juta</option>
                                                    <option value=">500-1m">> 500 - 1 Miliar</option>
                                                    <option value=">1m">> 1 Miliar</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Sumber Penghasilan utama: <a style="color:red">(*)</a></label>
                                            <select name="sumber_penghasilan_utama_pasangan_atau_orang_tua" disabled id="sumber_penghasilan_utama_pasangan_atau_orang_tua" class="form-control" disabled>
                                                <option value="" selected disabled>-- pilih penghasilan utama --</option>
                                                <option value="gaji">Gaji</option>
                                                <option value="hasil_usaha">Hasil Usaha</option>
                                                <option value="warisan">Warisan</option>
                                                <option value="dari_orang_tua/anak">Dari Orang Tua/Anak</option>
                                                <option value="hibah">Hibah</option>
                                                <option value="dari_suami/istri">Dari Suami/Istri</option>
                                                <option value="hasil_investasi">Hasil Investasi</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b>Dokumen Pendukung</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Fotokopi KTP/Paspor: <a style="color:red">(*)</a></label>
                                            <select name="ktp" class="form-control" id="ktp" disabled>
                                                <option value="" selected disabled>-- pilih status --</option>
                                                <option value="1">Ada</option>
                                                <option value="0">Tidak Ada</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Fotokopi NPWP: <a style="color:red">(*)</a></label>
                                            <select name="npwp" class="form-control" id="npwp" disabled>
                                                <option value="" selected disabled>-- pilih status --</option>
                                                <option value="1">Ada</option>
                                                <option value="0">Tidak Ada</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Fotokopi Form Profil Resiko Pemodal: <a style="color:red">(*)</a></label>
                                            <select name="form_profil_resiko_pemodal" class="form-control" id="form_profil_resiko_pemodal" disabled>
                                                <option value="" selected disabled>-- pilih status --</option>
                                                <option value="1">Ada</option>
                                                <option value="0">Tidak Ada</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Fotokopi Bukti Setoran Investasi Awal: <a style="color:red">(*)</a></label>
                                            <select name="bukti_setoran_investasi_awal" class="form-control" id="bukti_setoran_investasi_awal" disabled>
                                                <option value="" selected disabled>-- pilih status --</option>
                                                <option value="1">Ada</option>
                                                <option value="0">Tidak Ada</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Contoh Tanda Tangan: <a style="color:red">(*)</a></label>
                                            <select name="contoh_tanda_tangan" class="form-control" id="contoh_tanda_tangan" disabled>
                                                <option value="" selected disabled>-- pilih status --</option>
                                                <option value="1">Ada</option>
                                                <option value="0">Tidak Ada</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Formulir FATCA - Perorangan (non mandatory): <a style="color:red">(*)</a></label>
                                            <select name="fatca" class="form-control" id="fatca" disabled>
                                                <option value="" selected disabled>-- pilih status --</option>
                                                <option value="1">Ada</option>
                                                <option value="0">Tidak Ada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b>Persetujuan</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Nama Agen Pemasaran: <a style="color:red">(*)</a></label> <br>
                                            <select name="agen_pemasaran_id" id="agen_pemasaran_id" class="form-control" disabled>
                                                <option value="" disabled selected>-- pilih agen pemasaran --</option>
                                                @foreach ($agens as $agen)
                                                    <option value="{{ $agen->id }}">{{ $agen->nm_agen_pemasaran }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanda Tangan Agen Pemasaran: <a style="color:red">(*)</a></label> <br>
                                            <select name="tanda_tangan_agen_pemasaran" class="form-control" id="tanda_tangan_agen_pemasaran" disabled>
                                                <option value="1">Ada</option>
                                                <option value="0">Tidak Ada</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanggal Agen Pemasaran: <a style="color:red">(*)</a></label> <br>
                                            <input type="date" name="tanggal_agen_pemasaran" class="form-control" id="tanggal_agen_pemasaran" disabled placeholder="Tanggal Agen Pemasaran">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Nama Pejabat Berwenang: <a style="color:red">(*)</a></label> <br>
                                            <select name="pejabat_berwenang_id" id="pejabat_berwenang_id" class="form-control" disabled>
                                                <option value="" disabled selected>-- pilih pejabat berwenang --</option>
                                                @foreach ($pejabats as $pejabat)
                                                    <option value="{{ $pejabat->id }}">{{ $pejabat->nm_pejabat_berwenang }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Status Persetujuan: <a style="color:red">(*)</a></label> <br>
                                            <select name="status_persetujuan" class="form-control" id="status_persetujuan" disabled>
                                                <option value="disetujui">Disetujui</option>
                                                <option value="tidak_disetujui">Tidak Disetujui</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanggal Pejabat Berwenang: <a style="color:red">(*)</a></label> <br>
                                            <input type="date" name="tanggal_pejabat_berwenang" class="form-control" id="tanggal_pejabat_berwenang" disabled placeholder="Tanggal Pejabat Berwenang">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanda Tangan Pejabat Berwenang: <a style="color:red">(*)</a></label> <br>
                                            <select name="tanda_tangan_pejabat_berwenang" class="form-control" id="tanda_tangan_pejabat_berwenang" disabled>
                                                <option value="" selected disabled>-- pilih opsi --</option>
                                                <option value="1">Ada</option>
                                                <option value="0">Tidak Ada</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            $('.verifikasi-investor').DataTable();
        } );

        $('.verifikasi-investor').on('click','.detail',function() {
            var id_investor = $(this).data("id_investor");
            $.ajax({
                url: "{{ url('manajer/verifikasi_data_investor/detail') }}",
                type: "GET",
                data: {
                    id_investor : id_investor,
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    // Informasi Diri
                    $('#nm_investor1').val(data.investor.nm_investor);
                    $('#no_register').val(data.investor.no_register);
                    $('#jenis_kelamin').val(data.investor.jenis_kelamin);
                    $('#jenis_rekening').val(data.investor.jenis_rekening);
                    $('#profil_resiko_nasabah').val(data.investor.profil_resiko_nasabah);
                    $('#no_ktp').val(data.investor.no_ktp);
                    $('#tgl_kadaluarsa_ktp').val(data.investor.tgl_kadaluarsa_ktp);
                    $('#no_npwp').val(data.investor.no_npwp);
                    $('#tgl_registrasi_npwp').val(data.investor.tgl_registrasi_npwp);
                    $('#tempat_lahir').val(data.investor.tempat_lahir);
                    $('#tanggal_lahir').val(data.investor.tanggal_lahir);
                    $('#status_perkawinan').val(data.investor.status_perkawinan);
                    $('#kewarganegaraan').val(data.investor.kewarganegaraan);

                    $('#alamat_ktp').val(data.investor.alamat_ktp);
                    $('#rt_ktp').val(data.investor.rt_ktp);
                    $('#rw_ktp').val(data.investor.rw_ktp);
                    $('#kelurahan_ktp').val(data.investor.kelurahan_ktp);
                    $('#kecamatan_ktp').val(data.investor.kecamatan_ktp);
                    $('#kota_ktp').val(data.investor.kota_ktp);
                    $('#provinsi_ktp').val(data.investor.provinsi_ktp);
                    $('#kode_pos_ktp').val(data.investor.kode_pos_ktp);

                    $('#alamat_tempat_tinggal').val(data.investor.alamat_tempat_tinggal);
                    $('#rt_tempat_tinggal').val(data.investor.rt_tempat_tinggal);
                    $('#rw_tempat_tinggal').val(data.investor.rw_tempat_tinggal);
                    $('#kelurahan_tempat_tinggal').val(data.investor.kelurahan_tempat_tinggal);
                    $('#kecamatan_tempat_tinggal').val(data.investor.kecamatan_tempat_tinggal);
                    $('#kota_tempat_tinggal').val(data.investor.kota_tempat_tinggal);
                    $('#provinsi_tempat_tinggal').val(data.investor.provinsi_tempat_tinggal);
                    $('#kode_pos_tempat_tinggal').val(data.investor.kode_pos_tempat_tinggal);
                    $('#telp_rumah').val(data.investor.telp_rumah);
                    $('#ponsel').val(data.investor.ponsel);
                    $('#lama_menempati').val(data.investor.lama_menempati);
                    $('#status_rumah_tinggal').val(data.investor.status_rumah_tinggal);

                    $('#agama').val(data.investor.agama);
                    $('#pendidikan_terakhir').val(data.investor.pendidikan_terakhir);
                    $('#nm_gadis_ibu_kandung').val(data.investor.nm_gadis_ibu_kandung);
                    $('#emergency_kontak').val(data.investor.emergency_kontak);

                    //Korespondensi
                    $('#alamat_surat_menyurat_ktp').val(data.investor.alamat_surat_menyurat_ktp);
                    $('#alamat_surat_menyurat_tempat_tinggal').val(data.investor.alamat_surat_menyurat_tempat_tinggal);
                    $('#alamat_surat_menyurat_lainnya').val(data.investor.alamat_surat_menyurat_lainnya);
                    $('#pengiriman_konfirmasi_melalui_email').val(data.investor.pengiriman_konfirmasi_melalui_email);
                    $('#pengiriman_konfirmasi_melalui_fax').val(data.investor.pengiriman_konfirmasi_melalui_fax);
                    $('#pengiriman_konfirmasi_melalui_alamat_surat_menyurat').val(data.investor.pengiriman_konfirmasi_melalui_alamat_surat_menyurat);
                    $('#tujuan_investasi').val(data.investor.tujuan_investasi);

                    //Pekerjaan
                    $('#pekerjaan').val(data.pekerjaan.pekerjaan);
                    $('#nm_perusahaan').val(data.pekerjaan.nm_perusahaan);
                    $('#alamat_perusahaan').val(data.pekerjaan.alamat_perusahaan);
                    $('#kota_perusahaan').val(data.pekerjaan.kota_perusahaan);
                    $('#provinsi_perusahaan').val(data.pekerjaan.provinsi_perusahaan);
                    $('#kode_pos_perusahaan').val(data.pekerjaan.kode_pos_perusahaan);
                    $('#telp_perusahaan').val(data.pekerjaan.telp_perusahaan);
                    $('#email_perusahaan').val(data.pekerjaan.email_perusahaan);
                    $('#fax_perusahaan').val(data.pekerjaan.fax_perusahaan);
                    $('#jabatan').val(data.pekerjaan.jabatan);
                    $('#jenis_usaha').val(data.pekerjaan.jenis_usaha);
                    $('#lama_bekerja').val(data.pekerjaan.lama_bekerja);
                    $('#penghasilan_lain').val(data.pekerjaan.penghasilan_lain);
                    $('#sumber_penghasilan_lainnya').val(data.pekerjaan.sumber_penghasilan_lainnya);
                    $('#sumber_penghasilan_utama').val(data.pekerjaan.sumber_penghasilan_utama);
                    $('#sumber_dana_investasi').val(data.pekerjaan.sumber_dana_investasi);

                    //Pasangan atau Orang Tua
                    $('#nm_pasangan_atau_orang_tua').val(data.pasangan.nm_pasangan_atau_orang_tua);
                    $('#hubungan').val(data.pasangan.hubungan);
                    $('#alamat_tempat_tinggal_pasangan_atau_orang_tua').val(data.pasangan.alamat_tempat_tinggal_pasangan_atau_orang_tua);
                    $('#telp_rumah_pasangan_atau_orang_tua').val(data.pasangan.telp_rumah_pasangan_atau_orang_tua);
                    $('#ponsel_pasangan_atau_orang_tua').val(data.pasangan.ponsel_pasangan_atau_orang_tua);
                    $('#pekerjaan_pasangan_atau_orang_tua').val(data.pasangan.pekerjaan_pasangan_atau_orang_tua);
                    $('#nm_perusahaan_pasangan_atau_orang_tua').val(data.pasangan.nm_perusahaan_pasangan_atau_orang_tua);
                    $('#alamat_perusahaan_pasangan_atau_orang_tua').val(data.pasangan.alamat_perusahaan_pasangan_atau_orang_tua);
                    $('#kota_perusahaan_pasangan_atau_orang_tua').val(data.pasangan.kota_perusahaan_pasangan_atau_orang_tua);
                    $('#provinsi_perusahaan_pasangan_atau_orang_tua').val(data.pasangan.provinsi_perusahaan_pasangan_atau_orang_tua);
                    $('#kode_pos_perusahaan_pasangan_atau_orang_tua').val(data.pasangan.kode_pos_perusahaan_pasangan_atau_orang_tua);
                    $('#telp_perusahaan_pasangan_atau_orang_tua').val(data.pasangan.telp_perusahaan_pasangan_atau_orang_tua);
                    $('#email_perusahaan_pasangan_atau_orang_tua').val(data.pasangan.email_perusahaan_pasangan_atau_orang_tua);
                    $('#fax_perusahaan_pasangan_atau_orang_tua').val(data.pasangan.fax_perusahaan_pasangan_atau_orang_tua);
                    $('#jabatan_pasangan_atau_orang_tua').val(data.pasangan.jabatan_pasangan_atau_orang_tua);
                    $('#jenis_usaha_pasangan_atau_orang_tua').val(data.pasangan.jenis_usaha_pasangan_atau_orang_tua);
                    $('#lama_bekerja_pasangan_atau_orang_tua').val(data.pasangan.lama_bekerja_pasangan_atau_orang_tua);
                    $('#sumber_penghasilan_utama_pasangan_atau_orang_tua').val(data.pasangan.sumber_penghasilan_utama_pasangan_atau_orang_tua);

                    //Dokumen Pendukung
                    $('#ktp').val(data.dokumen.ktp);
                    $('#npwp').val(data.dokumen.npwp);
                    $('#form_profil_resiko_pemodal').val(data.dokumen.form_profil_resiko_pemodal);
                    $('#bukti_setoran_investasi_awal').val(data.dokumen.bukti_setoran_investasi_awal);
                    $('#contoh_tanda_tangan').val(data.dokumen.contoh_tanda_tangan);
                    $('#fatca').val(data.dokumen.fatca);

                    //persetujuan
                    $('#agen_pemasaran_id').val(data.persetujuan.agen_pemasaran_id);
                    $('#tanda_tangan_agen_pemasaran').val(data.persetujuan.tanda_tangan_agen_pemasaran);
                    $('#tanggal_agen_pemasaran').val(data.persetujuan.tanggal_agen_pemasaran);
                    $('#pejabat_berwenang_id').val(data.persetujuan.pejabat_berwenang_id);
                    $('#status_persetujuan').val(data.persetujuan.status_persetujuan);
                    $('#tanggal_pejabat_berwenang').val(data.persetujuan.tanggal_pejabat_berwenang);
                    $('#tanda_tangan_pejabat_berwenang').val(data.persetujuan.tanda_tangan_pejabat_berwenang);
                }
            });
        } );

        function verifikasi(id){
            $.ajax({
            url: "{{ url('manajer/verifikasi_data_investor') }}"+'/'+ id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('#exampleModal').modal('show');
                $('#investor_id').val(data.id);
                $('#nm_investor').text(data.nm_investor);
            },
            error:function(){
                alert("Nothing Data");
            }
            });
        }

        $('.disabled').click(function(){
            $(this).prop('disabled',true);
        });
    </script>
@endpush
