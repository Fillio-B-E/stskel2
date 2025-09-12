<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen w-screen font-serif">
    <div class="flex h-screen w-screen">

        <!-- REGISTER -->
        <div class="w-[65%] flex items-center justify-center bg-white">
            <div class="w-full max-w-md px-10 text-center">
                <h1 class="text-3xl font-bold mb-10">Join Us!</h1>

                @if ($errors->any())
                <div class="mb-4 text-red-600 text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-8" autocomplete="off">
                    @csrf

                    <div>
                        <label for="email" class="block text-xs tracking-widest text-gray-500 mb-2 uppercase">Email</label>
                        <input type="email" id="email" name="email" required autocomplete="new-email"
                            class="w-full border-b border-gray-400 focus:outline-none py-2 text-lg font-medium text-center">
                    </div>

                    <div>
                        <label for="username" class="block text-xs tracking-widest text-gray-500 mb-2 uppercase">Username</label>
                        <input type="text" id="username" name="username" required autocomplete="off"
                            class="w-full border-b border-gray-400 focus:outline-none py-2 text-lg font-medium text-center">
                    </div>

                    <div>
                        <label for="password" class="block text-xs tracking-widest text-gray-500 mb-2 uppercase">Password</label>
                        <input type="password" id="password" name="password" required autocomplete="new-password"
                            class="w-full border-b border-gray-400 focus:outline-none py-2 text-lg font-medium text-center">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs tracking-widest text-gray-500 mb-2 uppercase">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                            class="w-full border-b border-gray-400 focus:outline-none py-2 text-lg font-medium text-center">
                    </div>

                    <button type="submit"
                        class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-medium py-3 rounded-full">
                        Sign Up
                    </button>
                </form>
            </div>
        </div>

        <!-- IMAGE -->
        <div class="w-[35%] relative">
            <img src="{{ asset('images/login.jpg') }}"
                alt="Login illustration"
                class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center text-center text-white px-8">
                <h2 class="text-3xl font-bold mb-3">One of us?</h2>
                <p class="mb-6 text-sm">If you already have an account<br>just sign in. We missed you!</p>
                <a href="{{ route('login') }}"
                    class="border border-white px-8 py-2 rounded-full hover:bg-white hover:text-black transition">
                    Sign In
                </a>
            </div>
        </div>

    </div>
</body>

</html>
