@extends('admin.layout')

@section('title', 'Add Restaurant')

@section('content')

<h1 class="page-title">Add New Restaurant</h1>
<div class="page-sub"></div>

<div class="stat-card mt-3" style="padding: 32px;">

    <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- IMAGE --}}
        <div class="mb-4 row align-items-center">
            <label class="col-sm-3 col-form-label fw-semibold">Main Image</label>
            <div class="col-sm-9">
                <input type="file" name="image_main" class="form-control" required>
            </div>
        </div>

        {{-- NAME --}}
        <div class="mb-4 row align-items-center">
            <label class="col-sm-3 col-form-label fw-semibold">Restaurant Name</label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control" required>
            </div>
        </div>

        {{-- LOCATION --}}
        <div class="mb-4 row align-items-center">
            <label class="col-sm-3 col-form-label fw-semibold">Location</label>
            <div class="col-sm-9">
                <input type="text" name="location" class="form-control" required>
            </div>
        </div>

        {{-- BUTTON --}}
        <div class="mt-5">
            <button class="btn w-100 py-3 fw-bold text-white"
                style="background: var(--yellow); font-size: 18px;">
                + Add New Restaurant
            </button>
        </div>

    </form>

</div>

@endsection