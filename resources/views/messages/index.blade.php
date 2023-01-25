@extends('layouts.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pesan</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Pesan</h6>
</nav>
@endsection

@section('content')
<div class="d-sm-flex justify-content-between">
    <div>
        @if (Auth::user()->role == 'customer')
        <a href="{{ route('messages.create') }}" class="btn btn-icon bg-gradient-dark">
            Pesan Baru
        </a>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-flush" id="datatable-search">
                    <thead class="thead-light">
                        <tr>
                            <th>Waktu Pesan</th>
                            <th>Customer</th>
                            <th>Kamar</th>
                            <th>Isi Pesan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                        <tr>
                            <td class="font-weight-bold">
                                <span class="my-2 text-xs">{{ $message->created_at->format('d M, h:i A') }}</span>
                            </td>
                            <td class="text-xs font-weight-bold">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xs me-2 bg-gradient-dark">
                                        <span>{{ substr($message->customer->user->name, 0, 1) }}</span>
                                    </div>
                                    <span>{{ $message->customer->user->name }}</span>
                                </div>
                            </td>
                            <td class="text-xs font-weight-bold">
                                <span class="my-2 text-xs">{{ $message->customer->room->name }}</span>
                            </td>
                            <td class="text-xs font-weight-bold">
                                <span class="my-2 text-xs">{!! Str::limit($message->message, $limit = 50, $end = '...') !!}</span>
                            </td>
                            <td class="text-xs font-weight-bold">
                                <div class="d-flex align-items-center">
                                    @if ($message->status == 'accept')
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
                                    <a href="{{ route('messages.updateStatus', $message->id) }}" class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-2 btn-sm d-flex align-items-center justify-content-center">
                                        <i class="fas fa-exclamation" aria-hidden="true"></i>
                                    </a>
                                    <span>Pending</span>
                                    @endif
                                    @endif
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="#" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Detail customer" data-bs-toggle="modal" data-bs-target="#detail{{ $message->id }}">
                                    <i class="fa fa-clipboard"></i> Detail Pesan
                                </a> &nbsp;
                                @if (Auth::user()->role == 'customer' && $message->status == 'pending')
                                <a href="{{ route('messages.edit', $message->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit transaksi">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                @endif
                            </td>
                        </tr>
                        <div class="modal fade" id="detail{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-default">Detail Pesan</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <dl class="row">
                                            <dt class="col-sm-4">Nama Customer</dt>
                                            <dd class="col-sm-8">{{ $message->customer->user->name }}</dd>

                                            <dt class="col-sm-4">Nama Kamar</dt>
                                            <dd class="col-sm-8">{{ $message->customer->room->name }}</dd>

                                            <dt class="col-sm-4">Isi Pesan</dt>
                                            <dd class="col-sm-8">{!! $message->message !!}</dd>
                                        </dl>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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