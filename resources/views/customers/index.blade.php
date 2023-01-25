@extends('layouts.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Manajemen Customer</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Manajemen Customer</h6>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <a href="{{ route('customers.create') }}" class="btn bg-gradient-dark">Tambah Customer Baru</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table table-flush" id="datatable-search">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Kamar</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    No. Telp/WhatsApp</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" style="width: 220px">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td class="text-sm font-weight-normal">{{ $customer->user->name }}</td>
                                <td class="text-sm font-weight-normal">{{ $customer->room->name }}</td>
                                <td class="text-sm font-weight-normal">
                                    @if ($customer->phone_number == $customer->whatsapp_number)
                                    <a href="https://wa.me/62{{ ltrim($customer->phone_number, '0') }}" target="_blank">{{ $customer->phone_number . ' (WhatsApp)' }}</a>
                                    @else
                                    {{ $customer->phone_number }}/<a href="https://wa.me/62{{ ltrim($customer->whatsapp_number, '0') }}" target="_blank">{{ $customer->whatsapp_number  . ' (WhatsApp)' }}</a>
                                    @endif
                                </td>
                                <td class="text-sm font-weight-normal">
                                    @if ($customer->status == 'active')
                                    <a href="{{ route('customers.updateStatus', $customer->id) }}" title="Klik untuk mengubah status customer"><span class="badge badge-success text-dark">Active</span></a>
                                    @else
                                    <a href="{{ route('customers.updateStatus', $customer->id) }}" title="Klik untuk mengubah status customer"><span class="badge badge-danger text-dark">Inactive</span></a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="#" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Detail customer" data-bs-toggle="modal" data-bs-target="#detail{{ $customer->id }}">
                                        <i class="fa fa-clipboard"></i>&nbsp; Detail &nbsp;
                                    </a>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit customer">
                                        <i class="fa fa-edit"></i>&nbsp; Edit &nbsp;
                                    </a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="text-secondary font-weight-bold text-xs" onclick="this.closest('form').submit();return false;">
                                            <i class="fa fa-trash"></i> Delete &nbsp;
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            <div class="modal fade" id="detail{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modal-title-default">Detail Customer</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <dl class="row">
                                                <dt class="col-sm-4">Nama Lengkap</dt>
                                                <dd class="col-sm-8">{{ $customer->user->name }}</dd>

                                                <dt class="col-sm-4">No. KTP</dt>
                                                <dd class="col-sm-8">{{ $customer->id_number }}</dd>

                                                <dt class="col-sm-4">Jenis Kelamin</dt>
                                                <dd class="col-sm-8">{{ $customer->gender == 'L' ? 'Laki-Laki' : 'Perempuan' }}</dd>

                                                <dt class="col-sm-4">Kamar</dt>
                                                <dd class="col-sm-8">{{ $customer->room->name }}</dd>

                                                <dt class="col-sm-4">Kontak</dt>
                                                <dd class="col-sm-8">
                                                    @if ($customer->phone_number == $customer->whatsapp_number)
                                                    <a href="https://wa.me/62{{ ltrim($customer->phone_number, '0') }}" target="_blank">{{ $customer->phone_number . ' (WhatsApp)' }}</a>
                                                    @else
                                                    {{ $customer->phone_number }} / <br> <a href="https://wa.me/62{{ ltrim($customer->whatsapp_number, '0') }}" target="_blank">{{ $customer->whatsapp_number  . ' (WhatsApp)' }}</a>
                                                    @endif
                                                </dd>

                                                <dt class="col-sm-4">Alamat</dt>
                                                <dd class="col-sm-8">{{ $customer->address }}</dd>

                                                <dt class="col-sm-4">Email Kamar</dt>
                                                <dd class="col-sm-8">{{ $customer->user->email }}</dd>
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
</div>
@endsection

@push('script')
<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true
    });
</script>
@endpush