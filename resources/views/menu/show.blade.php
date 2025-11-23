<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $restaurant['name'] }} — Discover the Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 font-sans">

    <header class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-extrabold tracking-tight font-spartan text-gray-800">
                BOOKED.
            </a>

            <nav class="hidden md:flex space-x-10 font-medium">
                <a href="{{ url('/landing') }}" class="hover:text-yellow-600 transition">About</a>
                <a href="{{ route('reservation') }}" class="text-yellow-500 font-semibold hover:text-yellow-600 transition">Reservation</a>
                <a href="{{ route('schedule') }}"
                    class="hover:text-yellow-600 transition {{ request()->is('schedule') ? 'text-yellow-500 font-bold' : '' }}">
                    Schedule
                </a>
            </nav>

            <div class="flex items-center space-x-3 font-medium">
                @auth
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="flex items-center space-x-2 text-red-500 hover:text-red-700 transition">
                    <img src="{{ asset('icons/Headerlogout.png') }}" class="w-5 h-5" alt="Logout">
                    <span>Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>

                <span class="text-black">{{ Auth::user()->username }}</span>
                @endauth
            </div>
        </div>
    </header>

    <section class="text-center py-24 bg-cover bg-center relative"
        style="background-image: url('../images/menuTop.png');">
        <div class="relative z-10">
            <h1 class="text-5xl font-playfair text-white mb-3">Discover the Menu</h1>
            <p class="text-yellow-400 italic text-xl">{{ $restaurant['name'] }}</p>
        </div>
    </section>

    <!-- Filter Buttons -->
    <section class="max-w-7xl mx-auto px-8 py-10 flex flex-wrap justify-center items-center gap-4">
        <button data-filter="all"
            class="filter-btn active flex items-center gap-2 bg-yellow-200 text-yellow-700 font-medium px-5 py-2 rounded-full shadow hover:bg-yellow-300 transition">
            <img src="../images/iconAll.png" alt="All Icon" class="w-5 h-5">All
        </button>

        <button
            class="flex items-center gap-2 bg-yellow-200 text-yellow-700 font-semibold px-5 py-2 rounded-lg shadow hover:bg-yellow-300 transition ml-auto">
            <img src="../images/iconPlate.png" alt="My Plate Icon" class="w-5 h-5">My Plate
            <span class="ml-1 bg-yellow-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">0</span>
        </button>
    </section>

    <!-- Menu Grid -->
    <!-- Menu Grid -->
    <section class="max-w-7xl mx-auto px-8 py-12 grid md:grid-cols-3 gap-8">
        @forelse($menus as $menu)
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <!-- IMAGE -->
            @if($menu->image)
            <img src="{{ asset($menu->image) }}"
                alt="{{ $menu->name }}"
                class="w-full h-52 object-cover rounded-xl mb-4">
            @else
            <img src="{{ asset('images/default.png') }}"
                alt="No Image"
                class="w-full h-52 object-cover rounded-xl mb-4">
            @endif

            <!-- NAME -->
            <h3 class="text-lg font-semibold mb-2">{{ $menu->name }}</h3>

            <!-- DESCRIPTION -->
            <p class="text-gray-600 text-sm mb-3">
                {{ $menu->description }}
            </p>
        </div>
        @empty
        <p class="text-center text-gray-500">No menu available</p>
        @endforelse
    </section>





    <!-- Footer Image Section -->
    <section class="relative py-20 bg-cover bg-center"
        style="background-image: url('../images/menuBotnew.png');">
        <!-- <div class="absolute inset-0 bg-black bg-opacity-60"></div> -->
        <div class="relative z-10 text-center max-w-3xl mx-auto text-white px-6">
            <h2 class="text-sm uppercase tracking-widest mb-3">Choose Your Perfect Menu</h2>
            <p class="text-2xl md:text-3xl font-light leading-relaxed">
                Explore a wide selection of dishes and find the perfect menu to match your taste
            </p>
        </div>
    </section>

    <script>
        // highlight active filter
        const filterButtons = document.querySelectorAll('.filter-btn');
        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                filterButtons.forEach(b => b.classList.remove('active', 'bg-yellow-200', 'text-yellow-700', 'shadow'));
                filterButtons.forEach(b => b.classList.add('bg-white', 'text-gray-700', 'border'));
                btn.classList.add('active', 'bg-yellow-200', 'text-yellow-700', 'shadow');
                btn.classList.remove('bg-white', 'text-gray-700', 'border');
            });
        });
    </script>

</body>

</html>