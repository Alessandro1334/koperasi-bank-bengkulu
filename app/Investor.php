<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    protected $fillable = ['nm_investor','jenis_rekening','profil_resiko_nasabah',
    'staf_pemasaran','jenis_kelamin','no_ktp',
    'tgl_kadaluarsa_ktp','no_npwp','tgl_kadaluarsa_npwp','tempat_lahir',
    'tanggal_lahir','status_perkawinan','kewarganegaraan','alamat_ktp',
    'rt_ktp','rw_ktp','kecamatan_ktp','kelurahan_ktp','kota_ktp',
    'provinsi_ktp','kode_pos_ktp','alamat_tempat_tinggal',
    'rt_tempat_tinggal','rw_tempat_tinggal','kecamatan_tempat_tinggal',
    'kelurahan_tempat_tinggal','kota_tempat_tinggal','provinsi_tempat_tinggal',
    'kode_pos_tempat_tinggal','telp_rumah','ponsel','lama_menempati',
    'status_rumah_tinggal','agama','pendidikan_terakhir','nm_gadis_ibu_kandung',
    'emergency_kontak','jumlah_tanggungan','alamat_surat_menyurat_ktp','alamat_surat_menyurat_tempat_tinggal',
    'alamat_surat_menyurat_lainnya','pengiriman_konfirmasi_melalui_email',
    'pengiriman_konfirmasi_melalui_fax','pengiriman_konfirmasi_melalui_alamat_surat_menyurat',
    'tujuan_investasi'];
}
