@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-file"></i>&nbsp;Manajemen Data Barcode
@endsection
@section('barcode-login','Manajer')
@section('sidebar-menu')
    @include('admin/sidebar-menu')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut Menu Manajemen Barcode
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-barcode"></i>&nbsp;Data Barcode</h3>
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
                                <th>Gambar</th>
                                <th>Keterangan</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($barcodes as $barcode)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td><img width="150px" src="{{ url('/img/'.$barcode->nm_file) }}"></td>
                                <td>{{ $barcode->keterangan }}</td>
                                <td>
                                    @if ($barcode->status == 'aktif')
                                        <span class="label label-success">Aktif</span>
                                    @else
                                        <span class="label label-danger">Tidak Aktif</span>  
                                    @endif
                                </td>
                                <td>
                                    <a style="float:left;" onclick="edit_data({{ $barcode->id }})"  class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a onclick="delete_data({{ $barcode->id }})" class="btn btn-danger btn-sm">
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
                                    <form method="POST" action="{{ route('administrator.manajemen_barcode_delete') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="id" id="id_delete">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus Data</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="add_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form method="POST" action="{{ route('administrator.manajemen_barcode_addpost') }}" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check-circle"></i>&nbsp;Tambah Data Barcode<b></b></h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">File</label>
                                    <input type="file" class="form-control" name="nm_file" placeholder="Masukan Barcode" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select type="text" class="form-control" name="status" required> 
                                        <option value="aktif">Aktif</option>
                                        <option value="tdk_aktif">Tidak Aktif</option>
                                    </select>
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
        <form method="POST" action="{{ route('administrator.manajemen_barcode_update') }}" enctype="multipart/form-data">
            {{ csrf_field() }} {{ method_field('PATCH') }}
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check-circle"></i>&nbsp;Ubah Data Administrator<b id="nm_investor"></b></h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">File</label>
                        <input type="hidden" name="id" id="id">
                        <input type="file" class="form-control" name="nm_file" placeholder="Masukan Barcode">
                    </div>
                    <div class="form-group">
                        <label for="email">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukan Keterangan" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select type="text" class="form-control" name="status" id="status" required> 
                            <option value="aktif">Aktif</option>
                            <option value="tdk_aktif">Tidak Aktif</option>
                        </select>
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
                url: "{{ url('administrator/manajemen_barcode') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    console.log(data);
                    $('#exampleModal').modal('show');
                    $('#id').val(data.id);
                    $('#nm_file').val(data.nm_file);
                    $('#keterangan').val(data.keterangan);
                    $('#status').val(data.status);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }
    </script>
@endpush
