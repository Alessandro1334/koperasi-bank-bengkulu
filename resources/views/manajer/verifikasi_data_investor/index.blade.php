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
                    <li class="active a"><a href="#a" data-toggle="tab">Data Terverifikasi</a></li>
                    <li class="b"><a href="#b" data-toggle="tab">Data Belum Terverifikasi</a></li>
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
                                    <td> {{ $investor->no_cif }} </td>
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
                                    <td> {{ $investor->no_cif }} </td>
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
