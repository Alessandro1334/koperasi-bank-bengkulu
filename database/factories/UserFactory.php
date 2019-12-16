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

       