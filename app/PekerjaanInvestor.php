<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PekerjaanInvestor extends Model
{
    protected $fillable = ['investor_id','pekerjaan','nm_perusahaan','alamat_perusahaan','kota_perusahaan','provinsi_perusahaan','kode_post_perusahaan','telp_perusaahaan','email_perusahaan','fax_perusahaan','jabatan','jenis_usaha','lama_bekerja','sumber_penghasilan_utama','penghasilan_lain','sumber_penghasilan_lainnya','sumber_dana_investasi'];
}
