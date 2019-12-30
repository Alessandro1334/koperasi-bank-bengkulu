<style>
    .side_bg {
        filter: brightness(75%);
    }
</style>
@extends('layouts.auth')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Gagal:</strong> {{ $message }}
                    </div>
                @endif
                <span class="login100-form-title p-b-43">
                    Login Koperasi Bank Bengkulu
                </span>


                <div class="wrap-input100 validate-input" data-validate = "Valid Nama Pengguna is required: ex@abc.xyz">
                    <input class="input100" type="email" name="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Nama Pengguna</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Kata Sandi is required">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Kata Sandi</span>
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox">
                    </div>

                    <div>
                    </div>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Masuk
                    </button>
                </div>

                <div class="text-center p-t-46 p-b-20">
                    <span class="txt2">
                        © {{ date('Y') }} RuangUjung.com. All Rights Reserved.
                    </span>
                </div>

                <div class="login100-form-social flex-c-m">
                </div>
            </form>

            <div class="login100-more side_bg" style="background-image: url( {{asset('assets/auth/images/bg-01.jpg') }}">
            </div>
        </div>
    </div>
</div>

@endsection
