@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-dashboard"></i>&nbsp;Verifikasi Data Saham Investor
@endsection
@section('user-login','Manajer')
@section('sidebar-menu')
    @include('manajer/sidebar-menu')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut menu Verifikasi Data Saham Investor
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
                        <table class="table table-bordered table-hover saham" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Investor</th>
                                    <th>Jumlah Saham</th>
                                    <th>Terbilang Saham</th>
                                    <th>Status Saham</th>
                                    <th>Status Verifikasi</th>
                                    <th>Hasil Verifikasi</th>
                                    <th>Verifikasi</th>
                                </tr>
                            </thead>
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
                                                @else
                                                    <span class="label label-danger"><i class="fa fa-close"></i>&nbsp;tidak disetujui</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($saham->status_verifikasi == "0")
                                            <a onclick="verifikasi({{ $saham->id }})" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Verifikasi</a>
                                            @else
                                                <a onclick="verifikasi({{ $saham->id }})" class="btn btn-primary disabled" style="cursor:not-allowed;"><i class="fa fa-check-circle"></i>&nbsp; Verifikasi</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
    
                    <div class="tab-pane" id="b">
                        <table class="table table-bordered table-hover saham">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Investor</th>
                                    <th>Jumlah Saham</th>
                                    <th>Terbilang Saham</th>
                                    <th>Status Saham</th>
                                    <th>Status Verifikasi</th>
                                    <th>Hasil Verifikasi</th>
                                    <th>Verifikasi</th>
                                </tr>
                            </thead>
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
                                    <td>
                                        @if($saham->status_verifikasi == "0")
                                            <a onclick="verifikasi({{ $saham->id }})" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Verifikasi</a>
                                            @else
                                                <a onclick="verifikasi({{ $saham->id }})" class="btn btn-primary disabled" style="cursor:not-allowed;"><i class="fa fa-check-circle"></i>&nbsp; Verifikasi</a>
                                        @endif
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form method="POST" action="{{ route('manajer.verifikasi_data_saham_update',[$saham->id]) }}">
                                        {{ csrf_field() }} {{ method_field('PATCH') }}
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check-circle"></i>&nbsp;Form Verifikasi Data Investor <b id="nm_investor"></b></h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="hidden" name="saham_id" id="saham_id">
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
            $('.saham').DataTable();
        } );

        function verifikasi(id){
            $.ajax({
            url: "{{ url('manajer/verifikasi_rekening_investor') }}"+'/'+ id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('#exampleModal').modal('show');
                $('#saham_id').val(data.id);
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
