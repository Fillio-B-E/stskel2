<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BOOKED. — Reservation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts & Tailwind -->
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

<body class="bg-gray-50 font-sans antialiased">

    <!-- HEADER -->
    <!-- Header: matches landing typography & sizes (no serif on links) -->
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
                            class="font-spartan text-lg font-semibold text-gold">
                            Reservation
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="font-spartan text-lg font-medium text-gray-800 hover:text-yellow-600 transition">
                            Schedule
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="font-spartan text-lg font-medium text-gray-800 hover:text-yellow-600 transition">
                            Contact
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




    <!-- MAIN -->
    <main class="max-w-7xl mx-auto px-8 py-12">

        <h1 class="text-4xl font-bold font-spartan mb-10">Top Restaurants</h1>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-8">

            @foreach ($restaurants as $res)
            @php
            $details = $res->adminDetails;
            $image = $details && $details->image_main
            ? asset($details->image_main)
            : asset("images/restaurants/R{$res->id}.png"); // fallback
            @endphp

            <a href="{{ route('restaurant_detail', ['id' => $res->id]) }}" class="block">
                <div class="relative group bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300">

                    <!-- IMAGE -->
                    <img src="{{ $image }}" alt="{{ $res->name }}" class="h-52 w-full object-cover">

                    <div class="p-4 flex flex-col gap-2">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-800">
                                {{ $res->name }}
                            </h3>

                            <div class="flex items-center gap-1 text-yellow-500 border border-yellow-400 rounded-full px-2 py-0.5 text-sm font-medium">
                                <span>5</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.784 1.402 8.172L12 18.896l-7.336 3.87 1.402-8.172L.132 9.21l8.2-1.192z" />
                                </svg>
                            </div>
                        </div>

                        <p class="text-gray-500 text-sm">
                            {{ $details->location ?? 'Unknown Location' }}
                        </p>
                    </div>
                </div>
            </a>

            @endforeach
        </div>
    </main>

    <footer class="bg-black text-white mt-16 py-10 text-center">
        <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} BOOKED. All rights reserved.</p>
    </footer>

</body>

</html>