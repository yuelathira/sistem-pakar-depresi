@extends('components.layout')

@section('content')
    <main class="py-14 mb-20 min-h-screen">
        <div class="container flex flex-col h-full min-h-screen gap-10">
            <h1 class="text-5xl text-center font-black text-white">Test Kecenderungan Depresi</h1>
            <div class="rounded-lg p-3 bg-tertiary text-white">
                <p class="font-bold text-lg">Petunjuk pengisian</p>
                <ol class="list-decimal ps-6 text-lg">
                    <li>Jawablah semua pertanyaan sesuai dengan kondisi saat ini yang anda alami atau rasakan dalam
                        <strong>2 minggu terakhir</strong>.
                    <li>Semakin sesuai yang anda alami maka hasil tes ini akan semakin akurat dan benar.</li>
                    <li>Pastikan semua pertanyaan sudah terjawab, dan jika sudah semua terjawab kemudian klik Selesai untuk
                        memperoleh hasil test.</li>
                </ol>
            </div>
            <form class="py-4 flex flex-col gap-5" action="{{ route('hasil_konsultasi') }}" method="POST" id="formSubmit">
                @csrf
                @foreach ($gejalas as $idx => $gejala)
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div>
                        <p class="text-lg">Apakah Anda
                            <strong>{{ $gejala->namagejala }}</strong> ?
                        </p>
                        <div class="flex flex-col gap-2 mt-2">
                            <div class="flex gap-2 items-center ml-4">
                                <input id="answer-{{ $idx }}-1" required type="radio" name="{{ $gejala->id }}"
                                    value="ya">
                                <label for="answer-{{ $idx }}-1">Ya</label>
                            </div>
                            <div class="flex gap-2 items-center ml-4">
                                <input id="answer-{{ $idx }}-2" required type="radio" name="{{ $gejala->id }}"
                                    value="tidak">
                                <label for="answer-{{ $idx }}-2">Tidak</label>
                            </div>
                        </div>
                    </div>
                @endforeach
                <button type="submit" class="btn mt-8 w-fit">Selesai</button>
            </form>

        </div>
    </main>
@endsection

@push('scripts')
    <script>
        // Pengecekan untuk mengecek apakah user sudah memilih 5 gejala atau tidak
        document.getElementById("formSubmit").addEventListener("submit", (e) => {
            e.preventDefault();
            let count = 0
            const forms = document.querySelectorAll("input[value='ya']")
            forms.forEach((inputElement) => {
                if (inputElement.checked) {
                    count++
                }
            });

            if (count < 5) {
                Swal.fire({
                    title: "Hore!",
                    text: "Hasil diagnosa kamu menunjukkan tidak ada gejala depresi. Lakukan test ulang untuk mengetahui kondisimu selanjutnya",
                    confirmButtonText: 'Oke',
                }).then((result) => {
                    location.href="/";
                })
            } else {
                Swal.fire({
                    title: "Hi!",
                    text: "Selamat kamu telah menyelesaikan test gangguan depresi. Lakukan test ulang untuk mengetahui kondisimu selanjutnya",
                    confirmButtonText: 'Oke',
                }).then((result) => {
                    e.target.submit();
                })

            }
        })
    </script>
@endpush
