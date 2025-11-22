@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="page-title">Dashboard</div>
    <div class="page-sub"></div>

    <div class="row g-4">
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

    {{-- Table Panel --}}
    <div class="table-panel">
        <div class="row align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0">Latest Reservations</h5>
            </div>
            <div class="col text-end">
                {{-- Could add filters here --}}
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr class="text-muted">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Restaurant</th>
                        <th>Capacity</th>
                        <th>Date & Time</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th style="width:180px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestReservations as $r)
                    <tr>
                        <td>#{{ $r->id }}</td>

                        <td>{{ $r->name ?? ($r->user->username ?? $r->user->email ?? 'Guest') }}</td>

                        <td>{{ $r->restaurant->name ?? 'Unknown' }}</td>

                        <td>{{ $r->guests }} Person{{ $r->guests > 1 ? 's' : '' }}</td>

                        <td>
                            {{ \Carbon\Carbon::parse($r->date)->format('d M Y') }}
                            at
                            {{ \Carbon\Carbon::parse($r->time)->format('H:i') }}
                        </td>

                        <td class="text-success">
                            ${{ number_format($r->amount ?? ($r->guests * 25)) }}
                        </td>

                        <td>
                            @php $status = $r->status ?? 'pending'; @endphp

                            @if($status === 'pending')
                            <span class="badge-status badge-pending">Pending</span>
                            @elseif($status === 'accepted')
                            <span class="badge-status badge-accepted">Accepted</span>
                            @elseif($status === 'denied')
                            <span class="badge-status badge-denied">Denied</span>
                            @elseif($status === 'cancelled')
                            <span class="badge-status badge-cancelled">Cancelled</span>
                            @elseif($status === 'ongoing')
                            <span class="badge-status badge-ongoing">On-Going</span>
                            @else
                            <span class="badge-status badge-cancelled">{{ ucfirst($status) }}</span>
                            @endif
                        </td>

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
                            <a href="{{ route('admin.reservation.show', $r->id) }}" class="btn btn-warning btn-sm">
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

        {{-- Pagination (left/right arrows) --}}
        <div class="d-flex justify-content-end mt-3">
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item {{ $latestReservations->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $latestReservations->previousPageUrl() ?: '#' }}" aria-label="Previous">‹</a>
                    </li>

                    {{-- current page indicator --}}
                    <li class="page-item disabled">
                        <span class="page-link">Page {{ $latestReservations->currentPage() }} of {{ $latestReservations->lastPage() }}</span>
                    </li>

                    <li class="page-item {{ $latestReservations->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $latestReservations->nextPageUrl() ?: '#' }}" aria-label="Next">›</a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</div>
@endsection