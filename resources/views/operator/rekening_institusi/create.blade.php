@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-wpforms"></i>&nbsp;Form Pembuka Rekening Institusi
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
                <li class="active"><a href="#timeline" data-toggle="tab"><i class="fa fa-user"></i>&nbsp;Form Tambah Data Rekening Institusi Baru</a></li>
                </ul>
                <div class="tab-content">
                    <form action="{{ route('operator.tambah_institusi_post') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="active tab-pane" id="timeline">
                            <ul class="timeline timeline-inverse" id="informasi-institusi">
                                <li class="time-label">
                                        <span class="bg-red">
                                            Informasi Institusi
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
                                                    <label for="">Nama Investor: <a style="color:red">(*)</a> </label>
                                                    <input type="text" name="nm_investor" id="nm_investor" class="form-control" placeholder="Masukan nama lengkap" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">No Register:  <a style="color:red">(*)</a><a id="noreg_error" style="display:none;color:red;"><i>sudah digunakan</i></a></label>
                                                    <input type="number" name="no_register" id="no_register" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==5) return false;" class="form-control" placeholder="Masukan nomor register" required>
                                                </div>
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
                                                    <label for="">Nama Pejabat Berwenang 1: <a style="color:red">(*)</a></label> <br>
                                                    <select name="pejabat_berwenang_id1" id="pejabat_berwenang_id1" class="form-control" required>
                                                        <option value="" disabled selected>-- pilih pejabat berwenang 1--</option>
                                                        @foreach ($pejabats as $pejabat)
                                                            <option value="{{ $pejabat->id }}">{{ $pejabat->nm_pejabat_berwenang }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Nama Pejabat Berwenang 2:</a></label> <br>
                                                    <select name="pejabat_berwenang_id2" id="pejabat_berwenang_id2" class="form-control">
                                                        <option value="" disabled selected>-- pilih pejabat berwenang 2--</option>
                                                        @foreach ($pejabats as $pejabat)
                                                            <option value="{{ $pejabat->id }}">{{ $pejabat->nm_pejabat_berwenang }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Nama Institusi: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="nm_institusi" class="form-control" id="nm_institusi" placeholder="Masukan Nama Institusi" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kota Institusi: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kota_institusi" class="form-control" id="kota_institusi" placeholder="Masukan Kota Institusi" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Provinsi Institusi: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="provinsi_institusi" class="form-control" id="provinsi_institusi" placeholder="Masukan Provinsi Institusi" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Negara Institusi: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="negara_institusi" class="form-control" id="negara_institusi" placeholder="Masukan Negara Institusi" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Kode Pos Institusi: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="kode_pos_institusi" class="form-control" id="kode_pos_institusi" placeholder="Masukan Kode Pos Institusi" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Email Kantor: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="email_kantor" class="form-control" id="email_kantor" placeholder="Masukan Email Kantor" required placeholder="masukan email kantor">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Telephone Kantor: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="telephone_kantor" class="form-control" id="telephone_kantor" placeholder="Masukan Telephone Kantor" required placeholder="masukan email kantor">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for=""> Domisili: <a style="color:red">(*)</a></label>
                                                    <select name="domisili" id="domisili" class="form-control">
                                                        <option value="" disabled selected>-- pilih domisili --</option>
                                                        <option value="lokal">Lokal</option>
                                                        <option value="asing">Asing</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for=""> Karakteristik Perusahaan: <a style="color:red">(*)</a></label>
                                                    <select name="karakteristik" id="karakteristik" class="form-control">
                                                        <option value="" disabled selected>-- pilih karakteristik --</option>
                                                        <option value="bumn">BUMN</option>
                                                        <option value="swasta">Swasta</option>
                                                        <option value="pma">PMA</option>
                                                        <option value="bumd">BUMD</option>
                                                        <option value="keluarga">Keluarga</option>
                                                        <option value="patungan">Patungan</option>
                                                        <option value="afiliasi">Afiliasi</option>
                                                        <option value="lainnya">Lainnya</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for=""> Tipe Perusahaan: <a style="color:red">(*)</a></label>
                                                    <select name="tipe_perusahaan" id="tipe_perusahaan" class="form-control">
                                                        <option value="" disabled selected>-- pilih tipe perusahaan --</option>
                                                        <option value="pt">Perseroan Terbatas</option>
                                                        <option value="yayasan">Yayasan</option>
                                                        <option value="dana_pensiun">Dana Pensiun</option>
                                                        <option value="asuransi">Asuransi</option>
                                                        <option value="keuangan">Lembaga Keuangan</option>
                                                        <option value="efek">Perusahaan Efek</option>
                                                        <option value="koperasi">Koperasi</option>
                                                        <option value="lainnya">Lainnya</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Bidang Usaha: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="bidang_usaha" class="form-control" id="bidang_usaha"  required placeholder="Masukan Bidang Usaha">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Nomor Akta Pendirian: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="number" name="no_akta_pendirian" class="form-control" id="no_akta_pendirian" placeholder="Masukan Nomor Akta Pendirian" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Akta Pendirian: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="tanggal_akta_pendirian" class="form-control" id="tanggal_akta_pendirian" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Akta Perubahan Terakhir: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="tanggal_akta_perubahan_terakhir" class="form-control" id="tanggal_akta_perubahan_terakhir" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">No Perubahan Terakhir: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="number" name="no_akta_perubahan_terakhir" class="form-control" id="no_akta_perubahan_terakhir" required placeholder="Masukan No Akta Prbh Terakhir">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">No NPWP: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="no_npwp" class="form-control" id="no_npwp" placeholder="Masukan No NPWP" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Registrasi NPWP: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="tgl_registrasi_npwp" class="form-control" id="tgl_registrasi_npwp" required >
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">No SIUP: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="no_siup" class="form-control" id="no_siup" placeholder="Masukan No SIUP" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Kadaluarsa SIUP: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="tgl_Kadaluarsa_siup" class="form-control" id="tgl_Kadaluarsa_siup" required >
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">No SKDP: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="no_skdp" class="form-control" id="no_skdp" placeholder="Masukan No SKDP" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Kadaluarsa SKDP: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="tgl_Kadaluarsa_skdp" class="form-control" id="tgl_Kadaluarsa_skdp" required >
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">No TDP: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="no_tdp" class="form-control" id="no_tdp" placeholder="Masukan No TDP" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Kadaluarsa TDP: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="tgl_Kadaluarsa_tdp" class="form-control" id="tgl_Kadaluarsa_tdp" required >
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">No Izin PMA: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="no_izin_pma" class="form-control" id="no_izin_pma" required placeholder="Masukan No Izin PMA">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="{{ route('operator.pembukaan_rekening_institusi') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp;Batalkan</a>
                                            <a onclick="pemegangSaham()" class="btn btn-primary" id="langkah1" style="display:none;"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                            <button class="btn btn-primary" id="langkah1error" style=""><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="timeline timeline-inverse" id="pemegangsaham" style="display:none;;">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Data Kepemilikan & Pengurus (Pemegang Saham)
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>

                                    <div class="timeline-item">

                                        <h3 class="timeline-header">Silahkan Lengkapi Data Pemegang Saham di Bawah Ini</h3>

                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Nama Pemegang Saham: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="nm_pemegang_saham" id="nm_pemegang_saham" class="form-control" required placeholder="Masukan nama pemegang saham">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Komposisi Pemegang Saham (%): <a style="color:red">(* angka)</a></label>
                                                    <input type="number" name="komposisi_pemegang_saham" class="form-control" id="komposisi_pemegang_saham" required placeholder="Masukan komposisi pemegang saham">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Pernyataan: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="tanggal_pernyataan" class="form-control" id="tanggal_pernyataan" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Yang Menyatakan: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="yang_menyatakan" class="form-control" id="yang_menyatakan" required placeholder="masukan yang menyatakan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                        <div class="timeline-footer">
                                            <a onclick="backToInformasiInstitusi()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="susunanKomisaris()" class="btn btn-primary" style="display:none;" id="langkah2"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                            <button class="btn btn-primary" id="langkah2error" style=""><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>
                                        </div>
                                    </div>
                                </li>

                            </ul>

                            <ul class="timeline timeline-inverse" id="susunankomisaris" style="display:none;">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Data Kepemilikan & Pengurus (Susunan Komisaris)
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>

                                    <div class="timeline-item">

                                        <h3 class="timeline-header">Silahkan Lengkapi Data Susunan Komisaris di Bawah Ini</h3>

                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Nama Komisaris: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="nm_komisaris" id="nm_komisaris" class="form-control" required placeholder="Masukan nama komisaris">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Nomor Identitas: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="number" name="no_identitas" class="form-control" id="no_identitas" required placeholder="Masukan Nomor identitas">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToPemegangSaham()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="susunanDireksi()" class="btn btn-primary" style="display:none;" id="langkah3"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                            <button class="btn btn-primary" id="langkah3error" style=""><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>

                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="timeline timeline-inverse" id="susunandireksi" style="display:none;">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Data Kepemilikan & Pengurus (Susunan Direksi)
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>

                                    <div class="timeline-item">

                                        <h3 class="timeline-header">Silahkan Lengkapi Data Susunan Direksi di Bawah Ini</h3>

                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Nama Direksi: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="nm_direksi" id="nm_direksi" class="form-control" required placeholder="Masukan nama direksi">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Nomor Identitas: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="number" name="no_identitas_direksi" class="form-control" id="no_identitas_direksi" required placeholder="Masukan Nomor identitas">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToSusunanKomisaris()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="penerimaKuasa()" class="btn btn-primary" id="langkah4" style="display:none;"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                            <button class="btn btn-primary" style="" id="langkah4error"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>

                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="timeline timeline-inverse" id="penerimakuasa" style="display:none;">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Penerima Kuasa Untuk Bertransaksi
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header">Silahkan Lengkapi Penerima Kuasa di Bawah Ini</h3>
                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Nama Penerima Kuasa: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="nm_kuasa" id="nm_kuasa"  class="form-control" required placeholder="Masukan nama kuasa">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Nomor Identitas: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="number" name="no_identitas_kuasa" id="no_identitas_kuasa"  class="form-control" placeholder="Masukan no identitas" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tanggal Kadaluarsa Identitas: <a style="color:red">(*)</a></label>
                                                    <input type="date" name="tgl_kadaluarsa_identitas_kuasa" id="tgl_kadaluarsa_identitas_kuasa"  class="form-control">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Jabatan: <a style="color:red">(*)</a></label>
                                                    <input type="text" name="jabatan_kuasa" id="jabatan_kuasa"  class="form-control" placeholder="Masukan jabatan">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">No Telephone: <a style="color:red">(* hanya angka)</a></label>
                                                    <input type="number" name="telephone_kuasa" id="telephone_kuasa"  class="form-control" placeholder="Masukan no telephone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToSusunanDireksi()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="dataKeuangan()" class="btn btn-primary" id="langkah5" style="display:none;"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                            <button class="btn btn-primary" style="" id="langkah5error"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>

                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="timeline timeline-inverse" id="datakeuangan" style="display:none;">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Data Keuangan Institusi 3 Tahun Terakhir
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header">Silahkan Lengkapi Data Keuangan Institusi di Bawah Ini</h3>
                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Aset Keuangan Tahun 1: <a style="color:red">(*)</a></label> <br>
                                                    <select name="aset_keuangan_tahun_1" id="aset_keuangan_tahun_1" class="form-control" required>
                                                        <option value="" disabled selected>-- pilih aset keuangan --</option>
                                                        <option value="<_idr_1_m">< IDR 1 Miliar</option>
                                                        <option value="idr_1_5_m">IDR 1 - 5 Miliar</option>
                                                        <option value=">_idr_5_10_m">> IDR 5 - 10 Miliar</option>
                                                        <option value=">_idr_10_50_m">> IDR 10 - 50 Miliar</option>
                                                        <option value=">_idr_50_m">> IDR 50 Miliar</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Aset Keuangan Tahun 2: <a style="color:red">(*)</a></label> <br>
                                                    <select name="aset_keuangan_tahun_2" id="aset_keuangan_tahun_2" class="form-control" required>
                                                        <option value="" disabled selected>-- pilih aset keuangan --</option>
                                                        <option value="<_idr_1_m">< IDR 1 Miliar</option>
                                                        <option value="idr_1_5_m">IDR 1 - 5 Miliar</option>
                                                        <option value=">_idr_5_10_m">> IDR 5 - 10 Miliar</option>
                                                        <option value=">_idr_10_50_m">> IDR 10 - 50 Miliar</option>
                                                        <option value=">_idr_50_m">> IDR 50 Miliar</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Aset Keuangan Tahun 3: <a style="color:red">(*)</a></label> <br>
                                                    <select name="aset_keuangan_tahun_3" id="aset_keuangan_tahun_3" class="form-control" required>
                                                        <option value="" disabled selected>-- pilih aset keuangan --</option>
                                                        <option value="<_idr_1_m">< IDR 1 Miliar</option>
                                                        <option value="idr_1_5_m">IDR 1 - 5 Miliar</option>
                                                        <option value=">_idr_5_10_m">> IDR 5 - 10 Miliar</option>
                                                        <option value=">_idr_10_50_m">> IDR 10 - 50 Miliar</option>
                                                        <option value=">_idr_50_m">> IDR 50 Miliar</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Laba Keuangan Tahun 1: <a style="color:red">(*)</a></label> <br>
                                                    <select name="laba_keuangan_tahun_1" id="laba_keuangan_tahun_1" class="form-control" required>
                                                        <option value="" disabled selected>-- pilih laba keuangan --</option>
                                                        <option value="<_idr_1_m">< IDR 1 Miliar</option>
                                                        <option value="idr_1_5_m">IDR 1 - 5 Miliar</option>
                                                        <option value=">_idr_5_10_m">> IDR 5 - 10 Miliar</option>
                                                        <option value=">_idr_10_50_m">> IDR 10 - 50 Miliar</option>
                                                        <option value=">_idr_50_m">> IDR 50 Miliar</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Laba Keuangan Tahun 2: <a style="color:red">(*)</a></label> <br>
                                                    <select name="laba_keuangan_tahun_2" id="laba_keuangan_tahun_2" class="form-control" required>
                                                        <option value="" disabled selected>-- pilih laba keuangan --</option>
                                                        <option value="<_idr_1_m">< IDR 1 Miliar</option>
                                                        <option value="idr_1_5_m">IDR 1 - 5 Miliar</option>
                                                        <option value=">_idr_5_10_m">> IDR 5 - 10 Miliar</option>
                                                        <option value=">_idr_10_50_m">> IDR 10 - 50 Miliar</option>
                                                        <option value=">_idr_50_m">> IDR 50 Miliar</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Laba Keuangan Tahun 3: <a style="color:red">(*)</a></label> <br>
                                                    <select name="laba_keuangan_tahun_3" id="laba_keuangan_tahun_3" class="form-control" required>
                                                        <option value="" disabled selected>-- pilih laba keuangan --</option>
                                                        <option value="<_idr_1_m">< IDR 1 Miliar</option>
                                                        <option value="idr_1_5_m">IDR 1 - 5 Miliar</option>
                                                        <option value=">_idr_5_10_m">> IDR 5 - 10 Miliar</option>
                                                        <option value=">_idr_10_50_m">> IDR 10 - 50 Miliar</option>
                                                        <option value=">_idr_50_m">> IDR 50 Miliar</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Sumber Dana: <a style="color:red">(*)</a></label> <br>
                                                    <select name="sumber_dana" id="sumber_dana" class="form-control" required>
                                                        <option value="" disabled selected>-- pilih sumber dana --</option>
                                                        <option value="hasil_usaha">Hasil Usaha</option>
                                                        <option value="dana_pensiun">Dana Pensiun</option>
                                                        <option value=">bunga_simpanan">>Bunga Simpanan</option>
                                                        <option value=">hasil_investasi">>Hasil Investasi</option>
                                                        <option value="lainnya">> Lainnya</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Tujuan Investasi: <a style="color:red">(*)</a></label> <br>
                                                    <select name="tujuan_investasi" id="tujuan_investasi" class="form-control" required>
                                                        <option value="" disabled selected>-- pilih tujuan investasi --</option>
                                                        <option value="kenaikan_harga">Mendapatkan Kenaikan Harga</option>
                                                        <option value="investasi">Investasi</option>
                                                        <option value=">spekulasi">>Spekulasi</option>
                                                        <option value=">penghasilan">>Mendapatkan Penghasilan</option>
                                                        <option value="lainnya">> Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a onclick="backToPenerimaKuasa()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                            <a onclick="instruksiPembayara()" class="btn btn-primary" id="langkah6" style="display:none;"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                            <button class="btn btn-primary" style="" id="langkah6error"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <ul class="timeline timeline-inverse" id="instruksipembayaran" style="display:none;">
                            <li class="time-label">
                                <span class="bg-red">
                                    Instruksi Pembayaran
                                </span>
                            </li>
                            <li>
                                <i class="fa fa-info-circle bg-blue"></i>

                                <div class="timeline-item">

                                    <h3 class="timeline-header">Silahkan Lengkapi Instruksi Pembayaran di Bawah Ini</h3>

                                    <div class="timeline-body col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="">Nama Pemilik Bank: <a style="color:red">(*)</a></label>
                                                <input type="text" name="nm_pemilik_bank" id="nm_pemilik_bank" class="form-control" required placeholder="Masukan nama pemilik bank">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Nama Bank: <a style="color:red">(*)</a></label>
                                                <input type="text" name="nm_bank" class="form-control" id="nm_bank" required placeholder="Masukan nama bank">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">No Rekening Bank: <a style="color:red">(*)</a></label>
                                                <input type="text" name="no_rek" class="form-control" id="no_rek" required placeholder="Masukan Nomor Rekening">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-footer">
                                        <a onclick="backToDataKuangan()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                        <a onclick="dokumenPendukung()" class="btn btn-primary" id="langkah7" style="display:none;"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</a>
                                        <button class="btn btn-primary" style="" id="langkah7error"><i class="fa fa-arrow-right"></i>&nbsp;Selanjutnya</button>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <ul class="timeline timeline-inverse" id="dokumenpendukung" style="display:none;">
                            <li class="time-label">
                                <span class="bg-red">
                                    Dokumen Pendukung
                                </span>
                            </li>
                            <li>
                                <i class="fa fa-info-circle bg-blue"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header">Silahkan Lengkapi Dokumen Pendukung di Bawah Ini</h3>
                                    <div class="timeline-body col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="">Kelengkapan Dokumen: <a style="color:red">(*)</a></label>
                                                <select name="kelengkapan_dokumen" id="kelengkapan_dokumen" class="form-control" required>
                                                    <option value="" selected disabled>-- pilih opsi --</option>
                                                    <option value="ada">Ada</option>
                                                    <option value="tidak">Tidak Ada</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Profil Resiko: <a style="color:red">(*)</a></label>
                                                <select name="profil_resiko" id="profil_resiko" class="form-control" required>
                                                    <option value="" selected disabled>-- pilih opsi --</option>
                                                    <option value="ada">Ada</option>
                                                    <option value="tidak">Tidak Ada</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Bukti Setoran: <a style="color:red">(*)</a></label>
                                                <select name="bukti_setoran" id="bukti_setoran" class="form-control" required>
                                                    <option value="" selected disabled>-- pilih opsi --</option>
                                                    <option value="ada">Ada</option>
                                                    <option value="tidak">Tidak Ada</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Ttd Penerima Kuasa: <a style="color:red">(*)</a></label>
                                                <select name="ttd_penerima_kuasa" id="ttd_penerima_kuasa" class="form-control" required>
                                                    <option value="" selected disabled>-- pilih opsi --</option>
                                                    <option value="ada">Ada</option>
                                                    <option value="tidak">Tidak Ada</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Formulir Fatca: <a style="color:red">(*)</a></label>
                                                <select name="fatca" id="fatca" class="form-control" required>
                                                    <option value="" selected disabled>-- pilih opsi --</option>
                                                    <option value="ada">Ada</option>
                                                    <option value="tidak">Tidak Ada</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Persetujuan: <a style="color:red">(*)</a></label>
                                                <select name="persetujuan" id="persetujuan" class="form-control" required>
                                                    <option value="" selected disabled>-- pilih opsi --</option>
                                                    <option value="ada">Ada</option>
                                                    <option value="tidak">Tidak Ada</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-footer">
                                        <a onclick="backToInstruksiPembayaran()" class="btn btn-default"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" id="langkah8" style="display:none;" data-target="#modal-default">
                                            <i class="fa fa-check-circle"></i>&nbsp;Selesai
                                        </button>
                                        <button class="btn btn-primary" id="langkah8error"><i class="fa fa-check-circle"></i>&nbsp;Selesai</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
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
        $(document).ready(function(){
            $("#no_izin_pma").change(function(){
                var lama = $("#no_izin_pma").val();
                if((lama != '')){
                    $('#langkah1').show();
                    $('#langkah1error').hide();
                }
                else{
                    $('#langkah1').hide();
                    $('#langkah1error').show();
                }
            });
        });

        $(document).ready(function(){
            $("#yang_menyatakan").keyup(function(){
                var status = $("#yang_menyatakan").val();
                if((status != null) ){
                    $('#langkah2').show();
                    $('#langkah2error').hide();
                }
                else{
                    $('#langkah2').hide();
                    $('#langkah3error').show();
                }
            });
        });

        $(document).ready(function(){
            $("#no_identitas").keyup(function(){
                var status = $("#no_identitas").val();
                if((status != null) ){
                    $('#langkah3').show();
                    $('#langkah3error').hide();
                }
                else{
                    $('#langkah3').hide();
                    $('#langkah3error').show();
                }
            });
        });

        $(document).ready(function(){
            $("#no_identitas_direksi").keyup(function(){
                var status = $("#no_identitas_direksi").val();
                if((status != null) ){
                    $('#langkah4').show();
                    $('#langkah4error').hide();
                }
                else{
                    $('#langkah4').hide();
                    $('#langkah4error').show();
                }
            });
        });

        $(document).ready(function(){
            $("#telephone_kuasa").keyup(function(){
                var status = $("#telephone_kuasa").val();
                if((status != null) ){
                    $('#langkah5').show();
                    $('#langkah5error').hide();
                }
                else{
                    $('#langkah5').hide();
                    $('#langkah5error').show();
                }
            });
        });

        $(document).ready(function(){
            $("#tujuan_investasi").change(function(){
                var sumber = $("#tujuan_investasi").val();
                if((sumber != null) ){
                    $('#langkah6').show();
                    $('#langkah6error').hide();
                }
                else{
                    $('#langkah6').hide();
                    $('#langkah6error').show();
                }
            });
        });

        $(document).ready(function(){
            $("#no_rek").keyup(function(){
                var sumber = $("#no_rek").val();
                if((sumber != null) ){
                    $('#langkah7').show();
                    $('#langkah7error').hide();
                }
                else{
                    $('#langkah7').hide();
                    $('#langkah7error').show();
                }
            });
        });

        $(document).ready(function(){
            $("#persetujuan").change(function(){
                var sumber = $("#persetujuan").val();
                if((sumber != null) ){
                    $('#langkah8').show();
                    $('#langkah8error').hide();
                }
                else{
                    $('#langkah8').hide();
                    $('#langkah8error').show();
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
            url = "{{ url('operator/pembukaan_rekening_institusi/tambah_institusi/cari_noreg') }}";
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

        function pemegangSaham(){
            $('#pemegangsaham').show(500);
            $('#informasi-institusi').hide(500);
        }

        function backToInformasiInstitusi(){
            $('#informasi-institusi').show(500);
            $('#pemegangsaham').hide(500);
        }

        function susunanKomisaris(){
            $('#pemegangsaham').hide(500);
            $('#informasi-institusi').hide(500);
            $('#susunankomisaris').show(500);
        }

        function backToPemegangSaham (){
            $('#pemegangsaham').show(500);
            $('#informasi-institusi').hide(500);
            $('#susunankomisaris').hide(500);
        }

        function susunanDireksi(){
            $('#pemegangsaham').hide(500);
            $('#informasi-institusi').hide(500);
            $('#susunankomisaris').hide(500);
            $('#susunandireksi').show(500);
        }

        function backToSusunanKomisaris(){
            $('#pemegangsaham').hide(500);
            $('#informasi-institusi').hide(500);
            $('#susunankomisaris').show(500);
            $('#susunandireksi').hide(500);
        }

        function penerimaKuasa(){
            $('#pemegangsaham').hide(500);
            $('#informasi-institusi').hide(500);
            $('#susunankomisaris').hide(500);
            $('#susunandireksi').hide(500);
            $('#penerimakuasa').show(500);
        }

        function backToSusunanDireksi(){
            $('#pemegangsaham').hide(500);
            $('#informasi-institusi').hide(500);
            $('#susunankomisaris').hide(500);
            $('#susunandireksi').show(500);
            $('#penerimakuasa').hide(500);
        }

        function dataKeuangan(){
            $('#pemegangsaham').hide(500);
            $('#informasi-institusi').hide(500);
            $('#susunankomisaris').hide(500);
            $('#susunandireksi').hide(500);
            $('#penerimakuasa').hide(500);
            $('#datakeuangan').show(500);
        }

        function backToPenerimaKuasa(){
            $('#pemegangsaham').hide(500);
            $('#informasi-institusi').hide(500);
            $('#susunankomisaris').hide(500);
            $('#susunandireksi').hide(500);
            $('#penerimakuasa').show(500);
            $('#datakeuangan').hide(500);
        }

        function instruksiPembayara(){
            $('#pemegangsaham').hide(500);
            $('#informasi-institusi').hide(500);
            $('#susunankomisaris').hide(500);
            $('#susunandireksi').hide(500);
            $('#penerimakuasa').hide(500);
            $('#datakeuangan').hide(500);
            $('#instruksipembayaran').show(500);
        }

        function backToDataKuangan(){
            $('#pemegangsaham').hide(500);
            $('#informasi-institusi').hide(500);
            $('#susunankomisaris').hide(500);
            $('#susunandireksi').hide(500);
            $('#penerimakuasa').hide(500);
            $('#datakeuangan').show(500);
            $('#instruksipembayaran').hide(500);
        }

        function dokumenPendukung(){
            $('#pemegangsaham').hide(500);
            $('#informasi-institusi').hide(500);
            $('#susunankomisaris').hide(500);
            $('#susunandireksi').hide(500);
            $('#penerimakuasa').hide(500);
            $('#datakeuangan').hide(500);
            $('#instruksipembayaran').hide(500);
            $('#dokumenpendukung').show(500);
        }

        function backToInstruksiPembayaran(){
            $('#pemegangsaham').hide(500);
            $('#informasi-institusi').hide(500);
            $('#susunankomisaris').hide(500);
            $('#susunandireksi').hide(500);
            $('#penerimakuasa').hide(500);
            $('#datakeuangan').hide(500);
            $('#instruksipembayaran').show(500);
            $('#dokumenpendukung').hide(500);
        }

    </script>
@endpush
