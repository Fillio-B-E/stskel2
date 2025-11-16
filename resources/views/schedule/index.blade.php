@extends('schedule.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Your Reservations</h4>
    </div>
    <div class="card-body">

        @if($reservations->count() == 0)
        <p class="text-muted">You have no reservations yet.</p>
        @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Restaurant</th>
                    <th>Name</th>
                    <th>Guests</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->restaurant_name }}</td>
                    <td>{{ $reservation->name }}</td>
                    <td>{{ $reservation->guests }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->time }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {{ $reservations->links('pagination::bootstrap-5') }}
        </div>

        @endif

    </div>
</div>
@endsection