<header class="bg-[#A84448] px-8 py-4">
    <nav class="container flex justify-between items-center">
        <a style="color: #F6E1C3" class="text-decoration-none font-bold text-lg text-cream"
            href="{{ route('admin.home') }}">Admin</a>
        <div class="flex gap-12">
            <a style="color: #F6E1C3" class="text-decoration-none font-bold text-lg text-cream"
                href="{{ route('admin.pengguna.index') }}">Pengguna</a>
            <a style="color: #F6E1C3" class="text-decoration-none font-bold text-lg text-cream"
                href="{{ route('admin.diagnosa.index') }}">Penyakit</a>
            <a style="color: #F6E1C3" class="text-decoration-none font-bold text-lg text-cream"
                href="{{ route('admin.gejala.index') }}">Gejala</a>
            <a style="color: #F6E1C3" class="text-decoration-none font-bold text-lg text-cream"
                href="{{ route('admin.pengetahuan.index') }}">Basis Pengetahuan</a>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="color: #F6E1C3"
                        class="text-decoration-none font-bold text-lg text-cream">Logout</button>
                </form>
            @endauth
        </div>
    </nav>
</header>
