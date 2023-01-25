@extends('layouts.base')

@section('slot')
<div class="page-header section-height-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left bg-transparent">
                        <h3 class="font-weight-bolder text-primary text-gradient">Join us today</h3>
                        <p class="mb-0">Enter your email and password to register</p>
                    </div>
                    <div class="card-body pb-3">
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <label>Name</label>
                            <div class="mb-3 @error('name') border border-danger rounded-3 @enderror">
                                <input id="name" type="text" class="form-control" placeholder="Name" aria-label="Name" name="name" value="{{ old('name') }}" required autocomplete="name">
                            </div>
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                            <label>Email</label>
                            <div class="mb-3 @error('email') border border-danger rounded-3 @enderror">
                                <input id="email" type="email" class="form-control" placeholder="Email" aria-label="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            <label>Password</label>
                            <div class="mb-3 @error('password') border border-danger rounded-3 @enderror">
                                <input id="password" type="password" class="form-control" placeholder="Password" aria-label="Password" name="password" required autocomplete="new-password">
                            </div>
                            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                            <label>Confirm Password</label>
                            <div class="mb-3">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="form-check form-check-info text-left">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                <label class="form-check-label" for="flexCheckDefault">
                                    I agree the <a href="#" class="text-dark font-weight-bolder">Terms and Conditions</a>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Sign up</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-sm-4 px-1">
                        <p class="mb-4 mx-auto">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Sign in</a>
                        </p>
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