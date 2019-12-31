<h4 style="text-align:center;">Cetak Data Rekening Investor Non Perorangan</h4>

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
        <td>No CIF</td>
        <td> : </td>
        <td>
            @if ($investor->no_cif == NULL || $investor->no_cif =="")
                <a style="color:red;"><i>data belum ada</i></a>
                @else
                    {{ $investor->no_cif }}
            @endif
        </td>
    </tr>

    <tr>
        <td>Staf Pemasaran/Agen Penjualan</td>
        <td> : </td>
        <td> {{ $investor->nm_agen_pemasaran }} </td>
    </tr>

    <tr>
        <td>Nama Institusi</td>
        <td> : </td>
        <td> {{ $investor->nm_institusi }} </td>
    </tr>

    <tr>
        <td>Alamat Institusi</td>
        <td> : </td>
        <td>{{ $investor->kota_institusi }}, {{ $investor->provinsi_institusi }}, {{ $investor->negara_institusi }}</td>
    </tr>

    <tr>
        <td>Domisili</td>
        <td> : </td>
        <td>{{ $investor->domisili }} </td>
    </tr>

    <tr>
        <td>Tipe Perusahaan</td>
        <td> : </td>
        <td>{{ $investor->tipe_perusahaan }} </td>
    </tr>

    <tr>
        <td>Karakteristik Perusahaan</td>
        <td> : </td>
        <td>{{ $investor->karakteristik }} </td>
    </tr>

    <tr>
        <td>Bidang Usaha</td>
        <td> : </td>
        <td>{{ $investor->bidang_usaha }} </td>
    </tr>

    <tr>
        <td>No NPWP</td>
        <td> : </td>
        <td>{{ $investor->no_npwp }} </td>
    </tr>

    <tr>
        <td>No SIUP</td>
        <td> : </td>
        <td>{{ $investor->no_siup }} </td>
    </tr>

    <tr>
        <td>No SKDP</td>
        <td> : </td>
        <td>{{ $investor->no_skdp }} </td>
    </tr>

    <tr>
        <td>No TDP</td>
        <td> : </td>
        <td>{{ $investor->no_tdp }} </td>
    </tr>

    <tr>
        <td>Nama Pemegang Saham</td>
        <td> : </td>
        <td>{{ $investor->nm_pemegang_saham }} </td>
    </tr>


    <tr>
        <td>Nama Direksi</td>
        <td> : </td>
        <td>{{ $investor->nm_direksi }} </td>
    </tr>


    <tr>
        <td>Nama Komisaris</td>
        <td> : </td>
        <td>{{ $investor->nm_komisaris }} </td>
    </tr>

    <tr>
        <td>Nama Penerima Kuasa</td>
        <td> : </td>
        <td>{{ $investor->nm_kuasa }} </td>
    </tr>

    <tr>
        <td>Aset Keuangan Tahun 1</td>
        <td> : </td>
        <td>{{ $investor->aset_keuangan_tahun_1 }} </td>
    </tr>

    <tr>
        <td>Aset Keuangan Tahun 2</td>
        <td> : </td>
        <td>{{ $investor->aset_keuangan_tahun_2 }} </td>
    </tr>

    <tr>
        <td>Aset Keuangan Tahun 3</td>
        <td> : </td>
        <td>{{ $investor->aset_keuangan_tahun_3 }} </td>
    </tr>

    <tr>
        <td>Laba Keuangan Tahun 1</td>
        <td> : </td>
        <td>{{ $investor->laba_keuangan_tahun_1 }} </td>
    </tr>
    <tr>
        <td>Laba Keuangan Tahun 2</td>
        <td> : </td>
        <td>{{ $investor->laba_keuangan_tahun_2 }} </td>
    </tr>
    <tr>
        <td>Laba Keuangan Tahun 3</td>
        <td> : </td>
        <td>{{ $investor->laba_keuangan_tahun_3 }} </td>
    </tr>

</table>
