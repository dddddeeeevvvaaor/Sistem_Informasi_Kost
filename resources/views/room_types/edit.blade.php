@extends('layouts.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Tipe Kamar</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Tipe Kamar</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Edit Tipe Kamar</h6>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Tipe Kamar</h5>
            </div>
            <div class="card-body pt-0">
                <form action="{{ route('roomTypes.update', $roomType->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <label for="name" class="form-label">Nama Tipe Kamar <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" name="name" onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $roomType->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="description" class="form-label">Deskripsi Tipe Kamar</label>
                            <div class="input-group">
                                <textarea id="description" name="description" class="form-control" cols="30" rows="5" onfocus="focused(this)" onfocusout="defocused(this)">{{ $roomType->description }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Fasilitas <span class="text-danger">*</span></label>
                                <select class="form-control" name="facility_id[]" id="choices-facility" multiple>
                                    @foreach ($facilities as $facility)
                                    <option value="{{ $facility->id }}" {{ $facility_roomTypes->contains('facility_id', $facility->id) ? 'selected' : '' }}>{{ $facility->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="price" class="form-label">Harga <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="price" name="price" onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $roomType->price }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label>Kurs Mata Kuang <span class="text-danger">*</span></label>
                                <select class="form-control" name="currency" id="choices-currency">
                                    <option value="IDR" selected="">IDR</option>
                                    <option value="EUR">EUR</option>
                                    <option value="USD">USD</option>
                                    <option value="CNY">CNY</option>
                                    <option value="INR">INR</option>
                                    <option value="BTC">BTC</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('roomTypes.index') }}" class="btn btn-light m-0">Cancel</a>
                            <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">Simpan</button>
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
    if (document.getElementById('choices-facility')) {
        var tags = document.getElementById('choices-facility');
        const examples = new Choices(tags, {
            removeItemButton: true
        });
    };

    if (document.getElementById('choices-currency')) {
        var element = document.getElementById('choices-currency');
        const example = new Choices(element, {
            searchEnabled: false
        });
    };
</script>
@endpush