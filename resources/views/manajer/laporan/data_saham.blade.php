@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-dashboard"></i>&nbsp;Verifikasi Data Investor
@endsection
@section('user-login','Manajer')
@section('sidebar-menu')
    @include('manajer/sidebar-menu')
@endsection
@push('styles')
    <!-- Datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
  <!-- End Datatables -->
  <style>
      .btn-datatables{
          color:white;
      }
  </style>
@endpush
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Silahkan filter data menggunakan form yang sudah di sediakan, hasil filter akan otomatis eksport file laporan dalam bentuk excel !!
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-bar-chart"></i>&nbsp;Laporan Data Nasabah/Investor</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <div class="row" style="margin-bottom:10px;">
                        <form action="{{ route('manajer.data_saham_nasabah') }}" method="GET">
                            <div class="form-group col-md-6">
                                <label for="">Pilih Metode Filter Laporan</label>
                                <select name="metode" id="metode" class="form-control">
                                    <option value="semua">Semua</option>
                                    <option value="date">Filter Per Waktu</option>
                                    <option value="agen">Filter Per Agen Pemasaran</option>
                                </select>
                            </div>
                            <div id="date" style="display:none;">
                                <div class="form-group col-md-6">
                                    <label for="">Mulai Dari Tanggal</label>
                                    <input type="date" name="date" class="form-control" id="date1">
                                </div>
                            </div>

                            <div id="agen" style="display:none;">
                                <div class="form-group col-md-6">
                                    <label for="">Pilih Agen Pemasaran</label>
                                    <select name="agen_id" id="agen_id" class="form-control">
                                        <option value="" selected disabled>-- pilih agen pemasaran --</option>
                                        @foreach ($agens as $agen)
                                            <option value="{{ $agen->id }}">{{ $agen->nm_agen_pemasaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i>&nbsp; Filter Laporan</button>
                            </div>
                        </form>
                    </div>
                    <br>
                    @if (isset($_GET['metode']))
                        @if ($_GET['metode'] == "semua")
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <i class="fa fa-success-circle"></i><strong>Berhasil :</strong> Menampilkan Semua Data Nasabah
                            </div>
                        @endif
                    @endif
                    <table class="table table-bordered table-hover" id="laporan_nasabah">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Investor</th>
                                <th>Jumlah Saham</th>
                                <th>Terbilang Saham</th>
                                <th>Status Saham</th>
                                <th>Status Verifikasi</th>
                                <th>Hasil Verifikasi</th>
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
                                                @else
                                                    <span class="label label-danger"><i class="fa fa-close"></i>&nbsp;tidak disetujui</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script>
        $('#laporan_nasabah').DataTable({
            "oLanguage": {
              "sZeroRecords": "Tidak Ada Data Ditampilkan",
              "sEmptyTable": 'Tidak Ada Data Yang Dimuat',
              "sLengthMenu": 'Menampikan: <select>'+
                '<option value="10">10</option>'+
                '<option value="50">50</option>'+
                '<option value="100">100</option>'+
                '<option value="-1">Semua</option>'+
                '</select> Data',
                "sInfoFiltered": " - Filter Dari _MAX_ Data",

            },
            dom: 'lBfrtip',
            buttons: [
                { extend:'excel', text:'<i class="fa fa-file-excel-o"></i>&nbsp;Eksport Excel', className:'btn btn-primary btn-datatables btn-flat' },
            ],

        });

        $(document).ready(function(){
          $(document).on('change','#metode',function(){
            // alert('berhasil');
            var jenis = $(this).val();
            if(jenis   == "date"){
                $('#date').show(300);
                $('#agen').hide(300);
            }
            else{
                $('#date').hide(300);
                $('#agen').show(300);
            }
          })
        });
    </script>
@endpush
