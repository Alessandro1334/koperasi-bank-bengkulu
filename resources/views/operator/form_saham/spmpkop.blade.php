<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak SPMPKOP</title>
</head>
<style>
    .img-top {
        opacity: 0.6;
    }

    .top td, th{
        border: 1px solid black;
    }

    td, th {
        /* border: 1px solid black; */
    }

    .page-break {
        page-break-after: always;
    }

    .sit-in-the-corner {
        float: left;
        margin-left: 5px;
        margin-top: -85px;
    }
</style>
<body>
    <table style="width:100%" class="top">
        <tr>
           <td rowspan="3"></td>
           <td rowspan="3" style="width:260px;" align="center"><b>SURAT PERJANJIAN MODAL PENYERTAAN KOPERASI (SPMPKOP)</b></td>
            <td>Seri : @if (count($sk3s)>0)
                {{ $sk3s[0]->seri_spmpkop }}
                @else

            @endif</td>
        </tr>
        <tr>
            <td>Tanggal : {{ $time_indo }}</td>
        </tr>
        <tr>
            <td>Halaman <b>1</b> dari <b>6</b></td>
        </tr>
    </table>
    <table style="width:100%; margin-top:110px;">
        <tr>
            <td style="width:50%">Koperasi</td>
            <td>: Koperasi Jasa Mitra Utama Bank Bengkulu</td>
        </tr>
        <tr>
            <td>Nomor Badan Hukum</td>
            <td>:</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: {{ $time_indo }}</td>
        </tr>
        <tr>
            <td>Nomor Induk Koperasi (NIK)</td>
            <td>:</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
        </tr>
        <tr>
            <td colspan="2">Pengurus</td>
        </tr>
        <tr>
            <td>Ketua</td>
            <td>:
                @if ($ketua != "")
                        {{ $ketua->nm_ketua_koperasi }}
                        @else
                            <a style="color:red"><i>tidak ada ketua koperasi aktif</i></a>
                @endif
            </td>
        </tr>
        <tr>
            <td>Sekretaris</td>
            <td>:</td>
        </tr>
        <tr>
            <td>Bendahara</td>
            <td>:</td>
        </tr>
    </table>

    <table style="width:100%; margin-top:110px; margin-bottom:20px;" class="top">
        <tr>
            <td align="center"><b>Pengalihan Ke : @if (count($sk3s)>0)
                {{ $sk3s[0]->perubahan_ke }}
            @endif</b></td>
        </tr>
        <tr>
            <td align="center">Seri Formulir Pengalihan :</td>
        </tr>
    </table>

    <table style="width:100%;" class="top">
        <tr>
            <td style="width:50%" align="center"><b>INVESTOR / PEMODAL</b></td>
            <td style="width:50%" align="center"><b>PENERIMA PENGALIHAN MODAL</b></td>
        </tr>
        <tr>
            <td>
                Nama	            :
                <br>
                Nomor KTP	        :
                <br>
                Register Investor	:
            <td>
                Nama	            :
                <br>
                Nomor KTP	        :
                <br>
                Register Investor	:
            </td>
            <tr>
                <td style="height:100;"></td>
                <td ></td>
            </tr>
        </tr>
    </table>

    <div class="page-break"></div>

    <table style="width:100%; margin-bottom:85px;" class="top">
        <tr>
           <td rowspan="3"></td>
           <td rowspan="3" style="width:260px;" align="center"><b>SURAT PERJANJIAN MODAL PENYERTAAN KOPERASI (SPMPKOP)</b></td>
           <td>Seri : @if (count($sk3s)>0)
            {{ $sk3s[0]->seri_spmpkop }}
           @endif</td>
        </tr>
        <tr>
            <td>Tanggal : {{ $time_indo }}</td>
        </tr>
        <tr>
            <td>Halaman <b>2</b> dari <b>6</b></td>
        </tr>
    </table>
    <div>
        <p style="width:100%; text-align:justify;">Pada hari ini …………………….. tanggal ………………………… bulan ………………….. tahun ……………………….. kami yang bertanda tangan dibawah ini :</p>
        <table style="width:100%">
            <tr>
                <td style="width:200px;">1. @if ($ketua != "")
                        {{ $ketua->nm_ketua_koperasi }}
                        @else
                            <a style="color:red"><i>tidak ada ketua koperasi aktif</i></a>
                    @endif
                </td>
                <td>Ketua Koperasi Jasa Mitra Utama Bank Bengkulu yang berkedudukan di Jalan Fatmawati Ruko Gading Regency No.10 Kota Bengkulu, dalam hal ini Bertindak untuk dan atas nama Koperasi Jasa Mitra Utama Bank Bengkulu, yang selanjutnya disebut PIHAK PERTAMA</p></td>
            </tr>
            <tr>
                <td style="width:200px;">2. @if ($ketua != "")
                    {{ $ketua->nm_ketua_koperasi }}
                            @else
                                <a style="color:red"><i>tidak ada ketua koperasi aktif</i></a>
                    @endif
                </td>
                <td><p>berkedudukan dijalan ………………………………………… dalam hal ini Bertindak untuk dan atas nama diri sendiri yang selanjutnya Sebut PIHAK KEDUA.</p></td>
            </tr>
        </table>
    </div>
    <p style="text-align:justify;">Dengan ini menyatakan bahwa PIHAK PERTAMA dan PIHAK KEDUA sepakat untuk mengadakan perjanjian penanaman modal penyertaan pada Koperasi Jasa Mitra Utama Bank Bengkulu, dengan ketentuan dan syarat – syarat sebagai berikut :</p>
    <table style="width:100%; text-align:justify; margin:0 0 30 0;">
        <tr>
            <td colspan="2" align="center"><b>Pasal 1 <br> Ruang Lingkup Perjanjian</b></td>
        </tr>
        <tr>
            <td align="center" style="width:8px;"><span class="sit-in-the-corner">(1)</span></td>
            <td>PIHAK PERTAMA telah menerima sejumlah uang tunai sebesar Rp. ………………..Sebagai Modal Penyertaan dari PIHAK KEDUA dan PIHAK KEDUA telah Menyerahkan kepada PIHAK PERTAMA uang tunai sebesar Rp. ……………… sebagai modal penyertaan pada koperasi. Untuk penerimaaan uang yang dimuat dalam perjanjian ini dan selanjutnya disebut SPMPKOP, berlaku sebagai tanda terima dan bukti kepemilikan bagi pemodal atas modal penyertaan pada Koperasi.</td>
        </tr>
        <tr>
            <td align="center" style="width:8px;"><span class="sit-in-the-corner">(2)</span></td>
            <td>SPMPKOP sebagaimana dimaksud ayat (1) dapat dialihkan kepada Investor / Pemodal lainnya dengan persetujuan PIHAK PERTAMA. Setelah melewati periode lock up yang ditetapkan yakni 1 tahun sejak tanggal penerbitan SPMPKOP.</td>
        </tr>
    </table>

    <table style="width:100%; text-align:justify; margin:0 0 30 0;">
        <tr>
            <td align="center"><b>Pasal 2 <br> Tujuan Penyertaan Modal</b></td>
        </tr>
        <tr>
            <td>Modal penyertaan sebagaimana dimaksud dalam Pasal 1 dipergunakan untuk membiayai kegiatan usaha Pembelian Saham Seri B Bank Bengkulu sesuai dengan rencana kegiatan usaha yang telah disetujui oleh PIHAK PERTAMA dan PIHAK KEDUA.</td>
        </tr>
    </table>

    <div class="page-break"></div>

    <table style="width:100%" class="top">
        <tr>
           <td rowspan="3"></td>
           <td rowspan="3" style="width:260px;" align="center"><b>SURAT PERJANJIAN MODAL PENYERTAAN KOPERASI (SPMPKOP)</b></td>
           <td>Seri : @if (count($sk3s)>0)
               {{ $sk3s[0]->seri_spmpkop }}
           @endif</td>
        </tr>
        <tr>
            <td>Tanggal : {{ $time_indo }}</td>
        </tr>
        <tr>
            <td>Halaman <b>3</b> dari <b>6</b></td>
        </tr>
    </table>

    <table style="width:100%; text-align:justify; margin:0 0 30 0;">
        <tr>
            <td align="center"><b>Pasal 3 <br> Pengawasan dan Pelaporan</b></td>
        </tr>
        <tr>
            <td>Pengawasan dan pelaporan kegiatan usaha Pembelian Saham Seri B Bank Bengkulu yang dibiayai modal Penyertaan dilakukan oleh PIHAK PERTAMA.</td>
        </tr>
    </table>

    <table style="width:100%; text-align:justify; margin:0 0 30 0;">
        <tr>
            <td align="center" colspan="2"><b>Pasal 4 <br> Pembagian Keuntungan</b></td>
        </tr>
        <tr>
            <td align="center" style="width:8px;"><span class="sit-in-the-corner">(1)</span></td>
            <td>PIHAK PERTAMA telah menerima sejumlah uang tunai sebesar Rp. ……………….. Sebagai Modal Penyertaan dari PIHAK KEDUA dan PIHAK KEDUA telah Menyerahkan kepada PIHAK PERTAMA uang tunai sebesar Rp. ……………… sebagai modal penyertaan pada koperasi. Untuk penerimaaan uang yang dimuat dalam perjanjian ini dan selanjutnya disebut SPMPKOP, berlaku sebagai tanda terima dan bukti kepemilikan bagi pemodal atas modal penyertaan pada Koperasi</td>
        </tr>
        <tr>
            <td align="center" style="width:8px;"><span class="sit-in-the-corner">(2)</span></td>
            <td>SPMPKOP sebagaimana dimaksud ayat (1) dapat dialihkan kepada Investor / Pemodal lainnya dengan persetujuan PIHAK PERTAMA. Setelah melewati periode lock up yang ditetapkan yakni 1 tahun sejak tanggal penerbitan SPMPKOP</td>
        </tr>
        <tr>
            <td align="center" style="width:8px;"><span class="sit-in-the-corner">(3)</span></td>
            <td>Pembayaran hasil investasi dalam bentuk tunai, akan dilakukan oleh Bank Bengkulu, atas instruksi PIHAK PERTAMA, melalui pemindahbukuan/transfer dalam mata uang Rupiah ke rekening Bank Bengkulu yang terdaftar atas nama PIHAK KEDUA pada tanggal yang ditetapkan</td>
        </tr>
    </table>


    <table style="width:100%; text-align:justify; margin:0 0 30 0;">
        <tr>
            <td align="center" colspan="2"><b>Pasal 5 <br> Hak dan Kewajiban</b></td>
        </tr>
        <tr>
            <td align="center" style="width:8px;"><span class="sit-in-the-corner">(1)</span></td>
            <td>PIHAK PERTAMA telah menerima sejumlah uang tunai sebesar Rp. ……………….. Sebagai Modal Penyertaan dari PIHAK KEDUA dan PIHAK KEDUA telah Menyerahkan kepada PIHAK PERTAMA uang tunai sebesar Rp. ……………… sebagai modal penyertaan pada koperasi. Untuk penerimaaan uang yang dimuat dalam perjanjian ini dan selanjutnya disebut SPMPKOP, berlaku sebagai tanda terima dan bukti kepemilikan bagi pemodal atas modal penyertaan pada Koperasi</td>
        </tr>
        <tr>
            <td align="center" style="width:8px;"><span class="sit-in-the-corner">(2)</span></td>
            <td>SPMPKOP sebagaimana dimaksud ayat (1) dapat dialihkan kepada Investor / Pemodal lainnya dengan persetujuan PIHAK PERTAMA. Setelah melewati periode lock up yang ditetapkan yakni 1 tahun sejak tanggal penerbitan SPMPKOP</td>
        </tr>
        <tr>
            <td align="center" style="width:8px;"><span class="sit-in-the-corner">(3)</span></td>
            <td>Pembayaran hasil investasi dalam bentuk tunai, akan dilakukan oleh Bank Bengkulu, atas instruksi PIHAK PERTAMA, melalui pemindahbukuan/transfer dalam mata uang Rupiah ke rekening Bank Bengkulu yang terdaftar atas nama PIHAK KEDUA pada tanggal yang ditetapkan</td>
        </tr>
    </table>

    <table style="width:100%; text-align:justify; margin:0 0 30 0;">
        <tr>
            <td align="center" colspan="2"><b>Pasal 5 <br> Hak dan Kewajiban</b></td>
        </tr>

    </table>

    <div class="page-break"></div>

    <table style="width:100%" class="top">
        <tr>
           <td rowspan="3"></td>
           <td rowspan="3" style="width:260px;" align="center"><b>SURAT PERJANJIAN MODAL PENYERTAAN KOPERASI (SPMPKOP)</b></td>
           <td>Seri : @if (count($sk3s)>0)
            {{ $sk3s[0]->seri_spmpkop }}
           @endif</td>
        </tr>
        <tr>
            <td>Tanggal : {{ $time_indo }}</td>
        </tr>
        <tr>
            <td>Halaman <b>4</b> dari <b>6</b></td>
        </tr>
    </table>

    <table style="width:100%; text-align:justify; margin:0 0 30 0;">
        <tr>
            <td rowspan="9" align="center" style="width:8px;"><span class="sit-in-the-corner">(1)</span></td>
            <td>PIHAK PERTAMA berhak dan berkewajiban :<br>
                a.	Wajib memberikan informasi yang jelas, lengkap, dan transparan mengenai kegiatan kerjasama penyertaan modal PIHAK KEDUA pada Koperasi (PIHAK PERTAMA), meliputi hal-hal sebagai berikut :<br>
                &nbsp;&nbsp;-&nbsp;&nbsp;Manfaat dan Resiko investasi penyertaan modal pada Koperasi.<br>
                &nbsp;&nbsp;-&nbsp;&nbsp;Skema transaksi dan alokasi nilai penyertaan modal pada Koperasi<br>
                &nbsp;&nbsp;-&nbsp;&nbsp;Alur / tahapan penyertaan modal Koperasi, termasuk mekanisme penjualan / pengalihan penyertaan modal Koperasi<br>
                &nbsp;&nbsp;-&nbsp;&nbsp;Biaya – biaya yang timbul dari adanya kegiatan penyertaan modal koperasi<br>
            </td>
        </tr>
        <tr>
            <td>b. Wajib melakukan Enhanced Due Diligence (EDD) yang mengacu kepada ketentuan Buku Pedoman Perusahaan tentang Penerapan Program APU dan PPT Bank Bengkulu, termasuk kelengkapan Profil Investor / pemodal.
        </tr>
        <tr>
            <td>c. Wajib memberikan konfirmasi final kepada PIHAK KEDUA tentang alokasi atau penjatahan atas penyertaan modal, dalam hal ini terkait penerbitan kepesertaan saham Bank.</td>
        </tr>
        <tr>
            <td>d. Wajib mengelola dana penyertaan modal koperasi dimaksud sesuai dengan kegiatan usaha Pembelian Saham Seri B Bank Bengkulu yang disetujui PIHAK KEDUA ;</td>
        </tr>
        <tr>
            <td>e. Wajib memberikan instruksi kepada Bank untuk keperluan transfer pembagian hasil investasi dalam setiap tahunnya</td>
        </tr>
        <tr>
            <td>f. Berhak memperoleh management fee pengelolaan dana sebagaimana tersebut, sesuai dengan ketentuan sebagaimana dimaksud pasal 4. Management fee ini selanjutnya dipergunakan sebagai biaya admin dan biaya lainnya yang diperlukan dalam pengelolaan dana penyetoran modal pada Koperasi</td>
        </tr>
        <tr>
            <td>g. Wajib memberikan informasi terkini kepada PIHAK KEDUA mengenai perkembangan bisnis dan kegiatan penyertaan modal koperasi, yang disampaikan secara periodik.</td>
        </tr>
        <tr>
            <td>h. Wajib membantu investor dalam penjualan / pengalihan modal penyertaan koperasi sesuai ketentuan yang berlaku.</td>
        </tr>
        <tr>
            <td>i. Wajib membantu menjawab pertanyaan Investor dan hal-hal lain yang dibutuhkan oleh Investor.</td>
        </tr>
        <tr>
            <td rowspan="5" align="center" style="width:8px;"><span class="sit-in-the-corner">(2)</span></td>
            <td>PIHAK KEDUA berhak dan berkewajiban : <br>
                a. Berhak memperoleh semua informasi yang dibutuhkan tentang penyertaan modal koperasi dari PIHAK PERTAMA, sesuai Pasal 5 ayat (1).a diatas.
            </td>
        </tr>
        <tr>
            <td>b. Wajib menandatangani lembar kepeminatan penyertaan modal koperasi termasuk melengkapi kelengkapan Profil Investor dan Enhanced Due Diligence (EDD) yang mengacu kepada ketentuan Buku Pedoman Perusahaan tentang Penerapan Program APU dan PPT Bank Bengkulu serta dokumen kelengkapan penyertaan modal koperasi lainnya</td>
        </tr>
        <tr>
            <td>c. Berhak memperoleh konfirmasi final tentang alokasi atau penjatahan atas penyertaan modal, dalam hal ini penerbitan kepesertaan saham Bank dari PIHAK PERTAMA.</td>
        </tr>
        <tr>
            <td>d. Berhak Memperoleh bagian keuntungan atau hasil investasi, sesuai dengan ketentuan sebagaimana dimaksud Pasal 4.</td>
        </tr>
        <tr>
            <td>e. Atas segala biaya yang timbul terkait biaya admin, meterai, biaya transfer, Management fee dan biaya lainnya yang timbul dari adanya pengalihan SPMPKOP menjadi bebas PIHAK KEDUA.</td>
        </tr>
    </table>

    <div class="page-break"></div>

    <table style="width:100%;" class="top">
        <tr>
           <td rowspan="3"></td>
           <td rowspan="3" style="width:260px;" align="center"><b>SURAT PERJANJIAN MODAL PENYERTAAN KOPERASI (SPMPKOP)</b></td>
           <td>Seri : @if (count($sk3s)>0)
            {{ $sk3s[0]->seri_spmpkop }}
           @endif</td>
        </tr>
        <tr>
            <td>Tanggal : {{ $time_indo }}</td>
        </tr>
        <tr>
            <td>Halaman <b>5</b> dari <b>6</b></td>
        </tr>
    </table>

    <table style="width:100%; text-align:justify; margin:0 0 30 0;">
        <tr>
            <td rowspan="3" align="center" style="width:8px;"><span class="sit-in-the-corner">(2)</span></td>
            <td>f. Berhak melakukan penjualan / pengalihan modal penyertaan koperasi sesuai dengan syarat dan ketentuan yang berlaku, dengan pemberitahuan tertulis dan persetujuan dari Koperasi.</td>
        </tr>
        <tr>
            <td>g. Berhak memperoleh informasi terkini mengenai perkembangan kegiatan penyertaan modal koperasi yang dikelola PIHAK PERTAMA, yang disampaikan secara periodik.</td>
        </tr>
        <tr>
            <td>h. Memiliki hak untuk hadir dalam Rapat Anggota Tahunan (RAT) Koperasi, namun tidak memiliki hak suara dalam Rapat Anggota Tahunan (RAT) Koperasi.</td>
        </tr>
    </table>

    <table style="width:100%; text-align:justify; margin:0 0 30 0;">
        <tr>
            <td align="center" colspan="2"><b>Pasal 6<br> Penyelesaian Perselisihan</b></td>
        </tr>
        <tr>
            <td align="center" style="width:8px;"><span class="sit-in-the-corner">(1)</span></td>
            <td>Jika terjadi perselisihan dalam pelaksaaan Perjanjian ini diusahakan untuk diupayakan penyelesaiannya melalui musyawarah untuk mufakat.</td>
        </tr>
        <tr>
            <td align="center" style="width:8px;"><span class="sit-in-the-corner">(2)</span></td>
            <td>Apabila tidak tercapai kesepakatan dalam musyawarah dan mufakat sebagaimana dimaksud ayat (1), maka dapat diselesaikan melalui Badan Arbitrase atau sesuai dengan hukum yang berlaku dengan memilih tempat di Pengadilan Negeri Kota Bengkulu. </td>
        </tr>
    </table>

    <table style="width:100%; text-align:justify; margin:0 0 30 0;">
        <tr>
            <td align="center" colspan="2"><b>Pasal 7<br> Pemberitahuan Dan Korespondensi</b></td>
        </tr>
        <tr>
            <td rowspan="3" align="center" style="width:5px !important;"><span class="sit-in-the-corner">(1)</span></td>
            <td>Penanggung jawab atas kewajiban masing-masing PIHAK yang dapat dihubungi sehubungan dengan Perjanjian adalah :</td>
        </tr>
        <tr>
            <td>
                <b>PIHAK PERTAMA</b><br>
                Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<br>
                Nomor Telp &nbsp;&nbsp;&nbsp;:<br>
                Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
            </td>
        </tr>
        <tr>
            <td>
                <b>PIHAK KEDUA</b><br>
                Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<br>
                Nomor Telp &nbsp;&nbsp;&nbsp;:<br>
                Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
            </td>
        </tr>
        <tr>
            <td align="center" style="width:5px !important;"><span class="sit-in-the-corner">(2)</span></td>
            <td>Apabila terjadi perubahan alamat surat-menyurat / korespondensi, maka Para Pihak dapat segera memberitahukan secara tertulis kepada PIHAK lainnya dan akan berlaku dengan adanya tanda terima atas pemberitahuan tersebut.</td>
        </tr>
    </table>
    <table style="width:100%; text-align:justify; margin:0 0 30 0;">
        <tr>
            <td align="center" colspan="2"><b>Pasal 8 <br> Lain lain</b></td>
        </tr>
        <tr>
            <td align="center" style="width:8px;"><span class="sit-in-the-corner">(1)</span></td>
            <td>SPMKOP ini mulai berlaku sejak ditandatangai oleh PIHAK PERTAMA dan PIHAK KEDUA, dibuat dalam 2 rangkap dan dibubuhi materai secukupnya serta disimpan oleh PARA PIHAK.</td>
        </tr>
    </table>

    <div class="page-break"></div>

    <table style="width:100%;" class="top">
        <tr>
           <td rowspan="3"></td>
           <td rowspan="3" style="width:260px;" align="center"><b>SURAT PERJANJIAN MODAL PENYERTAAN KOPERASI (SPMPKOP)</b></td>
           <td>Seri : @if (count($sk3s)>0)
               {{ $sk3s[0]->seri_spmpkop }}
           @endif</td>
        </tr>
        <tr>
            <td>Tanggal : {{ $time_indo }}</td>
        </tr>
        <tr>
            <td>Halaman <b>6</b> dari <b>6</b></td>
        </tr>
    </table>

    <table style="width:100%; margin:20 0 0 0;" >
        <tr>
            <td style="width:50%;" align="center"><b>PIHAK PERTAMA<br>Koperasi Jasa Mitra Utama Bank Bengkulu </b></td>
            <td style="width:50%;" align="center"><b>PIHAK KEDUA<br>Investor / Pemodal</b></td>
        </tr>
        <tr>
            <td style="height:120px;"></td>
            <td style="height:120px;"></td>
        </tr>
        <tr>
            <td align="center"><b><u>(
                @if ($ketua != "")
                        {{ $ketua->nm_ketua_koperasi }}
                        @else
                            <a style="color:red"><i>tidak ada ketua koperasi aktif</i></a>
                @endif
            )</u></b></td>
            <td align="center"><b><u>(@if (count($sk3s)>0)
                {{ $sk3s[0]->nm_investor }}
            @endif)</u></b></td>
        </tr>
        <tr>
            <td align="center"><b>Ketua</b></td>
            <td align="center"><b>Investor</b></td>
        </tr>
    </table>



</body>
</html>
