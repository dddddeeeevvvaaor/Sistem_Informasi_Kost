@extends('layouts.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Manajemen Kamar</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Manajemen Kamar</h6>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-1">Daftar Kamar</h6>
            </div>
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card h-100 card-plain border">
                            <div class="card-body d-flex flex-column justify-content-center text-center">
                                <a href="{{ route('rooms.create') }}">
                                    <i class="fa fa-plus text-secondary mb-3" aria-hidden="true"></i>
                                    <h5 class=" text-secondary"> Tambah Kamar Baru </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    @foreach ($rooms as $room)
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="card-body px-1 pb-0">
                                <p class="text-gradient text-dark mb-2 text-sm">{{ $room->roomType->name }}</p>
                                <a href="javascript:;">
                                    <h5>
                                        {{ $room->name }}
                                    </h5>
                                </a>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-4 text-sm">
                                        {{ '(' . $room->roomType->currency . ') ' . number_format($room->roomType->price,0,',','.') }}
                                    </p>
                                    <p class="mb-4 text-sm">
                                        @if ($room->status == 'available')
                                        <span class="badge badge-success text-dark">Tersedia</span>
                                        @else
                                        <span class="badge badge-danger text-dark">Terisi</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-outline-info btn-sm mb-0">Detail Kamar</a>
                                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-outline-dark btn-sm mb-0 px-3" title="Edit Kamar"><i class="fas fa-edit" style="font-size: 13px"></i></a>
                                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <a href="" class="btn btn-outline-primary btn-sm mb-0 px-3" title="Hapus Kamar" onclick="this.closest('form').submit();return false;">
                                            <i class="fas fa-trash" style="font-size: 13px"></i>
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection