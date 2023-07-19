@extends('components.layout')

@section('content')
    <main class="py-14 mb-20 min-h-screen">
        <div class="container flex flex-col h-full min-h-screen gap-10">
            <h1 class="login text-center">HASIL SCREENING THALASSEMIA</h1>

            <div class="mx-auto" style="width: 800px">
                <h2 class="font-bold text-lg text-left">Gejala yang dialami</h2>
                <table class="w-full mt-3 text-left text-neutral-500 rounded-md overflow-hidden">
                    <thead class="text-sm uppercase bg-orange text-white">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-3">
                                Kode
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gejala
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nilai Keyakinan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gejalas as $key => $gejala)
                            <tr class="border-[1px] border-secondary text-gray-900">
                                <td class="text-center border-[1px] border-secondary px-3">{{ ++$key }}</td>
                                <td class="border-[1px] border-secondary px-3">{{ $gejala->namagejala }}</td>
                                <td class="border-[1px] border-secondary px-3">{{ $gejala->kondisi_user }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mx-auto" style="width: 800px">
                <h2 class="font-bold text-lg text-left">Persentase Penyakit</h2>
                <table class="mt-3 w-full text-left text-neutral-500 rounded-md overflow-hidden">
                    <thead class="text-sm uppercase bg-orange text-white">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-3">
                                Kode
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Penyakit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tingkat Kepercayaan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penyakits as $key => $penyakit)
                            <tr class="text-center">
                                <td scope="col" class="text-center border-[1px] border-secondary px-3">
                                    {{ ++$key }}
                                </td>
                                <td scope="col" class="border-[1px] border-secondary px-3">
                                    {{ $penyakit->namadiagnosa }}
                                </td>
                                <td scope="col" class="border-[1px] border-secondary px-3">
                                    {{ $penyakit->persen }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex mt-10 gap-10 items-center justify-center">
                <button class="shdw text-2xl px-10 py-4 font-bold txtshdw-2 text-red bg-orange rounded-full">CETAK</button>
                <button
                    class="shdw text-2xl px-10 py-4 font-bold txtshdw-2 text-red bg-orange rounded-full">SELESAI</button>
            </div>
        </div>
    </main>
@endsection
