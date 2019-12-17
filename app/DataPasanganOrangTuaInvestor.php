<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPasanganOrangTuaInvestor extends Model
{
    protected $fillable = ['investor_id','nm_pasangan_atau_orang_tua','hubungan','alamat_tempat_tinggal_pasangan_atau_orang_tua','telp_rumah_pasangan_atau_orang_tua','ponsel_pasangan_atau_orang_tua','pekerjaan_pasangan_atau_orang_tua','nm_perusahaan_pasangan_atau_orang_tua','alamat_perusahaan_pasangan_atau_orang_tua','kota_perusahaan_pasangan_atau_orang_tua','provinsi_perusahaan_pasangan_atau_orang_tua','kode_pos_perusahaan_pasangan_atau_orang_tua','telp_perusahaan_pasangan_atau_orang_tua','email_perusahaan_pasangan_atau_orang_tua','fax_perusahaan_pasangan_atau_orang_tua','jabatan_pasangan_atau_orang_tua','jenis_usaha_pasangan_atau_orang_tua','lama_bekerja_pasangan_atau_orang_tua','penghasilan_kotor_per_tahub','sumber_penghasilan_utama_pasangan_atau_orang_tua'];
}
