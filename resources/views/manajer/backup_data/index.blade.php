@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-dashboard"></i>&nbsp;Backup Data
@endsection
@section('user-login','Operator')
@section('sidebar-menu')
    @include('manajer/sidebar-menu')
@endsection
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active a"><a href="#a" data-toggle="tab"><i class="fa fa-download"></i>&nbsp;Eksport Data</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane">
                    <div class="alert alert-warning alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong><i class="fa fa-success-circle"></i>Perhatian: </strong> Silahkan Lakukan Eksport Data Dibawah Ini Jika Diperlukan !!
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <a href="{{ route('manajer.eksport') }}" type="submit" id="button-eksport" class="btn btn-primary"><i class="fa fa-upload"></i>&nbsp; Eksport Data Perorangan</a>
                            <a href="{{ route('manajer.eksport_saham_perorangan') }}" type="submit" id="button-eksport" class="btn btn-primary"><i class="fa fa-upload"></i>&nbsp; Eksport Data Saham Perorangan</a>
                        </div>

                        <div class="col-md-12" style="margin-bottom:10px;">
                            <a href="{{ route('manajer.eksport_saham_nonperorangan') }}" type="submit" id="button-eksport" class="btn btn-primary"><i class="fa fa-upload"></i>&nbsp; Eksport Saham NonPerorangan</a>
                            <a href="{{ route('manajer.eksport_institusi') }}" type="submit" id="button-eksport" class="btn btn-primary"><i class="fa fa-upload"></i>&nbsp; Eksport Data Non Perorangan</a>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('manajer.exportsql') }}" target="_blank" class="btn btn-primary"><i class="fa fa-database"></i>&nbsp; Export Sql</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active a"><a href="#a" data-toggle="tab"><i class="fa fa-cloud"></i>&nbsp;Import Data</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane">
                    <div class="alert alert-warning alert-block" style="margin-bottom:0px;">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong><i class="fa fa-success-circle"></i>Perhatian: </strong> Silahkan Lakukan Import Data Dibawah Ini Jika Diperlukan !!
                    </div>
                    <form method="POST" action="{{ route('manajer.import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Pilih Opsi:</label>
                                        <select name="opsi" id="opsi" class="form-control">
                                            <option value="" selected disabled>- pilih opsi --</option>
                                            <option value="individual">Import Investor Individual</option>
                                            <option value="s_individual">Import Saham Individual</option>
                                            <option value="nonindividual">Import Investor Nonindividual</option>
                                            <option value="s_nonindividual">Import Saham Nonindividual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Pilih Opsi:</label>
                                        <input type="file" name="file" id="file" class="form-control" accept=".xls">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" id="button-import" class="btn btn-primary"><i class="fa fa-download"></i>&nbsp; Import Data</button>
                        </div>
                    </form>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Berhasil: </strong> {{ $message }}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
