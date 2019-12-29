<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak SK3S</title>
</head>
<body background: -moz-repeating-linear-gradient(red, blue 20px, red 40px)>
    <style>
        table, th, td {
            /* border: 0.5px solid black; */
        }

        img {
            opacity: 0.6;
        }
    </style>
    <table style="width:100%">
        <tr>
            <td rowspan="2" align="bottom" style="width:250px;">
                <font style=font-size:12pt face="Times New Roman" color=#000000>Seri SPMPKOP    :   {{ $sk3s[0]->seri_spmpkop }}</font><br>
                <font style=font-size:12pt face="Times New Roman" color=#000000>Seri FORMULIR    :   {{ $sk3s[0]->seri_formulir }}</font>
            </td>
            <td rowspan="2" align="" width="60"><img src="{{ asset('img/Koperasi.png') }}" width="80"></td>
            <td rowspan="2" align="" width="60"><img src="{{ asset('img/BankBengkulu.png') }}" width="80"></td>
            <td rowspan="2" align="center">Seri SK3S : R182206/IX/2019</td>
        </tr>
    </table>
    <p align="center" style="font-size: 13pt; margin:50 0 60 0;">KOPERASI KARYAWAN JASA MITRA UTAMA BANK BENGKULU</p>
    <h2 align="center" style="font-size: 16pt; margin:0 0 80 0;"><b>SURAT KETERANGAN KEPESERTAAN KEPEMILIKAN SAHAM (S3K3S)</b></h2>
    <h1 align="center" style="font-size: 20pt;">{{ strtoupper('EMPAT MILIYAR RUPIAH')  }}</h1>
    <h2 align="center" style="font-size: 16pt; margin:0 0 60 0;"> Rp. 4.000.000.000  </h2>

    <div align="center" style="margin:0 0 80 0;">
        <h1><b><u>Novita Novita Wulandari</u></b></h1>
        <h3>Register : P30072019291088</h3>
    </div>

    <table style="width:100%">
        <tr>
            <td rowspan="5" align="left" width="300"><img src="{{ asset('img/qrcode.png') }}" style="margin-left:50px" width="120"></td>
            <td align="left">Ditetapkan tanggal : 14 November 2019 <br>
                Perubahan Ke-
            </td>
        </tr>
        <tr>
            <td rowspan="4" align="center">
                <p style="font-size: 13pt; margin:0 0 35 0;">Ketua Koperasi</p> 
                <br>
                <h3 style="font-size: 13pt">M. Mukti Husni</h3>
            </td>
        </tr>
    </table>
</body>
</html>