<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'Meowland - Klik, Pesan, Ambil!' }}</title>
</head>

<body class="min-h-screen flex flex-col bg-neutral text-secondary font-sans">
    <x-navbar />

    <main class="grow relative">
        <!-- Notification Indicator -->
        @if (session('success'))
            <div class="fixed top-20 right-6 z-50 animate-bounce-in">
                <div
                    class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-lg flex items-center gap-3 max-w-md">
                    <span class="icon-[tabler--circle-check] text-xl"></span>
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="fixed top-20 right-6 z-50 animate-bounce-in">
                <div
                    class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-lg flex items-center gap-3 max-w-md">
                    <span class="icon-[tabler--circle-x] text-xl"></span>
                    <p class="text-sm font-medium">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        {{ $slot }}
    </main>

    <x-footer />

    <script src="{{ asset('src/cart.js') }}"></script>
</body>

</html>
