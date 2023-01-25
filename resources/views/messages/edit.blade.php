@extends('layouts.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Pesan</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Pesan</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Edit Pesan</h6>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Pesan</h5>
            </div>
            <div class="card-body pt-0">
                <form action="{{ route('messages.update', $message->id) }}" method="POST" id="form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <label for="name" class="form-label">Nama Customer</label>
                            <select class="form-control" name="customer_id" id="choices-customer" disabled>
                                <option value="{{ $customer->id }}" selected>{{ $customer->user->name . ' - ' . $customer->room->name }}</option>
                            </select>
                            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="message" class="form-label">Isi Pesan</label>
                            <div class="input-group">
                                <textarea id="message" name="message" class="form-control" cols="30" rows="5" onfocus="focused(this)" onfocusout="defocused(this)">{{ $message->message }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('messages.index') }}" class="btn btn-light m-0">Cancel</a>
                        <button type="submit" class="btn bg-gradient-primary m-0 ms-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    if (document.getElementById('choices-customer')) {
        var tags = document.getElementById('choices-customer');
        const examples = new Choices(tags, {
            searchEnabled: true,
            searchPlaceholderValue: 'Search...',
            shouldSort: false,
        });
    };
</script>
@endpush