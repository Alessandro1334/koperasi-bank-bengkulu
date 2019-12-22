<li class="{{ set_active('manajer.dashboard') }}">
    <a href="{{ route('manajer.dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>

<li class="{{ set_active('manajer.verifikasi_data_investor') }}">
    <a href="{{ route('manajer.verifikasi_data_investor') }}">
        <i class="fa fa-wpforms"></i> <span>Verifikasi Data Investor</span>
    </a>
</li>

<li class="{{ set_active('manajer.verifikasi_rekening_investor') }}">
    <a href="{{ route('manajer.verifikasi_rekening_investor') }}">
        <i class="fa fa-wpforms"></i> <span>Verifikasi Rekening Investor</span>
    </a>
</li>

<li class="treeview {{ set_active(['manajer.laporan_nasabah','manajer.laporan_nasabah_filter','manajer.data_saham_nasabah','manajer.laporan_saham_filter']) }}">
    <a href="#">
        <i class="fa fa-bar-chart"></i> <span>Laporan</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu ">
        <li class="{{ set_active(['manajer.laporan_nasabah','manajer.laporan_nasabah_filter']) }}"><a href="{{ route('manajer.laporan_nasabah') }}"><i class="fa fa-circle-o"></i>Data Investor/Nasabah</a></li>
        <li class="{{ set_active(['manajer.data_saham_nasabah','manajer.laporan_saham_filter']) }}"><a href="{{ route('manajer.data_saham_nasabah') }}"><i class="fa fa-circle-o"></i>Rekening/Saham Nasabah</a></li>
        {{-- <li class=""><a href="{{ route('manajer.verifikasi_data_investor') }}"><i class="fa fa-circle-o"></i>Data Agen Penjualan Aktif</a></li> --}}
    </ul>
</li>

<li class="">
    <a href="{{ route('manajer.manajemen_user') }}">
        <i class="fa fa-users"></i> <span>Manajemen User</span>
    </a>
</li>
