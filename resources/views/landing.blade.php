<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>BOOKED. — Landing</title>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CDN for quick prototype (no build step required) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['"Playfair Display"', 'serif'],
                        sans: ['Inter', 'sans-serif']
                    },
                    colors: {
                        gold: '#d2a62c'
                    }
                }
            }
        }
    </script>
    <style>
        /* small helpers to more closely match the sample */
        .hero-title {
            text-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-800">
    <header class="absolute inset-x-0 top-0 z-40">
        <nav class="absolute top-0 left-0 w-full flex items-center justify-between px-12 py-6 z-20">
            <div class="text-white font-bold text-xl tracking-wide">
                BOOKED.
            </div>

            <div class="flex-1 flex justify-center">
                <ul class="flex space-x-10 text-white font-medium">
                    <li><a href="#about" class="hover:text-yellow-400">About</a></li>
                    <li><a href="#reservation" class="hover:text-yellow-400">Reservation</a></li>
                    <li><a href="#schedule" class="hover:text-yellow-400">Schedule</a></li>
                    <li><a href="#contact" class="hover:text-yellow-400">Contact</a></li>
                </ul>
            </div>

            <div class="flex items-center space-x-2">
                <img src="../images/avatar.png" alt="profile" class="w-10 h-10 rounded-full border-2 border-white">
            </div>
        </nav>

    </header>

    <main>
        <section class="relative min-h-screen bg-cover bg-center" style="background-image: url('../images/LPTop.png')">


            <div class="absolute inset-0 bg-black/65"></div>

            <div class="relative z-10 container mx-auto px-6 flex flex-col items-center justify-center text-center min-h-screen">
                <h1 class="text-white font-display font-extrabold text-6xl md:text-[120px] leading-tight tracking-tight hero-title">BOOKED.</h1>
                <p class="max-w-3xl text-gray-100 mt-6">Tired of waiting in line or calling to reserve a table? With BOOKED. booking your favorite restaurant is faster and easier than ever. Choose your time, number of guests, and get instant confirmation—all in one place. Dining out has never been this simple!</p>
                <a href="{{ route('reservation') }}" class="mt-8 inline-block bg-gold text-black font-semibold py-3 px-8 rounded-full shadow-lg hover:brightness-95">Reserve Now</a>
            </div>

            <div class="absolute left-0 right-0 bottom-0 h-24 bg-gradient-to-t from-black/70 to-transparent"></div>
        </section>

        <section class="py-16 bg-gray-100">
            <div class="max-w-6xl mx-auto px-6">
                <h2 class="text-2xl font-bold text-center mb-4">Why Choose Us?</h2>
                <p class="text-center text-gray-600 mb-10">
                    Book your table anytime, anywhere with BOOKED. fast, simple, and stress-free dining made easy!
                </p>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="bg-white shadow-md rounded-2xl p-6 transition transform hover:-translate-y-2">
                        <img src="../images/card1.png" class="rounded-t-2xl w-full h-56 object-cover">
                        <p class="mt-4 text-gray-700">
                            Find top-rated restaurants that truly suit your taste and mood, making every meal more special and memorable.
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white shadow-md rounded-2xl p-6 transition transform hover:-translate-y-2">
                        <img src="../images/card2.png" class="rounded-t-2xl w-full h-56 object-cover">
                        <p class="mt-4 text-yellow-600 font-medium">
                            Enjoy the freedom to choose your own seat when making a reservation—pick the perfect spot for your dining experience.
                        </p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white shadow-md rounded-2xl p-6 transition transform hover:-translate-y-2">
                        <img src="../images/card3.png" class="rounded-t-2xl w-full h-56 object-cover">
                        <p class="mt-4 text-gray-700">
                            Book your favorite restaurant effortlessly, whether you're at home, at work, or on the go.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative bg-cover bg-center text-white py-24" style="background-image: url('../images/LPBot.png');">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="relative z-10 flex items-center">
                <div class="w-full md:w-1/2 text-left pl-12">

                    <h2 class="text-4xl md:text-5xl font-bold leading-tight relative inline-block mb-8 pb-2 border-b-4 border-white">
                        Make it Simple with <br> <span class="font-extrabold">BOOKED.</span>
                    </h2>

                    <p class="mb-8 text-lg text-gray-200 max-w-lg">
                        With BOOKED, dining reservations become simple, fast, and stress-free. From choosing
                        top-rated restaurants to selecting your favorite seat and booking anytime, anywhere—
                        everything is made effortless in one secure platform.
                    </p>

                    <a href="#"
                        class="inline-block bg-yellow-500 text-black font-semibold px-12 py-3 rounded-full shadow-md hover:bg-yellow-400 transition">
                        See More
                    </a>
                </div>
            </div>
        </section>

        <!-- FOOTER  -->
        <footer class="bg-black text-white py-12">
            <div class="relative z-10 flex items-center">

                <!-- LEFT -->
                <div class="w-full md:w-1/2 text-left pl-12">
                    <h3 class="text-lg font-semibold mb-4">For questions and suggestions</h3>
                    <p class="mb-2">
                        <a href="mailto:booked@gmail.com" class="text-blue-400 hover:underline">booked@gmail.com</a>
                    </p>
                    <p>00 2334 3524 3453 22</p>
                </div>

                <!-- RIGHT -->
                <div class="w-full md:w-1/3 mt-8 md:mt-0 text-right">
                    <h3 class="text-lg font-semibold mb-4">More Info</h3>
                    <div class="flex justify-end space-x-6 text-xl">
                        <a href="#"> <img src="images/icon1.png" alt="icon1" class="w-6 h-6 hover:opacity-80"> </a>
                        <a href="#"> <img src="images/icon2.png" alt="icon2" class="w-6 h-6 hover:opacity-80"> </a>
                        <a href="#"> <img src="images/icon3.png" alt="icon3" class="w-6 h-6 hover:opacity-80"> </a>
                    </div>
                    <div class="flex justify-end space-x-6 text-xl">
                        <a href="#"> <img src="images/icon4.png" alt="icon3" class="w-6 h-6 hover:opacity-80"> </a>
                        <a href="#"> <img src="images/icon5.png" alt="icon3" class="w-6 h-6 hover:opacity-80"> </a>
                    </div>
                </div>

            </div>
        </footer>


    </main>

    <script>
        const btn = document.getElementById('nav-toggle');
        btn && btn.addEventListener('click', () => {
            const nav = document.querySelector('header nav');
            if (nav) nav.classList.toggle('hidden');
        })
    </script>
</body>

</html>