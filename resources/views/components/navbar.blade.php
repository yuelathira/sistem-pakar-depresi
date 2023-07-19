{{-- Navbar --}}
<header class="bg-secondary px-8 py-3 sticky top-0">
    <nav class="container flex justify-between items-center">
        <a class="text-decoration-none font-extrabold underline text-2xl text-white" href="{{ route('home') }}">Sistem Pakar</a>
        <div class="flex gap-8 items-center">
            <a class="text-decoration-none font-bold text-lg text-white screening-btn" href="{{ route('home') }}">Home</a>
            <a class="text-decoration-none font-bold text-lg text-white screening-btn" href="{{ route('screening') }}">Test Depresi</a>
            <a class="text-decoration-none font-bold text-lg text-white screening-btn" href="{{ route('riwayat') }}">Riwayat</a>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-decoration-none font-bold text-lg text-white px-6 py-3 rounded-3xl bg-tertiary transition-all hover:bg-secondary-2">Logout</button>
                </form>
            @else
                <a class="text-decoration-none font-bold text-lg text-white px-6 py-1 rounded-3xl bg-tertiary transition-all hover:bg-secondary-2"
                    href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </nav>
</header>
{{-- 
@push('scripts')
    @guest
        <script>
            const screeningBtns = document.querySelectorAll(".screening-btn")
            screeningBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    window.location.href = "{{ route('login') }}";
                })
            })
        </script>
    @else
        <script>
            const screeningBtns = document.querySelectorAll(".screening-btn")

            screeningBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    Swal.fire({
                        title: "Pertanyaan Pra-screening",
                        text: "Screening penyakit thalassemia memerlukan informasi mengenai riwayat kesehatan keluarga. Apakah Anda memiliki anggota keluarga dengan riwayat penyakit Thalassemia?",
                        showDenyButton: true,
                        confirmButtonText: 'Ya',
                        denyButtonText: `Tidak`,
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('screening') }}"
                        } else if (result.isDenied) {
                            window.location.href = "{{ route('result', ['hasil' => 'normal']) }}"
                        }
                    })
                })
            });
        </script>
    @endguest
@endpush --}}
