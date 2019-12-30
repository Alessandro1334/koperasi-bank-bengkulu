<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Investor;
use App\SahamInvestor;
use App\SahamInstitusi;
use App\RekeningInstitusi;
use App\PekerjaanInvestor;
use App\DataPasanganOrangTuaInvestor;
use App\DokumenPendukungInvestor;
use App\Persetujuan;
use App\PemegangSahamInstitusi;
use App\InstruksiPembayaraniInstitusi;
use App\PenerimaKuasaTransaksiInstitusi;
use App\SusunanKomisarisInstitusi;
use App\SusunanDireksiInstitusi;
use App\DataKeuanganiInstitusi;
use App\DokumenPendukungInstitusi;
use Excel;

class BackupDataController extends Controller
{
    public function index(){
        return view('operator/backup_data.index');
    }

    public function eksport(){
        $data_investor = Investor::leftJoin('ahli_waris_investors','ahli_waris_investors.investor_id','investors.id')
        ->leftJoin('data_pasangan_orang_tua_investors','data_pasangan_orang_tua_investors.investor_id','investors.id')
        ->leftJoin('dokumen_pendukung_investors','dokumen_pendukung_investors.investor_id','investors.id')
        ->leftJoin('persetujuans','persetujuans.investor_id','investors.id')
        ->leftJoin('pekerjaan_investors','pekerjaan_investors.investor_id','investors.id')
        ->select('no_register','investor_id','nm_investor','jenis_rekening','profil_resiko_nasabah','staf_pemasaran_id','jenis_kelamin',
        'no_ktp','tgl_kadaluarsa_ktp','no_npwp','tgl_registrasi_npwp','tempat_lahir','tanggal_lahir','status_perkawinan','kewarganegaraan',
        'alamat_ktp','rt_ktp','rw_ktp','kecamatan_ktp','kelurahan_ktp','kota_ktp','provinsi_ktp','kode_pos_ktp','alamat_tempat_tinggal',
        'rt_tempat_tinggal','rw_tempat_tinggal','kecamatan_tempat_tinggal','kelurahan_tempat_tinggal','kota_tempat_tinggal','provinsi_tempat_tinggal',
        'kode_pos_tempat_tinggal','telp_rumah','ponsel','lama_menempati','status_rumah_tinggal','agama','pendidikan_terakhir','nm_gadis_ibu_kandung',
        'emergency_kontak','jumlah_tanggungan','alamat_surat_menyurat_ktp','alamat_surat_menyurat_tempat_tinggal','alamat_surat_menyurat_lainnya',
        'pengiriman_konfirmasi_melalui_email','pengiriman_konfirmasi_melalui_fax','pengiriman_konfirmasi_melalui_alamat_surat_menyurat','tujuan_investasi',
        'nm_ahli_waris','hubungan_ahli_waris','nm_pasangan_atau_orang_tua','hubungan','alamat_tempat_tinggal_pasangan_atau_orang_tua','telp_rumah_pasangan_atau_orang_tua',
        'ponsel_pasangan_atau_orang_tua','pekerjaan_pasangan_atau_orang_tua','nm_perusahaan_pasangan_atau_orang_tua','alamat_perusahaan_pasangan_atau_orang_tua',
        'kota_perusahaan_pasangan_atau_orang_tua','provinsi_perusahaan_pasangan_atau_orang_tua','kode_pos_perusahaan_pasangan_atau_orang_tua','telp_rumah_pasangan_atau_orang_tua','email_perusahaan_pasangan_atau_orang_tua',
        'fax_perusahaan_pasangan_atau_orang_tua','jabatan_pasangan_atau_orang_tua','jenis_usaha_pasangan_atau_orang_tua','lama_bekerja_pasangan_atau_orang_tua',
        'penghasilan_kotor_per_tahun_pasangan_atau_orang_tua','sumber_penghasilan_utama_pasangan_atau_orang_tua','ktp','npwp','form_profil_resiko_pemodal','bukti_setoran_investasi_awal','contoh_tanda_tangan',
        'fatca','pekerjaan','sumber_penghasilan_lainnya','sumber_dana_investasi','agen_pemasaran_id','tanda_tangan_agen_pemasaran','pendidikan_terakhir','tanda_tangan_pejabat_berwenang','tanggal_agen_pemasaran','pejabat_berwenang_id','status_persetujuan',
        'tanggal_pejabat_berwenang')
        ->get();
        // return $data_investor;
        return Excel::create('data_investor', function($excel) use ($data_investor){
            $excel->sheet('data_investr', function($sheet) use ($data_investor){
                $sheet->fromArray($data_investor);
            });
        })->download('xls');
        return redirect('operator.backup_data')->with(['success'    =>  'Data Berhasil Di Upload !!']);
    }

    public function eksportSahamPerorangan(){
        $data_saham_perorangan = SahamInvestor::all();
        // return $data_saham_perorangan;
        return Excel::create('data_saham_perorangan', function($excel) use ($data_saham_perorangan){
            $excel->sheet('data_investr', function($sheet) use ($data_saham_perorangan){
                $sheet->fromArray($data_saham_perorangan);
            });
        })->download('xls');
        return redirect('operator.backup_data')->with(['success'    =>  'Data Berhasil Di Upload !!']);
    }

    public function eksportSahamNonperorangan(){
        $data_saham_nonperorangan = SahamInstitusi::all();
        // return $data_saham_perorangan;
        return Excel::create('data_saham_nonperorangan', function($excel) use ($data_saham_nonperorangan){
            $excel->sheet('data_investr', function($sheet) use ($data_saham_nonperorangan){
                $sheet->fromArray($data_saham_nonperorangan);
            });
        })->download('xls');
        return redirect('operator.backup_data')->with(['success'    =>  'Data Berhasil Di Upload !!']);
    }

    public function eksportInstitusi(){
        $institusi = RekeningInstitusi::leftJoin('data_keuangani_institusis','data_keuangani_institusis.institusi_id','rekening_institusis.id')
                                        ->leftJoin('dokumen_pendukung_institusis','dokumen_pendukung_institusis.institusi_id','rekening_institusis.id')
                                        ->leftJoin('instruksi_pembayarani_institusis','instruksi_pembayarani_institusis.institusi_id','rekening_institusis.id')
                                        ->leftJoin('pemegang_saham_institusis','pemegang_saham_institusis.institusi_id','rekening_institusis.id')
                                        ->leftJoin('penerima_kuasa_transaksi_institusis','penerima_kuasa_transaksi_institusis.institusi_id','rekening_institusis.id')
                                        ->leftJoin('susunan_direksi_institusis','susunan_direksi_institusis.institusi_id','rekening_institusis.id')
                                        ->leftJoin('susunan_komisaris_institusis','susunan_komisaris_institusis.institusi_id','rekening_institusis.id')
                                        ->get();
        // return $institusi;
        return Excel::create('institusi', function($excel) use ($institusi){
            $excel->sheet('data_investr', function($sheet) use ($institusi){
                $sheet->fromArray($institusi);
            });
        })->download('xls');
        return redirect('operator.backup_data')->with(['success'    =>  'Data Berhasil Di Upload !!']);
    }

    public function import(Request $request){
        if($request->opsi == "individual"){
            if($request->hasFile('file')){
                $path = $request->file('file')->getRealPath();
                $data = Excel::load($path, function($reader){})->get();
                if(!empty($data) && $data->count()){
                    foreach ($data as $key => $value) {
                        $investor = new Investor;
                        $investor->no_register   =  $value->no_register;
                        $investor->nm_investor   =  $value->nm_investor;
                        $investor->jenis_rekening   =  $value->jenis_rekening;
                        $investor->profil_resiko_nasabah   =  $value->profil_resiko_nasabah;
                        $investor->staf_pemasaran_id   =  $value->staf_pemasaran_id;
                        $investor->jenis_kelamin   =  $value->jenis_kelamin;
                        $investor->no_ktp   =  $value->no_ktp;
                        $investor->tgl_kadaluarsa_ktp   =  $value->tgl_kadaluarsa_ktp;
                        $investor->no_npwp   =  $value->no_npwp;
                        $investor->tgl_registrasi_npwp   =  $value->tgl_registrasi_npwp;
                        $investor->tempat_lahir   =  $value->tempat_lahir;
                        $investor->tanggal_lahir   =  $value->tanggal_lahir;
                        $investor->status_perkawinan   =  $value->status_perkawinan;
                        $investor->kewarganegaraan   =  $value->kewarganegaraan;
                        $investor->alamat_ktp   =  $value->alamat_ktp;
                        $investor->rt_ktp   =  $value->rt_ktp;
                        $investor->rw_ktp   =  $value->rw_ktp;
                        $investor->kecamatan_ktp   =  $value->kecamatan_ktp;
                        $investor->kelurahan_ktp   =  $value->kelurahan_ktp;
                        $investor->kota_ktp   =  $value->kota_ktp;
                        $investor->provinsi_ktp   =  $value->provinsi_ktp;
                        $investor->kode_pos_ktp   =  $value->kode_pos_ktp;
                        $investor->alamat_tempat_tinggal   =  $value->alamat_tempat_tinggal;
                        $investor->rt_tempat_tinggal   =  $value->rt_tempat_tinggal;
                        $investor->rw_tempat_tinggal   =  $value->rw_tempat_tinggal;
                        $investor->kecamatan_tempat_tinggal   =  $value->kecamatan_tempat_tinggal;
                        $investor->kelurahan_tempat_tinggal   =  $value->kelurahan_tempat_tinggal;
                        $investor->kota_tempat_tinggal   =  $value->kota_tempat_tinggal;
                        $investor->provinsi_tempat_tinggal   =  $value->provinsi_tempat_tinggal;
                        $investor->kode_pos_tempat_tinggal   =  $value->kode_pos_tempat_tinggal;
                        $investor->telp_rumah   =  $value->telp_rumah;
                        $investor->ponsel   =  $value->ponsel;
                        $investor->lama_menempati   =  $value->lama_menempati;
                        $investor->status_rumah_tinggal   =  $value->status_rumah_tinggal;
                        $investor->agama   =  $value->agama;
                        $investor->pendidikan_terakhir   =  $value->pendidikan_terakhir;
                        $investor->nm_gadis_ibu_kandung   =  $value->nm_gadis_ibu_kandung;
                        $investor->emergency_kontak   =  $value->emergency_kontak;
                        $investor->jumlah_tanggungan   =  $value->jumlah_tanggungan;
                        $investor->alamat_surat_menyurat_ktp   =  $value->alamat_surat_menyurat_ktp;
                        $investor->alamat_surat_menyurat_tempat_tinggal   =  $value->alamat_surat_menyurat_tempat_tinggal;
                        $investor->alamat_surat_menyurat_lainnya   =  $value->alamat_surat_menyurat_lainnya;
                        $investor->pengiriman_konfirmasi_melalui_email   =  $value->pengiriman_konfirmasi_melalui_email;
                        $investor->pengiriman_konfirmasi_melalui_fax   =  $value->pengiriman_konfirmasi_melalui_fax;
                        $investor->pengiriman_konfirmasi_melalui_alamat_surat_menyurat   =  $value->pengiriman_konfirmasi_melalui_alamat_surat_menyurat;
                        $investor->tujuan_investasi   =  $value->tujuan_investasi;
                        $investor->save();

                        $pekerjaan = new PekerjaanInvestor;
                        $pekerjaan->investor_id =   $value->investor_id;
                        $pekerjaan->pekerjaan = $value->pekerjaan;
                        $pekerjaan->nm_perusahaan = $value->nm_perusahaan;
                        $pekerjaan->alamat_perusahaan = $value->alamat_perusahaan;
                        $pekerjaan->kota_perusahaan = $value->kota_perusahaan;
                        $pekerjaan->alamat_perusahaan = $value->alamat_perusahaan;
                        $pekerjaan->kota_perusahaan = $value->kota_perusahaan;
                        $pekerjaan->provinsi_perusahaan = $value->provinsi_perusahaan;
                        $pekerjaan->kode_pos_perusahaan = $value->kode_pos_perusahaan;
                        $pekerjaan->telp_perusahaan = $value->telp_perusahaan;
                        $pekerjaan->email_perusahaan = $value->email_perusahanm;
                        $pekerjaan->fax_perusahaan = $value->fax_perusahaan;
                        $pekerjaan->jabatan = $value->jabatan;
                        $pekerjaan->jenis_usaha = $value->jenis_usaha;
                        $pekerjaan->lama_bekerja = $value->lama_bekerja;
                        $pekerjaan->sumber_penghasilan_utama = $value->sumber_penghasilan_utama;
                        $pekerjaan->penghasilan_lain = $value->penghasilan_lain;
                        $pekerjaan->sumber_penghasilan_lainnya = $value->sumber_penghasilan_lainnya;
                        $pekerjaan->sumber_dana_investasi = $value->sumber_dana_investasi;
                        $pekerjaan->save();

                        $pasangan = new DataPasanganOrangTuaInvestor;
                        $pasangan->investor_id =   $value->investor_id;
                        $pasangan->nm_pasangan_atau_orang_tua = $value->nm_pasangan_atau_orang_tua;
                        $pasangan->hubungan = $value->hubungan;
                        $pasangan->alamat_tempat_tinggal_pasangan_atau_orang_tua = $value->alamat_tempat_tinggal_pasangan_atau_orang_tua;
                        $pasangan->telp_rumah_pasangan_atau_orang_tua = $value->telp_rumah_pasangan_atau_orang_tua;
                        $pasangan->ponsel_pasangan_atau_orang_tua = $value->ponsel_pasangan_atau_orang_tua;
                        $pasangan->pekerjaan_pasangan_atau_orang_tua = $value->pekerjaan_pasangan_atau_orang_tua;
                        $pasangan->alamat_perusahaan_pasangan_atau_orang_tua = $value->alamat_perusahaan_pasangan_atau_orang_tua;
                        $pasangan->kota_perusahaan_pasangan_atau_orang_tua = $value->kota_perusahaan_pasangan_atau_orang_tua;
                        $pasangan->provinsi_perusahaan_pasangan_atau_orang_tua = $value->provinsi_perusahaan_pasangan_atau_orang_tua;
                        $pasangan->kode_pos_perusahaan_pasangan_atau_orang_tua = $value->kode_pos_perusahaan_pasangan_atau_orang_tua;
                        $pasangan->telp_perusahaan_pasangan_atau_orang_tua = $value->telp_perusahaan_pasangan_atau_orang_tua;
                        $pasangan->email_perusahaan_pasangan_atau_orang_tua = $value->email_perusahaan_pasangan_atau_orang_tua;
                        $pasangan->fax_perusahaan_pasangan_atau_orang_tua = $value->fax_perusahaan_pasangan_atau_orang_tua;
                        $pasangan->jabatan_pasangan_atau_orang_tua = $value->jabatan_pasangan_atau_orang_tua;
                        $pasangan->jenis_usaha_pasangan_atau_orang_tua = $value->jenis_usaha_pasangan_atau_orang_tua;
                        $pasangan->lama_bekerja_pasangan_atau_orang_tua = $value->lama_bekerja_pasangan_atau_orang_tua;
                        $pasangan->penghasilan_kotor_per_tahun_pasangan_atau_orang_tua = $value->penghasilan_kotor_per_tahun_pasangan_atau_orang_tua;
                        $pasangan->sumber_penghasilan_utama_pasangan_atau_orang_tua = $value->sumber_penghasilan_utama_pasangan_atau_orang_tua;
                        $pasangan->save();

                        $dokumen = new DokumenPendukungInvestor;
                        $dokumen->investor_id =   $value->investor_id;
                        $dokumen->ktp = $value->ktp;
                        $dokumen->npwp = $value->npwp;
                        $dokumen->form_profil_resiko_pemodal = $value->form_profil_resiko_pemodal;
                        $dokumen->bukti_setoran_investasi_awal = $value->bukti_setoran_investasi_awal;
                        $dokumen->contoh_tanda_tangan = $value->contoh_tanda_tangan;
                        $dokumen->fatca = $value->fatca;
                        $dokumen->save();

                        $persetujuan = new Persetujuan;
                        $persetujuan->investor_id =   $value->investor_id;
                        $persetujuan->agen_pemasaran_id = $value->agen_pemasaran_id;
                        $persetujuan->tanda_tangan_agen_pemasaran = $value->tanda_tangan_agen_pemasaran;
                        $persetujuan->tanda_tangan_agen_pemasaran = $value->tanda_tangan_agen_pemasaran;
                        $persetujuan->tanggal_agen_pemasaran = $value->tanggal_agen_pemasaran;
                        $persetujuan->pejabat_berwenang_id = $value->pejabat_berwenang_id;
                        $persetujuan->status_persetujuan = $value->status_persetujuan;
                        $persetujuan->tanda_tangan_pejabat_berwenang = $value->tanda_tangan_pejabat_berwenang;
                        $persetujuan->tanggal_pejabat_berwenang = $value->tanggal_pejabat_berwenang;
                        $persetujuan->save();
                    }
                }
            }
        }
        elseif ($request->opsi =="s_individual") {
            if($request->hasFile('file')){
                $path = $request->file('file')->getRealPath();
                $data = Excel::load($path, function($reader){})->get();
                if(!empty($data) && $data->count()){
                    foreach ($data as $key => $value) {
                        $saham = new SahamInvestor;
                        $saham->no_sk3s = $value->no_sk3s;
                        $saham->investor_id = $value->investor_id;
                        $saham->seri_spmpkop = $value->seri_spmpkop;
                        $saham->seri_formulir = $value->seri_formulir;
                        $saham->jumlah_saham = $value->jumlah_saham;
                        $saham->terbilang_saham = $value->terbilang_saham;
                        $saham->jenis_mata_uang = $value->jenis_mata_uang;
                        $saham->pembayaran_no_rek = $value->pembayaran_no_rek;
                        $saham->pembayaran_nm_rek = $value->pembayaran_nm_rek;
                        $saham->pembayaran_nm_bank = $value->pembayaran_nm_bank;
                        $saham->no_sk3s_lama = $value->no_sk3s_lama;
                        $saham->investor_id_lama = $value->investor_id_lama;
                        $saham->save();
                    }
                }
            }
        }

        elseif ($request->opsi =="s_nonindividual") {
            if($request->hasFile('file')){
                $path = $request->file('file')->getRealPath();
                $data = Excel::load($path, function($reader){})->get();
                if(!empty($data) && $data->count()){
                    foreach ($data as $key => $value) {
                        $saham = new SahamInstitusi;
                        $saham->no_sk3s = $value->no_sk3s;
                        $saham->investor_id = $value->investor_id;
                        $saham->seri_spmpkop = $value->seri_spmpkop;
                        $saham->seri_formulir = $value->seri_formulir;
                        $saham->jumlah_saham = $value->jumlah_saham;
                        $saham->terbilang_saham = $value->terbilang_saham;
                        $saham->jenis_mata_uang = $value->jenis_mata_uang;
                        $saham->pembayaran_no_rek = $value->pembayaran_no_rek;
                        $saham->pembayaran_nm_rek = $value->pembayaran_nm_rek;
                        $saham->pembayaran_nm_bank = $value->pembayaran_nm_bank;
                        $saham->no_sk3s_lama = $value->no_sk3s_lama;
                        $saham->investor_id_lama = $value->investor_id_lama;
                        $saham->save();
                    }
                }
            }
        }

        elseif ($request->opsi =="nonindividual") {
            if($request->hasFile('file')){
                $path = $request->file('file')->getRealPath();
                $data = Excel::load($path, function($reader){})->get();
                if(!empty($data) && $data->count()){
                    foreach ($data as $key => $value) {
                        $rekening = new RekeningInstitusi;
                        $rekening->nm_investor = $value->nm_investor;
                        $rekening->no_register = $value->no_register;
                        $rekening->agen_pemasaran_id = $value->agen_pemasaran_id;
                        $rekening->pejabat_berwenang_1 = $value->pejabat_berwenang_1;
                        $rekening->pejabat_berwenang_2 = $value->pejabat_berwenang_2;
                        $rekening->nm_institusi = $value->nm_institusi;
                        $rekening->kota_institusi = $value->kota_institusi;
                        $rekening->provinsi_institusi = $value->provinsi_institusi;
                        $rekening->negara_institusi = $value->negara_institusi;
                        $rekening->kode_pos_institusi = $value->kode_pos_institusi;
                        $rekening->email_kantor = $value->email_kantor;
                        $rekening->telephone_kantor = $value->telephone_kantor;
                        $rekening->domisili = $value->domisili;
                        $rekening->tipe_perusahaan = $value->tipe_perusahaan;
                        $rekening->karakteristik = $value->karakteristik;
                        $rekening->bidang_usaha = $value->bidang_usaha;
                        $rekening->no_akta_pendirian = $value->no_akta_pendirian;
                        $rekening->tanggal_akta_pendirian = $value->tanggal_akta_pendirian;
                        $rekening->no_akta_perubahan_terakhir = $value->no_akta_perubahan_terakhir;
                        $rekening->tanggal_akta_perubahan_terakhir = $value->tanggal_akta_perubahan_terakhir;
                        $rekening->no_npwp = $value->no_npwp;
                        $rekening->tgl_registrasi_npwp = $value->tgl_registrasi_npwp;
                        $rekening->no_siup = $value->no_siup;
                        $rekening->tgl_kadaluarsa_siup = $value->tgl_kadaluarsa_siup;
                        $rekening->no_skdp = $value->no_skdp;
                        $rekening->tgl_kadaluarsa_skdp = $value->tgl_kadaluarsa_skdp;
                        $rekening->no_tdp = $value->no_tdp;
                        $rekening->tanggal_kadaluarsa_tdp = $value->tgl_kadaluarsa_tdp;
                        $rekening->no_izin_pma = $value->no_izin_pma;
                        $rekening->save();

                        $saham = new PemegangSahamInstitusi();
                        $saham->institusi_id = $value->institusi_id;
                        $saham->nm_pemegang_saham = $value->nm_pemegang_saham;
                        $saham->komposisi_pemegang_saham = $value->komposisi_pemegang_saham;
                        $saham->tanggal_pernyataan = $value->tanggal_pernyataan;
                        $saham->yang_menyatakan = $value->yang_menyatakan;
                        $saham->save();

                        $komisaris = new SusunanKomisarisInstitusi;
                        $komisaris->institusi_id = $value->institusi_id;
                        $komisaris->nm_komisaris = $value->nm_komisaris;
                        $komisaris->no_identitas = $value->no_identitas;
                        $komisaris->save();

                        $komisaris = new SusunanDireksiInstitusi;
                        $komisaris->institusi_id = $value->institusi_id;
                        $komisaris->nm_direksi = $value->nm_direksi;
                        $komisaris->no_identitas = $value->no_identitas;
                        $komisaris->save();

                        $kuasa = new PenerimaKuasaTransaksiInstitusi;
                        $kuasa->institusi_id = $value->institusi_id;
                        $kuasa->nm_kuasa = $value->nm_kuasa;
                        $kuasa->no_identitas = $value->no_identitas;
                        $kuasa->tgl_kadalursa_identitas = $value->tgl_kadalursa_identitas;
                        $kuasa->jabatan = $value->jabatan;
                        $kuasa->telephone = $value->telephone;
                        $kuasa->save();

                        $keuangan = new DataKeuanganiInstitusi;
                        $keuangan->institusi_id = $value->institusi_id;
                        $keuangan->aset_keuangan_tahun_1 = $value->aset_keuangan_tahun_1;
                        $keuangan->aset_keuangan_tahun_2 = $value->aset_keuangan_tahun_2;
                        $keuangan->aset_keuangan_tahun_3 = $value->aset_keuangan_tahun_3;
                        $keuangan->laba_keuangan_tahun_1 = $value->laba_keuangan_tahun_1;
                        $keuangan->laba_keuangan_tahun_2 = $value->laba_keuangan_tahun_2;
                        $keuangan->laba_keuangan_tahun_3 = $value->laba_keuangan_tahun_3;
                        $keuangan->sumber_dana = $value->sumber_dana;
                        $keuangan->tujuan_investasi = $value->tujuan_investasi;
                        $keuangan->save();

                        $instruksi = new InstruksiPembayaraniInstitusi();
                        $instruksi->institusi_id = $value->institusi_id;
                        $instruksi->nm_pemilik_bank = $value->nm_pemilik_bank;
                        $instruksi->nm_bank = $value->nm_bank;
                        $instruksi->no_rek = $value->no_rek;
                        $instruksi->save();

                        $dokumen = new DokumenPendukungInstitusi();
                        $dokumen->institusi_id = $value->institusi_id;
                        $dokumen->kelengkapan_dokumen = $value->kelengkapan_dokumen;
                        $dokumen->profil_resiko = $value->profil_resiko;
                        $dokumen->bukti_setoran = $value->bukti_setoran;
                        $dokumen->ttd_penerima_kuasa = $value->ttd_penerima_kuasa;
                        $dokumen->fatca = $value->fatca;
                        $dokumen->persetujuan = $value->persetujuan;
                        $dokumen->save();

                    }
                }
            }
        }
        return redirect()->route('operator.backup_data')->with(['success'   =>  'Data Berhasil Di Import !!']);
    }
}
