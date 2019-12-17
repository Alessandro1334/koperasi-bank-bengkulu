@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-user"></i>&nbsp;Manajemen User
@endsection
@section('user-login','Manajer')
@section('sidebar-menu')
    @include('manajer/sidebar-menu')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut menu Manajemen User
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
                    <table class="table table-bordered table-hover" id="investor">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Level User</th>
                            </tr>
                        </thead>
                        @foreach($users as $user)
                            <tr>
                                <td> {{ $loop->index+1 }} </td>
                                <td> {{ $user->nm_user }} </td>
                                <td> {{ $user->username }} </td>
                                <td> {{ $user->email }} </td>
                                <td> {{ $user->level_user }} </td>
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
            $('#investor').DataTable();
        } );
    </script>
@endpush
