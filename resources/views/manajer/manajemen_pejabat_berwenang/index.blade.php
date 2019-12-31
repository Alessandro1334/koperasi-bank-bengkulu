@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-user"></i>&nbsp;Manajemen Pejabat Berwenang
@endsection
@section('user-login','Manajer')
@section('sidebar-menu')
    @include('manajer/sidebar-menu')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut adalah data pejabat Berwenang, silahkan tambahkan jika ada pejabat Berwenang baru
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user"></i>&nbsp;Data Pejabat Berwenang</h3>
                    <div class="box-tools pull-right">
                        <a data-target="#add_data" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <i class="fa fa-success-circle"></i><strong>Berhasil :</strong> {{ $message }}
                        </div>
                    @endif
                    <div class="alert alert-success alert-block" style="display:none;" id="berhasil">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <i class="fa fa-success-circle"></i><strong>Berhasil :</strong> Status user telah diubah !!
                    </div>

                    <div class="alert alert-danger alert-block" style="display:none;" id="gagal">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <i class="fa fa-success-circle"></i><strong>Gagal :</strong> Status user gagal diubah !!
                    </div>

                    <table class="table table-bordered table-hover" id="investor">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Agen Pemasaran</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Status User</th>
                                <th>Ubah Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach($pejabats as $pejabat)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $pejabat->nm_pejabat_berwenang }} </td>
                                    <td> {{ $pejabat->email }} </td>
                                    <td> {{ $pejabat->telephone }} </td>
                                    <td>
                                        @if ($pejabat->status == "1")
                                            <span class="label label-primary"><i class="fa fa-check-circle"></i>&nbsp; Aktif</span>
                                            @else
                                                <span class="label label-danger"><i class="fa fa-close"></i>&nbsp; Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($pejabat->status == "0")
                                            <a onclick="aktifkanStatus({{ $pejabat->id }})" class="btn btn-primary btn-sm"><i class="fa fa-thumbs-up"></i></a>
                                            @else
                                                <a onclick="nonAktifkanStatus({{ $pejabat->id }})" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-down"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a style="float:left;" onclick="edit_data({{ $pejabat->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a onclick="delete_data({{ $pejabat->id }})" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade" id="delete_data">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"><i class="fa fa-info-circle"></i>&nbsp;Perhatian</h4>
                                </div>
                                <div class="modal-body">
                                    <h4>Apakah anda yakin ingin menghapus data?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Kembali</button>
                                    <form method="POST" action="{{ route('manajer.manajemen_pejabat_berwenang_delete') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="id" id="id_del">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus Data</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="modal fade" id="add_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form method="POST" action="{{ route('manajer.manajemen_pejabat_berwenang_post') }}">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check-circle"></i>&nbsp;Tambah Data Pejabat Berwenang<b id="nm_investor"></b></h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama Pejabat Berwenang</label>
                                    <input type="text" class="form-control" name="nm_pejabat_berwenang" placeholder="Masukan Nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Masukan Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Telephone</label>
                                    <input type="text" class="form-control" name="telephone" placeholder="Masukan Username" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp;Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="{{ route('manajer.manajemen_pejabat_berwenang_update') }}">
            {{ csrf_field() }} {{ method_field('PATCH') }}
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check-circle"></i>&nbsp;Ubah Data Administrator<b id="nm_investor"></b></h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" class="form-control" name="nm_pejabat_berwenang" id="nm_pejabat_berwenang" placeholder="Masukan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="examplenputPassword1">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Username</label>
                        <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Masukan Username" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp;Ubah</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            $('#investor').DataTable();
        } );

        function delete_data(id) {
            $('#delete_data').modal('show');
            $('#id_del').val(id);
        }

        function edit_data(id){
            $.ajax({
                url: "{{ url('manajer/manajemen_pejabat_berwenang') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#exampleModal').modal('show');
                    $('#id').val(data.id);
                    $('#nm_pejabat_berwenang').val(data.nm_pejabat_berwenang);
                    $('#email').val(data.email);
                    $('#telephone').val(data.telephone);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }

        function aktifkanStatus(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('manajer/manajemen_pejabat_berwenang/aktifkan_status').'/' }}"+id;
            $.ajax({
                url : url,
                type : 'PATCH',
                success : function($data){
                    $('#berhasil').show(300);
                    location.reload();
                },
                error:function(){
                    $('#gagal').show(300);
                }
            });
            return false;
        }

        function nonAktifkanStatus(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('manajer/manajemen_pejabat_berwenang/nonaktifkan_status').'/' }}"+id;
            $.ajax({
                url : url,
                type : 'PATCH',
                success : function($data){
                    $('#berhasil').show(500);
                    location.reload();
                },
                error:function(){
                    $('#gagal').show(500);
                }
            });
            return false;
        }
    </script>
@endpush
