<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Investor;
use App\PekerjaanInvestor;
use App\DokumenPendukungInvestor;
use App\DataPasanganOrangTuaInvestor;
use App\Persetujuan;
use App\AhliWarisInvestor;
use App\AgenPemasaran;
use App\PejabatBerwenang;
use App\Log;
use Auth;
use DB;
use Gate;
use PDF;
use Crypt;

class FormPembukaanRekening extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(!Gate::allows('isOperator')){
            abort(404, "Sorry, you can't do this actions");
        }
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        $investors_acc = Investor::select('id','nm_investor','jenis_rekening','no_cif','jenis_kelamin','no_ktp')->where('status_verifikasi','1')->get();
        $investors = Investor::select('id','nm_investor','jenis_rekening','no_cif','jenis_kelamin','no_ktp')->where('status_verifikasi','0')->get();
        return view('operator/form_pembukaan_rekening.index',compact(['investors_acc','investors','agens','pejabats']));
    }

    public function tambahInvestor(){
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        return view('operator/form_pembukaan_rekening.create',compact('agens','pejabats'));
    }

    public function tambahInvestorPost(Request $request){
        $investor = new Investor;
        $investor->no_register = $request->no_register;
        $investor->nm_investor = $request->nm_investor;
        $investor->jenis_rekening = $request->jenis_rekening;
        $investor->profil_resiko_nasabah = $request->profil_resiko_nasabah;
        $investor->staf_pemasaran_id = $request->agen_pemasaran_id;
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

        $last = Investor::latest('id')->select('id')->first();

        $level = "operator";
        $aksi = "tambah investor individual";
        $halaman = "manajemen investor";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();


        $pekerjaan = new PekerjaanInvestor;
        $pekerjaan->investor_id =   $last->id;
        $pekerjaan->pekerjaan = $request->pekerjaan;
        $pekerjaan->nm_perusahaan = $request->nm_perusahaan;
        $pekerjaan->alamat_perusahaan = $request->alamat_perusahaan;
        $pekerjaan->kota_perusahaan = $request->kota_perusahaan;
        $pekerjaan->alamat_perusahaan = $request->alamat_perusahaan;
        $pekerjaan->kota_perusahaan = $request->kota_perusahaan;
        $pekerjaan->provinsi_perusahaan = $request->provinsi_perusahaan;
        $pekerjaan->kode_pos_perusahaan = $request->kode_pos_perusahaan;
        $pekerjaan->telp_perusahaan = $request->telp_perusahaan;
        $pekerjaan->email_perusahaan = $request->email_perusahaan;
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
        $pasangan->investor_id =   $last->id;
        $pasangan->nm_pasangan_atau_orang_tua = $request->nm_pasangan_atau_orang_tua;
        $pasangan->hubungan = $request->hubungan;
        $pasangan->alamat_tempat_tinggal_pasangan_atau_orang_tua = $request->alamat_tempat_tinggal_pasangan_atau_orang_tua;
        $pasangan->telp_rumah_pasangan_atau_orang_tua = $request->telp_rumah_pasangan_atau_orang_tua;
        $pasangan->ponsel_pasangan_atau_orang_tua = $request->ponsel_pasangan_atau_orang_tua;
        $pasangan->pekerjaan_pasangan_atau_orang_tua = $request->pekerjaan_pasangan_atau_orang_tua;
        $pasangan->nm_perusahaan_pasangan_atau_orang_tua = $request->nm_perusahaan_pasangan_atau_orang_tua;
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
        $dokumen->investor_id =   $last->id;
        $dokumen->ktp = $request->ktp;
        $dokumen->npwp = $request->npwp;
        $dokumen->form_profil_resiko_pemodal = $request->form_profil_resiko_pemodal;
        $dokumen->bukti_setoran_investasi_awal = $request->bukti_setoran_investasi_awal;
        $dokumen->contoh_tanda_tangan = $request->contoh_tanda_tangan;
        $dokumen->fatca = $request->fatca;
        $dokumen->save();

        $persetujuan = new Persetujuan;
        $persetujuan->investor_id =   $last->id;
        $persetujuan->agen_pemasaran_id = $request->agen_pemasaran_id;
        $persetujuan->tanda_tangan_agen_pemasaran = $request->tanda_tangan_agen_pemasaran;
        $persetujuan->tanda_tangan_agen_pemasaran = $request->tanda_tangan_agen_pemasaran;
        $persetujuan->tanggal_agen_pemasaran = $request->tanggal_agen_pemasaran;
        $persetujuan->pejabat_berwenang_id = $request->pejabat_berwenang_id;
        $persetujuan->status_persetujuan = $request->status_persetujuan;
        $persetujuan->tanda_tangan_pejabat_berwenang = $request->tanda_tangan_pejabat_berwenang;
        $persetujuan->tanggal_pejabat_berwenang = $request->tanggal_pejabat_berwenang;
        $persetujuan->save();

        return redirect()->route('operator.form_pembukaan_rekening')->with(['success'   =>  'Formulir Pembukaan Rekening Berhasil Ditambahkan !!']);
    }

    public function edit($id){
        $data = Crypt::decrypt($id);
        $investor = Investor::find($data);
        $dokumen = DokumenPendukungInvestor::where('investor_id',$data)->first();
        $pasangan = DataPasanganOrangTuaInvestor::where('investor_id',$data)->first();
        $persetujuan = Persetujuan::where('investor_id',$data)->first();
        $pekerjaan = PekerjaanInvestor::where('investor_id',$data)->first();
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        // return $investor->pekerjaan;
        return view('operator/form_pembukaan_rekening.edit',compact('investor','dokumen','pasangan','persetujuan','pekerjaan','agens','pejabats'));
    }

    public function update(Request $request, $id){
        // return $request->all();
        $investor = Investor::where('id',$id)->update([
            'no_register'   => $request->no_register,
            'nm_investor'   => $request->nm_investor,
            'jenis_rekening'  => $request->jenis_rekening,
            'profil_resiko_nasabah'  => $request->profil_resiko_nasabah,
            'staf_pemasaran_id' => $request->agen_pemasaran_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_ktp'    => $request->no_ktp,
            'tgl_kadaluarsa_ktp'    => $request->tgl_kadaluarsa_ktp,
            'no_npwp'   => $request->no_npwp,
            'tgl_registrasi_npwp'   => $request->tgl_registrasi_npwp,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status_perkawinan' => $request->status_perkawinan,
            'kewarganegaraan'   => $request->kewarganegaraan,
            'alamat_ktp'    => $request->alamat_ktp,
            'rt_ktp'    => $request->rt_ktp,
            'rw_ktp'    => $request->rw_ktp,
            'kecamatan_ktp' => $request->kecamatan_ktp,
            'kelurahan_ktp' => $request->kelurahan_ktp,
            'kota_ktp'  => $request->kota_ktp,
            'provinsi_ktp'  => $request->provinsi_ktp,
            'kode_pos_ktp'  => $request->kode_pos_ktp,
            'alamat_tempat_tinggal' => $request->alamat_tempat_tinggal,
            'rt_tempat_tinggal' => $request->rt_tempat_tinggal,
            'rw_tempat_tinggal' => $request->rw_tempat_tinggal,
            'kecamatan_tempat_tinggal'  => $request->kecamatan_tempat_tinggal,
            'kelurahan_tempat_tinggal'  => $request->kelurahan_tempat_tinggal,
            'kota_tempat_tinggal'   => $request->kota_tempat_tinggal,
            'provinsi_tempat_tinggal'   => $request->provinsi_tempat_tinggal,
            'kode_pos_tempat_tinggal'   => $request->kode_pos_tempat_tinggal,
            'telp_rumah'    => $request->telp_rumah,
            'ponsel'    => $request->ponsel,
            'lama_menempati'    => $request->lama_menempati,
            'status_rumah_tinggal'  => $request->status_rumah_tinggal,
            'agama' => $request->agama,
            'pendidikan_terakhir'   => $request->pendidikan_terakhir,
            'nm_gadis_ibu_kandung'  => $request->nm_gadis_ibu_kandung,
            'emergency_kontak'  => $request->emergency_kontak,
            'jumlah_tanggungan' => $request->jumlah_tanggungan,
            'alamat_surat_menyurat_ktp' => $request->alamat_surat_menyurat_ktp,
            'alamat_surat_menyurat_tempat_tinggal'  => $request->alamat_surat_menyurat_tempat_tinggal,
            'alamat_surat_menyurat_lainnya' => $request->alamat_surat_menyurat_lainnya,
            'pengiriman_konfirmasi_melalui_email'   => $request->pengiriman_konfirmasi_melalui_email,
            'pengiriman_konfirmasi_melalui_fax' => $request->pengiriman_konfirmasi_melalui_fax,
            'pengiriman_konfirmasi_melalui_alamat_surat_menyurat'   => $request->pengiriman_konfirmasi_melalui_alamat_surat_menyurat,
            'tujuan_investasi'  => $request->tujuan_investasi,
        ]);

        $pekerjaan = PekerjaanInvestor::where('investor_id',$id)->update([
            'pekerjaan' =>  $request->pekerjaan,
            'nm_perusahaan' =>  $request->nm_perusahaan,
            'alamat_perusahaan' =>  $request->alamat_perusahaan,
            'kota_perusahaan'   =>  $request->kota_perusahaan,
            'alamat_perusahaan' =>  $request->alamat_perusahaan,
            'kota_perusahaan'   =>  $request->kota_perusahaan,
            'provinsi_perusahaan'   =>  $request->provinsi_perusahaan,
            'kode_pos_perusahaan'   =>  $request->kode_pos_perusahaan,
            'telp_perusahaan'   =>  $request->telp_perusahaan,
            'email_perusahaan'  =>  $request->email_perusahaan,
            'fax_perusahaan'    =>  $request->fax_perusahaan,
            'jabatan'   =>  $request->jabatan,
            'jenis_usaha'   =>  $request->jenis_usaha,
            'lama_bekerja'  =>  $request->lama_bekerja,
            'sumber_penghasilan_utama'  =>  $request->sumber_penghasilan_utama,
            'penghasilan_lain'  =>  $request->penghasilan_lain,
            'sumber_penghasilan_lainnya'    =>  $request->sumber_penghasilan_lainnya,
            'sumber_dana_investasi' =>  $request->sumber_dana_investasi,
        ]);

        $pasangan = DataPasanganOrangTuaInvestor::where('investor_id',$id)->update([
            'nm_pasangan_atau_orang_tua' => $request->nm_pasangan_atau_orang_tua,
            'hubungan' => $request->hubungan,
            'alamat_tempat_tinggal_pasangan_atau_orang_tua' => $request->alamat_tempat_tinggal_pasangan_atau_orang_tua,
            'telp_rumah_pasangan_atau_orang_tua' => $request->telp_rumah_pasangan_atau_orang_tua,
            'ponsel_pasangan_atau_orang_tua' => $request->ponsel_pasangan_atau_orang_tua,
            'pekerjaan_pasangan_atau_orang_tua' => $request->pekerjaan_pasangan_atau_orang_tua,
            'alamat_perusahaan_pasangan_atau_orang_tua' => $request->alamat_perusahaan_pasangan_atau_orang_tua,
            'nm_perusahaan_pasangan_atau_orang_tua' => $request->nm_perusahaan_pasangan_atau_orang_tua,
            'kota_perusahaan_pasangan_atau_orang_tua' => $request->kota_perusahaan_pasangan_atau_orang_tua,
            'provinsi_perusahaan_pasangan_atau_orang_tua' => $request->provinsi_perusahaan_pasangan_atau_orang_tua,
            'kode_pos_perusahaan_pasangan_atau_orang_tua' => $request->kode_pos_perusahaan_pasangan_atau_orang_tua,
            'telp_perusahaan_pasangan_atau_orang_tua' => $request->telp_perusahaan_pasangan_atau_orang_tua,
            'email_perusahaan_pasangan_atau_orang_tua' => $request->email_perusahaan_pasangan_atau_orang_tua,
            'fax_perusahaan_pasangan_atau_orang_tua' => $request->fax_perusahaan_pasangan_atau_orang_tua,
            'jabatan_pasangan_atau_orang_tua' => $request->jabatan_pasangan_atau_orang_tua,
            'jenis_usaha_pasangan_atau_orang_tua' => $request->jenis_usaha_pasangan_atau_orang_tua,
            'lama_bekerja_pasangan_atau_orang_tua' => $request->lama_bekerja_pasangan_atau_orang_tua,
            'penghasilan_kotor_per_tahun_pasangan_atau_orang_tua' => $request->penghasilan_kotor_per_tahun_pasangan_atau_orang_tua,
            'sumber_penghasilan_utama_pasangan_atau_orang_tua' => $request->sumber_penghasilan_utama_pasangan_atau_orang_tua,
        ]);

        $dokumen = DokumenPendukungInvestor::where('investor_id',$id)->update([
            'ktp'   => $request->ktp,
            'npwp'  => $request->npwp,
            'form_profil_resiko_pemodal'    => $request->form_profil_resiko_pemodal,
            'bukti_setoran_investasi_awal'  => $request->bukti_setoran_investasi_awal,
            'contoh_tanda_tangan'   => $request->contoh_tanda_tangan,
            'fatca' => $request->fatca,
        ]);

        $level = "operator";
        $aksi = "ubah data investor individual id = ".$id;
        $halaman = "manajemen investor individual";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();

        $persetujuan = Persetujuan::where('investor_id',$id)->update([
            'agen_pemasaran_id' => $request->agen_pemasaran_id,
            'tanda_tangan_agen_pemasaran'   => $request->tanda_tangan_agen_pemasaran,
            'tanda_tangan_agen_pemasaran'   => $request->tanda_tangan_agen_pemasaran,
            'tanggal_agen_pemasaran'    => $request->tanggal_agen_pemasaran,
            'pejabat_berwenang_id'  => $request->pejabat_berwenang_id,
            'status_persetujuan'    => $request->status_persetujuan,
            'tanda_tangan_pejabat_berwenang'    => $request->tanda_tangan_pejabat_berwenang,
            'tanggal_pejabat_berwenang' => $request->tanggal_pejabat_berwenang,
        ]);

        return redirect()->route('operator.form_pembukaan_rekening')->with(['success'   =>  'Data Berhasil Di Update !!']);
    }

    public function delete($id){
        Investor::destroy($id);
        PekerjaanInvestor::where('investor_id',$id)->delete();
        DokumenPendukungInvestor::where('investor_id',$id)->delete();
        DataPasanganOrangTuaInvestor::where('investor_id',$id)->delete();
        Persetujuan::where('investor_id',$id)->delete();

        $level = "operator";
        $aksi = "hapus investor id = ".$id;
        $halaman = "manajemen investor";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();

        return redirect()->route('operator.form_pembukaan_rekening')->with(['success'   =>  'Data Berhasil Di Hapus !!']);
    }

    public function tambahAhliWarisInvestor($id){
        $investor = Investor::where('id',$id)->select('id','nm_investor')->first();
        $ahli_waris = Investor::rightJoin('ahli_waris_investors','ahli_waris_investors.investor_id','investors.id')
                                        ->where('investors.id',$id)
                                        ->get();
        return view('operator.form_pembukaan_rekening.tambah_ahli_waris',compact('ahli_waris','investor'));
    }

    public function tambahAhliWarisInvestorPost(Request $request){
        $ahli = new AhliWarisInvestor;
        $ahli->investor_id = $request->investor_id;
        $ahli->nm_ahli_waris = $request->nm_ahli_waris;
        $ahli->hubungan_ahli_waris = $request->hubungan_ahli_waris;
        $ahli->save();

        return redirect()->route('operator.form_pembukaan_rekening')->with(['success'   =>  'Ahli Waris Berhasil Ditambahkan !!']);
    }

    public function cariNoreg(Request $request){
        $data = Investor::select('no_register')->where('no_register',$request->no_register)->get();

        $datas = count($data);

        return response()->json($datas);
    }

    public function detail($id){
        $investor = Investor::find($id);
        $dokumen = DokumenPendukungInvestor::where('investor_id',$id)->first();
        $pasangan = DataPasanganOrangTuaInvestor::where('investor_id',$id)->first();
        $persetujuan = Persetujuan::where('investor_id',$id)->first();
        $pekerjaan = PekerjaanInvestor::where('investor_id',$id)->first();
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        return compact('investor','dokumen','pasangan','persetujuan','pekerjaan','agens','pejabats');
    }

    public function cetak($id){
        $data = Crypt::decrypt($id);
        $investor = Investor::join('dokumen_pendukung_investors','dokumen_pendukung_investors.investor_id','investors.id')
                            ->join('data_pasangan_orang_tua_investors','data_pasangan_orang_tua_investors.investor_id','investors.id')
                            ->join('persetujuans','persetujuans.investor_id','investors.id')
                            ->join('pekerjaan_investors','pekerjaan_investors.investor_id','investors.id')
                            ->join('agen_pemasarans','agen_pemasarans.id','agen_pemasaran_id')
                            ->join('pejabat_berwenangs','pejabat_berwenangs.id','pejabat_berwenang_id')
                            ->where('investors.id',$data)
                            ->first();
        $pdf = PDF::loadView('operator/form_pembukaan_rekening.cetak',compact('investor'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }
}
