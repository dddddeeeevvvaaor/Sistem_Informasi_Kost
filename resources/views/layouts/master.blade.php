@extends('layouts.base')

@section('slot')
@include('layouts.partials.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    @include('layouts.partials.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        @yield('content')
        @include('layouts.partials.footer')
    </div>
</main>
@endsection