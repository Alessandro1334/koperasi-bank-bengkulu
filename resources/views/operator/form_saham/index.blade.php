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
                        <a href="{{ route('operator.tambah_saham') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
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
                        <table class="table table-bordered table-hover investor" id="investor">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Investor</th>
                                    <th>Jumlah Saham</th>
                                    <th>Terbilang Saham</th>
                                    <th>Status Saham</th>
                                    <th>Hasil Verifikasi</th>
                                    <th>Detail</th>
                                    <th>Data Saham</th>
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
                                                    @elseif($saham->status_verifikasi == "2")
                                                        <span class="label label-danger"><i class="fa fa-close"></i>&nbsp;tidak disetujui</span>
                                                        @else
                                                        <span class="label label-default"><i class="fa fa-exchange"></i>&nbsp;saham dialihkan</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm detail" data-id_saham="{{ $saham->id }}" data-id_investor="{{ $saham->investor_id }}" data-toggle="modal" data-target=".modal-detail">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('operator.cetak_saham',[$saham->id]) }}" class="btn btn-success"><i class="fa fa-file-pdf-o"></i>&nbsp; Cetak</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane table-responsive" id="b">
                        <table class="table table-bordered table-hover investor" id="investor1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Investor</th>
                                    <th>Jumlah Saham</th>
                                    <th>Terbilang Saham</th>
                                    <th>Status Saham</th>
                                    <th>Hasil Verifikasi</th>
                                    <th>Detail</th>
                                    <th>Data Saham</th>
                                    <th>SK3S</th>
                                    <th>SPMPKOP</th>
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
                                                <span class="label label-warning"><i class="fa fa-clock-o"></i>&nbsp;menunggu diverifikasi</span>
                                                @elseif($saham->status_verifikasi == '1')
                                                    <span class="label label-success"><i class="fa fa-check"></i>&nbsp;disetujui</span>
                                                    @elseif($saham->status_verifikasi == "2")
                                                        <span class="label label-danger"><i class="fa fa-close"></i>&nbsp;tidak disetujui</span>
                                                        @else
                                                        <span class="label label-default"><i class="fa fa-exchange"></i>&nbsp;saham dialihkan</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm detail" data-id_saham="{{ $saham->id }}" data-id_investor="{{ $saham->investor_id }}" data-toggle="modal" data-target=".modal-detail">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('operator.cetak_saham',[$saham->id]) }}" class="btn btn-success"><i class="fa fa-file-pdf-o"></i>&nbsp; Cetak</a>
                                        </td>
                                        <td>
                                            @if ($saham->status_verifikasi == '1')
                                                <a href="{{ route('operator.sk3s',[$saham->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o"></i>&nbsp; Cetak SK3S</a>
                                                @else
                                                <a style="color:red;"><i>tidak dapat mencetak sk3s</i></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($saham->status_verifikasi == '1')
                                                <form action="{{ route('operator.spmpkop') }}" method="get">
                                                    <input type="hidden" name="id_spmpkop" value="{{ $saham->id }}" id="id_spmpkop">
                                                    <button type="submit" class="btn btn-info btn-sm spmpkop">
                                                        <i class="fa fa-print">&nbsp;Cetak SPMPKOP</i>
                                                    </button>
                                                </form>
                                                @else
                                                <a style="color:red;"><i>tidak dapat mencetak spmpkop</i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
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
                                            <input type="text" name="nm_investor" id="nm_investor" class="form-control" placeholder="Masukan nama lengkap" disabled>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4><b>Pengalihan Saham</b></h4>
                                            <hr>
                                        </div>

                                        <div id="pengalihan">
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">Pilih Investor Pengalihan</label>
                                                <select name="investor_pengalihan_id" class="form-control" id="investor_pengalihan_id" disabled>
                                                    <option value="">-- pilih investor --</option>
                                                    @foreach ($investor_pengalihans as $investor)
                                                        <option value="{{ $investor->investor_id }}">{{ $investor->nm_investor }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">Nomor SK3S Lama</label>
                                                <input type="text" name="no_sk3s_lama" class="form-control" id="no_sk3s_lama" placeholder="Masukan Nomor SK3S Lama"  disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h4><b>Pembelian Saham</b></h4>
                                            <hr>
                                        </div>
                                        <div id="baru">
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">Pilih Investor Pembeli</label>
                                                <select name="investor_id" id="investor_id" class="form-control" disabled>
                                                    <option value="">-- pilih investor --</option>
                                                    @foreach ($investors as $investor)
                                                        <option value="{{ $investor->id }}">{{ $investor->nm_investor }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">Nomor SK3S Baru:</label>
                                                <input type="text" name="no_sk3s" class="form-control" id="no_sk3s" placeholder="Masukan Nomor SK3S" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">Seri SPMPKOP</label>
                                                <input type="text" name="seri_spmpkop" class="form-control" id="seri_spmpkop" placeholder="Masukan nomor register" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">Seri Formulir</label>
                                                <input type="text" name="seri_formulir" class="form-control" id="seri_formulir" placeholder="Masukan nomor register" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">Jumlah Saham</label>
                                                <input type="text" name="jumlah_saham" class="form-control" id="jumlah_saham" placeholder="Masukan Jumlah Saham" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">Terbilang Saham</label>
                                                <input type="text" name="terbilang_saham" class="form-control" id="terbilang_saham" placeholder="Masukan Terbilang Saham" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">Jenis Mata Uang</label>
                                                <select name="jenis_mata_uang" class="form-control" id="jenis_mata_uang" disabled>
                                                    <option value="" selected disabled>-- pilih mata uang --</option>
                                                    <option value="idr">IDR</option>
                                                    <option value="usd">USD</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">Nomor Rekening</label>
                                                <input type="text" name="pembayaran_no_rek" class="form-control" id="pembayaran_no_rek" placeholder="Masukan Nomor Rekening" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">Nama Rekening</label>
                                                <input type="text" name="pembayaran_nm_rek" class="form-control" id="pembayaran_nm_rek" placeholder="Masukan Nama Pemilik Rekening" disabled>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">Nama Bank</label>
                                                <input type="text" name="pembayaran_nm_bank" class="form-control" id="pembayaran_nm_bank" placeholder="Masukan Nama Bank" disabled>
                                            </div>
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
            $('#investor').DataTable();
            $('#investor1').DataTable();
        } );
        $('.investor').on('click','.detail',function() {
            var id_saham = $(this).data("id_saham");
            var id_investor = $(this).data("id_investor");
            $.ajax({
                url: "{{ url('operator/manajemen_pembelian_dan_pengalihan_saham/detail') }}",
                type: "GET",
                data: {
                    id_saham : id_saham,
                    id_investor : id_investor,
                },
                dataType: "JSON",
                success: function(data) {
                    // console.log(data);
                    //Informasi Diri
                    $('#nm_investor').val(data.investor.nm_investor);
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

                    //Pembelian Saham
                    $('#investor_pengalihan_id').val(data.sahams.investor_id);
                    $('#no_sk3s_lama').val(data.sahams.no_sk3s);
                    $('#investor_id').val(data.sahams.investor_id);
                    $('#no_sk3s').val(data.sahams.no_sk3s);
                    $('#seri_spmpkop').val(data.sahams.seri_spmpkop);
                    $('#seri_formulir').val(data.sahams.seri_formulir);
                    $('#jumlah_saham').val(data.sahams.jumlah_saham);
                    $('#terbilang_saham').val(data.sahams.terbilang_saham);
                    $('#jenis_mata_uang').val(data.sahams.jenis_mata_uang);
                    $('#pembayaran_no_rek').val(data.sahams.pembayaran_no_rek);
                    $('#pembayaran_nm_rek').val(data.sahams.pembayaran_nm_rek);
                    $('#pembayaran_nm_bank').val(data.sahams.pembayaran_nm_bank);
                    $('#id_spmpkop').val(data.sahams.id);
                }
            });
        } );

    </script>
@endpush
