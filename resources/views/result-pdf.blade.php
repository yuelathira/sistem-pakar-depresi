<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html {
            background: rgb(229, 235, 236)
        }
    </style>
</head>

<body>
    <main class="py-14 mb-20 min-h-screen">
        <div class="container flex flex-col h-full min-h-screen gap-10" style="padding: 32px">
            <h1 class="text-6xl font-black text-white text-center">Hasil Test Kecenderungan Depresi</h1>
            <div class="container-result text-center p-5">
                <div class="result px-">
                    <h3 class="text-2xl"><b>Hasil Diagnosa</b></h3>
                    <p class="">Nama: {{ Auth::user()->name }}</p>
                    <p class="">Tanggal Tes: {{ $hasil->created_at->format('d-m-Y') }}</p>
                    <p class="text-2xl" style="margin-top: 40px">{{ floor($hasil->nilai_akurasi * 100) }}% Kecenderungan
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
                        lanjut
                        diperlukan
                        konsultasi ke dokter psikiater atau psikolog klinis terdekat.</p>

                    <div class="mt-5">
                        <p class="text-left font-bold mb-2">Daftar Gejala:</p>
                        <table class="w-full text-left text-neutral-500 rounded-md overflow-hidden styled-table">
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
                                        <td class="text-center border-[1px] border-secondary px-3">{{ $index + 1 }}
                                        </td>
                                        <td class="text-center border-[1px] border-secondary px-3">
                                            {{ $item->namagejala }}
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
        </div>
    </main>

    <style>
        * {
            font-family: sans-serif;
            /* background: whitesmoke */
        }

        body {
            background: whitesmoke
        }

        .styled-table thead tr {
            background-color: #3f72af;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #3f72af;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #3f72af;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
    </style>
</body>

</html>
