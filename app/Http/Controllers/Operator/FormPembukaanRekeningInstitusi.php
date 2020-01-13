<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RekeningInstitusi;
use App\AgenPemasaran;
use App\DataKeuanganiInstitusi;
use App\PejabatBerwenang;
use App\PemegangSahamInstitusi;
use App\SusunanDireksiInstitusi;
use App\SusunanKomisarisInstitusi;
use App\PenerimaKuasaTransaksiInstitusi;
use App\DokumenPendukungInstitusi;
use App\DokumenPendukungInvestor;
use App\InstruksiPembayaraniInstitusi;
use App\Log;
use Auth;
use Gate;
use PDF;
use Crypt;

class FormPembukaanRekeningInstitusi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(!Gate::allows('isOperator')){
            abort(404, "Sorry, you can't do this actions");
        }
        $investors_acc = RekeningInstitusi::select('id','nm_investor','nm_institusi','karakteristik','bidang_usaha','tipe_perusahaan','status_verifikasi')->where('status_verifikasi','!=','0')->get();
        $investors = RekeningInstitusi::select('id','nm_investor','nm_institusi','karakteristik','bidang_usaha','tipe_perusahaan','status_verifikasi')->where('status_verifikasi','0')->get();
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        // return $investors_acc;
        return view('operator/rekening_institusi.index',compact(['investors_acc','investors','agens','pejabats']));
    }

    public function tambahInstitusi(){
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        return view('operator/rekening_institusi.create',compact('agens','pejabats'));
    }

    public function tambahInstitusiPost(Request $request){
        // return $request->all();
        $rekening = new RekeningInstitusi;
        $rekening->nm_investor = $request->nm_investor;
        $rekening->no_register = $request->no_register;
        $rekening->agen_pemasaran_id = $request->agen_pemasaran_id;
        $rekening->pejabat_berwenang_1 = $request->pejabat_berwenang_id1;
        $rekening->pejabat_berwenang_2 = $request->pejabat_berwenang_id2;
        $rekening->nm_institusi = $request->nm_institusi;
        $rekening->kota_institusi = $request->kota_institusi;
        $rekening->provinsi_institusi = $request->provinsi_institusi;
        $rekening->negara_institusi = $request->negara_institusi;
        $rekening->kode_pos_institusi = $request->kode_pos_institusi;
        $rekening->email_kantor = $request->email_kantor;
        $rekening->telephone_kantor = $request->telephone_kantor;
        $rekening->domisili = $request->domisili;
        $rekening->tipe_perusahaan = $request->tipe_perusahaan;
        $rekening->karakteristik = $request->karakteristik;
        $rekening->bidang_usaha = $request->bidang_usaha;
        $rekening->no_akta_pendirian = $request->no_akta_pendirian;
        $rekening->tanggal_akta_pendirian = $request->tanggal_akta_pendirian;
        $rekening->no_akta_perubahan_terakhir = $request->no_akta_perubahan_terakhir;
        $rekening->tanggal_akta_perubahan_terakhir = $request->tanggal_akta_perubahan_terakhir;
        $rekening->no_npwp = $request->no_npwp;
        $rekening->tgl_registrasi_npwp = $request->tgl_registrasi_npwp;
        $rekening->no_siup = $request->no_siup;
        $rekening->tgl_kadaluarsa_siup = $request->tgl_kadaluarsa_siup;
        $rekening->no_skdp = $request->no_skdp;
        $rekening->tgl_kadaluarsa_skdp = $request->tgl_kadaluarsa_skdp;
        $rekening->no_tdp = $request->no_tdp;
        $rekening->tanggal_kadaluarsa_tdp = $request->tanggal_kadaluarsa_tdp;
        $rekening->no_izin_pma = $request->no_izin_pma;
        $rekening->save();

        $last = RekeningInstitusi::latest('id')->select('id')->first();

        $saham = new PemegangSahamInstitusi();
        $saham->institusi_id = $last->id;
        $saham->nm_pemegang_saham = $request->nm_pemegang_saham;
        $saham->komposisi_pemegang_saham = $request->komposisi_pemegang_saham;
        $saham->tanggal_pernyataan = $request->tanggal_pernyataan;
        $saham->yang_menyatakan = $request->yang_menyatakan;
        $saham->save();

        $komisaris = new SusunanKomisarisInstitusi;
        $komisaris->institusi_id = $last->id;
        $komisaris->nm_komisaris = $request->nm_komisaris;
        $komisaris->no_identitas = $request->no_identitas;
        $komisaris->save();

        $level = "operator";
        $aksi = "tambah investor nonindividual";
        $halaman = "manajemen investor nonindividual";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();

        $komisaris = new SusunanDireksiInstitusi;
        $komisaris->institusi_id = $last->id;
        $komisaris->nm_direksi = $request->nm_direksi;
        $komisaris->no_identitas = $request->no_identitas_direksi;
        $komisaris->save();

        $kuasa = new PenerimaKuasaTransaksiInstitusi;
        $kuasa->institusi_id = $last->id;
        $kuasa->nm_kuasa = $request->nm_kuasa;
        $kuasa->no_identitas = $request->no_identitas_kuasa;
        $kuasa->tgl_kadalursa_identitas = $request->tgl_kadaluarsa_identitas_kuasa;
        $kuasa->jabatan = $request->jabatan_kuasa;
        $kuasa->telephone = $request->telephone_kuasa;
        $kuasa->save();

        $keuangan = new DataKeuanganiInstitusi;
        $keuangan->institusi_id = $last->id;
        $keuangan->aset_keuangan_tahun_1 = $request->aset_keuangan_tahun_1;
        $keuangan->aset_keuangan_tahun_2 = $request->aset_keuangan_tahun_2;
        $keuangan->aset_keuangan_tahun_3 = $request->aset_keuangan_tahun_3;
        $keuangan->laba_keuangan_tahun_1 = $request->laba_keuangan_tahun_1;
        $keuangan->laba_keuangan_tahun_2 = $request->laba_keuangan_tahun_2;
        $keuangan->laba_keuangan_tahun_3 = $request->laba_keuangan_tahun_3;
        $keuangan->sumber_dana = $request->sumber_dana;
        $keuangan->tujuan_investasi = $request->tujuan_investasi;
        $keuangan->save();

        $instruksi = new InstruksiPembayaraniInstitusi();
        $instruksi->institusi_id = $last->id;
        $instruksi->nm_pemilik_bank = $request->nm_pemilik_bank;
        $instruksi->nm_bank = $request->nm_bank;
        $instruksi->no_rek = $request->no_rek;
        $instruksi->save();

        $dokumen = new DokumenPendukungInstitusi();
        $dokumen->institusi_id = $last->id;
        $dokumen->kelengkapan_dokumen = $request->kelengkapan_dokumen;
        $dokumen->profil_resiko = $request->profil_resiko;
        $dokumen->bukti_setoran = $request->bukti_setoran;
        $dokumen->ttd_penerima_kuasa = $request->ttd_penerima_kuasa;
        $dokumen->fatca = $request->fatca;
        $dokumen->persetujuan = $request->persetujuan;
        $dokumen->save();

        return redirect()->route('operator.pembukaan_rekening_institusi')->with(['success'   =>  'Formulir Pembukaan Rekening Institusi Berhasil Ditambahkan !!']);
    }

    public function update(Request $request, $id){
        $rekening = RekeningInstitusi::where('id',$id)->update([
            'nm_investor'   =>  $request->nm_investor,
            'no_register'   =>  $request->no_register,
            'agen_pemasaran_id' =>  $request->agen_pemasaran_id,
            'pejabat_berwenang_1'   =>  $request->pejabat_berwenang_id1,
            'pejabat_berwenang_2'   =>  $request->pejabat_berwenang_id2,
            'nm_institusi'  =>  $request->nm_institusi,
            'kota_institusi'    =>  $request->kota_institusi,
            'provinsi_institusi'    =>  $request->provinsi_institusi,
            'negara_institusi'  =>  $request->negara_institusi,
            'kode_pos_institusi'    =>  $request->kode_pos_institusi,
            'email_kantor'  =>  $request->email_kantor,
            'telephone_kantor'  =>  $request->telephone_kantor,
            'domisili'  =>  $request->domisili,
            'tipe_perusahaan'   =>  $request->tipe_perusahaan,
            'karakteristik' =>  $request->karakteristik,
            'bidang_usaha'  =>  $request->bidang_usaha,
            'no_akta_pendirian' =>  $request->no_akta_pendirian,
            'tanggal_akta_pendirian'    =>  $request->tanggal_akta_pendirian,
            'no_akta_perubahan_terakhir'    =>  $request->no_akta_perubahan_terakhir,
            'tanggal_akta_perubahan_terakhir'   =>  $request->tanggal_akta_perubahan_terakhir,
            'no_npwp'   =>  $request->no_npwp,
            'tgl_registrasi_npwp'   =>  $request->tgl_registrasi_npwp,
            'no_siup'   =>  $request->no_siup,
            'tgl_kadaluarsa_siup'   =>  $request->tgl_kadaluarsa_siup,
            'no_skdp'   =>  $request->no_skdp,
            'tgl_kadaluarsa_skdp'   =>  $request->tgl_kadaluarsa_skdp,
            'no_tdp'    =>  $request->no_tdp,
            'tanggal_kadaluarsa_tdp'    =>  $request->tgl_kadaluarsa_tdp,
            'no_izin_pma'   =>  $request->no_izin_pma,
        ]);

        $level = "operator";
        $aksi = "ubah data investor nonindividual id = ".$id;
        $halaman = "manajemen investor nonindividual";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();

        $saham = PemegangSahamInstitusi::where('institusi_id',$id)->update([
            'nm_pemegang_saham'  => $request->nm_pemegang_saham,
            'komposisi_pemegang_saham'  => $request->komposisi_pemegang_saham,
            'tanggal_pernyataan'  => $request->tanggal_pernyataan,
            'yang_menyatakan'  => $request->yang_menyatakan,
        ]);

        $komisaris = SusunanKomisarisInstitusi::where('institusi_id',$id)->update([
            'nm_komisaris'  =>  $request->nm_komisaris,
            'no_identitas'  =>  $request->no_identitas,
        ]);

        $komisaris = SusunanDireksiInstitusi::where('institusi_id',$id)->update([
            'nm_direksi'  =>  $request->nm_direksi,
            'no_identitas'  =>  $request->no_identitas,
        ]);

        $kuasas = PenerimaKuasaTransaksiInstitusi::where('institusi_id',$id)->update([
            'nm_kuasa'  =>  $request->nm_kuasa,
            'no_identitas'  =>  $request->no_identitas_kuasa,
            'tgl_kadalursa_identitas'   =>  $request->tgl_kadaluarsa_identitas_kuasa,
            'jabatan'   =>  $request->jabatan_kuasa,
            'telephone' =>  $request->telephone_kuasa,
        ]);

        $keuangan = DataKeuanganiInstitusi::where('institusi_id',$id)->update([
            'aset_keuangan_tahun_1' =>  $request->aset_keuangan_tahun_1,
            'aset_keuangan_tahun_2' =>  $request->aset_keuangan_tahun_2,
            'aset_keuangan_tahun_3' =>  $request->aset_keuangan_tahun_3,
            'laba_keuangan_tahun_1' =>  $request->laba_keuangan_tahun_1,
            'laba_keuangan_tahun_2' =>  $request->laba_keuangan_tahun_2,
            'laba_keuangan_tahun_3' =>  $request->laba_keuangan_tahun_3,
            'sumber_dana'   =>  $request->sumber_dana,
            'tujuan_investasi'  =>  $request->tujuan_investasi,
        ]);

        $instruksi = InstruksiPembayaraniInstitusi::where('institusi_id',$id)->update([
            'nm_pemilik_bank'   =>  $request->nm_pemilik_bank,
            'nm_bank'   =>  $request->nm_bank,
            'no_rek'    =>  $request->no_rek,
        ]);

        $dokumen = DokumenPendukungInstitusi::where('institusi_id',$id)->update([
            'kelengkapan_dokumen'   =>  $request->kelengkapan_dokumen,
            'profil_resiko' =>  $request->profil_resiko,
            'bukti_setoran' =>  $request->bukti_setoran,
            'ttd_penerima_kuasa'    =>  $request->ttd_penerima_kuasa,
            'fatca' =>  $request->fatca,
            'persetujuan'   =>  $request->persetujuan,
        ]);

        return redirect()->route('operator.pembukaan_rekening_institusi')->with(['success'   =>  'Data Formulir Pembukaan Rekening Institusi Berhasil Diupdate !!']);

    }

    public function edit($id){
        $data = Crypt::decrypt($id);
        $rekening = RekeningInstitusi::find($data);
        $dokumen = DokumenPendukungInstitusi::where('institusi_id',$data)->first();
        $keuangan = DataKeuanganiInstitusi::where('institusi_id',$data)->first();
        $instruksi = InstruksiPembayaraniInstitusi::where('institusi_id',$data)->first();
        $saham = PemegangSahamInstitusi::where('institusi_id',$data)->first();
        $kuasa = PenerimaKuasaTransaksiInstitusi::where('institusi_id',$data)->first();
        $direksi = SusunanDireksiInstitusi::where('institusi_id',$data)->first();
        $komisaris = SusunanKomisarisInstitusi::where('institusi_id',$data)->first();
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();

        return view('operator/rekening_institusi.edit',compact('rekening','dokumen','keuangan','instruksi','saham','kuasa','direksi','komisaris','agens','pejabats'));
    }

    public function delete($id){
        RekeningInstitusi::destroy($id);
        DataKeuanganiInstitusi::where('institusi_id',$id)->delete();
        DokumenPendukungInstitusi::where('institusi_id',$id)->delete();
        InstruksiPembayaraniInstitusi::where('institusi_id',$id)->delete();
        PemegangSahamInstitusi::where('institusi_id',$id)->delete();
        PenerimaKuasaTransaksiInstitusi::where('institusi_id',$id)->delete();
        SusunanDireksiInstitusi::where('institusi_id',$id)->delete();
        SusunanKomisarisInstitusi::where('institusi_id',$id)->delete();

        $level = "operator";
        $aksi = "hapus investor nonindividual id = ".$id;
        $halaman = "manajemen investor nonindividual";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();

        return redirect()->route('operator.pembukaan_rekening_institusi')->with(['success'   =>  'Data Berhasil Di Hapus !!']);
    }

    public function cariNoreg(Request $request){
        $data = RekeningInstitusi::select('no_register')->where('no_register',$request->no_register)->get();
        $datas = count($data);
        return response()->json($datas);
    }

    public function cetak($id){
        $data = Crypt::decrypt($id);
        $investor = RekeningInstitusi::join('agen_pemasarans','agen_pemasarans.id','rekening_institusis.agen_pemasaran_id')
                            ->join('pejabat_berwenangs as a1','a1.id','rekening_institusis.pejabat_berwenang_1')
                            ->join('pejabat_berwenangs as a2','a2.id','rekening_institusis.pejabat_berwenang_2')
                            ->join('susunan_direksi_institusis as direksi','direksi.institusi_id','rekening_institusis.id')
                            ->join('susunan_komisaris_institusis as komisaris','komisaris.institusi_id','rekening_institusis.id')
                            ->join('penerima_kuasa_transaksi_institusis as kuasa','kuasa.institusi_id','rekening_institusis.id')
                            ->join('data_keuangani_institusis as keuangan','keuangan.institusi_id','rekening_institusis.id')
                            ->join('instruksi_pembayarani_institusis as instruksi','instruksi.institusi_id','rekening_institusis.id')
                            ->join('pemegang_saham_institusis as saham','saham.institusi_id','rekening_institusis.id')
                            ->where('rekening_institusis.id',$data)
                            ->first();
        $pdf = PDF::loadView('operator/rekening_institusi.cetak',compact('investor'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function detail($id){
        $rekening = RekeningInstitusi::find($id);
        $dokumen = DokumenPendukungInstitusi::where('institusi_id',$id)->first();
        $keuangan = DataKeuanganiInstitusi::where('institusi_id',$id)->first();
        $instruksi = InstruksiPembayaraniInstitusi::where('institusi_id',$id)->first();
        $saham = PemegangSahamInstitusi::where('institusi_id',$id)->first();
        $kuasa = PenerimaKuasaTransaksiInstitusi::where('institusi_id',$id)->first();
        $direksi = SusunanDireksiInstitusi::where('institusi_id',$id)->first();
        $komisaris = SusunanKomisarisInstitusi::where('institusi_id',$id)->first();
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        return compact('rekening','dokumen','keuangan','instruksi','saham','kuasa','direksi','komisaris','agens','pejabats');
    }
}
