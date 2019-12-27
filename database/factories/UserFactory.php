<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'nm_user' => $faker->name,
        'username' => $faker->randomElement(['operator','manajer']),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'level_user' => $faker->randomElement(['operator','manajer']),
        'status' => $faker->randomElement(['aktif','tdk_aktif']),
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'nm_admin' => $faker->name,
        'username' => $faker->randomElement(['operator','manajer']),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\AgenPemasaran::class, function (Faker $faker) {
    return [
        'nm_agen_pemasaran' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'telephone' => $faker->phoneNumber(),
        'status' => $faker->randomElement(['1','0']),

    ];
});

$factory->define(App\PejabatBerwenang::class, function (Faker $faker) {
    return [
        'nm_pejabat_berwenang' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'telephone' => $faker->phoneNumber(),
        'status' => $faker->randomElement(['1','0']),
    ];
});

$factory->define(App\KetuaKoperasi::class, function (Faker $faker) {
    return [
        'nm_ketua_koperasi' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'telephone' => $faker->phoneNumber(),
        'status' => $faker->randomElement(['1','0']),
    ];
});

$factory->define(App\SahamInvestor::class, function (Faker $faker) {
    return [
        'no_sk3s' => $faker->isbn10(),
        'investor_id' => $faker->randomDigit(),
        'seri_spmpkop' => $faker->randomNumber(3),
        'seri_formulir' => $faker->randomNumber(3),
        'jumlah_saham' => $faker->isbn10(),
        'terbilang_saham' => $faker->text(),
        'jenis_mata_uang' => $faker->randomElement(['idr','usd']),
        'pembayaran_no_rek' => $faker->isbn10(),
        'pembayaran_nm_rek' => $faker->isbn10(),
        'pembayaran_nm_bank' => $faker->isbn10(),
        'no_sk3s_lama' => $faker->randomElement(['1',NULL]),
        'perubahan_ke' => $faker->randomNumber(2),
        'status_verifikasi' => $faker->randomElement(['0','1','2']),
    ];
});

$factory->define(App\Persetujuan::class, function (Faker $faker) {
    return [
        'investor_id' => $faker->randomDigit(),
        'agen_pemasaran_id' => $faker->randomDigit(),
        'tanda_tangan_agen_pemasaran' => $faker->randomElement(['0','1']),
        'tanggal_agen_pemasaran' => $faker->dateTimeThisCentury->format('Y:m:d'),
        'pejabat_berwenang_id' => $faker->randomDigit(),

        'status_persetujuan' => $faker->randomElement(['disetujui','tidak_disetujui']),
        'tanda_tangan_pejabat_berwenang' => $faker->randomElement(['0','1']),
        'tanggal_pejabat_berwenang' => $faker->dateTimeThisCentury->format('Y:m:d'),
    ];
});

$factory->define(App\Investor::class, function (Faker $faker) {
    return [
        'no_register' => $faker->randomNumber(2),
        'nm_investor' => $faker->name(),
        'jenis_rekening' => $faker->randomElement(['perorangan','nonperorangan']),
        'no_cif' => $faker->randomNumber(3),
        'staf_pemasaran_id' => $faker->randomNumber(1),
        'jenis_kelamin' => $faker->randomElement(['L','P']),
        'no_ktp' => $faker->randomElement(['idr','usd']),
        'no_npwp' => $faker->randomNumber(1),
        'tgl_kadaluarsa_ktp' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'tgl_registrasi_npwp' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'tempat_lahir' => $faker->cityPrefix(),
        'tanggal_lahir' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'status_perkawinan' => $faker->randomElement(['menikah','belum_menikah','janda/duda']),
        'kewarganegaraan' => $faker->randomElement(['wni','wna']),
        'alamat_ktp' => $faker->randomElement(['0','1']),
        'rt_ktp' => $faker->randomElement(['0','1']),
        'rw_ktp' => $faker->randomElement(['0','1']),
        'kecamatan_ktp' => $faker->randomElement(['0','1']),
        'kelurahan_ktp' => $faker->randomElement(['0','1']),
        'kota_ktp' => $faker->randomElement(['0','1']),
        'provinsi_ktp' => $faker->randomElement(['0','1']),
        'kode_pos_ktp' => $faker->randomElement(['0','1']),
        'alamat_tempat_tinggal' => $faker->randomElement(['0','1']),
        'rt_tempat_tinggal' => $faker->randomElement(['0','1']),
        'rw_tempat_tinggal' => $faker->randomElement(['0','1']),
        'kecamatan_tempat_tinggal' => $faker->randomElement(['0','1']),
        'kelurahan_tempat_tinggal' => $faker->randomElement(['0','1']),
        'kota_tempat_tinggal' => $faker->randomElement(['0','1']),
        'provinsi_tempat_tinggal' => $faker->randomElement(['0','1']),
        'kode_pos_tempat_tinggal' => $faker->randomElement(['0','1']),
        'telp_rumah' => $faker->randomElement(['0','1']),
        'ponsel' => $faker->randomElement(['0','1']),
        'lama_menempati' => $faker->randomElement(['0','1']),
        'status_rumah_tinggal' => $faker->randomElement(['0','1']),
        'agama' => $faker->randomElement(['0','1']),
        'pendidikan_terakhir' => $faker->randomElement(['0','1']),
        'nm_gadis_ibu_kandung' => $faker->randomElement(['0','1']),
        'emergency_kontak' => $faker->randomElement(['0','1']),
        'jumlah_tanggungan' => $faker->randomElement(['0','1']),
        'alamat_surat_menyurat_ktp' => $faker->randomElement(['0','1']),
        'alamat_surat_menyurat_tempat_tinggal' => $faker->randomElement(['0','1']),
        'alamat_surat_menyurat_lainnya' => $faker->randomElement(['0','1']),
        'pengiriman_konfirmasi_melalui_email' => $faker->randomElement(['0','1']),
        'pengiriman_konfirmasi_melalui_fax' => $faker->randomElement(['0','1']),
        'pengiriman_konfirmasi_melalui_alamat_surat_menyurat' => $faker->randomElement(['0','1']),
        'tujuan_investasi' => $faker->randomElement(['0','1']),
        'status_verifikasi' => $faker->randomElement(['0','1','2']),
    ];
});

$factory->define(App\AhliWarisInvestor::class, function (Faker $faker) {
    return [
        'investor_id' => $faker->randomNumber(3),
        'nm_ahli_waris' => $faker->name(),
        'hubungan_ahli_waris' => $faker->name(),
    ];
});

$factory->define(App\DataPasanganOrangTuaInvestor::class, function (Faker $faker) {
    return [
        'investor_id' => $faker->randomNumber(3),
        'nm_pasangan_atau_orang_tua' => $faker->name(),
        'hubungan' => $faker->name(),
        'alamat_tempat_tinggal_pasangan_atau_orang_tua' => $faker->address(),
        'telp_rumah_pasangan_atau_orang_tua' => $faker->phoneNumber(),
        'ponsel_pasangan_atau_orang_tua' => $faker->text(),
        'pekerjaan_pasangan_atau_orang_tua' => $faker->name(),
        'nm_perusahaan_pasangan_atau_orang_tua' => $faker->name(),
        'alamat_perusahaan_pasangan_atau_orang_tua' => $faker->address(),
        'kota_perusahaan_pasangan_atau_orang_tua' => $faker->text(),
        'provinsi_perusahaan_pasangan_atau_orang_tua' => $faker->text(),
        'kode_pos_perusahaan_pasangan_atau_orang_tua' => $faker->postcode(),
        'telp_perusahaan_pasangan_atau_orang_tua' => $faker->phoneNumber(),
        'email_perusahaan_pasangan_atau_orang_tua' => $faker->email(),
        'fax_perusahaan_pasangan_atau_orang_tua' => $faker->e164PhoneNumber(),
        'jabatan_pasangan_atau_orang_tua' => $faker->randomElement(['komisaris','direksi','manajer','staf','pemilik','pengawas']),
        'jenis_usaha_pasangan_atau_orang_tua' => $faker->name(),
        'lama_bekerja_pasangan_atau_orang_tua' => $faker->randomNumber(3),
        'penghasilan_kotor_per_tahun_pasangan_atau_orang_tua' => $faker->name(),
        'sumber_penghasilan_utama_pasangan_atau_orang_tua' => $faker->randomElement(['gaji','hasiL_usaha','warisan','dari_orang_tua/anak','dari_suami/istri','hasil_investasi','lainnya']),
    ];
});

$factory->define(App\DokumenPendukungInvestor::class, function (Faker $faker) {
    return [
        'investor_id' => $faker->randomNumber(3),
        'ktp' => $faker->randomElement(['1','0']),
        'npwp' => $faker->randomElement(['1','0']),
        'form_profil_resiko_pemodal' => $faker->randomElement(['1','0']),
        'bukti_setoran_investasi_awal' => $faker->randomElement(['1','0']),
        'contoh_tanda_tangan' => $faker->randomElement(['1','0']),
        'fatca' => $faker->randomElement(['1','0']),
    ];
});

$factory->define(App\PekerjaanInvestor::class, function (Faker $faker) {
    return [
        'investor_id' => $faker->randomNumber(3),
        'pekerjaan' => $faker->randomElement(['1','0']),
        'nm_perusahaan' => $faker->company(),
        'alamat_perusahaan' => $faker->streetAddress(),
        'kota_perusahaan' => $faker->city(),
        'provinsi_perusahaan' => $faker->secondaryAddress(),
        'kode_pos_perusahaan' => $faker->ean13(),
        'telp_perusahaan' => $faker->ean13(),
        'email_perusahaan' => $faker->email(),
        'fax_perusahaan' => $faker->randomElement(['1','0']),
        'jabatan' => $faker->randomElement(['komisaris','direksi','manajer','staf','pemilik','pengawas']),
        'jenis_usaha' => $faker->ean13(),
        'lama_bekerja' => $faker->randomNumber(3),
        'sumber_penghasilan_utama' => $faker->randomElement(['gaji','hasiL_usaha','warisan','dari_orang_tua/anak','dari_suami/istri','hasil_investasi','lainnya']),
        'penghasilan_lain' => $faker->randomElement(['1','0']),
        'sumber_penghasilan_lainnya' => $faker->randomElement(['gaji','hasiL_usaha','warisan','dari_orang_tua/anak','dari_suami/istri','hasil_investasi','lainnya']),
        'sumber_dana_investasi' => $faker->randomElement(['gaji','hasiL_usaha','warisan','dari_orang_tua/anak','dari_suami/istri','hasil_investasi','lainnya']),
    ];
});
