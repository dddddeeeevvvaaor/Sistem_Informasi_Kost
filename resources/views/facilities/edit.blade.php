@extends('layouts.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Fasilitas
                Kamar</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Fasilitas Kamar</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Tambah Fasilitas Kamar</h6>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Fasilitas Baru</h5>
            </div>
            <div class="card-body pt-0">
                <form action="{{ route('facilities.update', $facility->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <label for="name" class="form-label">Nama Fasilitas</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" name="name" onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $facility->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="description" class="form-label">Deskripsi Fasilitas</label>
                            <div class="input-group">
                                <textarea id="description" name="description" class="form-control" cols="30" rows="5" onfocus="focused(this)" onfocusout="defocused(this)">{{ $facility->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('facilities.index') }}" class="btn btn-light m-0">Cancel</a>
                        <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection