@extends('layouts.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Pembayaran</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail Pembayaran</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Detail Pembayaran</h6>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card mb-4">
            <div class="card-header p-3 pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Detail Transaksi</h6>
                        <p class="text-sm">
                            Tanggal Bayar:
                            {{ $transaction->created_at->format('d M, h:i A') }}
                        </p>
                    </div>
                    <a href="javascript:;" class="btn bg-gradient-secondary ms-auto mb-0">Faktur</a>
                </div>
            </div>
            <div class="card-body p-3 pt-0">
                <hr class="horizontal dark mt-0 mb-4">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="d-flex">
                            <div>
                                <div class="avatar avatar-xxl me-3 bg-gradient-dark">
                                    <h1 class="text-light font-weight-bold mx-auto" style="font-size: 72px">
                                        {{ substr($transaction->customer->user->name, 0, 1) }}
                                    </h1>
                                </div>
                            </div>
                            <div>
                                <h6 class="text-lg mb-0 mt-2">{{ $transaction->customer->user->name }}</h6>
                                <p class="text-sm mb-3">{{ $transaction->customer->room->name }}</p>
                                @if($transaction->status == 'accept')
                                <span class="badge badge-sm bg-gradient-success">Sukses</span>
                                @else
                                <span class="badge badge-sm bg-gradient-warning">Pending</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="horizontal dark mt-2 mb-4">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <h6 class="mb-3">Bulan yang dibayar</h6>
                        <div class="timeline timeline-one-side">
                            @foreach($transaction->transactionDetails as $data)
                            <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                    <i class="ni ni-check-bold text-success text-gradient"></i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $data->month }}</h6>
                                    {{-- <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 4:54 PM</p> --}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <h6 class="mb-3">Metode Pembayaran</h6>
                        @if ($transaction->payment_method == 'cash')
                        <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                            <img class="w-10 me-3 mb-0" src="{{ asset('assets/img/logos/money.png') }}" alt="logo">
                            <h6 class="mb-0">CASH</h6>
                        </div>
                        @else
                        <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                            <img class="w-10 me-3 mb-0" src="{{ asset('assets/img/logos/mastercard.png') }}" alt="logo">
                            <h6 class="mb-0">TRANSFER</h6>
                            <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="We do not store card details">
                                <i class="fas fa-info" aria-hidden="true"></i>
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-5 col-md-6 col-12">
                        <h6 class="mb-3">Deskripsi</h6>
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">{{ $transaction->description }}</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="horizontal dark mt-2 mb-4">
                <div class="row">
                    <div class="col-lg-6 col-12 ms-auto">
                        <h6 class="mb-3">Ringkasan</h6>
                        <div class="d-flex justify-content-between">
                            <span class="mb-2 text-sm">
                                Harga kamar:
                            </span>
                            <span class="text-dark font-weight-bold ms-2">Rp
                                {{ number_format($transaction->customer->room->roomType->price,0,',','.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="mb-2 text-sm">
                                Jumlah bulan yang dibayar:
                            </span>
                            <span class="text-dark ms-2 font-weight-bold">{{ $countMonth }} bulan</span>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <span class="mb-2 text-lg">
                                Total:
                            </span>
                            <span class="text-dark text-lg ms-2 font-weight-bold">Rp
                                {{ number_format($transaction->total,0,',','.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection