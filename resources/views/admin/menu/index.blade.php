@extends('admin.layout')

@section('title', 'Menu List')

@section('content')

<div class="container-fluid">

    {{-- PAGE TITLE --}}
    <div class="page-title mb-2">List of Menu</div>
    <div class="page-sub"></div>

    {{-- TOP PANEL --}}
    <div class="table-panel d-flex align-items-center justify-content-between mb-4" style="padding: 16px 20px;">
        <div class="d-flex flex-column">
            <span class="stat-label">Total Menu:</span>
            <span class="stat-value" style="font-size: 22px; font-weight: 600;">{{ $menus->count() }}</span>
        </div>

        <a href="{{ route('admin.menu.create') }}"
            class="btn fw-bold px-5 py-2"
            style="background:#d9a823; color:white; border-radius:8px;">
            + Create New Menu
        </a>
    </div>

    {{-- TABLE --}}
    <div class="table-panel" style="padding: 0 10px;">

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="text-muted" style="background: #f9f9f9;">
                        <th style="width: 120px;">Image</th>
                        <th>Name</th>
                        <th>Restaurant</th>
                        <th>Description</th>
                        <th class="text-center" style="width: 180px;">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($menus as $menu)
                    <tr style="height: 90px;">
                        {{-- IMAGE --}}
                        <td>
                            @if($menu->image)
                            <img src="{{ asset($menu->image) }}"
                                alt="{{ $menu->name }}"
                                class="h-16 w-24 object-cover rounded">
                            @else
                            <img src="{{ asset('images/default_menu.png') }}"
                                alt="No image" class="h-16 w-24 object-cover rounded">
                            @endif
                        </td>

                        {{-- NAME --}}
                        <td class="fw-semibold">
                            {{ $menu->name }}
                        </td>

                        {{-- RESTAURANT NAME --}}
                        <td class="text-muted">
                            {{ $menu->restaurant->name }}
                        </td>

                        {{-- DESCRIPTION (TRIMMED) --}}
                        <td class="text-muted" style="max-width: 300px;">
                            {{ Str::limit($menu->description, 200) }}
                        </td>

                        {{-- ACTIONS --}}
                        <td class="text-center">
                            <a href="{{ route('admin.menu.edit', $menu->id) }}"
                                class="btn btn-success btn-sm fw-bold px-3">
                                Edit
                            </a>

                            <form action="{{ route('admin.menu.destroy', $menu->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Delete this menu?')">
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