@extends('layouts.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Manajemen Customer</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Customer Baru</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Customer</h6>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Customer Baru</h5>
            </div>
            <div class="card-body pt-0">
                <form action="{{ route('customers.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="id_number" class="form-label">No. KTP Customer</label>
                            <input type="text" class="form-control" name="id_number" id="id_number" onfocus="focused(this)" onfocusout="defocused(this)" required>
                        </div>
                        <div class="col-6">
                            <label for="name" class="form-label">Nama Customer</label>
                            <input type="text" class="form-control" name="name" id="name" onfocus="focused(this)" onfocusout="defocused(this)" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name="gender" id="choices-gender" required>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="room_id" class="form-label">Pilih Kamar</label>
                            <select class="form-control" name="room_id" id="choices-room" required>
                                @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label for="description" class="form-label">No. Telp</label>
                            <p class="form-text text-muted text-xs ms-1 d-inline">
                                (optional)
                            </p>
                            <div class="input-group">
                                <input type="number" class="form-control" name="phone_number" id="phone_number" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="description" class="form-label">No. WhatsApp</label>
                            <p class="form-text text-muted text-xs ms-1 d-inline">
                                (optional)
                            </p>
                            <div class="input-group">
                                <input type="number" class="form-control" name="whatsapp_number" id="whatsapp_number" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <label for="address" class="form-label">Alamat</label>
                            <div class="input-group">
                                <textarea id="address" name="address" class="form-control" cols="30" rows="5" onfocus="focused(this)" onfocusout="defocused(this)" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('customers.index') }}" class="btn btn-light m-0">Cancel</a>
                        <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
<script>
    if (document.getElementById('choices-room')) {
        var tags = document.getElementById('choices-room');
        const examples = new Choices(tags, {
            searchEnabled: true,
            shouldSort: false,
        });
    };

    if (document.getElementById('choices-gender')) {
        var tags = document.getElementById('choices-gender');
        const examples = new Choices(tags, {
            searchEnabled: true,
            shouldSort: false,
        });
    };
</script>
@endpush