<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Investor;
use App\PekerjaanInvestor;
use App\DokumenPendukungInvestor;
use App\DataPasanganOrangTuaInvestor;
use App\Persetujuan;

class FormPembukaanRekening extends Controller
{
    public function index(){
        $investors = Investor::select('nm_investor','kode_nasabah','no_cif','jenis_kelamin','no_ktp')->get();
        // return $investors;
        return view('operator/form_pembukaan_rekening.index',compact('investors'));
    }

    public function tambahInvestor(){
        return view('operator/form_pembukaan_rekening.create');
    }

    public function tambahInvestorPost(Request $request){
        // return $request->all();
        $investor = new Investor;
        $investor->no_register = $request->no_register;
        $investor->nm_investor = $request->nm_investor;
        $investor->kode_nasabah = $request->kode_nasabah;
        $investor->no_cif = $request->no_cif;
        $investor->staf_pemasaran_id = $request->staf_pemasaran_id;
        $investor->jenis_kelamin = $request->jenis_kelamin;
        $investor->no_ktp = $request->no_ktp;
        $investor->tgl_kadaluarsa_ktp = $request->tgl_kadaluarsa_ktp;
        $investor->no_npwp = $request->no_npwp;
        $investor->tgl_registrasi_npwp = $request->tgl_registrasi_npwp;
        $investor->tempat_lahir = $request->tempat_lahir;
        $investor->tanggal_lahir = $request->tanggal_lahir;
        $investor->status_perkawinan = $request->status_perkawinan;
        $investor->kewarganegaraan = $request->kewarganegaraan;
        $investor->alamat_ktp = $request->alamat_ktp;
        $investor->rt_ktp = $request->rt_ktp;
        $investor->rw_ktp = $request->rw_ktp;
        $investor->kecamatan_ktp = $request->kecamatan_ktp;
        $investor->kelurahan_ktp = $request->kelurahan_ktp;
        $investor->kota_ktp = $request->kota_ktp;
        $investor->provinsi_ktp = $request->provinsi_ktp;
        $investor->kode_pos_ktp = $request->kode_pos_ktp;
        $investor->alamat_tempat_tinggal = $request->alamat_tempat_tinggal;
        $investor->rt_tempat_tinggal = $request->rt_tempat_tinggal;
        $investor->rw_tempat_tinggal = $request->rw_tempat_tinggal;
        $investor->kecamatan_tempat_tinggal = $request->kecamatan_tempat_tinggal;
        $investor->kelurahan_tempat_tinggal = $request->kelurahan_tempat_tinggal;
        $investor->kota_tempat_tinggal = $request->kota_tempat_tinggal;
        $investor->provinsi_tempat_tinggal = $request->provinsi_tempat_tinggal;
        $investor->kode_pos_tempat_tinggal = $request->kode_pos_tempat_tinggal;
        $investor->telp_rumah = $request->telp_rumah;
        $investor->ponsel = $request->ponsel;
        $investor->lama_menempati = $request->lama_menempati;
        $investor->status_rumah_tinggal = $request->status_rumah_tinggal;
        $investor->agama = $request->agama;
        $investor->pendidikan_terakhir = $request->pendidikan_terakhir;
        $investor->nm_gadis_ibu_kandung = $request->nm_gadis_ibu_kandung;
        $investor->emergency_kontak = $request->emergency_kontak;
        $investor->jumlah_tanggungan = $request->jumlah_tanggungan;
        $investor->alamat_surat_menyurat_ktp = $request->alamat_surat_menyurat_ktp;
        $investor->alamat_surat_menyurat_tempat_tinggal = $request->alamat_surat_menyurat_tempat_tinggal;
        $investor->alamat_surat_menyurat_lainnya = $request->alamat_surat_menyurat_lainnya;
        $investor->pengiriman_konfirmasi_melalui_email = $request->pengiriman_konfirmasi_melalui_email;
        $investor->pengiriman_konfirmasi_melalui_fax = $request->pengiriman_konfirmasi_melalui_fax;
        $investor->pengiriman_konfirmasi_melalui_alamat_surat_menyurat = $request->pengiriman_konfirmasi_melalui_alamat_surat_menyurat;
        $investor->tujuan_investasi = $request->tujuan_investasi;
        $investor->save();

        $last = Investor::latest()->select('id')->first();

        $pekerjaan = new PekerjaanInvestor;
        $pekerjaan->investor_id = $last->id;
        $pekerjaan->pekerjaan = $request->pekerjaan;
        $pekerjaan->nm_perusahaan = $request->nm_perusahaan;
        $pekerjaan->alamat_perusahaan = $request->alamat_perusahaan;
        $pekerjaan->kota_perusahaan = $request->kota_perusahaan;
        $pekerjaan->alamat_perusahaan = $request->alamat_perusahaan;
        $pekerjaan->kota_perusahaan = $request->kota_perusahaan;
        $pekerjaan->provinsi_perusahaan = $request->provinsi_perusahaan;
        $pekerjaan->kode_pos_perusahaan = $request->kode_pos_perusahaan;
        $pekerjaan->telp_perusahaan = $request->telp_perusahaan;
        $pekerjaan->email_perusahaan = $request->email_perusahanm;
        $pekerjaan->fax_perusahaan = $request->fax_perusahaan;
        $pekerjaan->jabatan = $request->jabatan;
        $pekerjaan->jenis_usaha = $request->jenis_usaha;
        $pekerjaan->lama_bekerja = $request->lama_bekerja;
        $pekerjaan->sumber_penghasilan_utama = $request->sumber_penghasilan_utama;
        $pekerjaan->penghasilan_lain = $request->penghasilan_lain;
        $pekerjaan->sumber_penghasilan_lainnya = $request->sumber_penghasilan_lainnya;
        $pekerjaan->sumber_dana_investasi = $request->sumber_dana_investasi;
        $pekerjaan->save();

        $pasangan = new DataPasanganOrangTuaInvestor;
        $pasangan->investor_id = $last->id;
        $pasangan->nm_pasangan_atau_orang_tua = $request->nm_pasangan_atau_orang_tua;
        $pasangan->hubungan = $request->hubungan;
        $pasangan->alamat_tempat_tinggal_pasangan_atau_orang_tua = $request->alamat_tempat_tinggal_pasangan_atau_orang_tua;
        $pasangan->telp_rumah_pasangan_atau_orang_tua = $request->telp_rumah_pasangan_atau_orang_tua;
        $pasangan->ponsel_pasangan_atau_orang_tua = $request->ponsel_pasangan_atau_orang_tua;
        $pasangan->pekerjaan_pasangan_atau_orang_tua = $request->pekerjaan_pasangan_atau_orang_tua;
        $pasangan->alamat_perusahaan_pasangan_atau_orang_tua = $request->alamat_perusahaan_pasangan_atau_orang_tua;
        $pasangan->kota_perusahaan_pasangan_atau_orang_tua = $request->kota_perusahaan_pasangan_atau_orang_tua;
        $pasangan->provinsi_perusahaan_pasangan_atau_orang_tua = $request->provinsi_perusahaan_pasangan_atau_orang_tua;
        $pasangan->kode_pos_perusahaan_pasangan_atau_orang_tua = $request->kode_pos_perusahaan_pasangan_atau_orang_tua;
        $pasangan->telp_perusahaan_pasangan_atau_orang_tua = $request->telp_perusahaan_pasangan_atau_orang_tua;
        $pasangan->email_perusahaan_pasangan_atau_orang_tua = $request->email_perusahaan_pasangan_atau_orang_tua;
        $pasangan->fax_perusahaan_pasangan_atau_orang_tua = $request->fax_perusahaan_pasangan_atau_orang_tua;
        $pasangan->jabatan_pasangan_atau_orang_tua = $request->jabatan_pasangan_atau_orang_tua;
        $pasangan->jenis_usaha_pasangan_atau_orang_tua = $request->jenis_usaha_pasangan_atau_orang_tua;
        $pasangan->lama_bekerja_pasangan_atau_orang_tua = $request->lama_bekerja_pasangan_atau_orang_tua;
        $pasangan->penghasilan_kotor_per_tahun_pasangan_atau_orang_tua = $request->penghasilan_kotor_per_tahun_pasangan_atau_orang_tua;
        $pasangan->sumber_penghasilan_utama_pasangan_atau_orang_tua = $request->sumber_penghasilan_utama_pasangan_atau_orang_tua;
        $pasangan->save();

        $dokumen = new DokumenPendukungInvestor;
        $dokumen->investor_id = $last->id;
        $dokumen->ktp = $request->ktp;
        $dokumen->npwp = $request->npwp;
        $dokumen->form_profil_resiko_pemodal = $request->form_profil_resiko_pemodal;
        $dokumen->bukti_setoran_investasi_awal = $request->bukti_setoran_investasi_awal;
        $dokumen->contoh_tanda_tangan = $request->contoh_tanda_tangan;
        $dokumen->fatca = $request->fatca;
        $dokumen->save();

        $persetujuan = new Persetujuan;
        $dokumen->investor_id = $last->id;
        $dokumen->nm_agen_pemasaran = $request->nm_agen_pemasaran;
        $dokumen->tanda_tangan_agen_pemasaran = $request->tanda_tangan_agen_pemasaran;
        $dokumen->tanggal_agen_pemasaran = $request->tanggal_agen_pemasaran;
        $dokumen->nm_pejabat_berwenang = $request->nm_pejabat_berwenang;
        $dokumen->status_persetujuan = $request->status_persetujuan;
        $dokumen->tanda_tangan_pejabat_berwenang = $request->tanda_tangan_pejabat_berwenang;
        $dokumen->tanggal_pejabat_berwenang = $request->tanggal_pejabat_berwenang;

        return redirect()->route('operator.form_pembukaan_rekening')->with(['success'   =>  'Formulir Pembukaan Rekening Berhasil Ditambahkan !!']);
    }
}
