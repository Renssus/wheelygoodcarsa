<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'WheelyGoodCars')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold text-indigo-600">AutoApp</a>
            <nav class="space-x-6 text-gray-700 font-semibold">
                <p>
                    @auth
                            <a href="{{ route('cars.step1') }}"
                                class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                                Beheer mijn auto's
                            </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-indigo-600 hover:underline">Logout</button>
                    @else
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Login</a> /
                        <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Register</a>
                    @endauth
                    </p>
            </nav>
        </div>
    </header>
    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-white border-t mt-auto">
        <div class="container mx-auto px-4 py-4 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} AutoApp. Alle rechten voorbehouden.
        </div>
    </footer>

</body>

</html>