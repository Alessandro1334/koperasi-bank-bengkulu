@can('isOperator')
    <li class="{{ set_active('operator.dashboard') }}">
        <a href="{{ route('operator.dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview {{ set_active(['operator.form_pembukaan_rekening','operator.tambah_investor','operator.manajemen_saham']) }}">
        <a href="#">
            <i class="fa fa-users"></i> <span>Rekening Individual</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu ">
            <li class="{{ set_active(['operator.form_pembukaan_rekening','operator.tambah_investor']) }}"><a href="{{ route('operator.form_pembukaan_rekening') }}"><i class="fa fa-wpforms"></i>Form Pembukaan Rekening</a></li>
            <li class="{{ set_active(['operator.manajemen_saham']) }}"><a href="{{ route('operator.manajemen_saham') }}"><i class="fa fa-circle-o"></i>Pembelian/Pengalihan Saham</a></li>
            {{-- <li class=""><a href="{{ route('operator.verifikasi_data_investor') }}"><i class="fa fa-circle-o"></i>Data Agen Penjualan Aktif</a></li> --}}
        </ul>
    </li>

    <li class="treeview {{ set_active(['operator.pembukaan_rekening_institusi','operator.tambah_saham_institusi','operator.pembelian_saham_institusi']) }}">
        <a href="#">
            <i class="fa fa-university"></i> <span>Rekening Non Individual</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu ">
            <li class="{{ set_active(['operator.pembukaan_rekening_institusi','operator.tambah_investor']) }}"><a href="{{ route('operator.pembukaan_rekening_institusi') }}"><i class="fa fa-wpforms"></i>Form Pembukaan Rekening</a></li>
            <li class="{{ set_active(['operator.pembelian_saham_institusi','operator.tambah_saham_institusi']) }}"><a href="{{ route('operator.pembelian_saham_institusi') }}"><i class="fa fa-circle-o"></i>Pembelian/Pengalihan Saham</a></li>
            {{-- <li class=""><a href="{{ route('operator.verifikasi_data_investor') }}"><i class="fa fa-circle-o"></i>Data Agen Penjualan Aktif</a></li> --}}
        </ul>
    </li>

    <li class="{{ set_active('operator.backup_data') }}">
        <a href="{{ route('operator.backup_data') }}">
            <i class="fa fa-cloud"></i> <span>Backup Data</span>
        </a>
    </li>

    <li class="">
        <a data-toggle="control-sidebar" href="{{ route('logout') }}" style="color:red;"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off"></i>&nbsp; {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
@endcan
