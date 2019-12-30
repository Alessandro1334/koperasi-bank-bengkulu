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
                    <form action="{{ route('operator.tambah_saham_institusi_post') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="active tab-pane" id="timeline">
                            <ul class="timeline timeline-inverse" id="informasi-pribadi">
                                <li class=" time-label">
                                    <span class="bg-red">
                                        Form Pembelian Saham
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle bg-blue"></i>

                                    <div class="timeline-item">
                                        <div class="alert alert-danger alert-block" id="gagal" style="display:none;">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <i class="fa fa-success-circle"></i><strong>Gagal:</strong> Mohon Maaf, Investor Institusi Pengalihan Kurang Dari 12 Bulan (360 Hari), Anda Belum Dapat Melakukan Pengalihan Saham !!
                                        </div>
                                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                                        <h3 class="timeline-header">Silahkan Lengkapi Informasi Saham di Bawah Ini</h3>

                                        <div class="timeline-body col-md-12">
                                            <div class="row">
                                                <input type="hidden" name="institusi_id_lama" id="institusi_id_lama">
                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail1">Pilih Jenis Formulir Saham</label>
                                                    <select name="jenis_formulir" id="jenis_formulir" class="form-control" required>
                                                        <option value="" selected disabled>-- pilih jenis formulir --</option>
                                                        <option value="baru">Formulir Pembelian Saham</option>
                                                        <option value="pengalihan">Formulir Pengalihan Saham</option>
                                                    </select>
                                                </div>

                                                <div id="gagal2">
                                                    <div id="pengalihan" style="display:none;">
                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">Pilih Investor Pengalihan</label>
                                                            <select name="institusi_pengalihan_id" id="institusi_pengalihan_id" class="form-control">
                                                                <option value="" disabled selected>-- pilih investor --</option>
                                                                @foreach ($investor_pengalihans as $investor)
                                                                    <option value="{{ $investor->institusi_id }}">{{ $investor->nm_investor }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">Nomor SK3S Lama</label>
                                                            <input type="text" name="no_sk3s_lama" class="form-control" id="no_sk3s_lama" placeholder="Masukan Nomor SK3S Lama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="gagal3">
                                                    <div id="baru" style="display:none;">
                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">Pilih Investor Pembeli</label>
                                                            <select name="institusi_id" id="" class="form-control" required>
                                                                <option value="" disabled selected>-- pilih investor --</option>
                                                                @foreach ($investors as $investor)
                                                                    <option value="{{ $investor->id }}">{{ $investor->nm_investor }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">Nomor SK3S Baru:</label>
                                                            <input type="text" name="no_sk3s" class="form-control" id="no_sk3s" placeholder="Masukan Nomor SK3S" required>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">Seri SPMPKOP</label>
                                                            <input type="text" name="seri_spmpkop" class="form-control" id="seri_spmpkop" placeholder="Masukan nomor register" required>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">Seri Formulir</label>
                                                            <input type="text" name="seri_formulir" class="form-control" id="seri_formulir" placeholder="Masukan nomor register" required>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">Jumlah Saham</label>
                                                            <input type="text" name="jumlah_saham" class="form-control" id="jumlah_saham" placeholder="Masukan Jumlah Saham" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">Terbilang Saham</label>
                                                            <input type="text" name="terbilang_saham" class="form-control" id="terbilang_saham" required placeholder="Masukan Terbilang Saham">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">Jenis Mata Uang</label>
                                                            <select name="jenis_mata_uang" class="form-control" id="jenis_mata_uang" required>
                                                                <option value="" selected disabled>-- pilih mata uang --</option>
                                                                <option value="idr">IDR</option>
                                                                <option value="usd">USD</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">Nomor Rekening</label>
                                                            <input type="text" name="pembayaran_no_rek" class="form-control" id="pembayaran_no_rek" required placeholder="Masukan Nomor Rekening">
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">Nama Rekening</label>
                                                            <input type="text" name="pembayaran_nm_rek" class="form-control" id="pembayaran_nm_rek" required placeholder="Masukan Nama Pemilik Rekening">
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">Nama Bank</label>
                                                            <input type="text" name="pembayaran_nm_bank" class="form-control" id="pembayaran_nm_bank" required placeholder="Masukan Nama Bank">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="{{ route('operator.manajemen_saham') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                                            <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i>&nbsp; Reset</button>
                                            <button type="submit" class="btn btn-primary " id="submit"><i class="fa fa-save"></i>&nbsp;Simpan</button>
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
       $(document).ready(function(){
          $(document).on('change','#jenis_formulir',function(){
            // alert('berhasil');
            var jenis = $(this).val();
            if(jenis   == "baru"){
                $('#baru').show(300);
                $('#pengalihan').hide(300);
            }
            else{
                $('#baru').show(300);
                $('#pengalihan').show(300);
            }
          })
        });

        $(document).ready(function(){
          $(document).on('change','#institusi_pengalihan_id',function(){
            // alert('berhasil');
            var institusi_pengalihan_id = $(this).val();
            $.ajax({
              type :'get',
              url: "{{ url('operator/pembelian_saham_institusi/investor_pengalih') }}",
              data:{'institusi_pengalihan_id':institusi_pengalihan_id},
              success:function(data){
                console.log(data);

                if(data.status == "0"){
                    $('#gagal').show(300);
                    $("#gagal2 :input").prop("disabled", true);
                    $("#gagal3 :input").prop("disabled", true);
                    $("#submit").prop("disabled", true);
                }
                else{
                    $('#no_sk3s_lama').val(data.datas[0].no_sk3s);
                    $('#seri_spmpkop').val(data.datas[0].seri_spmpkop);
                    $('#seri_formulir').val(data.datas[0].seri_formulir);
                    $('#jumlah_saham').val(data.datas[0].jumlah_saham);
                    $('#terbilang_saham').val(data.datas[0].terbilang_saham);
                    $('#jenis_mata_uang').val(data.datas[0].jenis_mata_uang).trigger('change');
                    $('#pembayaran_no_rek').val(data.datas[0].pembayaran_no_rek);
                    $('#pembayaran_nm_rek').val(data.datas[0].pembayaran_nm_rek);
                    $('#pembayaran_nm_bank').val(data.datas[0].pembayaran_nm_bank);
                    $('#institusi_id_lama').val(data.datas[0].institusi_id);
                }
              },
              error:function(){

              }
            });
          })
        });
    </script>
@endpush
