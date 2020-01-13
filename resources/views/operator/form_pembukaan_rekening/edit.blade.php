@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-wpforms"></i>&nbsp;Form Edit Pembuka Rekening
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
                <li class="active"><a href="#timeline" data-toggle="tab"><i class="fa fa-edit"></i>&nbsp;Form Edit Data Investor ({{ $investor->nm_investor }})</a></li>
                </ul>
                <div class="tab-content">
                    <form action="{{ route('operator.tambah_investor_update',[$investor->id]) }}" method="POST">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
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

                                        <h3 class="timeline-header">Silahkan Edit Informasi Pribadi Investor di Bawah Ini</h3>

                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Nama Lengkap KTP/Paspor: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="nm_investor" id="nm_investor" class="form-control" required value="{{ $investor->nm_investor }}" placeholder="Masukan nama lengkap">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">No Register: <a style="color:red">(*)</a></label>
                                                    <input type="number" name="no_register" id="no_register" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==5) return false;" class="form-control" required value="{{ $investor->no_register }}" id="" placeholder="Masukan nomor register">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">Jenis Kelamin: <a style="color:red">(*)</a></label>
                                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                                        <option value="L"
                                                            @if($investor->jenis_kelamin == "L") selected @endif
                                                        >Laki-Laki</option>
                                                        <option value="P"
                                                            @if($investor->jenis_kelamin == "P") selected @endif
                                                        >Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">Jenis Rekening: <a style="color:red">(*)</a></label>
                                                    <select name="jenis_rekening" class="form-control" id="jenis_rekening" required>
                                                        <option value="perorangan"
                                                            @if($investor->jenis_rekening == "perorangan") selected @endif
                                                        >Perorangan</option>
                                                        <option value="nonperorangan"
                                                            @if($investor->jenis_rekening == "nonperorangan") selected @endif
                                                        >Non Perorangan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">Profil Resiko Nasabah: <a style="color:red">(*)</a></label>
                                                    <select name="profil_resiko_nasabah" class="form-control" id="profil_resiko_nasabah" required>
                                                        <option value="" selected disabled>-- pilih profil resiko nasabah --</option>
                                                        <option value="konservatif"
                                                            @if($investor->profil_resiko_nasabah == "konservatif") selected @endif
                                                        >Konservatif</option>
                                                        <option value="menengah"
                                                            @if($investor->profil_resiko_nasabah == "menengah") selected @endif
                                                        >Menengah</option>
                                                        <option value="cukup_agresif"
                                                            @if($investor->profil_resiko_nasabah == "cukup_agresif") selected @endif
                                                        >Cukup Agresif</option>
                                                        <option value="agresif"
                                                            @if($investor->profil_resiko_nasabah == "agresif") selected @endif
                                                        >Agresif</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Nomor KTP/Paspor: <a style="color:red">(*)</a></label>
                                                    <input type="number" name="no_ktp" id="no_ktp" class="form-control" required value="{{ $investor->no_ktp }}" id="" placeholder="Masukan Nomor ktp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Kadaluarsa KTP: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="tgl_kadaluarsa_ktp" id="tgl_kadaluarsa_ktp" required value="{{ $investor->tgl_kadaluarsa_ktp }}" class="form-control" id="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Nomor NPWP: <a style="color:red">(*)</a></label>
                                                    <input type="number" name="no_npwp" id="no_npwp" class="form-control" required value="{{ $investor->no_npwp }}"  placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Registrasi NPWP: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="tgl_registrasi_npwp" id="tgl_registrasi_npwp" required value="{{ $investor->tgl_registrasi_npwp }}" class="form-control" id="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tempat Lahir" <a style="color:red">(*)</a></label>
                                                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required value="{{ $investor->tempat_lahir }}" id="" placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Lahir: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" required value="{{ $investor->tanggal_lahir }}" class="form-control" id="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Status Perkawinan: <a style="color:red">(*)</a></label>
                                                    <select name="status_perkawinan" id="statis_perkawinan" class="form-control" required>
                                                        <option value="menikah"
                                                            @if($investor->status_perkawinan == "menikah") selected @endif
                                                        >Menikah</option>
                                                        <option value="belum_menikah"
                                                            @if($investor->status_perkawinan == "belum_menikah") selected @endif
                                                        >Belum Menikah</option>
                                                        <option value="janda/duda"
                                                            @if($investor->status_perkawinan == "janda/duda") selected @endif
                                                        >Janda / Duda</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kewarganegaraan: <a style="color:red">(*)</a></label>
                                                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" required>
                                                        <option value="wni"
                                                            @if($investor->kewarganegaraan == "wni") selected @endif
                                                        >Warga Negara Indonesia</option>
                                                        <option value="wna"
                                                            @if($investor->kewarganegaraan == "wna") selected @endif
                                                        >Warga Negara Asing</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="{{ route('operator.form_pembukaan_rekening') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Batalkan</a>
                                            <a onclick="alamatKtp()" class="btn btn-primary" id="langkah1"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
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
                                                    <label for="">Alamat Sesuai KTP/KITAS: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="alamat_ktp" id="alamat_ktp" class="form-control" value="{{ $investor->alamat_ktp }}" placeholder="Masukan nama lengkap">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">RT Sesuai KTP: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="text" name="rt_ktp" id="rt_ktp" required class="form-control" value="{{ $investor->rt_ktp }}" id="" placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">RW Sesuai KTP: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="text" name="rw_ktp" id="rw_ktp" required class="form-control" value="{{ $investor->rw_ktp }}" id="" placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kelurahan Sesuai KTP: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kelurahan_ktp" id="kelurahan_ktp" required class="form-control" value="{{ $investor->kelurahan_ktp }}" id="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kecamatan Sesuai KTP: <a style="color:red">(*)</label>
                                                    <input type="text" name="kecamatan_ktp" id="kecamatan_ktp" required class="form-control" value="{{ $investor->kecamatan_ktp }}" id="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kota Sesuai KTP: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kota_ktp" id="kota_ktp" required class="form-control" value="{{ $investor->kota_ktp }}" id="" placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Provinsi Sesuai KTP: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="provinsi_ktp" id="provinsi_ktp" required class="form-control" value="{{ $investor->provinsi_ktp }}" id="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kode Pos Sesuai KTP: <a style="color:red">(* hanya angka)</label>
                                                    <input type="text" name="kode_pos_ktp" id="kode_pos_ktp" required class="form-control" value="{{ $investor->kode_pos_ktp }}" id="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                        <div class="timeline-footer">
                                            <a onclick="backToInformasiPribadi()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="alamatTempatTinggal()" class="btn btn-primary" id="langkah2"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
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
                                                    <input type="text" name="alamat_tempat_tinggal" id="alamat_tempat_tinggal" required class="form-control" value="{{ $investor->alamat_tempat_tinggal }}" placeholder="Masukan nama lengkap">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">RT Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="rt_tempat_tinggal" id="rt_tempat_tinggal" required class="form-control" value="{{ $investor->rt_tempat_tinggal }}" id="" placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">RW Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="rw_tempat_tinggal" id="rw_tempat_tinggal" required class="form-control" value="{{ $investor->rw_tempat_tinggal }}" placeholder="Masukan alamat tempat tinggal">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kelurahan Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kelurahan_tempat_tinggal" id="kelurahan_tempat_tinggal" required class="form-control" value="{{ $investor->kelurahan_tempat_tinggal }}" id="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kecamatan Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kecamatan_tempat_tinggal" id="kecamatan_tempat_tinggal" required class="form-control" value="{{ $investor->kecamatan_tempat_tinggal }}" id="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kota Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kota_tempat_tinggal" id="kota_tempat_tinggal" required class="form-control" value="{{ $investor->kota_tempat_tinggal }}" id="" placeholder="Masukan Nomor npwp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Provinsi Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="provinsi_tempat_tinggal" id="provinsi_tempat_tinggal" required class="form-control" value="{{ $investor->provinsi_tempat_tinggal }}" id="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kode Pos Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kode_pos_tempat_tinggal" id="kode_pos_tempat_tinggal" required class="form-control" value="{{ $investor->kode_pos_tempat_tinggal }}" id="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Telp. Rumah: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="text" name="telp_rumah" id="telp_rumah" required class="form-control" value="{{ $investor->telp_rumah }}" id="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Ponsel: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="text" name="ponsel" id="ponsel" required class="form-control" value="{{ $investor->ponsel }}" id="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Lama Menempati: <a style="color:red">dalam tahun(* hanya angka)</a></label>
                                                    <input type="text" name="lama_menempati" id="lama_menempati" required class="form-control" value="{{ $investor->lama_menempati }}" id="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Status Rumah Tinggal: <a style="color:red">(*)</a></label>
                                                    <select name="status_rumah_tinggal" id="status_rumah_tinggal" required class="form-control">
                                                        <option value="milik_sendiri"
                                                            @if($investor->status_rumah_tinggal == "milik_sendiri") selected @endif
                                                        >Milik Pribadi</option>
                                                        <option value="sewa"
                                                            @if($investor->status_rumah_tinggal == "sewa") selected @endif
                                                        >Sewa</option>
                                                        <option value="lainnya"
                                                            @if($investor->status_rumah_tinggal == "lainnya") selected @endif
                                                        >Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToAlamatKtp()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="agamaDanPendidikan()" class="btn btn-primary" id="langkah3"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
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
                                                        <option value="islam"
                                                            @if($investor->agama == "islam") selected @endif
                                                        >Islam</option>
                                                        <option value="protestan"
                                                            @if($investor->agama == "protestan") selected @endif
                                                        >Protestan</option>
                                                        <option value="katolik"
                                                            @if($investor->agama == "katolik") selected @endif
                                                        >Katolik</option>
                                                        <option value="hindu"
                                                            @if($investor->agama == "hindu") selected @endif
                                                        >Hindu</option>
                                                        <option value="buddha"
                                                            @if($investor->agama == "buddha") selected @endif
                                                        >Budha</option>
                                                        <option value="konghucu"
                                                            @if($investor->agama == "konghucu") selected @endif
                                                        >Kong Hu Cu</option>
                                                        <option value="lainnya"
                                                            @if($investor->agama == "lainnya") selected @endif
                                                        >Lainnya</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">Pendidikan Terakhir: <a style="color:red">(*)</a></label>
                                                    <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control" required>
                                                        <option value="sma"
                                                            @if($investor->pendidikan_terakhir == "sma") selected @endif
                                                        >SMA</option>
                                                        <option value="d3"
                                                            @if($investor->pendidikan_terakhir == "d3") selected @endif
                                                        >D3</option>
                                                        <option value="s1"
                                                            @if($investor->pendidikan_terakhir == "s1") selected @endif
                                                        >S1</option>
                                                        <option value="s2"
                                                            @if($investor->pendidikan_terakhir == "s2") selected @endif
                                                        >S2</option>
                                                        <option value="s3"
                                                            @if($investor->pendidikan_terakhir == "s3") selected @endif
                                                        >S3</option>
                                                        <option value="lainnya">Lainnya</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Nama Gadis Ibu Kandung: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="nm_gadis_ibu_kandung" id="nm_gadis_ibu_kandung" class="form-control" required value="{{ $investor->nm_gadis_ibu_kandung }}" placeholder="Masukan nama gadis ibu kandung">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Emergency Kontak: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="emergency_kontak" required id="emergenvy_kontak" class="form-control" value="{{ $investor->emergency_kontak }}" id="" placeholder="Masukan emergency kontak">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToAlamatTempatTinggal()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="korespondensi()" class="btn btn-primary" id="langkah4"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
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
                                                    <input type="text" name="alamat_surat_menyurat_ktp" class="form-control" value="{{ $investor->alamat_surat_menyurat_ktp }}" placeholder="Masukan alamat surat menyurat sesuai ktp">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Alamat Surat Menyurat Tempat Tinggal:</label>
                                                    <input type="text" name="alamat_surat_menyurat_tempat_tinggal" class="form-control" value="{{ $investor->alamat_surat_menyurat_tempat_tinggal }}" id="" placeholder="Masukan alamat surat menyurat tempat tinggal">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Alamat Surat Menyurat Lainnya:</label>
                                                    <input type="text" name="alamat_surat_menyurat_lainnya" class="form-control" value="{{ $investor->alamat_surat_menyurat_lainnya }}" placeholder="Masukan alamat surat menyurat lainnya">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Pengiriman Konfirmasi Melalui Email</label>
                                                    <input type="text" name="pengiriman_konfirmasi_melalui_email" class="form-control" value="{{ $investor->pengiriman_konfirmasi_melalui_email }}" id="" placeholder="Masukan kofirmasi melalui email">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Pengiriman Konfirmasi Melalui Fax</label>
                                                    <input type="text" name="pengiriman_konfirmasi_melalui_fax" class="form-control" value="{{ $investor->pengiriman_konfirmasi_melalui_fax }}" id="" placeholder="Masukan kofirmasi melalui fax">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Konfirmasi Melalui Alamat Surat Menyurat</label>
                                                    <input type="text" name="pengiriman_konfirmasi_melalui_alamat_surat_menyurat" class="form-control" value="{{ $investor->pengiriman_konfirmasi_melalui_alamat_surat_menyurat }}" id="" placeholder="Masukan kofirmasi melalui fax">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tujuan Investarsi</label>
                                                    <select name="tujuan_investasi" id="tujuan_investasi" required class="form-control">
                                                        <option value="kenaikan_harga"
                                                            @if($investor->tujuan_investasi == "kenaikan_harga") selected @endif
                                                        >Mendapatkan Kenaikan Harga</option>
                                                        <option value="penghasilan"
                                                            @if($investor->tujuan_investasi == "penghasilan") selected @endif
                                                        >Mendapatkan Penghasilan</option>
                                                        <option value="investasi"
                                                            @if($investor->tujuan_investasi == "investasi") selected @endif
                                                        >Investasi</option>
                                                        <option value="spekulasi"
                                                            @if($investor->tujuan_investasi == "spekulasi") selected @endif
                                                        >Spekulasi</option>
                                                        <option value="lainnya"
                                                            @if($investor->tujuan_investasi == "lainnya") selected @endif
                                                        >Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToAgamaDanPendidikan()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="informasiPekerjaan()" class="btn btn-primary" id="langkah5"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
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
                                                    <select name="pekerjaan" id="pekerjaan" class="form-control">
                                                        <option value="" selected disabled>-- pilih pekerjaan --</option>
                                                        <option value="tidak_bekerja"
                                                            @if($pekerjaan->pekerjaan == "tidak_bekerja") selected @endif
                                                        >Tidak Bekerja</option>
                                                        <option value="advokat"
                                                            @if($pekerjaan->pekerjaan == "advokat") selected @endif
                                                        >Advokat</option>
                                                        <option value="akuntan"
                                                            @if($pekerjaan->pekerjaan == "akuntan") selected @endif
                                                        >Akuntan</option>
                                                        <option value="apoteker"
                                                            @if($pekerjaan->pekerjaan == "apoteker") selected @endif
                                                        >Apoteker</option>
                                                        <option value="arsitek"
                                                            @if($pekerjaan->pekerjaan == "arsitek") selected @endif
                                                        >Arsitek</option>
                                                        <option value="atlet"
                                                            @if($pekerjaan->pekerjaan == "atlet") selected @endif
                                                        >Atlet</option>
                                                        <option value="dokter"
                                                            @if($pekerjaan->pekerjaan == "dokter") selected @endif
                                                        >Dokter</option>
                                                        <option value="ilmuwan"
                                                            @if($pekerjaan->pekerjaan == "ilmuwan") selected @endif
                                                        >Ilmuwan</option>
                                                        <option value="pengusaha"
                                                            @if($pekerjaan->pekerjaan == "pengusaha") selected @endif
                                                        >Pengusaha</option>
                                                        <option value="karyawan"
                                                            @if($pekerjaan->pekerjaan == "karyawan") selected @endif
                                                        >Karyawan</option>
                                                        <option value="manajer"
                                                            @if($pekerjaan->pekerjaan == "manajer") selected @endif
                                                        >Manajer</option>
                                                        <option value="lainnya"
                                                            @if($pekerjaan->pekerjaan == "lainnya") selected @endif
                                                        >Lainnya</option>
                                                    </select>
                                                </div>

                                                <div id="info-pekerjaan">
                                                    <div class="form-group col-md-4">
                                                        <label for="">Nama Perusahaan</label>
                                                        <input type="text" name="nm_perusahaan" class="form-control" value="{{ $pekerjaan->nm_perusahaan }}" id="" placeholder="Masukan nama perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Alamat Perusahaan:</label>
                                                        <input type="text" name="alamat_perusahaan" class="form-control" value="{{ $pekerjaan->alamat_perusahaan }}" placeholder="Masukan Alamat Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Kota Perusahaan</label>
                                                        <input type="text" name="kota_perusahaan" class="form-control" value="{{ $pekerjaan->kota_perusahaan }}" id="" placeholder="Masukan kota perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Provinsi Perusahaan</label>
                                                        <input type="text" name="provinsi_perusahaan" class="form-control" value="{{ $pekerjaan->provinsi_perusahaan }}" id="" placeholder="Masukan provinsi perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Kode Pos Perusahaan</label>
                                                        <input type="text" name="kode_pos_perusahaan" class="form-control" value="{{ $pekerjaan->kode_pos_perusahaan }}" id="" placeholder="Masukan Kode Pos Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Telephone</label>
                                                        <input type="text" name="telp_perusahaan" class="form-control" value="{{ $pekerjaan->telp_perusahaan }}" id="" placeholder="Masukan Telephone">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Email Perusahaan</label>
                                                        <input type="text" name="email_perusahaan" class="form-control" value="{{ $pekerjaan->email_perusahaan }}" id="" placeholder="Masukan Email Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Fax Perusahaan</label>
                                                        <input type="text" name="fax_perusahaan" class="form-control" value="{{ $pekerjaan->fax_perusahaan }}" id="" placeholder="Masukan Fax Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Jabatan</label>
                                                        <select name="jabatan" id="" class="form-control">
                                                            <option value="komisaris"
                                                                @if($pekerjaan->jabatan == "komisaris") selected @endif
                                                            >Komisaris</option>
                                                            <option value="direksi"
                                                                @if($pekerjaan->jabatan == "direksi") selected @endif
                                                            >Direksi</option>
                                                            <option value="manajer"
                                                                @if($pekerjaan->jabatan == "manajer") selected @endif
                                                            >Manajer</option>
                                                            <option value="staf"
                                                                @if($pekerjaan->jabatan == "staf") selected @endif
                                                            >Staf</option>
                                                            <option value="pemilik"
                                                                @if($pekerjaan->jabatan == "pemilik") selected @endif
                                                            >Pemilik</option>
                                                            <option value="pengawas"
                                                                @if($pekerjaan->jabatan == "pengawas") selected @endif
                                                            >Pengawas</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Jenis Usaha</label>
                                                        <input type="text" name="jenis_usaha" class="form-control" id="" value="{{ $pekerjaan->jenis_usaha }}" placeholder="Masukan Jenis Usaha">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">Lama Bekerja</label>
                                                        <input type="text" name="lama_bekerja" class="form-control" id="" value="{{ $pekerjaan->lama_bekerja }}" placeholder="Lama Bekerja">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Nominal Penghasilan Lain</label>
                                                        <input type="text" name="penghasilan_lain" class="form-control" id="" value="{{ $pekerjaan->penghasilan_lain }}" placeholder="Masukan Nominal Penghasilan Lain">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Sumber Penghasilan Lainnya</label>
                                                        <select name="sumber_penghasilan_lain" class="form-control" id="">
                                                            <option value="gaji"
                                                                @if($pekerjaan->sumber_penghasilan_lainnya == "gaji") selected @endif
                                                            >Gaji</option>
                                                            <option value="hasil_usaha"
                                                                @if($pekerjaan->sumber_penghasilan_lainnya == "hasil_usaha") selected @endif
                                                            >Hasil Usaha</option>
                                                            <option value="warisan"
                                                                @if($pekerjaan->sumber_penghasilan_lainnya == "warisan") selected @endif
                                                            >Warisan</option>
                                                            <option value="dari_orang_tua/anak"
                                                                @if($pekerjaan->sumber_penghasilan_lainnya == "dari_orang_tua/anak") selected @endif
                                                            >Dari Orang Tua/Anak</option>
                                                            <option value="hibah"
                                                                @if($pekerjaan->sumber_penghasilan_lainnya == "hibah") selected @endif
                                                            >Hibah</option>
                                                            <option value="dari_suami/istri"
                                                                @if($pekerjaan->sumber_penghasilan_lainnya == "dari_suami/istri") selected @endif
                                                            >Dari Suami/Istri</option>
                                                            <option value="hasil_investasi"
                                                                @if($pekerjaan->sumber_penghasilan_lainnya == "hasil_investasi") selected @endif
                                                            >Hasil Investasi</option>
                                                            <option value="lainnya"
                                                                @if($pekerjaan->sumber_penghasilan_lainnya == "lainnya") selected @endif
                                                            >Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Sumber Penghasilan Utama: <a style="color:red">(*)</a></label>
                                                    <select name="sumber_penghasilan_utama" class="form-control" id="" required>
                                                        <option value="gaji"
                                                            @if($investor->sumber_penghasilan_utama == "gaji") selected @endif
                                                        >Gaji</option>
                                                        <option value="hasil_usaha"
                                                            @if($pekerjaan->sumber_penghasilan_utama == "hasil_usaha") selected @endif
                                                        >Hasil Usaha</option>
                                                        <option value="warisan"
                                                            @if($pekerjaan->sumber_penghasilan_utama == "warisan") selected @endif
                                                        >Warisan</option>
                                                        <option value="dari_orang_tua/anak"
                                                            @if($pekerjaan->sumber_penghasilan_utama == "dari_orang_tua/anak") selected @endif
                                                        >Dari Orang Tua/Anak</option>
                                                        <option value="hibah"
                                                            @if($pekerjaan->sumber_penghasilan_utama == "hibah") selected @endif
                                                        >Hibah</option>
                                                        <option value="dari_suami/istri"
                                                            @if($pekerjaan->sumber_penghasilan_utama == "dari_suami/istri") selected @endif
                                                        >Dari Suami/Istri</option>
                                                        <option value="hasil_investasi"
                                                            @if($pekerjaan->sumber_penghasilan_utama == "hasil_investasi") selected @endif
                                                        >Hasil Investasi</option>
                                                        <option value="lainnya"
                                                            @if($pekerjaan->sumber_penghasilan_utama == "lainnya") selected @endif
                                                        >Lainnya</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Sumber Dana Investasi: <a style="color:red">(*)</a></label>
                                                    <select name="sumber_dana_investasi" class="form-control" id="sumber_dana_investasi" required>
                                                        <option value="gaji"
                                                            @if($pekerjaan->sumber_dana_investasi == "gaji") selected @endif
                                                        >Gaji</option>
                                                        <option value="hasil_usaha"
                                                            @if($pekerjaan->sumber_dana_investasi == "hasil_usaha") selected @endif
                                                        >Hasil Usaha</option>
                                                        <option value="warisan"
                                                            @if($pekerjaan->sumber_dana_investasi == "warisan") selected @endif
                                                        >Warisan</option>
                                                        <option value="dari_orang_tua/anak"
                                                            @if($pekerjaan->sumber_dana_investasi == "dari_orang_tua/anak") selected @endif
                                                        >Dari Orang Tua/Anak</option>
                                                        <option value="hibah"
                                                            @if($pekerjaan->sumber_dana_investasi == "hibah") selected @endif
                                                        >Hibah</option>
                                                        <option value="dari_suami/istri"
                                                            @if($pekerjaan->sumber_dana_investasi == "dari_suami/istri") selected @endif
                                                        >Dari Suami/Istri</option>
                                                        <option value="hasil_investasi"
                                                            @if($pekerjaan->sumber_dana_investasi == "hasil_investasi") selected @endif
                                                        >Hasil Investasi</option>
                                                        <option value="lainnya"
                                                            @if($pekerjaan->sumber_dana_investasi == "lainnya") selected @endif
                                                        >Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToKorespondensi()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="pasanganAtauOrangTua()" class="btn btn-primary" id="langkah6"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
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
                                                    <input type="text" name="nm_pasangan_atau_orang_tua" value="{{ $pasangan->nm_pasangan_atau_orang_tua }}" class="form-control" placeholder="Masukan Nama Pasangan Atau Orang Tua">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Hubungan: <a style="color:red">(*)</a></label>
                                                    <select name="hubungan" id="" class="form-control">
                                                        <option value="suami"
                                                            @if($pasangan->hubungan == "suami") selected @endif
                                                        >Suami</option>
                                                        <option value="istri"
                                                            @if($pasangan->hubungan == "istri") selected @endif
                                                        >Istri</option>
                                                        <option value="orang_tua"
                                                            @if($pasangan->hubungan == "orang_tua") selected @endif
                                                        >Orang Tua</option>
                                                        <option value="lainnya"
                                                            @if($pasangan->hubungan == "lainnya") selected @endif
                                                        >Lainnya</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Alamat Tempat Tinggal: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="alamat_tempat_tinggal_pasangan_atau_orang_tua" value="{{ $pasangan->alamat_tempat_tinggal_pasangan_atau_orang_tua }}" class="form-control" placeholder="Masukan Alamat Tempat Tinggal">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Telephone Rumah: <a style="color:red">hanya angka</a></label>
                                                    <input type="text" name="telp_rumah_pasangan_atau_orang_tua" value="{{ $pasangan->telp_rumah_pasangan_atau_orang_tua }}" class="form-control" id="" placeholder="Masukan Telephone Rumah Pasangan / Orang Tua">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Ponsel: <a style="color:red">hanya angka</a></label>
                                                    <input type="text" name="ponsel_pasangan_atau_orang_tua" value="{{ $pasangan->ponsel_pasangan_atau_orang_tua }}" class="form-control" id="" placeholder="Masukan Ponsel">
                                                </div>

                                                <div id="pekerjaan-pasangan">
                                                    <div class="form-group col-md-4">
                                                        <label for="">Pekerjaan: <a style="color:red">(*)</a></label>
                                                        <select name="pekerjaan_pasangan_atau_orang_tua" novalidate  id="pekerjaan_pasangan_atau_orang_tua" class="form-control">
                                                            <option value="" selected disabled>-- pilih pekerjaan --</option>
                                                            <option value="tidak_bekerja"
                                                                @if($pasangan->pekerjaan_pasangan_atau_orang_tua == "tidak_bekerja") selected @endif
                                                            >Tidak Bekerja</option>
                                                            <option value="advokat"
                                                                @if($pasangan->pekerjaan_pasangan_atau_orang_tua == "advokat") selected @endif
                                                            >Advokat</option>
                                                            <option value="akuntan"
                                                                @if($pasangan->pekerjaan_pasangan_atau_orang_tua == "akuntan") selected @endif
                                                            >Akuntan</option>
                                                            <option value="apoteker"
                                                                @if($pasangan->pekerjaan_pasangan_atau_orang_tua == "apoteker") selected @endif
                                                            >Apoteker</option>
                                                            <option value="arsitek"
                                                                @if($pasangan->pekerjaan_pasangan_atau_orang_tua == "arsitek") selected @endif
                                                            >Arsitek</option>
                                                            <option value="atlet"
                                                                @if($pasangan->pekerjaan_pasangan_atau_orang_tua == "atlet") selected @endif
                                                            >Atlet</option>
                                                            <option value="dokter"
                                                                @if($pasangan->pekerjaan_pasangan_atau_orang_tua == "dokter") selected @endif
                                                            >Dokter</option>
                                                            <option value="ilmuwan"
                                                                @if($pasangan->pekerjaan_pasangan_atau_orang_tua == "ilmuwan") selected @endif
                                                            >Ilmuwan</option>
                                                            <option value="pengusaha"
                                                                @if($pasangan->pekerjaan_pasangan_atau_orang_tua == "pengusaha") selected @endif
                                                            >Pengusaha</option>
                                                            <option value="karyawan"
                                                                @if($pasangan->pekerjaan_pasangan_atau_orang_tua == "karyawan") selected @endif
                                                            >Karyawan</option>
                                                            <option value="manajer"
                                                                @if($pasangan->pekerjaan_pasangan_atau_orang_tua == "manajer") selected @endif
                                                            >Manajer</option>
                                                            <option value="lainnya"
                                                                @if($pasangan->pekerjaan_pasangan_atau_orang_tua == "lainnya") selected @endif
                                                            >Lainnya</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Nama Perusahaan</label>
                                                        <input type="text" name="nm_perusahaan_pasangan_atau_orang_tua" value="{{ $pasangan->nm_perusahaan_pasangan_atau_orang_tua }}" class="form-control" id="" placeholder="Masukan Nama Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Alamat Perusahaan</label>
                                                        <input type="text" name="alamat_perusahaan_pasangan_atau_orang_tua" value="{{ $pasangan->alamat_perusahaan_pasangan_atau_orang_tua }}" class="form-control" id="" placeholder="Masukan Alamat Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Kota Perusahaan</label>
                                                        <input type="text" name="kota_perusahaan_pasangan_atau_orang_tua" value="{{ $pasangan->kota_perusahaan_pasangan_atau_orang_tua }}" class="form-control" id="" placeholder="Masukan Kota Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Provinsi Perusahaan</label>
                                                        <input type="text" name="provinsi_perusahaan_pasangan_atau_orang_tua" value="{{ $pasangan->provinsi_perusahaan_pasangan_atau_orang_tua }}" class="form-control" id="" placeholder="Masukan Provinsi Perusahaan">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Kode Pos: <a style="color:red;">hanya angka</a> </label>
                                                        <input type="text" name="kode_pos_perusahaan_pasangan_atau_orang_tua" value="{{ $pasangan->kode_pos_perusahaan_pasangan_atau_orang_tua }}" class="form-control" id="" placeholder="Masukan Kode Pos ">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">Telephone: <a style="color:red;">hanya angka</a></label>
                                                        <input type="text" name="telp_perusahaan_pasangan_atau_orang_tua" value="{{ $pasangan->telp_perusahaan_pasangan_atau_orang_tua }}" class="form-control" id="" placeholder="Telephone">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Email</label>
                                                        <input type="text" name="email_perusahaan_pasangan_atau_orang_tua" value="{{ $pasangan->email_perusahaan_pasangan_atau_orang_tua }}" class="form-control" id="" placeholder="Masukan Email">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Fax</label>
                                                        <input type="text" name="fax_perusahaan_pasangan_atau_orang_tua" value="{{ $pasangan->fax_perusahaan_pasangan_atau_orang_tua }}" class="form-control" id="" placeholder="Masukan Fax">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Jabatan</label>
                                                        <select name="jabatan_pasangan_atau_orang_tua" id="" class="form-control">
                                                            <option value="komisaris"
                                                                @if($pasangan->jabatan_pasangan_atau_orang_tua == "komisaris") selected @endif
                                                            >Komisaris</option>
                                                            <option value="direksi"
                                                                @if($pasangan->jabatan_pasangan_atau_orang_tua == "direksi") selected @endif
                                                            >Direksi</option>
                                                            <option value="manajer"
                                                                @if($pasangan->jabatan_pasangan_atau_orang_tua == "manajer") selected @endif
                                                            >Manajer</option>
                                                            <option value="staf"
                                                                @if($pasangan->jabatan_pasangan_atau_orang_tua == "staf") selected @endif
                                                            >Staf</option>
                                                            <option value="pemilik"
                                                                @if($pasangan->jabatan_pasangan_atau_orang_tua == "pemilik") selected @endif
                                                            >Pemilik</option>
                                                            <option value="pengawas"
                                                                @if($pasangan->jabatan_pasangan_atau_orang_tua == "pengawas") selected @endif
                                                            >Pengawas</option>
                                                            <option value="lainnya"
                                                                @if($pasangan->jabatan_pasangan_atau_orang_tua == "lainnya") selected @endif
                                                            >Lainnya</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Jenis Usaha</label>
                                                        <input type="text" name="jenis_usaha_pasangan_atau_orang_tua" value="{{ $pasangan->jenis_usaha_pasangan_atau_orang_tua }}" class="form-control" id="" placeholder="Masukan Jenis Usaha">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Lama Bekerja</label>
                                                        <input type="text" name="lama_bekerja_pasangan_atau_orang_tua" value="{{ $pasangan->lama_bekerja_pasangan_atau_orang_tua }}" class="form-control" id="" placeholder="Masukan Lama Bekerja">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="">Pengasilan Kotor Per Tahun</label>
                                                        <select name="penghasilan_kotor_per_tahun_pasangan_atau_orang_tua" id="" class="form-control">
                                                            <option value="<10"
                                                                @if($pasangan->penghasilan_kotor_per_tahun_pasangan_atau_orang_tua == "<10") selected @endif
                                                            >< Rp 10 Juta</option>
                                                            <option value=">10-50"
                                                                @if($pasangan->penghasilan_kotor_per_tahun_pasangan_atau_orang_tua == ">10-50") selected @endif
                                                                >> Rp 10 - 50 Juta</option>
                                                            <option value=">10-100"
                                                                @if($pasangan->penghasilan_kotor_per_tahun_pasangan_atau_orang_tua == ">10-100") selected @endif
                                                                >> 10 - 100 Juta</option>
                                                            <option value=">100-500"
                                                                @if($pasangan->penghasilan_kotor_per_tahun_pasangan_atau_orang_tua == ">100-500") selected @endif
                                                                >> 100 - 500 Juta</option>
                                                            <option value=">500-1m"
                                                                @if($pasangan->penghasilan_kotor_per_tahun_pasangan_atau_orang_tua == ">500-1m") selected @endif
                                                                >> 500 - 1 Miliar</option>
                                                            <option value=">1m"
                                                                @if($pasangan->penghasilan_kotor_per_tahun_pasangan_atau_orang_tua == ">1m") selected @endif
                                                                >> 1 Miliar</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Sumber Penghasilan utama: <a style="color:red">(*)</a></label>
                                                    <select name="sumber_penghasilan_utama_pasangan_atau_orang_tua" id="sumber_penghasilan_utama_pasangan_atau_orang_tua" required class="form-control">
                                                        <option value="gaji"
                                                            @if($pasangan->sumber_penghasilan_utama_pasangan_atau_orang_tua == "gaji") selected @endif
                                                        >Gaji</option>
                                                        <option value="hasil_usaha"
                                                            @if($pasangan->sumber_penghasilan_utama_pasangan_atau_orang_tua == "hasil_usaha") selected @endif
                                                        >Hasil Usaha</option>
                                                        <option value="warisan"
                                                            @if($pasangan->sumber_penghasilan_utama_pasangan_atau_orang_tua == "warisan") selected @endif
                                                        >Warisan</option>
                                                        <option value="dari_orang_tua/anak"
                                                            @if($pasangan->sumber_penghasilan_utama_pasangan_atau_orang_tua == "dari_orang_tua/anak") selected @endif
                                                        >Dari Orang Tua/Anak</option>
                                                        <option value="hibah"
                                                            @if($pasangan->sumber_penghasilan_utama_pasangan_atau_orang_tua == "hibah") selected @endif
                                                        >Hibah</option>
                                                        <option value="dari_suami/istri"
                                                            @if($pasangan->sumber_penghasilan_utama_pasangan_atau_orang_tua == "dari_suami/istri") selected @endif
                                                        >Dari Suami/Istri</option>
                                                        <option value="hasil_investasi"
                                                            @if($pasangan->sumber_penghasilan_utama_pasangan_atau_orang_tua == "hasil_investasi") selected @endif
                                                        >Hasil Investasi</option>
                                                        <option value="lainnya"
                                                            @if($pasangan->sumber_penghasilan_utama_pasangan_atau_orang_tua == "lainnya") selected @endif
                                                        >Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToPekerjaan()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="dokumenPendukung()" class="btn btn-primary" id="langkah7"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
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
                                                    <label for="">Fotokopi KTP/Paspor : <a style="color:red">(*)</a></label>
                                                    <select name="ktp" class="form-control" id="ktp" required>
                                                        <option value="1"
                                                            @if($dokumen->ktp == "1") selected @endif
                                                        >Ada</option>
                                                        <option value="0"
                                                            @if($dokumen->ktp == "0") selected @endif
                                                        >Tidak Ada</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Fotokopi NPWP : <a style="color:red">(*)</a></label>
                                                    <select name="npwp" class="form-control" id="npwp" required>
                                                        <option value="1"
                                                            @if($dokumen->npwp == "1") selected @endif
                                                        >Ada</option>
                                                        <option value="0"
                                                            @if($dokumen->npwp == "0") selected @endif
                                                        >Tidak Ada</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Fotokopi Form Profil Resiko Pemodal : <a style="color:red">(*)</a></label>
                                                    <select name="form_profil_resiko_pemodal" class="form-control" id="form_profil_resiko_pemodal" required>
                                                        <option value="1"
                                                            @if($dokumen->form_profil_resiko_pemodal == "1") selected @endif
                                                        >Ada</option>
                                                        <option value="0"
                                                            @if($dokumen->form_profil_resiko_pemodal == "0") selected @endif
                                                        >Tidak Ada</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Fotokopi Bukti Setoran Investasi Awal : <a style="color:red">(*)</a></label>
                                                    <select name="bukti_setoran_investasi_awal" class="form-control" id="bukti_setoran_investasi_awal" required>
                                                        <option value="1"
                                                            @if($dokumen->bukti_setoran_investasi_awal == "1") selected @endif
                                                        >Ada</option>
                                                        <option value="0"
                                                            @if($dokumen->bukti_setoran_investasi_awal == "0") selected @endif
                                                        >Tidak Ada</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Contoh Tanda Tangan : <a style="color:red">(*)</a></label>
                                                    <select name="contoh_tanda_tangan" class="form-control" id="contoh_tanda_tangan" required>
                                                        <option value="1"
                                                            @if($dokumen->contoh_tanda_tangan == "1") selected @endif
                                                        >Ada</option>
                                                        <option value="0"
                                                            @if($dokumen->contoh_tanda_tangan == "0") selected @endif
                                                        >Tidak Ada</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Formulir FATCA - Perorangan (non mandatory) : <a style="color:red">(*)</a></label>
                                                    <select name="fatca" class="form-control" id="fatca" required>
                                                        <option value="1"
                                                            @if($dokumen->fatca == "1") selected @endif
                                                        >Ada</option>
                                                        <option value="0"
                                                            @if($dokumen->fatca == "0") selected @endif
                                                        >Tidak Ada</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToPasanganAtauOrangTua()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="persetujuan()" class="btn btn-primary" id="langkah8"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
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
                                                    <label for="">Nama Agen Pemasaran : <a style="color:red">(*)</a></label> <br>
                                                    <select name="agen_pemasaran_id" id="agen_pemasaran_id" required class="form-control">
                                                        @foreach ($agens as $agen)
                                                            <option value="{{ $agen->id }}"
                                                                @if($agen->id == $persetujuan->agen_pemasaran_id) selected @endif
                                                            >{{ $agen->nm_agen_pemasaran }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanda Tangan Agen Pemasaran : <a style="color:red">(*)</a></label> <br>
                                                    <select name="tanda_tangan_agen_pemasaran" class="form-control" id="tanda_tangan_agen_pemasaran" required>
                                                        <option value="1"
                                                            @if($persetujuan->tanda_tangan_agen_pemasaran == "1") selected @endif
                                                        >Ada</option>
                                                        <option value="0"
                                                            @if($persetujuan->tanda_tangan_agen_pemasaran == "0") selected @endif
                                                        >Tidak Ada</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Agen Pemasaran : <a style="color:red">(*)</a></label> <br>
                                                    <input type="date" name="tanggal_agen_pemasaran" id="tanggal_agen_pemasaran" required class="form-control" value="{{ $persetujuan->tanggal_agen_pemasaran }}" id="" placeholder="Tanggal Agen Pemasaran">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Nama Pejabat Berwenang : <a style="color:red">(*)</a></label> <br>
                                                    <select name="pejabat_berwenang_id" required id="pejabat_berwenang_id" class="form-control">
                                                        @foreach ($pejabats as $pejabat)
                                                            <option value="{{ $pejabat->id }}"
                                                                @if($pejabat->id == $persetujuan->pejabat_berwenang_id) selected @endif
                                                            >{{ $pejabat->nm_pejabat_berwenang }}
                                                            </option>
                                                        @endforeach
                                                    </select>


                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Status Persetujuan : <a style="color:red">(*)</a></label> <br>
                                                    <select name="status_persetujuan" class="form-control" id="status_persetujuan" required>
                                                        <option value="disetujui"
                                                            @if($persetujuan->status_persetujuan == "1") selected @endif
                                                        >Disetujui</option>
                                                        <option value="tidak_disetujui"
                                                            @if($persetujuan->status_persetujuan == "0") selected @endif
                                                        >Tidak Disetujui</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Pejabat Berwenang : <a style="color:red">(*)</a></label> <br>
                                                    <input type="date" name="tanggal_pejabat_berwenang" id="tanggal_pejabat_berwenang" required class="form-control" value="{{ $persetujuan->tanggal_pejabat_berwenang }}" id="" placeholder="Tanggal Pejabat Berwenang">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanda Tangan Pejabat Berwenang : <a style="color:red">(*)</a></label> <br>
                                                    <select name="tanda_tangan_pejabat_berwenang" class="form-control" id="tanda_tangan_pejabat_berwenang" required>
                                                        <option value="1"
                                                            @if($persetujuan->tanda_tangan_pejabat_berwenang == "1") selected @endif
                                                        >Ada</option>
                                                        <option value="0"
                                                            @if($persetujuan->tanda_tangan_pejabat_berwenang == "0") selected @endif
                                                        >Tidak Ada</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToDokumenPendukung()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>

                                            <button type="button" class="btn btn-primary" data-toggle="modal" id="langkah9" style="display:;" data-target="#modal-default">
                                                <i class="fa fa-check-circle"></i>&nbsp;Selesai
                                            </button>
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
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Simpan Perubahan Data</button>
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
