@can('isOperator')
    <li class="{{ set_active('operator.dashboard') }}">
        <a href="{{ route('operator.dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="{{ set_active(['operator.form_pembukaan_rekening','operator.tambah_investor']) }}">
        <a href="{{ route('operator.form_pembukaan_rekening') }}">
            <i class="fa fa-wpforms"></i> <span>Form Pembukaan Rekening</span>
        </a>
    </li>

    <li class="{{ set_active('operator.manajemen_saham') }}">
        <a href="{{ route('operator.manajemen_saham') }}">
            <i class="fa fa-suitcase"></i> <span>Pembelian/Pengalihan Saham</span>
        </a>
    </li>

    <li class="">
        <a href="">
            <i class="fa fa-power-off text-danger"></i> <span class="text-danger">Keluar</span>
        </a>
    </li>
@endcan
