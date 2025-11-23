@extends('admin.layout')

@section('title', 'Reservations')

@section('content')
<div class="container-fluid">
    <div class="page-title">Reservations</div>
    <div class="page-sub"></div>

    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="stat-card">
                <div class="stat-label">Total Book</div>
                <div class="stat-value">{{ $totalReservations ?? 0 }}</div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="stat-card">
                <div class="stat-label">New Customers</div>
                <div class="stat-value">{{ $totalCustomers ?? 0 }}</div>
            </div>
        </div>
    </div>

    {{-- Reservation Table --}}
    <div class="table-panel">
        <div class="row align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0">Reservation List</h5>
            </div>
            <div class="col text-end">
                {{-- Add filters here later --}}
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="text-muted">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Guests</th>
                        <th>Date & Time</th>
                        <th>Restaurant</th>
                        <th>Status</th>
                        <th style="width:180px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservations as $r)
                    <tr>
                        <td>#{{ $r->id }}</td>

                        <td>{{ $r->name ?? ($r->user->username ?? $r->user->email ?? 'Guest') }}</td>

                        <td>{{ $r->guests }} Person{{ $r->guests > 1 ? 's' : '' }}</td>

                        <td>
                            {{ \Carbon\Carbon::parse($r->date)->format('d M Y') }}
                            at
                            {{ \Carbon\Carbon::parse($r->time)->format('H:i') }}
                        </td>

                        <td>{{ $r->restaurant->name ?? 'Unknown' }}</td>
                        <td>
                            @php $status = $r->status ?? 'pending'; @endphp

                            @if($status === 'pending')
                            <span class="badge-status badge-pending">Pending</span>
                            @elseif($status === 'accepted')
                            <span class="badge-status badge-accepted">Accepted</span>
                            @elseif($status === 'denied')
                            <span class="badge-status badge-denied">Denied</span>
                            @else
                            <span class="badge-status badge-cancelled">{{ ucfirst($status) }}</span>
                            @endif
                        </td>

                        {{-- Actions --}}
                        <td>
                            @if($status === 'pending')
                            <form action="{{ route('admin.reservation.accept', $r->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-sm">Accept</button>
                            </form>

                            <form action="{{ route('admin.reservation.deny', $r->id) }}" method="POST" class="d-inline ms-2">
                                @csrf
                                <button class="btn btn-danger btn-sm">Deny</button>
                            </form>
                            @else
                            <a href="{{ route('admin.reservation.show', $r->id) }}" class="btn btn-warning btn-sm btn-wide btn-detail">
                                Detail
                            </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-muted text-center">No reservations yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item {{ $reservations->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $reservations->previousPageUrl() ?: '#' }}" aria-label="Previous">‹</a>
                    </li>

                    {{-- current page indicator --}}
                    <li class="page-item disabled">
                        <span class="page-link">Page {{ $reservations->currentPage() }} of {{ $reservations->lastPage() }}</span>
                    </li>

                    <li class="page-item {{ $reservations->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $reservations->nextPageUrl() ?: '#' }}" aria-label="Next">›</a>
                    </li>
                </ul>
            </nav>
        </div>


    </div>
</div>
@endsection