@extends('admin.layout')

@section('title', 'Edit Restaurant')

@section('content')

<h1 class="page-title">
    Edit – {{ $detail->restaurant->name }}
</h1>
<div class="page-sub"></div>

<div class="stat-card mt-3" style="padding: 32px;">

    <form action="{{ route('admin.restaurants.update', $detail->id) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- CURRENT IMAGE --}}
        <div class="mb-4 row align-items-start">
            <label class="col-sm-3 col-form-label fw-semibold">Current Image</label>

            <div class="col-sm-6">
                <img src="{{ asset($detail->image_main) }}"
                    class="rounded shadow mb-3"
                    style="width: 230px;">
            </div>
        </div>

        {{-- NEW IMAGE --}}
        <div class="mb-4 row align-items-center">
            <label class="col-sm-3 col-form-label fw-semibold">Replace Image</label>

            <div class="col-sm-6">
                <input type="file" name="image_main" class="form-control">
            </div>
        </div>

        {{-- NAME --}}
        <div class="mb-4 row align-items-center">
            <label class="col-sm-3 col-form-label fw-semibold">Restaurant Name</label>

            <div class="col-sm-6">
                <input type="text"
                    name="name"
                    class="form-control"
                    value="{{ $detail->restaurant->name }}"
                    required>
            </div>
        </div>

        {{-- LOCATION --}}
        <div class="mb-4 row align-items-center">
            <label class="col-sm-3 col-form-label fw-semibold">Location</label>

            <div class="col-sm-6">
                <input type="text"
                    name="location"
                    class="form-control"
                    value="{{ $detail->location }}"
                    required>
            </div>
        </div>

        {{-- BUTTONS --}}
        <div class="mt-5 d-flex gap-3">
            <a href="{{ route('admin.restaurants.index') }}"
                class="btn py-3 px-5 fw-bold text-white"
                style="background: #d9534f; width: 200px;">
                Cancel
            </a>

            <button type="submit"
                class="btn py-3 px-5 fw-bold text-white"
                style="background: #5cb85c; width: 200px;">
                Update
            </button>
        </div>

    </form>

</div>

@endsection