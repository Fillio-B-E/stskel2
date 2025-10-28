@php
// Example dummy data (replace these .png with your own)
$restaurant = [
'name' => 'Le Bernardin',
'images' => [
'../images/R4.png',
'../images/SIDE1.png',
'../images/SIDE2.png',
'../images/SIDE3.png',
'../images/SIDE4.png',
],
];
@endphp

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $restaurant['name'] }} — BOOKED.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;600;700&family=League+Spartan:wght@400;600;700;900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans antialiased">


    <header class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-extrabold tracking-tight font-spartan text-gray-800">
                BOOKED.
            </a>

            <nav class="hidden md:flex space-x-10 font-medium">
                <a href="{{ url('/landing') }}" class="hover:text-yellow-600 transition">About</a>
                <a href="{{ route('reservation') }}" class="text-yellow-600 font-semibold">Reservation</a>
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


    <main class="max-w-7xl mx-auto px-6 py-10 flex flex-col md:flex-row gap-6">

        <section class="bg-black text-white rounded-3xl p-8 flex-1">
            <h2 class="text-3xl font-spartan font-bold mb-4">{{ $restaurant['name'] }}</h2>

            <div class="flex items-center mb-4">
                <span class="text-yellow-400 text-xl">★★★★★</span>
                <span class="text-gray-300 ml-2 text-sm">5.0 (139 Reviews)</span>
            </div>

            <div class="flex gap-3 mb-6 flex-wrap">
                <span class="border border-yellow-500 text-yellow-500 px-3 py-1 rounded-full text-sm">French</span>
                <span class="border border-yellow-500 text-yellow-500 px-3 py-1 rounded-full text-sm">Fine Dining</span>
                <span class="border border-yellow-500 text-yellow-500 px-3 py-1 rounded-full text-sm">30$ - 50$</span>
                <span
                    class="border border-yellow-500 bg-yellow-500 text-black px-3 py-1 rounded-full text-sm font-semibold flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                        class="w-4 h-4 text-black">
                        <path
                            d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.784 1.402 8.172L12 18.896l-7.336 3.87 1.402-8.172L.132 9.21l8.2-1.192z" />
                    </svg>
                    5
                </span>
            </div>


            <div class="flex flex-col space-y-2">

                <img id="mainImage"
                    src="{{ $restaurant['images'][0] }}"
                    class="mainImage w-full h-[360px] object-cover rounded-xl"
                    alt="Main Restaurant Image">

                <div class="grid grid-cols-4 gap-2">
                    @foreach (array_slice($restaurant['images'], 1, 4) as $img)
                    <img src="{{ $img }}"
                        class="thumb rounded-xl cursor-pointer hover:opacity-80 transition object-cover h-24 w-full"
                        alt="Supporting Image">
                    @endforeach
                </div>
            </div>



        </section>

        <!-- RIGHT: Booking Form -->
        <aside class="bg-black text-yellow-500 rounded-3xl p-8 md:w-1/3 flex flex-col justify-start">
            <h3 class="text-2xl font-bold text-white font-spartan mb-6 text-center">Find a Table</h3>

            <form action="{{ route('reserve.store') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <input type="hidden" name="restaurant_name" value="{{ $restaurant['name'] }}">

                <div>
                    <label class="block text-yellow-500 mb-2">Name</label>
                    <input type="text" name="name" placeholder="Name" autocomplete="off"
                        class="w-full p-3 bg-transparent border border-yellow-600 rounded-lg text-yellow-500 placeholder-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        required>
                </div>

                <div>
                    <label class="block text-yellow-500 mb-2">Guests</label>
                    <select name="guests"
                        class="w-full p-3 bg-transparent border border-yellow-600 rounded-lg text-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        required>
                        <option class="text-black" value="1">1 Person</option>
                        <option class="text-black" value="2">2 People</option>
                        <option class="text-black" value="3">3 People</option>
                        <option class="text-black" value="4">4 People</option>
                    </select>
                </div>

                <div>
                    <label class="block text-yellow-500 mb-2">Date</label>
                    <input type="date" name="date"
                        class="w-full p-3 bg-transparent border border-yellow-600 rounded-lg text-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        required>
                </div>

                <div>
                    <label class="block text-yellow-500 mb-2">Time</label>
                    <input type="time" name="time"
                        class="w-full p-3 bg-transparent border border-yellow-600 rounded-lg text-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        required>
                </div>


                <button id="bookBtn" type="button"
                    class="w-full bg-yellow-600 hover:bg-yellow-700 text-white py-2.5 rounded-md font-semibold transition">
                    Book a Table
                </button>


                <!-- <div id="orderPopup"
                    class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50">
                    <div class="bg-yellow-500 rounded-xl p-6 shadow-xl text-center w-[350px]">
                        <h2 class="text-2xl font-bold text-white mb-2">Hungry?</h2>
                        <p class="text-white mb-5 text-sm">Would you like to order your food now?</p>
                        <div class="flex justify-center gap-4">
                            <button id="orderNowBtn"
                                class="bg-black text-white font-semibold px-5 py-2 rounded-md hover:bg-gray-800 transition">
                                Order Now
                            </button>
                            <button id="maybeLaterBtn"
                                class="bg-white text-gray-800 font-semibold px-5 py-2 rounded-md hover:bg-gray-100 transition">
                                Maybe Later
                            </button>
                        </div>
                    </div>
                </div> -->

            </form>
            <!-- Popup (put this after the form) -->
            <div id="orderPopup" class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50">
                <div class="bg-yellow-500 rounded-xl p-6 shadow-xl text-center w-[360px]">
                    <h2 class="text-2xl font-bold text-white mb-2">Hungry?</h2>
                    <p class="text-white mb-5 text-sm">Would you like to order your food now?</p>
                    <div class="flex justify-center gap-4">
                        <button id="orderNowBtn"
                            class="bg-black text-white font-semibold px-5 py-2 rounded-md hover:bg-gray-800 transition">
                            Order Now
                        </button>
                        <button id="maybeLaterBtn"
                            class="bg-white text-gray-800 font-semibold px-5 py-2 rounded-md hover:bg-gray-100 transition">
                            Maybe Later
                        </button>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const bookBtn = document.getElementById("bookBtn"); // your 'Book a Table' button (type=button)
                    const popup = document.getElementById("orderPopup");
                    const orderNowBtn = document.getElementById("orderNowBtn");
                    const maybeLaterBtn = document.getElementById("maybeLaterBtn");

                    // show popup when clicking Book a Table
                    bookBtn.addEventListener("click", (e) => {
                        e.preventDefault(); // keep form from submitting immediately
                        popup.classList.remove("hidden");
                    });

                    // Order Now -> go to menu.show for this restaurant
                    orderNowBtn.addEventListener("click", () => {
                        // uses Laravel route helper to generate the correct URL for menu.show
                        window.location.href = "{{ route('menu.show', ['restaurant' => $restaurant['name']]) }}";
                    });

                    // Maybe Later -> go to the Top Restaurants / Reservation listing page
                    maybeLaterBtn.addEventListener("click", () => {
                        // use a hard url helper to be safe (will always point to /reservation)
                        window.location.href = "{{ url('/reservation') }}";
                    });

                    // Optional: clicking outside the popup closes it
                    popup.addEventListener("click", (e) => {
                        if (e.target === popup) popup.classList.add("hidden");
                    });
                });
            </script>

        </aside>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const mainImage = document.getElementById("mainImage");
            const thumbs = document.querySelectorAll(".thumb");

            thumbs.forEach(thumb => {
                thumb.addEventListener("click", () => {
                    const tempSrc = mainImage.src;
                    mainImage.src = thumb.src;
                    thumb.src = tempSrc;
                });
            });
        });
    </script>

    

</body>

</html>