@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-wpforms"></i>&nbsp;Form Pembuka Rekening
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
                <li class="active"><a href="#timeline" data-toggle="tab"><i class="fa fa-user"></i>&nbsp;Form Tambah Data Investor Baru</a></li>
                </ul>
                <div class="tab-content">
                    <form action="{{ route('operator.tambah_investor_post') }}" method="POST">
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

                                        <h3 class="timeline-header">Silahkan Lengkapi Informasi Pribadi Investor di Bawah Ini</h3>

                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Nama Lengkap KTP/Paspor: <a style="color:red">(*)</a> </label>
                                                    <input type="text" name="nm_investor" id="nm_investor" class="form-control" placeholder="Masukan nama lengkap" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">No Register:  <a style="color:red">(*)</a><a id="noreg_error" style="display:none;color:red;"><i>sudah digunakan</i></a></label>
                                                    <input type="number" name="no_register" id="no_register" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==5) return false;" class="form-control" placeholder="Masukan nomor register" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">Jenis Kelamin:  <a style="color:red">(*)</a></label>
                                                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                                                        <option value="" selected disabled>-- pilih jenis kelamin --</option>
                                                        <option value="L">Laki-Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">Jenis Rekening: <a style="color:red">(*)</a></label>
                                                    <select name="jenis_rekening" class="form-control" id="jenis_rekening" required>
                                                        <option value="perorangan" selected>Perorangan</option>
                                                        <option value="nonperorangan">Non Perorangan</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Profil Resiko Nasabah: <a style="color:red">(*)</a></label>
                                                    <select name="profil_resiko_nasabah" class="form-control" id="profil_resiko_nasabah" required>
                                                        <option value="" selected disabled>-- pilih profil resiko nasabah --</option>
                                                        <option value="konservatif">Konservatif</option>
                                                        <option value="menengah">Menengah</option>
                                                        <option value="cukup_agresif">Cukup Agresif</option>
                                                        <option value="agresif">Agresif</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Nomor KTP/Paspor: <a style="color:red">(*)</a></label>
                                                    <input type="number" name="no_ktp" class="form-control" id="no_ktp" placeholder="Masukan Nomor ktp" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Kadaluarsa KTP: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="tgl_kadaluarsa_ktp" class="form-control" id="tgl_kadaluarsa_ktp" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Nomor NPWP: <a style="color:red">(*)</a></label>
                                                    <input type="number" name="no_npwp" class="form-control" id="no_npwp" placeholder="Masukan Nomor npwp" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Registrasi NPWP: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="tgl_registrasi_npwp" class="form-control" id="tgl_registrasi_npwp" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tempat Lahir: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Masukan Nomor npwp" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Lahir: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Status Perkawinan: <a style="color:red">(*)</a></label>
                                                    <select name="status_perkawinan" id="status_perkawinan" class="form-control" required>
                                                        <option value="" selected disabled>-- pilih status perkawinan --</option>
                                                        <option value="menikah">Menikah</option>
                                                        <option value="belum_menikah">Belum Menikah</option>
                                                        <option value="janda/duda">Janda / Duda</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kewarganegaraan: <a style="color:red">(*)</a></label>
                                                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" style="display:none;" required>
                                                        <option value="" selected disabled>-- pilih kewarganegaraan --</option>
                                                        <option value="wni">Warga Negara Indonesia</option>
                                                        <option value="wna">Warga Negara Asing</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="{{ route('operator.form_pembukaan_rekening') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Batalkan</a>
                                            <a onclick="alamatKtp()" class="btn btn-primary" id="langkah1" style="display:none;"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                            <button class="btn btn-primary" id="langkah1error" style=""><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="timeline timeline-inverse" id="alamatktp" style="display:none;;">
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
                                                    <label for="">Alamat Sesuai KTP/KITAS: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="alamat_ktp" id="alamat_ktp" class="form-control" required placeholder="Masukan nama lengkap">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">RT Sesuai KTP: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="number" name="rt_ktp" class="form-control" id="rt_ktp" required placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">RW Sesuai KTP: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="number" name="rw_ktp" class="form-control" id="rw_ktp" required placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kelurahan Sesuai KTP: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kelurahan_ktp" class="form-control" id="kelurahan_ktp" required placeholder="masukan keluarahan">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kecamatan Sesuai KTP: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kecamatan_ktp" class="form-control" id="kecamatan_ktp" required placeholder="masukan kecamatan">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kota Sesuai KTP: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kota_ktp" class="form-control" id="kota_ktp" required placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Provinsi Sesuai KTP: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="provinsi_ktp" class="form-control" id="provinsi_ktp" required placeholder="masukan provinsi">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kode Pos Sesuai KTP: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="text" name="kode_pos_ktp" class="form-control" id="kode_pos_ktp" style="display:none;" id="" required placeholder="masukan kode pos">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                        <div class="timeline-footer">
                                            <a onclick="backToInformasiPribadi()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="alamatTempatTinggal()" class="btn btn-primary" style="display:none" id="langkah2"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                            <button class="btn btn-primary" id="langkah2error" style=""><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>
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
                                                    <label for="">Alamat Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="alamat_tempat_tinggal" id="alamat_tempat_tinggal" class="form-control" required placeholder="Masukan nama lengkap">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">RT Tempat Tinggal: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="text" name="rt_tempat_tinggal" class="form-control" id="rt_tempat_tinggal" required placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">RW Tempat Tinggal: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="text" name="rw_tempat_tinggal" id="rw_tempat_tinggal" class="form-control" required placeholder="Masukan alamat tempat tinggal">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kelurahan Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kelurahan_tempat_tinggal" class="form-control" id="kelurahan_tempat_tinggal" required placeholder="masukan kelurahan tempat tinggal">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kecamatan Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kecamatan_tempat_tinggal" class="form-control" id="kecamatan_tempat_tinggal" required placeholder="masukan kecamatan tempat tinggal">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kota Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kota_tempat_tinggal" class="form-control" id="kota_tempat_tinggal" required placeholder="Masukan kota tempat tinggal">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Provinsi Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="provinsi_tempat_tinggal" class="form-control" id="provinsi_tempat_tinggal" required placeholder="masukan provinsi tempat tinggal">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kode Pos Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kode_pos_tempat_tinggal" class="form-control" id="kode_pos_tempat_tinggal" required placeholder="masukan kode pos tempat tinggal">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Telp. Rumah: <a style="color:red">(*)</a></label>
                                                    <input type="number" name="telp_rumah" class="form-control" id="telp_rumah" required placeholder="telephone rumah">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Ponsel: <a style="color:red">(*)</a></label>
                                                    <input type="number" name="ponsel" class="form-control" id="ponsel" required placeholder="ponsel">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Lama Menempati: <a style="color:red"> dalam tahun (* hanya angka)</a></label>
                                                    <input type="number" name="lama_menempati" class="form-control" id="lama_menempati" required placeholder="lama menemoati">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Status Rumah Tinggal: <a style="color:red">(*)</a></label>
                                                    <select name="status_rumah_tinggal" id="status_rumah_tinggal" style="display:none;" class="form-control" required>
                                                        <option value="" disabled selected>-- pilih status rumah tinggal --</option>
                                                        <option value="milik_sendiri">Milik Pribadi</option>
                                                        <option value="sewa">Sewa</option>
                                                        <option value="lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToAlamatKtp()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="agamaDanPendidikan()" class="btn btn-primary" style="display:none;" id="langkah3"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                            <button class="btn btn-primary" id="langkah3error" style=""><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>

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
                                                    <label for="">Agama: <a style="color:red">(*)</a></label>
                                                    <select name="agama" id="agama" class="form-control" required>
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
                                                    <select name="pendidikan_terakhir" id="pendidikan_terakhir" required class="form-control">
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
                                                    <input type="text" name="nm_gadis_ibu_kandung" class="form-control" id="nm_gadis_ibu_kandung" required placeholder="Masukan nama gadis ibu kandung">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Emergency Kontak: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="number" name="emergency_kontak" class="form-control" id="emergency_kontak" style="display:none;" required placeholder="Masukan emergency kontak">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToAlamatTempatTinggal()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="korespondensi()" class="btn btn-primary" id="langkah4" style="display:none;"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                            <button class="btn btn-primary" style="" id="langkah4error"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>

                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="timeline timeline-inverse" id="korespondensi" style="display:none;">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Korespondensi
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header">Silahkan Lengkapi Data Korespondensi di Bawah Ini</h3>
                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Alamat Surat Menyurat Sesuai KTP: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="alamat_surat_menyurat_ktp" id="alamat_surat_menyurat_ktp"  class="form-control" required placeholder="Masukan alamat surat menyurat sesuai ktp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Alamat Surat Menyurat Tempat Tinggal:</label>
                                                    <input type="text" name="alamat_surat_menyurat_tempat_tinggal" id="alamat_surat_menyurat_tempat_tinggal"  class="form-control" placeholder="Masukan alamat surat menyurat tempat tinggal">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Alamat Surat Menyurat Lainnya:</label>
                                                    <input type="text" name="alamat_surat_menyurat_lainnya" id="alamat_surat_menyurat_lainnya"  class="form-control" placeholder="Masukan alamat surat menyurat lainnya">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Pengiriman Konfirmasi Melalui Email:</label>
                                                    <input type="text" name="pengiriman_konfirmasi_melalui_email" id="pengiriman_konfirmasi_melalui_email"  class="form-control" placeholder="Masukan kofirmasi melalui email">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Pengiriman Konfirmasi Melalui Fax:</label>
                                                    <input type="text" name="pengiriman_konfirmasi_melalui_fax" id="pengiriman_konfirmasi_melalui_fax"  class="form-control" placeholder="Masukan kofirmasi melalui fax">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Konfirmasi Melalui Alamat Surat Menyurat</label>
                                                    <input type="text" name="pengiriman_konfirmasi_melalui_alamat_surat_menyurat" id="pengiriman_konfirmasi_melalui_alamat_surat_menyurat"  class="form-control" placeholder="Masukan kofirmasi melalui fax">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tujuan Investarsi: <a style="color:red">(*)</a></label>
                                                    <select name="tujuan_investasi" id="tujuan_investasi" class="form-control" required>
                                                        <option value="" selected disabled>-- pilih tujuan investasi --</option>
                                                        <option value="kenaikan_harga">Mendapatkan Kenaikan Harga</option>
                                                        <option value="penghasilan">Mendapatkan Penghasilan</option>
                                                        <option value="investasi">Investasi</option>
                                                        <option value="spekulasi">Spekulasi</option>
                                                        <option value="lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToAgamaDanPendidikan()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="informasiPekerjaan()" class="btn btn-primary" id="langkah5" style="display:none;"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                            <button class="btn btn-primary" style="" id="langkah5error"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>

                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="timeline timeline-inverse" id="informasi-pekerjaan" style="display:none;">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Informasi Pekerjaan
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header">Silahkan Lengkapi Informasi Pekerjaan di Bawah Ini</h3>
                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Pekerjaan: <a style="color:red">(*)</a></label>
                                                    <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                                                        <option value="" selected disabled>-- pilih pekerjaan --</option>
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
                                                        <input type="text" name="nm_perusahaan" class="form-control" id="" placeholder="Masukan nama perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Alamat Perusahaan:</label>
                                                        <input type="text" name="alamat_perusahaan" class="form-control" placeholder="Masukan Alamat Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Kota Perusahaan</label>
                                                        <input type="text" name="kota_perusahaan" class="form-control" id="" placeholder="Masukan kota perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Provinsi Perusahaan</label>
                                                        <input type="text" name="provinsi_perusahaan" class="form-control" id="" placeholder="Masukan provinsi perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Kode Pos Perusahaan</label>
                                                        <input type="text" name="kode_pos_perusahaan" class="form-control" id="" placeholder="Masukan Kode Pos Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Telephone</label>
                                                        <input type="text" name="telp_perusahaan" class="form-control" id="" placeholder="Masukan Telephone">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Email Perusahaan</label>
                                                        <input type="text" name="email_perusahaan" class="form-control" id="" placeholder="Masukan Email Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Fax Perusahaan</label>
                                                        <input type="text" name="fax_perusahaan" class="form-control" id="" placeholder="Masukan Fax Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Jabatan</label>
                                                        <select name="jabatan" id="" class="form-control">
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
                                                        <input type="text" name="jenis_usaha" class="form-control" id="" placeholder="Masukan Jenis Usaha">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">Lama Bekerja: dalam tahun <a style="color:red;">hanya angka</a></label>
                                                        <input type="text" name="lama_bekerja" class="form-control" id="" placeholder="Lama Bekerja">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">Nominal Penghasilan Lain: <a style="color:red;">hanya angka</a></label>
                                                        <input type="text" name="penghasilan_lain" class="form-control" id="" placeholder="Masukan Nominal Penghasilan Lain">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Sumber Penghasilan Lainnya:</label>
                                                        <select name="sumber_penghasilan_lain" class="form-control" id="">
                                                            <option value="" selected disabled>-- pilih sumber penghasilan lainnya --</option>
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
                                                    <select name="sumber_penghasilan_utama" class="form-control" id="" required>
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
                                                    <select name="sumber_dana_investasi" id="sumber_dana_investasi" class="form-control" required>
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
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToKorespondensi()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="pasanganAtauOrangTua()" class="btn btn-primary" style="display:none;" id="langkah6"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                            <button class="btn btn-primary" id="langkah6error"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="timeline timeline-inverse" id="pasangan-atau-orangtua" style="display:none;">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Data Pasangan Atau Orang Tua
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header">Silahkan Lengkapi Data Pasangan Atau Orang Tua di Bawah Ini</h3>
                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Nama Pasangan Atau Orang Tua: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="nm_pasangan_atau_orang_tua" class="form-control" placeholder="Masukan Nama Pasangan Atau Orang Tua" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Hubungan: <a style="color:red">(*)</a></label>
                                                    <select name="hubungan" id="" class="form-control" required>
                                                        <option value="" selected disabled>-- pilih hubungan --</option>
                                                        <option value="suami">Suami</option>
                                                        <option value="istri">Istri</option>
                                                        <option value="orang_tua">Orang Tua</option>
                                                        <option value="lainnya">Lainnya</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Alamat Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="alamat_tempat_tinggal_pasangan_atau_orang_tua" id="alamat_tempat_tinggal_pasangan_atau_orang_tua" class="form-control" required placeholder="Masukan Alamat Tempat Tinggal">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Telephone Rumah: <a style="color:red;">hanya angka</a></label>
                                                    <input type="text" name="telp_rumah_pasangan_atau_orang_tua" class="form-control" id="" placeholder="Masukan Telephone Rumah Pasangan / Orang Tua">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Ponsel: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="text" name="ponsel_pasangan_atau_orang_tua" class="form-control" id="" placeholder="Masukan Ponsel" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Pekerjaan: <a style="color:red">(*)</a></label>
                                                    <select name="pekerjaan_pasangan_atau_orang_tua" id="pekerjaan_pasangan_atau_orang_tua" class="form-control" required>
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
                                                        <input type="text" name="nm_perusahaan_pasangan_atau_orang_tua" class="form-control" id="" placeholder="Masukan Nama Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Alamat Perusahaan</label>
                                                        <input type="text" name="alamat_perusahaan_pasangan_atau_orang_tua" class="form-control" id="" placeholder="Masukan Alamat Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Kota Perusahaan</label>
                                                        <input type="text" name="kota_perusahaan_pasangan_atau_orang_tua" class="form-control" id="" placeholder="Masukan Kota Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Provinsi Perusahaan</label>
                                                        <input type="text" name="provinsi_perusahaan_pasangan_atau_orang_tua" class="form-control" id="" placeholder="Masukan Provinsi Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Kode Pos: <a style="color:red;">hanya angka</a> </label>
                                                        <input type="text" name="kode_pos_perusahaan_pasangan_atau_orang_tuaenis_usaha" class="form-control" id="" placeholder="Masukan Kode Pos ">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">Telephone: <a style="color:red;">hanya angka</a></label>
                                                        <input type="text" name="telp_perusahaan_pasangan_atau_orang_tua" class="form-control" id="" placeholder="Telephone">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Email</label>
                                                        <input type="text" name="email_perusahaan_pasangan_atau_orang_tua" class="form-control" id="" placeholder="Masukan Email">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Fax</label>
                                                        <input type="text" name="fax_perusahaan_pasangan_atau_orang_tua" class="form-control" id="" placeholder="Masukan Fax">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Jabatan</label>
                                                        <select name="jabatan_pasangan_atau_orang_tua" id="" class="form-control">
                                                            <option value="" selected disabled>-- pilih jabatan --</option>
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
                                                        <input type="text" name="jenis_usaha_pasangan_atau_orang_tua" class="form-control" id="" placeholder="Masukan Jenis Usaha">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Lama Bekerja: dalam tahun <a style="color:red;">hanya angka</a></label>
                                                        <input type="text" name="lama_bekerja_pasangan_atau_orang_tua" class="form-control" id="" placeholder="Masukan Lama Bekerja">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Pengasilan Kotor Per Tahun</label>
                                                        <select name="penghasilan_kotor_per_tahun_pasangan_atau_orang_tua" id="" class="form-control">
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
                                                    <select name="sumber_penghasilan_utama_pasangan_atau_orang_tua" required id="sumber_penghasilan_utama_pasangan_atau_orang_tua" class="form-control">
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
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToPekerjaan()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="dokumenPendukung()" class="btn btn-primary" id="langkah7" style="display:none;"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                            <button class="btn btn-primary" id="langkah7error"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="timeline timeline-inverse" id="dokumen-pendukung" style="display:none;">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Dokumen Pendukung Individu
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header">Silahkan Lengkapi Dokumen Pendukung di Bawah Ini</h3>
                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Fotokopi KTP/Paspor: <a style="color:red">(*)</a></label>
                                                    <select name="ktp" class="form-control" id="ktp" required>
                                                        <option value="" selected disabled>-- pilih status --</option>
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak Ada</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Fotokopi NPWP: <a style="color:red">(*)</a></label>
                                                    <select name="npwp" class="form-control" id="npwp" required>
                                                        <option value="" selected disabled>-- pilih status --</option>
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak Ada</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Fotokopi Form Profil Resiko Pemodal: <a style="color:red">(*)</a></label>
                                                    <select name="form_profil_resiko_pemodal" class="form-control" id="form_profil_resiko_pemodal" required>
                                                        <option value="" selected disabled>-- pilih status --</option>
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak Ada</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Fotokopi Bukti Setoran Investasi Awal: <a style="color:red">(*)</a></label>
                                                    <select name="bukti_setoran_investasi_awal" class="form-control" id="bukti_setoran_investasi_awal" required>
                                                        <option value="" selected disabled>-- pilih status --</option>
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak Ada</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Contoh Tanda Tangan: <a style="color:red">(*)</a></label>
                                                    <select name="contoh_tanda_tangan" class="form-control" id="contoh_tanda_tangan" required>
                                                        <option value="" selected disabled>-- pilih status --</option>
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak Ada</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Formulir FATCA - Perorangan (non mandatory): <a style="color:red">(*)</a></label>
                                                    <select name="fatca" class="form-control" id="fatca" required>
                                                        <option value="" selected disabled>-- pilih status --</option>
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak Ada</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToPasanganAtauOrangTua()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="persetujuan()" class="btn btn-primary" id="langkah8" style="display:none;"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                            <button class="btn btn-primary" id="langkah8error"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="timeline timeline-inverse" id="persetujuan" style="display:none;">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Persetujuan (* Diisi oleh petugas koperasi jasa mitra usaha)
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header">Silahkan Lengkapi Persetujuan di Bawah Ini</h3>
                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Nama Agen Pemasaran: <a style="color:red">(*)</a></label> <br>
                                                    <select name="agen_pemasaran_id" id="agen_pemasaran_id" class="form-control" required>
                                                        <option value="" disabled selected>-- pilih agen pemasaran --</option>
                                                        @foreach ($agens as $agen)
                                                            <option value="{{ $agen->id }}">{{ $agen->nm_agen_pemasaran }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanda Tangan Agen Pemasaran: <a style="color:red">(*)</a></label> <br>
                                                    <select name="tanda_tangan_agen_pemasaran" class="form-control" id="tanda_tangan_agen_pemasaran" required>
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak Ada</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Agen Pemasaran: <a style="color:red">(*)</a></label> <br>
                                                    <input type="date" name="tanggal_agen_pemasaran" class="form-control" id="tanggal_agen_pemasaran" required placeholder="Tanggal Agen Pemasaran">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Nama Pejabat Berwenang: <a style="color:red">(*)</a></label> <br>
                                                    <select name="pejabat_berwenang_id" id="pejabat_berwenang_id" class="form-control" required>
                                                        <option value="" disabled selected>-- pilih pejabat berwenang --</option>
                                                        @foreach ($pejabats as $pejabat)
                                                            <option value="{{ $pejabat->id }}">{{ $pejabat->nm_pejabat_berwenang }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Status Persetujuan: <a style="color:red">(*)</a></label> <br>
                                                    <select name="status_persetujuan" class="form-control" id="status_persetujuan" required>
                                                        <option value="disetujui">Disetujui</option>
                                                        <option value="tidak_disetujui">Tidak Disetujui</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Pejabat Berwenang: <a style="color:red">(*)</a></label> <br>
                                                    <input type="date" name="tanggal_pejabat_berwenang" class="form-control" id="tanggal_pejabat_berwenang" required placeholder="Tanggal Pejabat Berwenang">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanda Tangan Pejabat Berwenang: <a style="color:red">(*)</a></label> <br>
                                                    <select name="tanda_tangan_pejabat_berwenang" class="form-control" id="tanda_tangan_pejabat_berwenang" required>
                                                        <option value="" selected disabled>-- pilih opsi --</option>
                                                        <option value="1">Ada</option>
                                                        <option value="0">Tidak Ada</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToDokumenPendukung()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>

                                            <button type="button" class="btn btn-primary" data-toggle="modal" id="langkah9" style="display:none;" data-target="#modal-default">
                                                <i class="fa fa-check-circle"></i>&nbsp;Selesai
                                            </button>
                                            <button class="btn btn-primary" id="langkah9error"><i class="fa fa-check-circle"></i>&nbsp;Selesai</button>

                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"><i class="fa fa-info-circle"></i>&nbsp;Perhatian</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Apakah anda sudah yakin ingin menyimpan data?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Simpan Data</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                            <!-- /.modal -->
                    </form>
                </div>
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>
@endsection
@push('scripts')
    <script>

        // $(document).ready(function() {
        //     $('form').attr(',');
        // });

        $(document).ready(function(){
            $("#status_perkawinan, #kewarganegaraan").change(function(){
                var stt = $("#status_perkawinan").val();
                var kwg = $("#kewarganegaraan").val();
                if((stt != '') && (kwg == null)){
                    $("#kewarganegaraan").show();
                }
                if((kwg != null) && (stt != null)){
                    $('#langkah1').show();
                    $('#langkah1error').hide();
                }
            });
        });

        $(document).ready(function(){
            $("#provinsi_ktp, #kode_pos_ktp").keyup(function(){
                var prov = $("#provinsi_ktp").val();
                var pos = $("#kode_pos_ktp").val();
                if((prov != '') && (pos == '')){
                    $("#kode_pos_ktp").show();
                }
                if((pos != '') && (prov != '')){
                    $('#langkah2').show();
                    $('#langkah2error').hide();
                }
            });
        });

        $(document).ready(function(){
            $("#lama_menempati, #status_rumah_tinggal").keyup(function(){
                var lama = $("#lama_menempati").val();
                if((lama != '')){
                    $("#status_rumah_tinggal").show();
                }
            });
        });

        $(document).ready(function(){
            $("#status_rumah_tinggal").change(function(){
                var status = $("#status_rumah_tinggal").val();
                if((status != null) ){
                    $('#langkah3').show();
                    $('#langkah3error').hide();
                }
            });
        });

        $(document).ready(function(){
            $("#nm_gadis_ibu_kandung, #emergency_kontak").keyup(function(){
                var nm_ibu = $("#nm_gadis_ibu_kandung").val();
                var emer = $("#emergency_kontak").val();
                if((nm_ibu != '') && (emer == '')){
                    $("#emergency_kontak").show();
                }
                if((emer != '') && (nm_ibu != '')){
                    $('#langkah4').show();
                    $('#langkah4error').hide();
                }
            });
        });

        $(document).ready(function(){
            $("#tujuan_investasi").change(function(){
                var sumber = $("#tujuan_investasi").val();
                if((sumber != null) ){
                    $('#langkah5').show();
                    $('#langkah5error').hide();
                }
            });
        });

        $(document).ready(function(){
            $("#sumber_dana_investasi").change(function(){
                var sumber = $("#sumber_dana_investasi").val();
                if((sumber != null) ){
                    $('#langkah6').show();
                    $('#langkah6error').hide();
                }
            });
        });

        $(document).ready(function(){
            $("#sumber_penghasilan_utama_pasangan_atau_orang_tua").change(function(){
                var sumber = $("#sumber_penghasilan_utama_pasangan_atau_orang_tua").val();
                if((sumber != null) ){
                    $('#langkah7').show();
                    $('#langkah7error').hide();
                }
            });
        });

        $(document).ready(function(){
            $("#fatca").change(function(){
                var sumber = $("#fatca").val();
                if((sumber != null) ){
                    $('#langkah8').show();
                    $('#langkah8error').hide();
                }
            });
        });

        $(document).ready(function(){
            $("#tanda_tangan_pejabat_berwenang").change(function(){
                var sumber = $("#tanda_tangan_pejabat_berwenang").val();
                if((sumber != null) ){
                    $('#langkah9').show();
                    $('#langkah9error').hide();
                }
            });
        });

        // validasi form unique
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#no_register").keyup(function(){
            var no_register = $("#no_register").val();
            url = "{{ url('operator/manajemen_investor/tambah_investor/cari_noreg') }}";
            $.ajax({
                url :url,
                data : {no_register:no_register},
                method :"POST",
                success:function(data){
                if(data ==0){
                    $('#noreg_error').hide();
                }
                else if(data == 1){
                    $('#noreg_error').show();
                }
                }
            })

            })
        })

        // validasi data sama
        $(document).ready(function(){
            $("#alamat_ktp").keyup(function(){
                var alamat = $("#alamat_ktp").val();
                if(alamat != ''){
                    $('#alamat_tempat_tinggal').val(alamat);
                    $('#alamat_surat_menyurat_ktp').val(alamat);
                    $('#alamat_tempat_tinggal_pasangan_atau_orang_tua').val(alamat);
                }
            });
        });

        //validasi pekerjaan
        $(document).ready(function(){
            $("#pekerjaan").change(function(){
                var sumber = $("#pekerjaan").val();
                if((sumber == 'tidak_bekerja') ){
                    $('#info-pekerjaan :input').prop('disabled',true);
                }
                else{
                    $('#info-pekerjaan :input').prop('disabled',false);
                }
            });
        });

        $(document).ready(function(){
            $("#pekerjaan_pasangan_atau_orang_tua").change(function(){
                var sumber = $("#pekerjaan_pasangan_atau_orang_tua").val();
                if((sumber == 'tidak_bekerja') ){
                    $('#pekerjaan-pasangan :input').prop('disabled',true);
                }
                else{
                    $('#pekerjaan-pasangan :input').prop('disabled',false);
                }
            });
        });

        $(document).ready(function(){
            $("#rt_ktp").keyup(function(){
                var alamat = $("#rt_ktp").val();
                if(alamat != ''){
                    $('#rt_tempat_tinggal').val(alamat);
                }
            });
        });

        $(document).ready(function(){
            $("#rw_ktp").keyup(function(){
                var alamat = $("#rw_ktp").val();
                if(alamat != ''){
                    $('#rw_tempat_tinggal').val(alamat);
                }
            });
        });

        $(document).ready(function(){
            $("#kelurahan_ktp").keyup(function(){
                var alamat = $("#kelurahan_ktp").val();
                if(alamat != ''){
                    $('#kelurahan_tempat_tinggal').val(alamat);
                }
            });
        });

        $(document).ready(function(){
            $("#kecamatan_ktp").keyup(function(){
                var alamat = $("#kecamatan_ktp").val();
                if(alamat != ''){
                    $('#kecamatan_tempat_tinggal').val(alamat);
                }
            });
        });

        $(document).ready(function(){
            $("#kota_ktp").keyup(function(){
                var alamat = $("#kota_ktp").val();
                if(alamat != ''){
                    $('#kota_tempat_tinggal').val(alamat);
                }
            });
        });

        $(document).ready(function(){
            $("#provinsi_ktp").keyup(function(){
                var alamat = $("#provinsi_ktp").val();
                if(alamat != ''){
                    $('#provinsi_tempat_tinggal').val(alamat);
                }
            });
        });

        $(document).ready(function(){
            $("#kode_pos_ktp").keyup(function(){
                var alamat = $("#kode_pos_ktp").val();
                if(alamat != ''){
                    $('#kode_pos_tempat_tinggal').val(alamat);
                }
            });
        });

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

        function korespondensi(){
            $('#korespondensi').show(500);
            $('#agamadanpendidikan').hide(500);
            $('#alamattempattinggal').hide(500);
            $('#alamatktp').hide(500);
            $('#informasi-pribadi').hide(500);
        }

        function backToAgamaDanPendidikan(){
            $('#korespondensi').hide(500);
            $('#agamadanpendidikan').show(500);
            $('#alamattempattinggal').hide(500);
            $('#alamatktp').hide(500);
            $('#informasi-pribadi').hide(500);
        }

        function informasiPekerjaan(){
            $('#informasi-pekerjaan').show(500);
            $('#korespondensi').hide(500);
            $('#agamadanpendidikan').hide(500);
            $('#alamattempattinggal').hide(500);
            $('#alamatktp').hide(500);
            $('#informasi-pribadi').hide(500);
        }

        function backToKorespondensi(){
            $('#informasi-pekerjaan').hide(500);
            $('#korespondensi').show(500);
            $('#agamadanpendidikan').hide(500);
            $('#alamattempattinggal').hide(500);
            $('#alamatktp').hide(500);
            $('#informasi-pribadi').hide(500);
        }

        function pasanganAtauOrangTua(){
            $('#pasangan-atau-orangtua').show(500);
            $('#informasi-pekerjaan').hide(500);
            $('#korespondensi').hide(500);
            $('#agamadanpendidikan').hide(500);
            $('#alamattempattinggal').hide(500);
            $('#alamatktp').hide(500);
            $('#informasi-pribadi').hide(500);
        }

        function backToPekerjaan(){
            $('#pasangan-atau-orangtua').hide(500);
            $('#informasi-pekerjaan').show(500);
            $('#korespondensi').hide(500);
            $('#agamadanpendidikan').hide(500);
            $('#alamattempattinggal').hide(500);
            $('#alamatktp').hide(500);
            $('#informasi-pribadi').hide(500);
        }

        function dokumenPendukung(){
            $('#dokumen-pendukung').show(500);
            $('#pasangan-atau-orangtua').hide(500);
            $('#informasi-pekerjaan').hide(500);
            $('#korespondensi').hide(500);
            $('#agamadanpendidikan').hide(500);
            $('#alamattempattinggal').hide(500);
            $('#alamatktp').hide(500);
            $('#informasi-pribadi').hide(500);
        }

        function backToPasanganAtauOrangTua(){
            $('#dokumen-pendukung').hide(500);
            $('#pasangan-atau-orangtua').show(500);
            $('#informasi-pekerjaan').hide(500);
            $('#korespondensi').hide(500);
            $('#agamadanpendidikan').hide(500);
            $('#alamattempattinggal').hide(500);
            $('#alamatktp').hide(500);
            $('#informasi-pribadi').hide(500);
        }

        function persetujuan(){
            $('#persetujuan').show(500);
            $('#dokumen-pendukung').hide(500);
            $('#pasangan-atau-orangtua').hide(500);
            $('#informasi-pekerjaan').hide(500);
            $('#korespondensi').hide(500);
            $('#agamadanpendidikan').hide(500);
            $('#alamattempattinggal').hide(500);
            $('#alamatktp').hide(500);
            $('#informasi-pribadi').hide(500);
        }

        function backToDokumenPendukung(){
            $('#persetujuan').hide(500);
            $('#dokumen-pendukung').show(500);
            $('#pasangan-atau-orangtua').hide(500);
            $('#informasi-pekerjaan').hide(500);
            $('#korespondensi').hide(500);
            $('#agamadanpendidikan').hide(500);
            $('#alamattempattinggal').hide(500);
            $('#alamatktp').hide(500);
            $('#informasi-pribadi').hide(500);
        }





    </script>
@endpush
