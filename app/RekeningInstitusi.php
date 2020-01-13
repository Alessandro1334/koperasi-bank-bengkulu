<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekeningInstitusi extends Model
{
    protected $fillable = [
        'nm_investor','no_register','no_cif','agen_pemasaran_id','pejabat_berwenang_1','pejabat_berwenang_2',
        'nm_institusi','kota_institusi','provinsi_institusi','negara_institusi',
        'kode_pos_institusi','email_kantor','telephone_kantor','domisili','tipe_perusahaan',
        'karakteristik','bidang_usaha','no_akta_pendirian','tanggal_akta_pendirian','no_akta_perubahan_terakhir','tanggal_akta_perubahan_terakhir',
        'no_npwp','tgl_registrasi_npwp','no_siup','tgl_kadaluarsa_siup','no_skdp','tgl_kadaluarsa_skdp','no_tdp','tanggal_kadaluarsa_tdp',
        'no_izin_pma','status_verifikasi'
    ];
}
