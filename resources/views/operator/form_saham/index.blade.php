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
                        <table class="table table-bordered table-hover investor">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Investor</th>
                                    <th>Jumlah Saham</th>
                                    <th>Terbilang Saham</th>
                                    <th>Status Saham</th>
                                    <th>Status Verifikasi</th>
                                    <th>Hasil Verifikasi</th>
                                    <th>SK3S</th>
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
                                            <span class="label label-danger"><i class="fa fa-clock-o"></i>&nbsp;belum diverifikasi</span>
                                            @else
                                                <span class="label label-primary"><i class="fa fa-check-circle"></i>&nbsp;sudah diverifikasi</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($saham->status_verifikasi == '0')
                                                <span class="label label-warning"><i class="fa fa-clock-o"></i>&nbsp;menunggu diverifikasi</span>
                                            @elseif($saham->status_verifikasi == '1')
                                                <span class="label label-success"><i class="fa fa-check"></i>&nbsp;disetujui</span>
                                            @elseif($saham->status_verifikasi == '2')
                                                <span class="label label-danger"><i class="fa fa-close"></i>&nbsp;tidak disetujui</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('operator.sk3s',[$saham->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o"></i>&nbsp; Cetak SK3S</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="b">
    
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
                                    <th>Jumlah Saham</th>
                                    <th>Terbilang Saham</th>
                                    <th>Status Saham</th>
                                    <th>Status Verifikasi</th>
                                    <th>Hasil Verifikasi</th>
                                    <th>Detail</th>
                                    <th>SK3S</th>
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
                                                <span class="label label-danger"><i class="fa fa-clock-o"></i>&nbsp;belum diverifikasi</span>
                                                    @else
                                                        <span class="label label-primary"><i class="fa fa-check-circle"></i>&nbsp;sudah diverifikasi</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($saham->status_verifikasi == '0')
                                                <span class="label label-warning"><i class="fa fa-clock-o"></i>&nbsp;menunggu diverifikasi</span>
                                            @elseif($saham->status_verifikasi == '1')
                                                <span class="label label-success"><i class="fa fa-check"></i>&nbsp;disetujui</span>
                                            @elseif($saham->status_verifikasi == '2')
                                                <span class="label label-danger"><i class="fa fa-close"></i>&nbsp;tidak disetujui</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" onclick="get_data({{ $saham->id }})" data-toggle="modal" data-target="#modal-detail">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('operator.sk3s',[$saham->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o"></i>&nbsp; Cetak SK3S</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="modal-detail">
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
                                            <h4><b>Pengalihan Saham</b></h4>
                                            <hr>
                                        </div>

                                        <div id="pengalihan">
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">Pilih Investor Pengalihan</label>
                                                <select name="investor_pengalihan_id" id="investor_pengalihan_id" class="form-control" disabled>
                                                    <option value="" disabled selected>-- pilih investor --</option>
                                                    @foreach ($investor_pengalihans as $investor)
                                                        <option value="{{ $investor->investor_id }}">{{ $investor->nm_investor }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputEmail1">Nomor SK3S Lama</label>
                                                <input type="text" name="no_sk3s_lama" class="form-control" id="no_sk3s_lama" placeholder="Masukan Nomor SK3S Lama" disabled>
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
                                                    <option value="" disabled selected>-- pilih investor --</option>
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
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>&nbsp;SK3S</button>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>&nbsp;SPMPKOP</button>
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
            $('.investor').DataTable();
            
        } );

        function get_data(id)
        {
            $.ajax({
                url: "{{ url('operator/manajemen_pembelian_dan_pengalihan_saham') }}"+'/'+ id + "/detail",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data.sahams.id);
                    // ('#investor_pengalihan_id').val(data.sahams.investor_id);
                    // ('#no_sk3s_lama').val(data.sahams.no_sk3s);
                    // ('#investor_id').val(data.sahams.investor_id);
                    // ('#no_sk3s').val(data.sahams.no_sk3s);
                    // ('#seri_spmpkop').val(data.sahams.seri_spmpkop);
                    // ('#seri_formulir').val(data.sahams.seri_formulir);
                    // ('#jumlah_saham').val(data.sahams.jumlah_saham);
                    // ('#terbilang_saham').val(data.sahams.terbilang_saham);
                    // ('#jenis_mata_uang').val(data.sahams.jenis_mata_uang);
                    // ('#pembayaran_no_rek').val(data.sahams.pembayaran_no_rek);
                    // ('#pembayaran_nm_rek').val(data.sahams.pembayaran_nm_rek);
                    // ('#pembayaran_nm_bank').val(data.sahams.pembayaran_nm_bank);

                }
            });
        }
    </script>
@endpush
