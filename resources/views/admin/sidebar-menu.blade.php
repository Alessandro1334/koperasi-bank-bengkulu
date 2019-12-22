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

<li class="{{ set_active('administrator.manajemen_operator') }}">
    <a href="{{ route('administrator.manajemen_operator') }}">
        <i class="fa fa-users"></i> <span>Manajemen Operator</span>
    </a>
</li>

<li class="{{ set_active('administrator.manajemen_manajer') }}">
    <a href="{{ route('administrator.manajemen_manajer') }}">
        <i class="fa fa-users"></i> <span>Manajemen Manajer</span>
    </a>
</li>

<li class="{{ route('administrator.manajemen_barcode') }}">
    <a href="{{ route('administrator.manajemen_barcode') }}">
        <i class="fa fa-barcode"></i> <span>Manajemen Barcode</span>
    </a>
</li>

