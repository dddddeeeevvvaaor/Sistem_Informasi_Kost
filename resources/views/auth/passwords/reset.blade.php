@extends('layouts.base')

@section('slot')
<div class="page-header section-height-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-8 col-12 px-5 d-flex flex-column">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left bg-transparent">
                        <h3 class="text-info text-gradient">Reset Password</h3>
                        <p class="mb-0">Create your new password</p>
                    </div>
                    <div class="card-body pb-3">
                        <form role="form" method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <label>Email</label>
                            <div class="mb-3 @error('email') border border-danger rounded-3 @enderror">
                                <input id="email" type="email" class="form-control" placeholder="Enter your e-mail" aria-label="Email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
                            </div>
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror

                            <label>New Password</label>
                            <div class="mb-3 @error('password') border border-danger rounded-3 @enderror">
                                <input id="password" type="password" class="form-control" placeholder="Enter your new password" aria-label="Password" name="password" required autocomplete="new-password">
                            </div>
                            @error('password') <div class="text-danger">{{ $message }}</div> @enderror

                            <label>Confirm Password</label>
                            <div class="mb-3">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                    <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved11.jpg')"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection