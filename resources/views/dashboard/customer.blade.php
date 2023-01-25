@extends('layouts.master')

@section('content')
<div class="row">
    @foreach($customers as $customer)
    @if($customer->user->id == Auth::user()->id)
    <div class="col-lg-6 mb-lg-0 mt-md-0 mt-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex flex-column h-100">
                            <p class="mb-1 pt-2 text-bold">Informasi Kamar Anda</p>
                            <h5 class="font-weight-bolder">{{ $customer->room->name }}</h5>
                            <dl class="row">
                                <dt class="col-sm-4">Tipe Kamar</dt>
                                <dd class="col-sm-8">{{ $customer->room->roomtype->name }}</dd>

                                <dt class="col-sm-4">Fasilitas</dt>
                                <dd class="col-sm-8">
                                    @foreach ($customer->room->roomtype->facility as $facility)
                                    {{ $facility->name . ($loop->last ? '.' : ', ') }}
                                    @endforeach
                                </dd>

                                <dt class="col-sm-4">Harga</dt>
                                <dd class="col-sm-8">Rp
                                    {{ number_format($customer->room->roomType->price,0,',','.') }}
                                </dd>
                            </dl>
                            <hr class="mb-3 mt-0">
                            <dl class="row">
                                <dt class="col-sm-4">Nama Penyewa</dt>
                                <dd class="col-sm-8">{{ Auth::user()->name }}</dd>

                                <dt class="col-sm-4">Jenis Kelamin</dt>
                                <dd class="col-sm-8">
                                    @if($customer->gender == 'L')
                                    <div class="col-sm-8">Laki Laki</div>
                                    @else
                                    <div class="col-sm-8">Perempuan</div>
                                    @endif
                                </dd>

                                <dt class="col-sm-4">Email Akun</dt>
                                <dd class="col-sm-8">{{ Auth::user()->email }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
<div class="row mt-4">
    <div class="col-lg-5 mt-md-0 mt-4">

    </div>

</div>
@endsection

@push('script')
<script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
@endpush