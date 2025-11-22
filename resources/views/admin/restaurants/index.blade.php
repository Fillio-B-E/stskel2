@extends('admin.layout')

@section('title', 'Restaurant List')

@section('content')

<div class="container-fluid">

    <div class="page-title">Restaurant List</div>
    <div class="page-sub"></div>

    {{-- Top Stat Box --}}
    <div class="table-panel d-flex align-items-center justify-content-between mb-4">

        <div class="d-flex flex-column">
            <span class="stat-label">Total Restaurants</span>
            <span class="stat-value">{{ $details->count() }}</span>
        </div>

        <a href="{{ route('admin.restaurants.create') }}"
            class="btn fw-bold px-4 py-2"
            style="background:#d9a823; color:white; border-radius:8px;">
            + Create New Restaurant
        </a>

    </div>

    {{-- Table --}}
    <div class="table-panel">

        <div class="row align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0">Restaurant List</h5>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="text-muted">
                        <th>Image</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th class="text-center" style="width: 180px;">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($details as $detail)
                    <tr>
                        <td>
                            <img src="{{ asset('images/restaurants/R' . $detail->restaurant->id . '.png') }}"
                                alt="Restaurant Image"
                                class="h-16 w-24 object-cover rounded">
                        </td>

                        <td class="fw-semibold">{{ $detail->restaurant->name }}</td>
                        <td class="text-muted">{{ $detail->location ?? 'No Location' }}</td>

                        <td class="text-center">
                            <a href="{{ route('admin.restaurants.edit', $detail->id) }}"
                                class="btn btn-success btn-sm fw-bold px-3">
                                Edit
                            </a>

                            <form action="{{ route('admin.restaurants.destroy', $detail->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Delete this restaurant?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm fw-bold px-3">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection