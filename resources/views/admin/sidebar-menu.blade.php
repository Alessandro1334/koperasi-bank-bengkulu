<li class="{{ set_active('administrator.dashboard') }}">
    <a href="{{ route('administrator.dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>

<li class="{{ set_active(['administrator.manajemen_admin']) }}">
    <a href="{{ route('administrator.manajemen_admin') }}">
        <i class="fa fa-wpforms"></i> <span>Manajemen Administrator</span>
    </a>
</li>

{{-- <li class="{{ set_active('operator.manajemen_saham') }}">
    <a href="{{ route('operator.manajemen_saham') }}">
        <i class="fa fa-suitcase"></i> <span>Pembelian/Pengalihan Saham</span>
    </a>
</li>

<li class="">
    <a href="">
        <i class="fa fa-power-off text-danger"></i> <span class="text-danger">Keluar</span>
    </a>
</li> --}}
