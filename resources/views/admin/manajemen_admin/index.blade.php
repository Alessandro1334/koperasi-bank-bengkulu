@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-user"></i>&nbsp;Manajemen Administrator
@endsection
@section('user-login','Manajer')
@section('sidebar-menu')
    @include('admin/sidebar-menu')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut menu Manajemen Administrator
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user"></i>&nbsp;Data Verifikasi Data Administrator</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('administrator.manajemen_admin_tambah') }}" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
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
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $admin->nm_admin }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->username }}</td>
                                <td style="text-align: center;"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#pwd_changed"><i class="fa fa-key"></i></button></td>
                                <td >
                                    <a style="float:left;" onclick="edit_data({{ $admin->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default1">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-default1">
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
                                            <form method="POST" action="{{ route('administrator.manajemen_admin_delete',$admin->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus Data</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="pwd_changed">
                                <form method="POST" action="{{ route('administrator.manajemen_admin_pass',$admin->id) }}">
                                    {{ csrf_field() }} {{ method_field('PATCH') }}
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check-circle"></i>&nbsp;Ubah Data Administrator<b id="nm_investor"></b></h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Password Baru(*)</label>
                                                <input type="text" class="form-control" name="password" id="password" placeholder="Masukan Password Baru" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="examplenputPassword1">Password Baru(**) </label>
                                                <input type="text" class="form-control" name="password_baru" id="password_baru" placeholder="Masukan Password Baru Lagi" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp;Ubah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </table>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form method="POST" action="{{ route('administrator.manajemen_admin_update') }}">
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
                                        <input type="text" class="form-control" name="nm_admin" id="nm_admin" placeholder="Masukan Nama" required>
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
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            $('#administrator').DataTable();
        } );

        function edit_data(id){
            $.ajax({
                url: "{{ url('administrator/manajemen_admin') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#exampleModal').modal('show');
                    $('#id').val(data.id);
                    $('#nm_admin').val(data.nm_admin);
                    $('#email').val(data.email);
                    $('#username').val(data.username);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }
    </script>
@endpush
