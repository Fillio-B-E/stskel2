@extends('admin.layout')

@section('title', 'Reservation Detail')

@section('content')
<div class="container-fluid">
    
    <div class="page-title mb-3">Reservation Detail</div>

    <div class="bg-white rounded-3 shadow p-4">

        <div class="row mb-4">
            <div class="col">
                <h4 class="text-dark mb-0">Reservation #{{ $reservation->id }}</h4>
                <small class="text-muted">Created on {{ $reservation->created_at->format('d M Y - H:i') }}</small>
            </div>

            <div class="col text-end">
                @if($reservation->status === 'pending')
                    <form action="{{ route('admin.reservation.accept', $reservation->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-success btn-sm">Accept</button>
                    </form>

                    <form action="{{ route('admin.reservation.deny', $reservation->id) }}" method="POST" class="d-inline ms-2">
                        @csrf
                        <button class="btn btn-danger btn-sm">Deny</button>
                    </form>
                @endif
            </div>
        </div>

        <hr>

        <div class="row mt-4">

            <div class="col-md-6 mb-4">
                <h6 class="text-muted">Customer</h6>
                <p class="fs-5 mb-1">{{ $reservation->name ?? ($reservation->user->username ?? 'Guest User') }}</p>
                <p class="text-muted">{{ $reservation->user->email ?? '-' }}</p>
            </div>

            <div class="col-md-6 mb-4">
                <h6 class="text-muted">Status</h6>
                @php $s = $reservation->status ?? 'pending'; @endphp
                @if($s === 'pending')
                    <span class="badge bg-warning text-dark">Pending</span>
                @elseif($s === 'accepted')
                    <span class="badge bg-success">Accepted</span>
                @elseif($s === 'denied')
                    <span class="badge bg-danger">Denied</span>
                @else
                    <span class="badge bg-secondary">{{ ucfirst($s) }}</span>
                @endif
            </div>

            <div class="col-md-6 mb-4">
                <h6 class="text-muted">Guests</h6>
                <p class="fs-5">{{ $reservation->guests }} Person{{ $reservation->guests > 1 ? 's' : '' }}</p>
            </div>

            <div class="col-md-6 mb-4">
                <h6 class="text-muted">Amount</h6>
                <p class="fs-5">${{ number_format($reservation->amount ?? ($reservation->guests * 25)) }}</p>
            </div>

            <div class="col-md-6 mb-4">
                <h6 class="text-muted">Date</h6>
                <p class="fs-5">{{ \Carbon\Carbon::parse($reservation->date)->format('j M Y') }}</p>
            </div>

            <div class="col-md-6 mb-4">
                <h6 class="text-muted">Time</h6>
                <p class="fs-5">{{ \Carbon\Carbon::parse($reservation->time)->format('H:i') }}</p>
            </div>

        </div>

        <div class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-dark">
                ← Back to Dashboard
            </a>
        </div>

    </div>
</div>
@endsection
