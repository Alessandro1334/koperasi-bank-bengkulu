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
                                <td style="text-align: center;"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#pwd_changed"><i class="fa fa-key"></i></button></td>
                                <td>
                                    <a style="float:left;" onclick="edit_data({{ $user->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default1">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
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
