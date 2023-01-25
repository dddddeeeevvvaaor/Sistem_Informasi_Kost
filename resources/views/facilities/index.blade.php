@extends('layouts.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Fasilitas Kamar</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Fasilitas Kamar</h6>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <a href="{{ route('facilities.create') }}" class="btn bg-gradient-dark">Tambah Fasilitas baru</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table table-flush" id="datatable-search">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Deskripsi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" style="width: 220px">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($facilities as $facility)
                            <tr>
                                <td class="text-sm font-weight-normal">{{ $facility->name }}</td>
                                <td class="text-sm font-weight-normal">{{ $facility->description }}</td>
                                <td class="text-center">
                                    <a href="{{ route('facilities.edit', $facility->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        <i class="fa fa-edit"></i>&nbsp; Edit &nbsp;
                                    </a>
                                    <form action="{{ route('facilities.destroy', $facility->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="text-secondary font-weight-bold text-xs" onclick="this.closest('form').submit();return false;">
                                            <i class="fa fa-trash"></i> Delete &nbsp;
                                        </a>
                                    </form>
                                </td>
                            </tr>
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