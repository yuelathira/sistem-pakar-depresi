{{-- Navbar --}}
<header class="bg-secondary lg:px-8 py-3 sticky top-0">
    <nav class="container flex justify-between items-center !m-0">
        <a class="text-decoration-none font-extrabold underline text-lg lg:text-2xl text-white"
            href="{{ route('home') }}">Sistem Pakar</a>

        <div id="toggle-menu">
            <svg xmlns="http://www.w3.org/2000/svg" id="menu-button" class="h-6 w-6 cursor-pointer lg:hidden block"
                fill="none" viewBox="0 0 24 24" stroke="white">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </div>

        <div id="menu"
            class="gap-8 items-center flex lg:hidden hidden flex-col top-10 left-0 w-full lg:w-auto lg:flex-row absolute lg:static p-8 bg-white lg:bg-transparent lg:p-0">
            <a class="text-decoration-none font-bold text-lg lg:text-white screening-btn"
                href="{{ route('home') }}">Home</a>
            @if (Route::currentRouteName() === 'register')
                <a class="text-decoration-none font-bold text-lg text-white px-6 py-1 rounded-3xl bg-tertiary transition-all hover:bg-secondary-2"
                    href="{{ route('login') }}">Login</a>
            @else
                <a class="text-decoration-none font-bold text-lg text-white px-6 py-1 rounded-3xl bg-tertiary transition-all hover:bg-secondary-2"
                    href="{{ route('register') }}">Register</a>
            @endif
        </div>

        <div
            class="gap-8 items-center hidden lg:flex flex-col top-10 left-0 w-full lg:w-auto lg:flex-row absolute lg:static p-8 bg-white lg:bg-transparent lg:p-0">
            <a class="text-decoration-none font-bold text-lg lg:text-white screening-btn"
                href="{{ route('home') }}">Home</a>
            @if (Route::currentRouteName() === 'register')
                <a class="text-decoration-none font-bold text-lg text-white px-6 py-1 rounded-3xl bg-tertiary transition-all hover:bg-secondary-2"
                    href="{{ route('login') }}">Login</a>
            @else
                <a class="text-decoration-none font-bold text-lg text-white px-6 py-1 rounded-3xl bg-tertiary transition-all hover:bg-secondary-2"
                    href="{{ route('register') }}">Register</a>
            @endif
        </div>
    </nav>
</header>

@push('scripts')
    <script>
        const button = document.querySelector('#toggle-menu');
        const menu = document.querySelector('#menu');


        button.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
@endpush
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
