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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\SahamInvestor::class, function (Faker $faker) {
    return [
        'investor_id' => $faker->randomDigit(),
        'seri_spmpkop' => $faker->randomNumber(3),
        'seri_formulir' => $faker->randomNumber(3),
        'jumlah_saham' => $faker->isbn10(),
        'terbilang_saham' => $faker->text(),
        'jenis_mata_uang' => $faker->randomElement(['idr','usd']),
        'pembayaran_no_rek' => $faker->isbn10(),
        'pembayaran_nm_rek' => $faker->isbn10(),
        'pembayaran_nm_bank' => $faker->isbn10(),
        'no_sk3s_lama' => $faker->isbn10(),
        'perubahan_ke' => $faker->randomNumber(2),
        'status_verifikasi' => $faker->randomElement(['0','1']),
    ];
});

$factory->define(App\Persetujuan::class, function (Faker $faker) {
    return [
        'investor' => $faker->randomDigit(),
        'nm_agen_pemasaran' => $faker->text(),
        'tanda_tangan_agen_pemasaran' => $faker->randomElement(['0','1']),
        'tanggal_agen_pemasaran' => $faker->date($max='now'),
        'nm_pejabat_berwenang' => $faker->text(),
        'status_persetujuan' => $faker->randomElement(['disetujui','tidak_disetujui']),
        'tanda_tangan_pejabat_berwenang' => $faker->randomElement(['0','1']),
        'tanggal_pejabat_berwenang' => $faker->dateTimeThisCentury->format('H:i:s'),
    ];
});

$factory->define(App\Investor::class, function (Faker $faker) {
    return [
        'nm_investor' => $faker->name(),
        'kode_nasabah' => $faker->randomNumber(3),
        'no_cif' => $faker->randomNumber(3),
        'staf_pemasaran' => $faker->randomNumber(1),
        'jenis_kelamin' => $faker->randomElement(['L','P']),
        'no_ktp' => $faker->randomElement(['idr','usd']),
        'no_npwp' => $faker->randomNumber(1),
        'tgl_kadaluarsa_ktp' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'tgl_kadaluarsa_npwp' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'tempat_lahir' => $faker->cityPrefix(),
        'tanggal_lahir' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'status_perkawinan' => $faker->randomElement(['1','0']),
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
    ];
});
