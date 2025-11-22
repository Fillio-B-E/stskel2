@extends('admin.layouts')

@section('content')
<div class="p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Restaurant Details</h1>
        <a href="{{ route('admin.restaurants.index') }}"
            class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800">
            Back
        </a>
    </div>

    <!-- Card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Image -->
            <div>
                @if($restaurant->image_main)
                <img src="{{ asset($restaurant->image_main) }}"
                    alt="{{ $restaurant->name }}"
                    class="w-full h-64 object-cover rounded-lg shadow">
                @else
                <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center text-gray-600">
                    No Image
                </div>
                @endif
            </div>

            <!-- Info -->
            <div class="space-y-4">
                <div>
                    <h2 class="text-xl font-semibold">Name</h2>
                    <p class="text-gray-700">{{ $restaurant->name }}</p>
                </div>

                <div>
                    <h2 class="text-xl font-semibold">Location</h2>
                    <p class="text-gray-700">{{ $restaurant->location }}</p>
                </div>

                <div>
                    <h2 class="text-xl font-semibold">Created At</h2>
                    <p class="text-gray-700">{{ $restaurant->created_at }}</p>
                </div>

                <div>
                    <h2 class="text-xl font-semibold">Updated At</h2>
                    <p class="text-gray-700">{{ $restaurant->updated_at }}</p>
                </div>

                <div class="pt-4">
                    <a href="{{ route('admin.restaurants.edit', $restaurant->id) }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Edit Restaurant
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection