@extends('layouts.app')

@section('title', 'Your Schedule')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Your Reservation Schedule</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    @if($reservations->isEmpty())
        <p class="text-center text-gray-600">You have no upcoming reservations.</p>
    @else
        <table class="min-w-full bg-white rounded-lg shadow">
            <thead>
                <tr class="bg-yellow-500 text-left text-white">
                    <th class="py-3 px-4">Restaurant</th>
                    <th class="py-3 px-4">Name</th>
                    <th class="py-3 px-4">Guests</th>
                    <th class="py-3 px-4">Date</th>
                    <th class="py-3 px-4">Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $r)
                <tr class="border-t">
                    <td class="py-3 px-4">{{ $r->restaurant_name }}</td>
                    <td class="py-3 px-4">{{ $r->name }}</td>
                    <td class="py-3 px-4">{{ $r->guests }}</td>
                    <td class="py-3 px-4">{{ $r->date }}</td>
                    <td class="py-3 px-4">{{ $r->time }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
