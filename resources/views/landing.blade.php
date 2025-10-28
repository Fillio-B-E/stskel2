<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>BOOKED. — Landing</title>

    <!-- Google Fonts -->
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
        .font-times {
            font-family: "Times New Roman", Times, serif;
        }
    </style>

    <style>
        .hero-title {
            text-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
        }
    </style>
</head>

<body class="font-display antialiased text-gray-800">
    <header class="absolute inset-x-0 top-0 z-40">
        <nav class="absolute top-0 left-0 w-full flex items-center justify-between px-12 py-6 z-20">
            <div class="text-white font-bold text-xl tracking-wide font-spartan">
                BOOKED.
            </div>

            <div class="flex-1 flex justify-center">
                <ul class="flex space-x-10 font-medium">
                    <li><a href="about" class="text-yellow-400">About</a></li>
                    <li><a href="reservation" class="text-white hover:text-yellow-400">Reservation</a></li>
                    <li><a href="schedule" class="text-white hover:text-yellow-400">Schedule</a></li>
                    <li><a href="contact" class="text-white hover:text-yellow-400">Contact</a></li>
                </ul>
            </div>


            <div class="flex items-center space-x-3">
                @auth
                <span class="text-white font-medium">
                    {{ Auth::user()->username }}
                </span>
                @endauth
                <img src="../images/avatar.png" alt="profile" class="w-10 h-10 rounded-full border-2 border-white">
            </div>
        </nav>
    </header>



    <main>
        <section class="relative min-h-screen bg-cover bg-center" style="background-image: url('../images/LPTop.png')">
            <div class="absolute inset-0 bg-black/65"></div>

            <div class="relative z-10 container mx-auto px-6 flex flex-col items-center justify-center text-center min-h-screen">
                <h1 class="text-white font-bold text-6xl md:text-[120px] leading-tight tracking-tight hero-title font-spartan">
                    BOOKED.
                </h1>
                <p class="max-w-3xl text-gray-100 mt-6 font-thin">
                    Tired of waiting in line or calling to reserve a table? With <span class="font-spartan font-semibold">BOOKED.</span> booking your favorite restaurant is faster and easier than ever. Choose your time, number of guests, and get instant confirmation—all in one place. Dining out has never been this simple!
                </p>

                <a href="{{ route('reservation') }}" class="mt-8 inline-block bg-gold text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:brightness-95">Reserve Now</a>
            </div>

            <div class="absolute left-0 right-0 bottom-0 h-24 bg-gradient-to-t from-black/70 to-transparent"></div>
        </section>

        <section class="py-16 bg-gray-100">
            <div class="max-w-6xl mx-auto px-6">
                <h2 class="text-4xl font-semibold text-center mb-4 font-spartan">Why Choose Us?</h2>
                <p class="text-center text-gray-600 mb-10">
                    Book your table anytime, anywhere with <span class="font-spartan font-bold">BOOKED.</span> fast, simple, and stress-free dining made easy!
                </p>


                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="bg-white shadow-md rounded-2xl p-6 transition transform hover:-translate-y-2">
                        <img src="../images/card1.png" class="rounded-t-2xl w-full h-56 object-cover">
                        <p class="mt-4 text-gray-700 font-extralight">
                            Find top-rated restaurants that truly suit your taste and mood, making every meal more special and memorable.
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white shadow-md rounded-2xl p-6 transition transform hover:-translate-y-2">
                        <img src="../images/card2.png" class="rounded-t-2xl w-full h-56 object-cover">
                        <p class="mt-4 text-yellow-600 font-extralight">
                            Enjoy the freedom to choose your own seat when making a reservation—pick the perfect spot for your dining experience.
                        </p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white shadow-md rounded-2xl p-6 transition transform hover:-translate-y-2">
                        <img src="../images/card3.png" class="rounded-t-2xl w-full h-56 object-cover">
                        <p class="mt-4 text-gray-700 font-extralight">
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
                    <h2 class="text-4xl md:text-5xl font-bold leading-tight relative inline-block mb-8 pb-2 border-b-4 border-white font-spartan">
                        <span class="font-medium">Make it Simple with </span><br><span class="font-bold">BOOKED.</span>
                    </h2>

                    <p class="mb-8 text-lg text-gray-200 max-w-lg">
                        With <span class="font-spartan font-bold">BOOKED.</span> dining reservations become simple, fast, and stress-free. From choosing top-rated restaurants to selecting your favorite seat and booking anytime, anywhere—everything is made effortless in one secure platform.
                    </p>


                    <a href="#"
                        class="inline-block bg-yellow-500 text-white font-semibold px-12 py-3 rounded-full shadow-md hover:bg-yellow-400 transition">
                        See More
                    </a>
                </div>
            </div>
        </section>

        <footer class="bg-black text-white py-12">
            <div class="container mx-auto px-8">
                <div class="flex flex-col md:flex-row justify-between">

                    <!-- left -->
                    <div>
                        <h3 class="text-lg font-semibold mb-6 font-spartan">CONTACT US</h3>
                        <ul class="space-y-4 text-gray-300 text-sm">
                            <li class="flex items-start">
                                <img src="/images/location.png" alt="Location" class="w-5 h-5 mr-3 mt-1">
                                <span>12/2 Plot No. 39, 15th Phase, Colony.<br>Kukatpally, Hyderabad</span>
                            </li>
                            <li class="flex items-center">
                                <img src="/images/email.png" alt="Email" class="w-5 h-5 mr-3">
                                <span>booked@gmail.id</span>
                            </li>
                            <li class="flex items-center">
                                <img src="/images/call.png" alt="Phone" class="w-5 h-5 mr-3">
                                <span>00 2334 3524 3453 22</span>
                            </li>
                        </ul>
                    </div>

                    <!-- middle -->
                    <div>
                        <h3 class="text-lg font-bold mb-4 text-center font-times">WORK HOURS</h3>
                        <ul class="divide-y divide-gray-600">
                            <li class="flex justify-between py-2">
                                <span class="w-80">Monday</span>
                                <span class="font-times">8:00 AM – 11:00 PM</span>
                            </li>
                            <li class="flex justify-between py-2">
                                <span class="w-80">Tuesday</span>
                                <span class="font-times">8:00 AM – 11:00 PM</span>
                            </li>
                            <li class="flex justify-between py-2">
                                <span class="w-80">Wednesday</span>
                                <span class="font-times">8:00 AM – 11:00 PM</span>
                            </li>
                            <li class="flex justify-between py-2">
                                <span class="w-80">Thursday</span>
                                <span class="font-times">8:00 AM – 11:00 PM</span>
                            </li>
                            <li class="flex justify-between py-2">
                                <span class="w-80">Friday</span>
                                <span class="font-times">8:00 AM – 11:00 PM</span>
                            </li>
                            <li class="flex justify-between py-2">
                                <span class="w-80">Saturday</span>
                                <span class="font-times">8:00 AM – 11:00 PM</span>
                            </li>
                            <li class="flex justify-between py-2">
                                <span class="w-80">Sunday</span>
                                <span class="text-red-500 font-times">Closed</span>
                            </li>
                        </ul>
                    </div>


                    <!-- right -->
                    <div class="text-left">
                        <h3 class="text-lg font-bold mb-4 whitespace-nowrap font-spartan">CONNECT WITH US</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <img src="images/tiktok.png" alt="TikTok" class="w-5 h-5 mr-3">
                                <span>booked.id</span>
                            </li>
                            <li class="flex items-center">
                                <img src="images/twitter.png" alt="X" class="w-5 h-5 mr-3">
                                <span>booked</span>
                            </li>
                            <li class="flex items-center">
                                <img src="images/instagram.png" alt="Instagram" class="w-5 h-5 mr-3">
                                <span>@booked.</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>
    </main>
</body>

</html>