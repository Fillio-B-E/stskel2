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
    <header class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="text-2xl font-extrabold tracking-tight font-spartan text-gray-800">
                BOOKED.
            </a>

            <nav class="hidden md:flex space-x-10 font-medium">
                <a href="{{ url('/landing') }}" class="hover:text-yellow-600 transition">About</a>
                <a href="{{ route('reservation') }}" class="text-gold font-semibold">Reservation</a>
                <a href="#" class="hover:text-yellow-600 transition">Schedule</a>
                <a href="#" class="hover:text-yellow-600 transition">Contact</a>
            </nav>

            <!-- Profile -->
            <div class="flex items-center space-x-3">
                @auth
                <span class="font-medium text-gray-700">{{ Auth::user()->username }}</span>
                @endauth
                <img src="../images/avatar.png" alt="Profile" class="w-10 h-10 rounded-full border-2 border-gray-200">
            </div>
        </div>
    </header>

    <!-- MAIN -->
    <main class="max-w-7xl mx-auto px-8 py-12">

        <h1 class="text-4xl font-bold font-spartan mb-10">Top Restaurants</h1>

        <!-- Grid -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-8">


            <!-- Card -->
            @php
            $restaurants = [
            ['id' => 1, 'name' => 'La Pergola', 'location' => 'Rome', 'image' => '../images/R1.png'],
            ['id' => 2, 'name' => 'Commonwealth', 'location' => 'Virginia', 'image' => '../images/R2.png'],
            ['id' => 3, 'name' => 'Osteria Francescana', 'location' => 'Italy', 'image' => '../images/R3.png'],
            ['id' => 4, 'name' => 'Le Bernardin', 'location' => 'France', 'image' => '../images/R4.png'],
            ['id' => 5, 'name' => 'Eleven Madison Park', 'location' => 'New York City', 'image' => '../images/R5.png'],
            ['id' => 6, 'name' => 'Pappas Steakhouse', 'location' => 'America', 'image' => '../images/R6.png'],
            ['id' => 7, 'name' => 'Geronimo', 'location' => 'America', 'image' => '../images/R7.png'],
            ['id' => 8, 'name' => 'Din Tai Fung', 'location' => 'Taiwan', 'image' => '../images/R8.png'],
            ['id' => 9, 'name' => 'Hard Rock Cafe', 'location' => 'Bali', 'image' => '../images/R9.png'],
            ['id' => 10, 'name' => 'Le Meurice', 'location' => 'Paris', 'image' => '../images/R10.png'],
            ['id' => 11, 'name' => 'Sukiyabashi Jiro', 'location' => 'Tokyo', 'image' => '../images/R11.png'],
            ['id' => 12, 'name' => 'Narisawa', 'location' => 'Tokyo', 'image' => '../images/R12.png'],
            ];
            @endphp


            @foreach ($restaurants as $res)
            <a href="{{ route('restaurant_detail', ['id' => $res['id']]) }}" class="block">

                <div class="relative group bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <!-- Restaurant Image -->
                    <img src="{{ asset($res['image']) }}" alt="{{ $res['name'] }}" class="h-52 w-full object-cover">

                    <!-- Favorite Button (heart toggle) -->
                    <button class="heart-toggle absolute top-3 right-3 z-10" data-id="{{ $loop->index }}"
                        onclick="event.preventDefault(); event.stopPropagation();">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            class="w-6 h-6 text-red-500 transition">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 20.364l-7.682-7.682a4.5 4.5 0 010-6.364z" />
                        </svg>
                    </button>

                    <!-- Info Section -->
                    <div class="p-4 flex flex-col gap-2">
                        <!-- Name + Stars inline -->
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $res['name'] }}</h3>
                            <div class="flex items-center gap-1 text-yellow-500 border border-yellow-400 rounded-full px-2 py-0.5 text-sm font-medium">
                                <span>5</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.784 1.402 8.172L12 18.896l-7.336 3.87 1.402-8.172L.132 9.21l8.2-1.192z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Location -->
                        <p class="text-gray-500 text-sm">{{ $res['location'] }}</p>
                    </div>
                </div>
            </a>
            @endforeach




        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-black text-white mt-16 py-10 text-center">
        <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} BOOKED. All rights reserved.</p>
    </footer>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const hearts = document.querySelectorAll(".heart-toggle");
            let favorites = JSON.parse(localStorage.getItem("favorites") || "[]");

            // Restore previously favorited items
            hearts.forEach(btn => {
                const id = btn.dataset.id;
                const svg = btn.querySelector("svg");
                if (favorites.includes(id)) {
                    svg.setAttribute("fill", "red");
                }
            });

            // Toggle favorite on click
            hearts.forEach(btn => {
                btn.addEventListener("click", () => {
                    const id = btn.dataset.id;
                    const svg = btn.querySelector("svg");
                    const index = favorites.indexOf(id);

                    if (index === -1) {
                        favorites.push(id);
                        svg.setAttribute("fill", "red");
                    } else {
                        favorites.splice(index, 1);
                        svg.setAttribute("fill", "none");
                    }

                    localStorage.setItem("favorites", JSON.stringify(favorites));
                });
            });
        });
    </script>


</body>

</html>