<h4 style="text-align:center;">Cetak Data Saham Investor Perorangan</h4>

<table>
    <tr>
        <td>No Register</td>
        <td> : </td>
        <td> {{ $investor->no_register }} </td>
    </tr>
    <tr>
        <td>Nama Investor</td>
        <td> : </td>
        <td> {{ $investor->nm_investor }} </td>
    </tr>

    <tr>
        <td>Jenis Mata Uang</td>
        <td> : </td>
        <td> {{ $investor->jenis_mata_uang }} </td>
    </tr>

    <tr>
        <td>Seri SPMPKOP</td>
        <td> : </td>
        <td> {{ $investor->seri_spmpkop }} </td>
    </tr>

    <tr>
        <td>Seri Formulir</td>
        <td> : </td>
        <td> {{ $investor->seri_formulir }} </td>
    </tr>

    <tr>
        <td>Jumlah Saham</td>
        <td> : </td>
        <td> Rp. {{ number_format($investor->jumlah_saham) }},- </td>
    </tr>

    <tr>
        <td>Terbilang Saham</td>
        <td> : </td>
        <td>{{ $investor->terbilang_saham }} </td>
    </tr>

    <tr>
        <td>Jenis Mata Uang</td>
        <td> : </td>
        <td>{{ $investor->jenis_mata_uang }} </td>
    </tr>

    <tr>
        <td>Pembayaran Nomor Rekenong</td>
        <td> : </td>
        <td>{{ $investor->pembayaran_no_rek }} </td>
    </tr>

    <tr>
        <td>Pembayaran Nama Rekenong</td>
        <td> : </td>
        <td>{{ $investor->pembayaran_nm_rek }} </td>
    </tr>

    <tr>
        <td>Pembayaran Nama Bank</td>
        <td> : </td>
        <td>{{ $investor->pembayaran_nm_bank }} </td>
    </tr>

    <tr>
        <td>Pembayaran Nama Rekenong</td>
        <td> : </td>
        <td>{{ $investor->pembayaran_nm_rek }} </td>
    </tr>

    <tr>
        <td>Investor ID Lama</td>
        <td> : </td>
        <td>
            @if ($investor->investor_id_lama == NULL || $investor->investor_id_lama =="")
                <a style="color:red;"><i>data belum ada</i></a>
                @else
                    {{ $investor->investor_id_lama }}
            @endif
        </td>
    </tr>

    <tr>
        <td>Nomor SK3S Lama</td>
        <td> : </td>
        <td>
            @if ($investor->no_sk3s_lama == NULL || $investor->no_sk3s_lama =="")
                <a style="color:red;"><i>data belum ada</i></a>
                @else
                    {{ $investor->no_sk3s_lama }}
            @endif
        </td>
    </tr>

    <tr>
        <td>Perubahan Ke-</td>
        <td> : </td>
        <td>{{ $investor->perubahan_ke }} </td>
    </tr>
</table>
