@extends('components.layout')

@section('content')
    <main class="py-14 mb-20">
        <div class="container flex flex-col h-full gap-10">
            @if (count($riwayat) === 0)
                <div class="mx-auto flex flex-col gap-6 items-center justify-center">
                    <h1 class="text-4xl font-black">Riwayat Konsultasi</h1>
                    <p class="text-xl">Saat ini belum ada riwayat konsultasi</p>
                    <a href="/screening"
                        class="text-decoration-none w-fit mx-auto font-bold text-lg text-white px-6 py-3 rounded-3xl bg-tertiary transition-all hover:bg-secondary-2">Test
                        Depresi Sekarang</a>
                </div>
            @else
                <div class="mx-auto flex flex-col gap-6 items-center justify-center">
                    <h1 class="text-4xl font-black">Riwayat Konsultasi</h1>
                    <div class="flex flex-col gap-4">
                        @foreach ($riwayat as $item)
                            <a href="/hasil/{{ $item->id }}"
                                class="flex items-start justify-start flex-col rounded-md border-[1px] border-tertiary hover:bg-primary bg-white px-8 py-4">
                                <p class="">
                                    <b>Hasil:</b> {{ floor($item->nilai_akurasi * 100) }}%
                                    {{ $item->diagnosa->namadiagnosa }}
                                </p>
                                Tanggal test: {{ $item->created_at }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </main>
@endsection

{{-- @push('scripts')
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
