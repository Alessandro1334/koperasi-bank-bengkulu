@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-dashboard"></i>&nbsp;Approve Data Institusi
@endsection
@section('user-login','Manajer')
@section('sidebar-menu')
    @include('manajer/sidebar-menu')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut Adalah Status Approval Data Institusi, Silahkan Approve Data Institusi Jika Belum di Approve Pada Daftar Dibawah Ini !!
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active a"><a href="#a" data-toggle="tab">Data Belum Diapprove</a></li>
                    <li class="b"><a href="#b" data-toggle="tab">Data Approved</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane table-responsive" id="a">
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
                                    <th>No Register</th>
                                    <th>Nama Institusi</th>
                                    <th>Tipe Perusahaan</th>
                                    <th>Karakteristik</th>
                                    <th>Bidang Usaha</th>
                                    <th>Status Approval</th>
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
                                    <td> {{ $investor->no_register }} </td>
                                    <td> {{ $investor->nm_institusi }} </td>
                                    <td> {{ $investor->tipe_perusahaan }} </td>
                                    <td> {{ $investor->karakteristik }} </td>
                                    <td> {{ $investor->bidang_usaha }} </td>
                                    <td>
                                        @if($investor->status_verifikasi == "0")
                                            <span class="label label-danger"><i class="fa fa-clock-o"></i>&nbsp; Belum Diapprove</span>
                                            @else
                                                <span class="label label-success"><i class="fa fa-check-circle"></i>&nbsp; Sudah Diapprove</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" onclick="get_data({{ $investor->id }})" data-toggle="modal" data-target=".modal-detail">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if($investor->status_verifikasi == "0")
                                            <a onclick="verifikasi({{ $investor->id }})" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Approval</a>
                                            @else
                                                <a onclick="verifikasi({{ $investor->id }})" class="btn btn-primary disabled" style="cursor:not-allowed;"><i class="fa fa-check-circle"></i>&nbsp; Approval</a>
                                        @endif
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form method="POST" action="{{ route('manajer.verifikasi_data_institusi_update',[$investor->id]) }}">
                                        {{ csrf_field() }} {{ method_field('PATCH') }}
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check-circle"></i>&nbsp;Form Approval Data Investor <b id="nm_investor"></b></h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="hidden" name="institusi_id" id="institusi_id">
                                                    <label for="recipient-name" class="col-form-label">Approval:</label>
                                                    <select name="status_verifikasi" id="status_verifikasi" class="form-control">
                                                        <option value="" selected disabled>-- silahkan lakukan approve data --</option>
                                                        <option value="1">Setujui</option>
                                                        <option value="2">Tidak Setuju</option>
                                                    </select>
                                                    <small id="emailHelp" class="form-text text-danger"><i>Data yang dipprove tidak dapat diubah kembali !!</i></small>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp;Approval</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </table>
                    </div>
                    <div class="tab-pane table-responsive" id="b">
                        <table class="table table-bordered table-hover verifikasi-investor">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Investor</th>
                                    <th>No Register</th>
                                    <th>Nama Institusi</th>
                                    <th>No CIF</th>
                                    <th>Tipe Perusahaan</th>
                                    <th>Karakteristik</th>
                                    <th>Bidang Usaha</th>
                                    <th>Hasil Approval</th>
                                    <th>Detail</th>
                                    <th>Status Approval</th>
                                </tr>
                            </thead>
                            @php
                                $no=1;
                            @endphp
                            @foreach($investors_acc as $investor)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $investor->nm_investor }} </td>
                                    <td> {{ $investor->no_register }} </td>
                                    <td> {{ $investor->nm_institusi }} </td>
                                    <td>
                                        @if ($investor->no_cif =="" || $investor->no_cif == NULL)
                                            <span class="label label-danger">tidak ada no cif</span>
                                            @else
                                            {{ $investor->no_cif }}
                                        @endif
                                    </td>
                                    <td> {{ $investor->tipe_perusahaan }} </td>
                                    <td> {{ $investor->karakteristik }} </td>
                                    <td> {{ $investor->bidang_usaha }} </td>
                                    <td>
                                        @if($investor->status_verifikasi == "0")
                                            <span class="label label-warning"><i class="fa fa-clock-o"></i>&nbsp; Menunggu Diapprove</span>
                                            @elseif($investor->status_verifikasi == "1")
                                                <span class="label label-primary"><i class="fa fa-check-circle"></i>&nbsp; Disetujui</span>
                                                @else
                                                    <span class="label label-danger"><i class="fa fa-close"></i>&nbsp; Tidak Disetujui</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" onclick="get_data({{ $investor->id }})" data-toggle="modal" data-target=".modal-detail">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if($investor->status_verifikasi == "0")
                                            <span class="label label-danger"><i class="fa fa-clock-o"></i>&nbsp; Belum Diapprove</span>
                                            @else
                                                <span class="label label-success"><i class="fa fa-check-circle"></i>&nbsp; Sudah Diapprove</span>
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
                                            <h5><b>Informasi Institusi</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Nama Investor: <a style="color:red">(*)</a> </label>
                                            <input type="text" name="nm_investor" id="nm_investor_detail" class="form-control" placeholder="Masukan nama lengkap" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">No Register:  <a style="color:red">(*)</a><a id="noreg_error" style="display:none;color:red;"><i>sudah digunakan</i></a></label>
                                            <input type="number" name="no_register" id="no_register" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==5) return false;" class="form-control" placeholder="Masukan nomor register" disabled>
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
                                            <label for="">Nama Pejabat Berwenang 1: <a style="color:red">(*)</a></label> <br>
                                            <select name="pejabat_berwenang_id1" id="pejabat_berwenang_id1" class="form-control" disabled>
                                                <option value="">-- pilih pejabat berwenang 1--</option>
                                                @foreach ($pejabats as $pejabat)
                                                    <option value="{{ $pejabat->id }}">{{ $pejabat->nm_pejabat_berwenang }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Nama Pejabat Berwenang 2:</a></label> <br>
                                            <select name="pejabat_berwenang_id2" id="pejabat_berwenang_id2" class="form-control" disabled>
                                                <option value="">-- pilih pejabat berwenang 2--</option>
                                                @foreach ($pejabats as $pejabat)
                                                    <option value="{{ $pejabat->id }}">{{ $pejabat->nm_pejabat_berwenang }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Nama Institusi: <a style="color:red">(*)</a></label>
                                            <input type="text" name="nm_institusi" class="form-control" id="nm_institusi" placeholder="Masukan Nama Institusi" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Kota Institusi: <a style="color:red">(*)</a></label>
                                            <input type="text" name="kota_institusi" class="form-control" id="kota_institusi" placeholder="Masukan Kota Institusi" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Provinsi Institusi: <a style="color:red">(*)</a></label>
                                            <input type="text" name="provinsi_institusi" class="form-control" id="provinsi_institusi" placeholder="Masukan Provinsi Institusi" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Negara Institusi: <a style="color:red">(*)</a></label>
                                            <input type="text" name="negara_institusi" class="form-control" id="negara_institusi" placeholder="Masukan Negara Institusi" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Kode Pos Institusi: <a style="color:red">(*)</a></label>
                                            <input type="text" name="kode_pos_institusi" class="form-control" id="kode_pos_institusi" placeholder="Masukan Kode Pos Institusi" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Email Kantor: <a style="color:red">(*)</a></label>
                                            <input type="text" name="email_kantor" class="form-control" id="email_kantor" placeholder="Masukan Email Kantor" disabled placeholder="masukan email kantor">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Telephone Kantor: <a style="color:red">(*)</a></label>
                                            <input type="text" name="telephone_kantor" class="form-control" id="telephone_kantor" placeholder="Masukan Telephone Kantor" disabled placeholder="masukan email kantor">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for=""> Domisili: <a style="color:red">(*)</a></label>
                                            <select name="domisili" id="domisili" class="form-control" disabled>
                                                <option value="" disabled selected>-- pilih domisili --</option>
                                                <option value="lokal">Lokal</option>
                                                <option value="asing">Asing</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for=""> Karakteristik Perusahaan: <a style="color:red">(*)</a></label>
                                            <select name="karakteristik" id="karakteristik" class="form-control" disabled>
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
                                            <input type="text" name="bidang_usaha" class="form-control" id="bidang_usaha"  disabled placeholder="Masukan Bidang Usaha">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Nomor Akta Pendirian: <a style="color:red">(* hanya angka)</a></label>
                                            <input type="number" name="no_akta_pendirian" class="form-control" id="no_akta_pendirian" placeholder="Masukan Nomor Akta Pendirian" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanggal Akta Pendirian: <a style="color:red">(*)</a></label>
                                            <input type="date" name="tanggal_akta_pendirian" class="form-control" id="tanggal_akta_pendirian" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanggal Akta Perubahan Terakhir: <a style="color:red">(*)</a></label>
                                            <input type="date" name="tanggal_akta_perubahan_terakhir" class="form-control" id="tanggal_akta_perubahan_terakhir" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">No Perubahan Terakhir: <a style="color:red">(* hanya angka)</a></label>
                                            <input type="number" name="no_akta_perubahan_terakhir" class="form-control" id="no_akta_perubahan_terakhir" disabled placeholder="Masukan No Akta Prbh Terakhir">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">No NPWP: <a style="color:red">(*)</a></label>
                                            <input type="text" name="no_npwp" class="form-control" id="no_npwp" placeholder="Masukan No NPWP" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanggal Registrasi NPWP: <a style="color:red">(*)</a></label>
                                            <input type="date" name="tgl_registrasi_npwp" class="form-control" id="tgl_registrasi_npwp" disabled >
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">No SIUP: <a style="color:red">(*)</a></label>
                                            <input type="text" name="no_siup" class="form-control" id="no_siup" placeholder="Masukan No SIUP" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanggal Kadaluarsa SIUP: <a style="color:red">(*)</a></label>
                                            <input type="date" name="tgl_Kadaluarsa_siup" class="form-control" id="tgl_Kadaluarsa_siup" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">No SKDP: <a style="color:red">(*)</a></label>
                                            <input type="text" name="no_skdp" class="form-control" id="no_skdp" placeholder="Masukan No SKDP" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanggal Kadaluarsa SKDP: <a style="color:red">(*)</a></label>
                                            <input type="date" name="tgl_Kadaluarsa_skdp" class="form-control" id="tgl_Kadaluarsa_skdp" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">No TDP: <a style="color:red">(*)</a></label>
                                            <input type="text" name="no_tdp" class="form-control" id="no_tdp" placeholder="Masukan No TDP" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanggal Kadaluarsa TDP: <a style="color:red">(*)</a></label>
                                            <input type="date" name="tgl_Kadaluarsa_tdp" class="form-control" id="tgl_Kadaluarsa_tdp" disabled >
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">No Izin PMA: <a style="color:red">(*)</a></label>
                                            <input type="date" name="no_izin_pma" class="form-control" id="no_izin_pma" disabled placeholder="Masukan No Izin PMA">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b>Data Kepemilikan & Pengurus (Pemegang Saham)</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Nama Pemegang Saham: <a style="color:red">(*)</a></label>
                                            <input type="text" name="nm_pemegang_saham" id="nm_pemegang_saham" class="form-control" disabled placeholder="Masukan nama pemegang saham">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Komposisi Pemegang Saham (%): <a style="color:red">(* angka)</a></label>
                                            <input type="number" name="komposisi_pemegang_saham" class="form-control" id="komposisi_pemegang_saham" disabled placeholder="Masukan komposisi pemegang saham">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanggal Pernyataan: <a style="color:red">(*)</a></label>
                                            <input type="date" name="tanggal_pernyataan" class="form-control" id="tanggal_pernyataan" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Yang Menyatakan: <a style="color:red">(*)</a></label>
                                            <input type="text" name="yang_menyatakan" class="form-control" id="yang_menyatakan" disabled placeholder="masukan yang menyatakan">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b> Data Kepemilikan & Pengurus (Susunan Komisaris)</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Nama Komisaris: <a style="color:red">(*)</a></label>
                                            <input type="text" name="nm_komisaris" id="nm_komisaris" class="form-control" disabled placeholder="Masukan nama komisaris">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Nomor Identitas: <a style="color:red">(* hanya angka)</a></label>
                                            <input type="number" name="no_identitas" class="form-control" id="no_identitas" disabled placeholder="Masukan Nomor identitas">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b> Data Kepemilikan & Pengurus (Susunan Direksi)</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Nama Direksi: <a style="color:red">(*)</a></label>
                                            <input type="text" name="nm_direksi" id="nm_direksi" class="form-control" disabled placeholder="Masukan nama direksi">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Nomor Identitas: <a style="color:red">(* hanya angka)</a></label>
                                            <input type="number" name="no_identitas_direksi" class="form-control" id="no_identitas_direksi" disabled placeholder="Masukan Nomor identitas">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b> Penerima Kuasa Untuk Bertransaksi</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Nama Penerima Kuasa: <a style="color:red">(*)</a></label>
                                            <input type="text" name="nm_kuasa" id="nm_kuasa"  class="form-control" disabled placeholder="Masukan nama kuasa" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Nomor Identitas: <a style="color:red">(* hanya angka)</a></label>
                                            <input type="number" name="no_identitas_kuasa" id="no_identitas_kuasa"  class="form-control" placeholder="Masukan no identitas" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanggal Kadaluarsa Identitas: <a style="color:red">(*)</a></label>
                                            <input type="date" name="tgl_kadaluarsa_identitas_kuasa" id="tgl_kadaluarsa_identitas_kuasa"  class="form-control" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Jabatan: <a style="color:red">(*)</a></label>
                                            <input type="text" name="jabatan_kuasa" id="jabatan_kuasa"  class="form-control" placeholder="Masukan jabatan" disabled>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">No Telephone: <a style="color:red">(* hanya angka)</a></label>
                                            <input type="number" name="telephone_kuasa" id="telephone_kuasa"  class="form-control" placeholder="Masukan no telephone" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b> Data Keuangan Institusi 3 Tahun Terakhir</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Aset Keuangan Tahun 1: <a style="color:red">(*)</a></label> <br>
                                            <select name="aset_keuangan_tahun_1" id="aset_keuangan_tahun_1" class="form-control" disabled>
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
                                            <select name="aset_keuangan_tahun_2" id="aset_keuangan_tahun_2" class="form-control" disabled>
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
                                            <select name="aset_keuangan_tahun_3" id="aset_keuangan_tahun_3" class="form-control" disabled>
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
                                            <select name="laba_keuangan_tahun_1" id="laba_keuangan_tahun_1" class="form-control" disabled>
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
                                            <select name="laba_keuangan_tahun_2" id="laba_keuangan_tahun_2" class="form-control" disabled>
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
                                            <select name="laba_keuangan_tahun_3" id="laba_keuangan_tahun_3" class="form-control" disabled>
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
                                            <select name="sumber_dana" id="sumber_dana" class="form-control" disabled>
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
                                            <select name="tujuan_investasi" id="tujuan_investasi" class="form-control" disabled>
                                                <option value="" disabled selected>-- pilih tujuan investasi --</option>
                                                <option value="kenaikan_harga">Mendapatkan Kenaikan Harga</option>
                                                <option value="investasi">Investasi</option>
                                                <option value=">spekulasi">>Spekulasi</option>
                                                <option value=">penghasilan">>Mendapatkan Penghasilan</option>
                                                <option value="lainnya">> Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b> Instruksi Pembayaran</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Nama Pemilik Bank: <a style="color:red">(*)</a></label>
                                            <input type="text" name="nm_pemilik_bank" id="nm_pemilik_bank" class="form-control" disabled placeholder="Masukan nama pemilik bank">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Nama Bank: <a style="color:red">(*)</a></label>
                                            <input type="text" name="nm_bank" class="form-control" id="nm_bank" disabled placeholder="Masukan nama bank">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">No Rekening Bank: <a style="color:red">(*)</a></label>
                                            <input type="text" name="no_rek" class="form-control" id="no_rek" disabled placeholder="Masukan Nomor Rekening">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><b> Dokumen Pendukung</b></h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Kelengkapan Dokumen: <a style="color:red">(*)</a></label>
                                            <select name="kelengkapan_dokumen" id="kelengkapan_dokumen" class="form-control" disabled>
                                                <option value="" selected disabled>-- pilih opsi --</option>
                                                <option value="ada">Ada</option>
                                                <option value="tidak">Tidak Ada</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Profil Resiko: <a style="color:red">(*)</a></label>
                                            <select name="profil_resiko" id="profil_resiko" class="form-control" disabled>
                                                <option value="" selected disabled>-- pilih opsi --</option>
                                                <option value="ada">Ada</option>
                                                <option value="tidak">Tidak Ada</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Bukti Setoran: <a style="color:red">(*)</a></label>
                                            <select name="bukti_setoran" id="bukti_setoran" class="form-control" disabled>
                                                <option value="" selected disabled>-- pilih opsi --</option>
                                                <option value="ada">Ada</option>
                                                <option value="tidak">Tidak Ada</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Ttd Penerima Kuasa: <a style="color:red">(*)</a></label>
                                            <select name="ttd_penerima_kuasa" id="ttd_penerima_kuasa" class="form-control" disabled>
                                                <option value="" selected disabled>-- pilih opsi --</option>
                                                <option value="ada">Ada</option>
                                                <option value="tidak">Tidak Ada</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Formulir Fatca: <a style="color:red">(*)</a></label>
                                            <select name="fatca" id="fatca" class="form-control" disabled>
                                                <option value="" selected disabled>-- pilih opsi --</option>
                                                <option value="ada">Ada</option>
                                                <option value="tidak">Tidak Ada</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Persetujuan: <a style="color:red">(*)</a></label>
                                            <select name="persetujuan" id="persetujuan" class="form-control" disabled>
                                                <option value="" selected disabled>-- pilih opsi --</option>
                                                <option value="ada">Ada</option>
                                                <option value="tidak">Tidak Ada</option>
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

        function verifikasi(id){
            $.ajax({
            url: "{{ url('manajer/verifikasi_data_institusi') }}"+'/'+ id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('#exampleModal').modal('show');
                $('#institusi_id').val(data.id);
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

        function get_data(id)
        {
            $.ajax({
                url: "{{ url('manajer/verifikasi_data_institusi') }}"+'/'+ id + "/detail",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    //Informasi Diri
                    console.log(data);
                    $('#nm_investor_detail').val(data.rekening.nm_investor);
                    $('#no_register').val(data.rekening.no_register);
                    $('#agen_pemasaran_id').val(data.rekening.agen_pemasaran_id);
                    $('#pejabat_berwenang_id1').val(data.rekening.pejabat_berwenang_1);
                    $('#pejabat_berwenang_id2').val(data.rekening.pejabat_berwenang_2);
                    $('#nm_institusi').val(data.rekening.nm_institusi);
                    $('#kota_institusi').val(data.rekening.kota_institusi);
                    $('#provinsi_institusi').val(data.rekening.provinsi_institusi);
                    $('#negara_institusi').val(data.rekening.negara_institusi);
                    $('#kode_pos_institusi').val(data.rekening.kode_pos_institusi);
                    $('#email_kantor').val(data.rekening.email_kantor);
                    $('#telephone_kantor').val(data.rekening.telephone_kantor);
                    $('#domisili').val(data.rekening.domisili);
                    $('#karakteristik').val(data.rekening.karakteristik);
                    $('#tipe_perusahaan').val(data.rekening.tipe_perusahaan);
                    $('#bidang_usaha').val(data.rekening.bidang_usaha);
                    $('#no_akta_pendirian').val(data.rekening.no_akta_pendirian);
                    $('#tanggal_akta_pendirian').val(data.rekening.tanggal_akta_perubahan_terakhir);
                    $('#no_akta_perubahan_terakhir').val(data.rekening.no_akta_perubahan_terakhir);
                    $('#tanggal_akta_perubahan_terakhir').val(data.rekening.tanggal_akta_perubahan_terakhir);
                    $('#no_npwp').val(data.rekening.no_npwp);
                    $('#tgl_registrasi_npwp').val(data.rekening.tgl_registrasi_npwp);
                    $('#no_siup').val(data.rekening.no_siup);
                    $('#tgl_Kadaluarsa_siup').val(data.rekening.tgl_kadaluarsa_siup);
                    $('#no_skdp').val(data.rekening.no_skdp);
                    $('#tgl_Kadaluarsa_skdp').val(data.rekening.tgl_kadaluarsa_skdp);
                    $('#no_tdp').val(data.rekening.no_tdp);
                    $('#tgl_Kadaluarsa_tdp').val(data.rekening.tanggal_kadaluarsa_tdp);
                    $('#no_izin_pma').val(data.rekening.no_izin_pma);

                    $('#nm_pemegang_saham').val(data.saham.nm_pemegang_saham);
                    $('#komposisi_pemegang_saham').val(data.saham.komposisi_pemegang_saham);
                    $('#tanggal_pernyataan').val(data.saham.tanggal_pernyataan);
                    $('#yang_menyatakan').val(data.saham.yang_menyatakan);

                    $('#nm_komisaris').val(data.komisaris.nm_komisaris);
                    $('#no_identitas').val(data.komisaris.no_identitas);

                    $('#nm_direksi').val(data.direksi.nm_direksi);
                    $('#no_identitas_direksi').val(data.direksi.no_identitas);

                    $('#nm_kuasa').val(data.kuasa.nm_kuasa);
                    $('#no_identitas_kuasa').val(data.kuasa.no_identitas);
                    $('#tgl_kadaluarsa_identitas_kuasa').val(data.kuasa.tgl_kadalursa_identitas);
                    $('#jabatan_kuasa').val(data.kuasa.jabatan);
                    $('#telephone_kuasa').val(data.kuasa.telephone);

                    $('#aset_keuangan_tahun_1').val(data.keuangan.aset_keuangan_tahun_1);
                    $('#aset_keuangan_tahun_2').val(data.keuangan.aset_keuangan_tahun_2);
                    $('#aset_keuangan_tahun_3').val(data.keuangan.aset_keuangan_tahun_3);
                    $('#laba_keuangan_tahun_1').val(data.keuangan.laba_keuangan_tahun_1);
                    $('#laba_keuangan_tahun_2').val(data.keuangan.laba_keuangan_tahun_2);
                    $('#laba_keuangan_tahun_3').val(data.keuangan.laba_keuangan_tahun_3);
                    $('#sumber_dana').val(data.keuangan.sumber_dana);
                    $('#tujuan_investasi').val(data.keuangan.tujuan_investasi);


                    $('#nm_pemilik_bank').val(data.instruksi.nm_pemilik_bank);
                    $('#nm_bank').val(data.instruksi.nm_bank);
                    $('#no_rek').val(data.instruksi.no_rek);

                    $('#kelengkapan_dokumen').val(data.dokumen.kelengkapan_dokumen);
                    $('#profil_resiko').val(data.dokumen.profil_resiko);
                    $('#bukti_setoran').val(data.dokumen.bukti_setoran);
                    $('#ttd_penerima_kuasa').val(data.dokumen.ttd_penerima_kuasa);
                    $('#fatca').val(data.dokumen.fatca);
                    $('#persetujuan').val(data.dokumen.persetujuan);






                }
            });
        }
    </script>
@endpush
