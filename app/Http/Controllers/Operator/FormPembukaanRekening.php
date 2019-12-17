<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Investor;

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

        $last = Invester::latest()->select('id')->first();
        return $last;
        // $dokumen = new DokumenPendukungInvestor;
        // $dokumen->investor_id =
    }
}
