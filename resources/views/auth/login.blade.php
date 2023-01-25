@extends('layouts.base')

@section('slot')
<div class="page-header section-height-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                <div class="card card-plain mt-4">
                    <div class="card-header pb-0 text-left bg-transparent">
                        <h3 class="font-weight-bolder text-info text-gradient">Selamat Datang</h3>
                        <p class="mb-0">Silahkan login.<br></p>
                        <p class="mb-0">Belum memiliki akun? Hubungi admin.<br></p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" method="POST" role="form text-left">
                            @csrf
                            <div class="mb-3">
                                <label for="email">{{ __('Email') }}</label>
                                <div class="@error('email') border border-danger rounded-3 @enderror">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                </div>
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">{{ __('Password') }}</label>
                                <div class="@error('password')border border-danger rounded-3 @enderror">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                </div>
                                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">{{ __('Sign in') }}</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        @if (Route::has('password.request'))
                        <small class="text-muted">{{ __('Forgot your password? Reset your password') }} <a href="{{ route('password.request') }}" class="text-info text-gradient font-weight-bold">{{ __('here') }}</a></small>
                        @endif
                        {{-- <p class="mb-4 text-sm mx-auto">
                                {{ __(' Don\'t have an account?') }}
                        <a href="{{ route('register') }}" class="text-info text-gradient font-weight-bold">{{ __('Sign up') }}</a>
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                    <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/background-auth.jpg')"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection