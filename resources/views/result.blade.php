@extends('components.layout')

@section('content')
    <main class="py-14 mb-20 min-h-screen">
        <div class="container flex flex-col h-full min-h-screen gap-10">
            <h1 class="text-6xl font-black text-white text-center">Hasil Test Kecenderungan Depresi</h1>
            <div class="container-result text-center p-5">
                <div class="result px-3">
                    <p class="text-2xl"><b>Hasil Diagnosa</b></p>
                    <p class="text-2xl">{{ floor($hasil->nilai_akurasi * 100) }}% Kecenderungan
                        <b>{{ $hasil->diagnosa->namadiagnosa }}</b>
                    </p>
                    <br>
                    <p class="text-left"><b>Solusi Penanganan Awal</b></p>
                    <div class="list-solusi text-left mx-auto">
                        {!! $hasil->diagnosa->solusi !!}
                    </div>
                    <br>
                    <p class="text-left"><b>Disclaimer</b></p>
                    <p class="text-left">Hasil test ini hanya sebagai alat ukur secara obyektif, untuk diagnosis lebih
                        lanjut diperlukan konsultasi ke dokter psikiater atau psikolog klinis terdekat.</p>

                    <div class="mt-5">
                        <p class="text-left font-bold mb-2">Daftar Gejala:</p>
                        <table class="w-full text-left text-neutral-500 rounded-md overflow-hidden">
                            <thead class="text-sm uppercase bg-tertiary text-white">
                                <tr class="text-center">
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Gejala
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pilihan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gejala as $index => $item)
                                    <tr class="border-[1px] border-secondary text-gray-900 bg-white bg-opacity-40">
                                        <td class="text-center border-[1px] border-secondary px-3">{{ $index + 1 }}</td>
                                        <td class="text-center border-[1px] border-secondary px-3">{{ $item->namagejala }}
                                        </td>
                                        <td class="text-center border-[1px] border-secondary px-3">
                                            {{ $answers[$index + 1] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4 max-w-[240px] mx-auto">
                <a href="/hasil-pdf/{{ $hasil->id }}"
                    class="text-decoration-none w-full text-center mx-auto font-bold text-lg text-white px-6 py-3 rounded-3xl bg-tertiary transition-all hover:bg-secondary-2">Download
                    PDF</a>
                <a href="/"
                    class="text-decoration-none w-full text-center mx-auto font-bold text-lg text-white px-6 py-3 rounded-3xl bg-tertiary transition-all hover:bg-secondary-2">Kembali</a>
            </div>
        </div>
    </main>
@endsection
