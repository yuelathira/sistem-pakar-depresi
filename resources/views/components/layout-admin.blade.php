<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Admin</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="bg-cream">
    <div class="grid grid-cols-12">
        <div class="col-span-3"></div>
        <div class="col-span-3 bg-tertiary px-8 py-12 flex flex-col gap-2 top-0 fixed bottom-0 w-[360px] z-50">
            <a href="{{ route('admin.home') }}"
                class="text-white hover:text-opacity-70 px-4 py-3 rounded-md {{ strpos(Route::current()->getName(), 'home') ? 'bg-white bg-opacity-10' : '' }} text-2xl font-bold">Dashboard</a>
            <a href="{{ route('admin.artikel.index') }}"
                class="text-white hover:text-opacity-70 px-4 py-3 rounded-md {{ strpos(Route::current()->getName(), 'artikel') ? 'bg-white bg-opacity-10' : '' }} text-2xl font-bold">Artikel</a>
            <a href="{{ route('admin.pengguna.index') }}"
                class="text-white hover:text-opacity-70 px-4 py-3 rounded-md {{ strpos(Route::current()->getName(), 'pengguna') ? 'bg-white bg-opacity-10' : '' }} text-2xl font-bold">Pengguna</a>
            <a href="{{ route('admin.diagnosa.index') }}"
                class="text-white hover:text-opacity-70 px-4 py-3 rounded-md {{ strpos(Route::current()->getName(), 'diagnosa') ? 'bg-white bg-opacity-10' : '' }} text-2xl font-bold">Diagnosa</a>
            <a href="{{ route('admin.gejala.index') }}"
                class="text-white hover:text-opacity-70 px-4 py-3 rounded-md {{ strpos(Route::current()->getName(), 'gejala') ? 'bg-white bg-opacity-10' : '' }} text-2xl font-bold">Gejala</a>
            <a href="{{ route('admin.pengetahuan.index') }}"
                class="text-white hover:text-opacity-70 px-4 py-3 rounded-md {{ strpos(Route::current()->getName(), 'pengetahuan') ? 'bg-white bg-opacity-10' : '' }} text-2xl font-bold">Basis
                Pengetahuan</a>
        </div>
        <div class="col-span-9">
            <div class="header bg-blue-200 px-8 py-2 flex justify-end sticky top-0">
                <form method="POST" action="{{ route('logout') }}" class="flex justify-end">
                    @csrf
                    <button type="submit" class="btn py-2">Logout</button>
                </form>
            </div>
            <section class="px-8">
                @if (session('success'))
                    <div class="py-4">
                        <div class="bg-green-100 p-3 rounded-md col-span-12 mb-5 text-green-800">
                            {{ session('success') }}</div>
                    </div>
                @endif
                @yield('content')
            </section>
        </div>
    </div>
    @stack('scripts')
</body>

</html>
