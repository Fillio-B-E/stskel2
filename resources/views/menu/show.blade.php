<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $restaurant }} — Discover the Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 font-sans">

    <!-- Header -->
    <header class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-extrabold tracking-tight font-spartan text-gray-800">
                BOOKED.
            </a>

            <nav class="hidden md:flex space-x-10 font-medium">
                <a href="{{ url('/landing') }}" class="hover:text-yellow-600 transition">About</a>
                <a href="{{ route('reservation') }}" class="text-yellow-500 font-semibold hover:text-yellow-600 transition">Reservation</a>
                <a href="#" class="hover:text-yellow-600 transition">Schedule</a>
                <a href="#" class="hover:text-yellow-600 transition">Contact</a>
            </nav>

            <div class="flex items-center space-x-3">
                @auth
                <span class="font-medium text-gray-700">{{ Auth::user()->username }}</span>
                @endauth
                <img src="../images/avatar.png" alt="Profile" class="w-10 h-10 rounded-full border-2 border-gray-200">
            </div>
        </div>
    </header>

    <!-- Hero with Background Image -->
    <section class="text-center py-24 bg-cover bg-center relative"
        style="background-image: url('../images/menuTop.png');">
        <!-- <div class="absolute inset-0 bg-black bg-opacity-60"></div> -->
        <div class="relative z-10">
            <h1 class="text-5xl font-playfair text-white mb-3">Discover the Menu</h1>
            <p class="text-yellow-400 italic text-xl">{{ $restaurant }}</p>
        </div>
    </section>

    <!-- Filter Buttons -->
    <section class="max-w-7xl mx-auto px-8 py-10 flex flex-wrap justify-center items-center gap-4">
        <button data-filter="all"
            class="filter-btn active flex items-center gap-2 bg-yellow-200 text-yellow-700 font-medium px-5 py-2 rounded-full shadow hover:bg-yellow-300 transition">
            <img src="../images/iconAll.png" alt="All Icon" class="w-5 h-5">All
        </button>
        <button data-filter="appetizers"
            class="filter-btn flex items-center gap-2 bg-white text-gray-700 font-medium px-5 py-2 rounded-full border hover:bg-gray-100 transition">
            <img src="../images/iconAppetizer.png" alt="Appetizers Icon" class="w-5 h-5">Appetizers
        </button>
        <button data-filter="main"
            class="filter-btn flex items-center gap-2 bg-white text-gray-700 font-medium px-5 py-2 rounded-full border hover:bg-gray-100 transition">
            <img src="../images/iconMaincourse.png" alt="Main Courses Icon" class="w-5 h-5">Main Courses
        </button>
        <button data-filter="side"
            class="filter-btn flex items-center gap-2 bg-white text-gray-700 font-medium px-5 py-2 rounded-full border hover:bg-gray-100 transition">
            <img src="../images/iconSides.png" alt="Side Dishes Icon" class="w-5 h-5">Side Dishes
        </button>
        <button data-filter="dessert"
            class="filter-btn flex items-center gap-2 bg-white text-gray-700 font-medium px-5 py-2 rounded-full border hover:bg-gray-100 transition">
            <img src="../images/iconDessert.png" alt="Dessert Icon" class="w-5 h-5">Dessert
        </button>
        <button data-filter="beverages"
            class="filter-btn flex items-center gap-2 bg-white text-gray-700 font-medium px-5 py-2 rounded-full border hover:bg-gray-100 transition">
            <img src="../images/iconBeverages.png" alt="Beverages Icon" class="w-5 h-5">Beverages
        </button>

        <button
            class="flex items-center gap-2 bg-yellow-200 text-yellow-700 font-semibold px-5 py-2 rounded-lg shadow hover:bg-yellow-300 transition ml-auto">
            <img src="../images/iconPlate.png" alt="My Plate Icon" class="w-5 h-5">My Plate
            <span class="ml-1 bg-yellow-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">0</span>
        </button>
    </section>

    <!-- Menu Grid -->
    <section class="max-w-7xl mx-auto px-8 py-12 grid md:grid-cols-3 gap-8">

        <!-- Menu 1 -->
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <img src="../images/M1.png" alt="Soupe à l’oignon" class="w-full h-52 object-cover rounded-xl mb-4">
            <h3 class="text-lg font-semibold mb-2">Soupe à l’oignon</h3>
            <p class="text-gray-600 text-sm mb-3">
                Classic French onion soup with caramelized onions, beef broth, bread, and melted cheese.
            </p>
            <span class="text-green-600 font-bold">$40.00</span>
        </div>

        <!-- M 2 -->
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <img src="../images/M2.png" alt="Escargots de Bourgogne" class="w-full h-52 object-cover rounded-xl mb-4">
            <h3 class="text-lg font-semibold mb-2">Escargots de Bourgogne</h3>
            <p class="text-gray-600 text-sm mb-3">
                Snails baked in garlic butter, parsley, and herbs, served in their shells.
            </p>
            <span class="text-green-600 font-bold">$70.00</span>
        </div>

        <!-- M 3 -->
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <img src="../images/M3.png" alt="Foie Gras" class="w-full h-52 object-cover rounded-xl mb-4">
            <h3 class="text-lg font-semibold mb-2">Foie Gras</h3>
            <p class="text-gray-600 text-sm mb-3">
                Rich goose liver terrine with brioche bread and fruit compote.
            </p>
            <span class="text-green-600 font-bold">$80.00</span>
        </div>

        <!-- M 4 -->
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <img src="../images/M4.png" alt="Salade Niçoise" class="w-full h-52 object-cover rounded-xl mb-4">
            <h3 class="text-lg font-semibold mb-2">Salade Niçoise</h3>
            <p class="text-gray-600 text-sm mb-3">
                Tuna, boiled eggs, olives, anchovies, and fresh vegetables with olive oil dressing.
            </p>
            <span class="text-green-600 font-bold">$80.00</span>
        </div>

        <!-- M 5 -->
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <img src="../images/M5.png" alt="Quiche Lorraine" class="w-full h-52 object-cover rounded-xl mb-4">
            <h3 class="text-lg font-semibold mb-2">Quiche Lorraine</h3>
            <p class="text-gray-600 text-sm mb-3">
                Savory pie with cream, cheese, smoked bacon, and a buttery crust.
            </p>
            <span class="text-green-600 font-bold">$40.00</span>
        </div>

        <!-- M 6 -->
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <img src="../images/M6.png" alt="Pâté de Campagne" class="w-full h-52 object-cover rounded-xl mb-4">
            <h3 class="text-lg font-semibold mb-2">Pâté de Campagne</h3>
            <p class="text-gray-600 text-sm mb-3">
                Rustic pork pâté with bread, pickles, and mustard.
            </p>
            <span class="text-green-600 font-bold">$80.00</span>
        </div>

        <!-- M 7 -->
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <img src="../images/M7.png" alt="Gougères" class="w-full h-52 object-cover rounded-xl mb-4">
            <h3 class="text-lg font-semibold mb-2">Gougères</h3>
            <p class="text-gray-600 text-sm mb-3">
                Light cheese puffs made from choux pastry with Gruyère.
            </p>
            <span class="text-green-600 font-bold">$40.00</span>
        </div>

        <!-- M 8 -->
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <img src="../images/M8.png" alt="Moules Marinières" class="w-full h-52 object-cover rounded-xl mb-4">
            <h3 class="text-lg font-semibold mb-2">Moules Marinières</h3>
            <p class="text-gray-600 text-sm mb-3">
                Mussels steamed in white wine, garlic, and shallots.
            </p>
            <span class="text-green-600 font-bold">$80.00</span>
        </div>

        <!-- M 9 -->
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <img src="../images/M9.png" alt="Terrine de Légumes" class="w-full h-52 object-cover rounded-xl mb-4">
            <h3 class="text-lg font-semibold mb-2">Terrine de Légumes</h3>
            <p class="text-gray-600 text-sm mb-3">
                Colorful layered vegetable terrine with herbs and cream.
            </p>
            <span class="text-green-600 font-bold">$80.00</span>
        </div>

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