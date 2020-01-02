<h4 style="text-align:center;">Cetak Data Investor</h4>

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
        <td>Jenis Rekening</td>
        <td> : </td>
        <td> {{ $investor->jenis_rekening }} </td>
    </tr>

    <tr>
        <td>Profil Resiko Investor</td>
        <td> : </td>
        <td> {{ $investor->profil_resiko_nasabah }} </td>
    </tr>

    <tr>
        <td>No CiF</td>
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
        <td>Staf Pemasaran</td>
        <td> : </td>
        <td> {{ $investor->nm_agen_pemasaran }} </td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td> : </td>
        <td>
            @if ($investor->jenis_kelamin == "L")
                Laki-Laki
                @else
                    Perempuan
            @endif
        </td>
    </tr>
    <tr>
        <td>No KTP</td>
        <td> : </td>
        <td> {{ $investor->no_ktp }} </td>
    </tr>
    <tr>
        <td>Tanggal Kadaluarsa KTP</td>
        <td> : </td>
        <td> {{ $investor->tgl_kadaluarsa_ktp }} </td>
    </tr>
    <tr>
        <td>No NPWP</td>
        <td> : </td>
        <td> {{ $investor->no_npwp }} </td>
    </tr>
    <tr>
        <td>Tanggal Registrasi NPWP</td>
        <td> : </td>
        <td> {{ $investor->tgl_registrasi_npwp }} </td>
    </tr>
    <tr>
        <td>Tanggal Lahir</td>
        <td> : </td>
        <td> {{ $investor->tanggal_lahir }} </td>
    </tr>
    <tr>
        <td>Tempat Lahir</td>
        <td> : </td>
        <td> {{ $investor->tempat_lahir }} </td>
    </tr>
    <tr>
        <td>Status Perkawinan</td>
        <td> : </td>
        <td> {{ $investor->status_perkawinan }} </td>
    </tr>
    <tr>
        <td>Kewarganegaraan</td>
        <td> : </td>
        <td> {{ $investor->kewarganegaraan }} </td>
    </tr>
    <tr>
        <td>Alamat Berdasarkan KTP</td>
        <td> : </td>
        <td> {{ $investor->alamat_ktp }} </td>
    </tr>
    <tr>
        <td>RT Berdasarakan KTP</td>
        <td> : </td>
        <td> {{ $investor->rt_ktp }} </td>
    </tr>
    <tr>
        <td>RW Berdasarakan KTP</td>
        <td> : </td>
        <td> {{ $investor->rw_ktp }} </td>
    </tr>
    <tr>
        <td>Kecamatan Berdasarakan KTP</td>
        <td> : </td>
        <td> {{ $investor->kecamatan_ktp }} </td>
    </tr>

    <tr>
        <td>Kelurahan Berdasarakan KTP</td>
        <td> : </td>
        <td> {{ $investor->kelurahan_ktp }} </td>
    </tr>
    <tr>
        <td>Kota Berdasarakan KTP</td>
        <td> : </td>
        <td> {{ $investor->kota_ktp }} </td>
    </tr>
    <tr>
        <td>Provinsi Berdasarakan KTP</td>
        <td> : </td>
        <td> {{ $investor->provinsi_ktp }} </td>
    </tr>
    <tr>
        <td>Kode Pos Berdasarakan KTP</td>
        <td> : </td>
        <td> {{ $investor->kode_pos_ktp }} </td>
    </tr>
    <tr>
        <td>Kecamatan Tempat Tinggal</td>
        <td> : </td>
        <td> {{ $investor->kecamatan_tempat_tinggal }} </td>
    </tr>
    <tr>
        <td>Kelurahan Tempat Tinggal</td>
        <td> : </td>
        <td> {{ $investor->kelurahan_tempat_tinggal }} </td>
    </tr>
    <tr>
        <td>Kota Tempat Tinggal</td>
        <td> : </td>
        <td> {{ $investor->kota_tempat_tinggal }} </td>
    </tr>
    <tr>
        <td>Provinsi Tempat Tinggal</td>
        <td> : </td>
        <td> {{ $investor->provinsi_tempat_tinggal }} </td>
    </tr>
    <tr>
        <td>Telephone Rumah</td>
        <td> : </td>
        <td> {{ $investor->telp_rumah }} </td>
    </tr>
    <tr>
        <td>Ponsel</td>
        <td> : </td>
        <td> {{ $investor->ponsel }} </td>
    </tr>
    <tr>
        <td>Lama Menempati</td>
        <td> : </td>
        <td> {{ $investor->lama_menempati }} Tahun </td>
    </tr>
    <tr>
        <td>Status Rumah Tinggal</td>
        <td> : </td>
        <td> {{ $investor->status_rumah_tinggal }} </td>
    </tr>
    <tr>
        <td>Agama</td>
        <td> : </td>
        <td> {{ $investor->agama }} </td>
    </tr>

    <tr>
        <td>Pendidikan Terakhir</td>
        <td> : </td>
        <td> {{ $investor->pendidikan_terakhir }} </td>
    </tr>

    <tr>
        <td>Nama Gadis Ibu Kandung</td>
        <td> : </td>
        <td> {{ $investor->nm_gadis_ibu_kandung }} </td>
    </tr>

    <tr>
        <td>Emergency Kontak</td>
        <td> : </td>
        <td> {{ $investor->emergency_kontak }} </td>
    </tr>

    <tr>
        <td>Jumlah Tanggungan</td>
        <td> : </td>
        <td>
            @if ($investor->jumlah_tanggungan == NULL || $investor->jumlah_tanggungan =="")
                <a style="color:red"><i>data belum ada</i></a>
                @else
                    {{ $investor->jumlah_tanggungan }}
            @endif
        </td>
    </tr>

    <tr>
        <td>Alamat Surat Menyurat Sesuai KTP</td>
        <td> : </td>
        <td> {{ $investor->alamat_surat_menyurat_ktp }} </td>
    </tr>
    <tr>
        <td>Alamat Surat Menyurat Tempat Tinggal</td>
        <td> : </td>
        <td> {{ $investor->alamat_surat_menyurat_tempat_tinggal }} </td>
    </tr>
    <tr>
        <td>Alamat Surat Menyurat Lainnya</td>
        <td> : </td>
        <td> {{ $investor->alamat_surat_menyurat_lainnya }} </td>
    </tr>
    <tr>
        <td>Pengirimkan Konfirmasi Melalui Email</td>
        <td> : </td>
        <td> {{ $investor->pengiriman_konfirmasi_melalui_email }} </td>
    </tr>
    <tr>
        <td>Pengirimkan Konfirmasi Melalui Fax</td>
        <td> : </td>
        <td> {{ $investor->pengiriman_konfirmasi_melalui_email }} </td>
    </tr>
    <tr>
        <td>Pengirimkan Konfirmasi Melalui Alamat Surat Menyurat</td>
        <td> : </td>
        <td> {{ $investor->pengiriman_konfirmasi_melalui_alamat_surat_menyurat }} </td>
    </tr>
    <tr>
        <td>Tujuan Investasi</td>
        <td> : </td>
        <td> {{ $investor->tujuan_investasi }} </td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td> : </td>
        <td>
            @if ($investor->pekerjaan == NULL || $investor->pekerjaan =="")
                <a style="color:red"><i>data belum ada</i></a>
                @else
                    {{ $investor->pekerjaan }}
            @endif
        </td>
    </tr>

    <tr>
        <td>Nama Perusahaan</td>
        <td> : </td>
        <td>
            @if ($investor->nm_perusahaan == NULL || $investor->nm_perusahaan =="")
                <a style="color:red"><i>data belum ada</i></a>
                @else
                    {{ $investor->nm_perusahaan }}
            @endif
        </td>
    </tr>

    <tr>
        <td>Alamat Perusahaan</td>
        <td> : </td>
        <td>
            @if ($investor->alamat_perusahaan == NULL || $investor->alamat_perusahaan =="")
                <a style="color:red"><i>data belum ada</i></a>
                @else
                    {{ $investor->alamat_perusahaan }}, {{ $investor->kota_perusahaan }}, {{ $investor->provinsi_perusahaan }}
            @endif
        </td>
    </tr>

    <tr>
        <td>Jabatan</td>
        <td> : </td>
        <td>
            @if ($investor->jabatan == NULL || $investor->jabatan =="")
                <a style="color:red"><i>data belum ada</i></a>
                @else
                    {{ $investor->jabatan }}
            @endif
        </td>
    </tr>

    <tr>
        <td>Nama Pasangan Atau Orang Tua</td>
        <td> : </td>
        <td>
            @if ($investor->nm_pasangan_atau_orang_tua == NULL || $investor->nm_pasangan_atau_orang_tua =="")
                <a style="color:red"><i>data belum ada</i></a>
                @else
                    {{ $investor->nm_pasangan_atau_orang_tua }}
            @endif
        </td>
    </tr>

    <tr>
        <td>Hubungan</td>
        <td> : </td>
        <td>
            @if ($investor->hubungan == NULL || $investor->hubungan =="")
                <a style="color:red"><i>data belum ada</i></a>
                @else
                    {{ $investor->hubungan }}
            @endif
        </td>
    </tr>
</table>
