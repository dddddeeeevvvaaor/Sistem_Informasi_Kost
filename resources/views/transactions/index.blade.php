@extends('layouts.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pembayaran</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Pembayaran</h6>
</nav>
@endsection

@section('content')
<div class="d-sm-flex justify-content-between">
    <div>
        <a href="{{ route('transactions.create') }}" class="btn btn-icon bg-gradient-dark">
            Pembayaran Baru
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-flush" id="datatable-search">
                    <thead class="thead-light">
                        <tr>
                            <th>Tanggal Bayar</th>
                            <th>Status</th>
                            <th>Customer</th>
                            <th>Kamar</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                            <td class="font-weight-bold">
                                <span class="my-2 text-xs">{{ $transaction->created_at->format('d M, h:i A') }}</span>
                            </td>
                            <td class="text-xs font-weight-bold">
                                <div class="d-flex align-items-center">
                                    @if ($transaction->status == 'accept')
                                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center">
                                        <i class="fas fa-check" aria-hidden="true"></i>
                                    </button>
                                    <span>Sukses</span>
                                    @else
                                    @if (Auth::user()->role == 'customer')
                                    <a href="#" class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-2 btn-sm d-flex align-items-center justify-content-center">
                                        <i class="fas fa-exclamation" aria-hidden="true"></i>
                                    </a>
                                    <span>Pending</span>
                                    @else
                                    <a href="{{ route('transactions.updateStatus', $transaction->id) }}" class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-2 btn-sm d-flex align-items-center justify-content-center">
                                        <i class="fas fa-exclamation" aria-hidden="true"></i>
                                    </a>
                                    <span>Pending</span>
                                    @endif
                                    @endif
                                </div>
                            </td>
                            <td class="text-xs font-weight-bold">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xs me-2 bg-gradient-dark">
                                        <span>{{ substr($transaction->customer->user->name, 0, 1) }}</span>
                                    </div>
                                    <span>{{ $transaction->customer->user->name }}</span>
                                </div>
                            </td>
                            <td class="text-xs font-weight-bold">
                                <span class="my-2 text-xs">{{ $transaction->customer->room->name }}</span>
                            </td>
                            <td class="text-xs font-weight-bold">
                                <span class="my-2 text-xs">Rp {{ number_format($transaction->total,0,',','.') }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('transactions.show', $transaction->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Detail transaksi">
                                    <i class="fa fa-clipboard"></i> Detail
                                </a> &nbsp;
                                @if (Auth::user()->role == 'admin' || (Auth::user()->role == 'customer' && $transaction->status == 'pending'))
                                <a href="{{ route('transactions.edit', $transaction->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit transaksi">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@push('script')
<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true,
        perPageSelect: false
    });
</script>
@endpush