@extends('admin.layout')

@section('title', 'Add Menu')

@section('content')

<h1 class="page-title">Add New Menu</h1>
<div class="page-sub"></div>

<div class="stat-card mt-3" style="padding: 32px;">

    <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- IMAGE --}}
        <div class="mb-4 row align-items-center">
            <label class="col-sm-3 col-form-label fw-semibold">Menu Image</label>
            <div class="col-sm-9">
                <input type="file" name="image" class="form-control" required>
            </div>
        </div>


        {{-- NAME --}}
        <div class="mb-4 row align-items-center">
            <label class="col-sm-3 col-form-label fw-semibold">Menu Name</label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control" required>
            </div>
        </div>

        {{-- RESTAURANT --}}
        <div class="mb-4 row align-items-center">
            <label class="col-sm-3 col-form-label fw-semibold">Restaurant</label>
            <div class="col-sm-9">
                <select name="restaurant_id" class="form-control" required>
                    <option value="">Select Restaurant</option>
                    @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        {{-- DESCRIPTION --}}
        <div class="mb-4 row align-items-center">
            <label class="col-sm-3 col-form-label fw-semibold">Description</label>
            <div class="col-sm-9">
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>
        </div>

        {{-- BUTTON --}}
        <div class="mt-5">
            <button class="btn w-100 py-3 fw-bold text-white"
                style="background: var(--yellow); font-size: 18px;">
                + Add New Menu
            </button>
        </div>

    </form>

</div>

@endsection