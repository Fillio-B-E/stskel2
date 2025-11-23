<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Schedule</title>

    {{-- Tailwind CSS CDN --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;600;700&family=League+Spartan:wght@400;600;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['"Playfair Display"', 'serif'],
                        sans: ['Inter', 'sans-serif'],
                        spartan: ['"League Spartan"', 'sans-serif'],
                    },
                    colors: {
                        gold: '#d2a62c'
                    }
                }
            }
        }
    </script>

    <style>
        .restaurant-card:hover {
            transform: translateY(-4px);
            transition: all 0.2s ease-in-out;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    <!-- HEADER (Custom) -->
    <header class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">

            <!-- Logo: same size/weight as landing -->
            <a href="{{ url('/') }}" class="text-2xl font-bold tracking-wide font-spartan text-gray-800">
                BOOKED.
            </a>

            <!-- Nav: force font-spartan (no serif), same spacing + size as landing -->
            <nav class="hidden md:flex items-center">
                <ul class="flex space-x-10 items-center">
                    <li>
                        <a href="{{ url('/landing') }}"
                            class="font-spartan text-lg font-medium text-gray-800 hover:text-yellow-600 transition">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('reservation') }}"
                            class="font-spartan text-lg font-medium text-gray-800 hover:text-yellow-600 transition">
                            Reservation
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('schedule') }}"
                            class="hover:text-yellow-600 transition {{ request()->is('schedule') ? 'text-yellow-500 font-bold' : '' }}">
                            Schedule
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Right: auth (username in black, no background) -->
            <div class="flex items-center space-x-3">
                @auth
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="flex items-center space-x-2 text-red-500 font-semibold hover:text-red-700 transition">
                    <img src="{{ asset('icons/Headerlogout.png') }}" class="w-5 h-5" alt="Logout">
                    <span>Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>

                <span class="font-spartan text-base font-medium text-gray-800">
                    {{ Auth::user()->username }}
                </span>
                @endauth
            </div>

        </div>
    </header>

    <!-- PAGE WRAPPER -->
    <div class="min-h-screen py-10 px-10">

        <h1 class="text-4xl font-bold mb-8">Your Reservation</h1>

        <!-- RESERVATIONS GRID -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse ($reservations as $reservation)
            <div class="bg-white shadow-md rounded-2xl overflow-hidden">

                <!-- IMAGE -->
                <div class="relative h-56 w-full">
                    <img src="{{ asset($reservation->restaurant->adminDetails->image_main ?? 'images/default.png') }}"
                        class="h-full w-full object-cover">
                    <div class="absolute bottom-3 left-4 text-white text-xl font-semibold">
                        {{ $reservation->category ?? 'Reservation' }}
                    </div>
                </div>

                <!-- DETAILS -->
                <div class="p-5">
                    <h2 class="text-2xl font-bold">{{ $reservation->restaurant->name }}</h2>

                    <div class="mt-4 space-y-3 text-gray-700">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('icons/clock.png') }}" class="w-5">
                            <p>{{ \Carbon\Carbon::parse($reservation->time)->format('h:i A') }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('icons/call.png') }}" class="w-5">
                            <p>{{ $reservation->restaurant->phone ?? 'No phone available' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-xl text-gray-600">No reservations available.</p>
            @endforelse
        </div>
    </div>

</body>

</html>