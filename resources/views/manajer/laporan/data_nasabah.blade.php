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
            Silahkan filter data menggunakan form yang sudah di sediakan, hasil filter akan otomatis eksport file laporan dalam bentuk excel !!
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user"></i>&nbsp;Data Verifikasi Data Investor</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <div class="row">
                        <form action="">
                            <div class="form-group col-md-4">
                                <label for="">Pilih Metode Filter Laporan</label>
                                <select name="metode" id="metode" class="form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Mulai Dari Tanggal</label>
                                <input type="date" name="date1" class="form-control" id="date1">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Sampai Tangggal</label>
                                <input type="date" name="date1" class="form-control" id="date1">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Pilih Agen Pemasaran</label>
                                <select name="agen_id" id="agen_id" class="form-control">
                                    <option value=""></option>
                                </select>
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
            $('#verifikasi-investor').DataTable();
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
