<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Load League Spartan font -->
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind config to register font-spartan -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        spartan: ['"League Spartan"', 'sans-serif'],
                    },
                },
            },
        }
    </script>
</head>

<body class="h-screen w-screen font-serif">
    <div class="flex h-screen w-screen">

        <!-- LOGIN -->
        <div class="w-[65%] flex items-center justify-center bg-white">
            <div class="w-full max-w-md px-10 text-center">
                <h1 class="text-3xl font-bold mb-10">Welcome back!</h1>

                @if ($errors->any())
                <div class="mb-4 text-red-600 text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-8" autocomplete="off">
                    @csrf

                    <div>
                        <label for="email"
                            class="block text-xs text-gray-500 mb-2 uppercase font-spartan tracking-[0.3em]">
                            E m a i l
                        </label>
                        <input type="email" id="email" name="email" required autocomplete="new-email"
                            class="w-full border-b border-gray-400 focus:outline-none py-2 text-lg font-medium text-center">
                    </div>

                    <div>
                        <label for="password"
                            class="block text-xs text-gray-500 mb-2 uppercase font-spartan tracking-[0.3em]">
                            P a s s w o r d
                        </label>
                        <input type="password" id="password" name="password" required autocomplete="new-password"
                            class="w-full border-b border-gray-400 focus:outline-none py-2 text-lg font-medium text-center">
                    </div>

                    <button type="submit"
                        class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-medium py-3 rounded-full">
                        Sign In
                    </button>
                </form>

            </div>
        </div>

        <!-- IMAGE -->
        <div class="w-[35%] relative">
            <img src="{{ asset('images/login.jpg') }}"
                alt="Register illustration"
                class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center text-center text-white px-8">
                <h2 class="text-3xl font-bold mb-3">New here?</h2>
                <p class="mb-6 text-sm font-spartan">
                    Sign Up and discover a great<br>amount of opportunities!
                </p>
                <a href="{{ route('register') }}"
                    class="border border-white px-8 py-2 rounded-full hover:bg-white hover:text-black transition">
                    Sign Up
                </a>
            </div>
        </div>
    </div>
</body>

</html>