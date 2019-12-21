@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-user"></i>&nbsp;Manajemen Data Manajer
@endsection
@section('user-login','Manajer')
@section('sidebar-menu')
    @include('admin/sidebar-menu')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut menu Manajemen Manajer
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user"></i>&nbsp;Data Manajer</h3>
                    <div class="box-tools pull-right">
                        <button data-target="#add_data" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button>
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
                    <table class="table table-bordered table-hover" id="administrator">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th style="text-align: center;">Password</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $user->nm_user }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td style="text-align: center;"><a class="btn btn-success btn-sm" onclick="change_pass({{ $user->id }})"><i class="fa fa-key"></i></a></td>
                                <td>
                                    <a style="float:left;" onclick="edit_data({{ $user->id }})"  class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a onclick="delete_data({{ $user->id }})" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
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
                                    <form method="POST" action="{{ route('administrator.manajemen_manajer_delete') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="id" id="id_delete">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus Data</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="pwd_changed">
                        <form method="POST" action="{{ route('administrator.manajemen_manajer_ubahpass') }}">
                            {{ csrf_field() }} {{ method_field('PATCH') }}
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check-circle"></i>&nbsp;Ubah Data Administrator<b id="nm_investor"></b></h5>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Password Baru(*)</label>
                                        <input type="hidden" name="id" id="id_del">
                                        <input type="text" class="form-control password1" name="password1" placeholder="Masukan Password Baru" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="examplenputPassword1">Password Baru(**) </label>
                                        <input type="text" class="form-control password_baru" name="password_baru" placeholder="Masukan Password Baru Lagi" required>
                                        <span id="error-mssg" class="error-mssg text-danger" style="font-size:12px;"></span>
                                        <span id="sccs-mssg" class="sccs-mssg text-success" style="font-size:12px;"></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                    <button type="submit" class="btn btn-primary btn_save"><i class="fa fa-check-circle"></i>&nbsp;Ubah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal fade" id="add_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form method="POST" action="{{ route('administrator.manajemen_manajer_addpost') }}">
                            {{ csrf_field() }} {{ method_field('POST') }}
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check-circle"></i>&nbsp;Tambah Data Administrator<b></b></h5>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" name="nm_user" placeholder="Masukan Nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Masukan Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" name="password" placeholder="Masukan Password" required>
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
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="{{ route('administrator.manajemen_manajer_update') }}">
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
                        <input type="text" class="form-control" name="nm_user" id="nm_user" placeholder="Masukan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="examplenputPassword1">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" required>
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
            $('#administrator').DataTable();
        } );

        function delete_data(id) {
            $('#delete_data').modal('show');
            $('#id_delete').val(id);
               
        }

        function change_pass(id) {
            $('#pwd_changed').modal('show');
            $('#id_del').val(id);
        }

        function edit_data(id){
            $.ajax({
                url: "{{ url('administrator/manajemen_manajer') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#exampleModal').modal('show');
                    $('#id').val(data.id);
                    $('#nm_user').val(data.nm_user);
                    $('#email').val(data.email);
                    $('#username').val(data.username);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }

        $(function(){
			$('.password_baru').keyup(function(e){
				var pass = $('.password1').val();
				var confpass = $(this).val();
				if(pass == confpass){
					$('.error-mssg').text('');
					$('.sccs-mssg').text('Password Sama !');
                    $('.btn_save').attr("disabled",false);
					allowsubmit = true;
				}else if(pass != confpass){
					$('.error-mssg').text('Password Tidak Sama !');
					$('.sccs-mssg').text('');
                    $('.btn_save').attr("disabled",true);
					allowsubmit = false;
				}
			});
        });
    </script>
@endpush
