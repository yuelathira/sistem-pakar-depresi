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
        <div class="container flex flex-col h-full min-h-screen gap-10">
            <h1 class="text-6xl font-black text-white text-center">Hasil Test Gangguan Depresi</h1>
            <div class="container-result text-center p-5">
                <div class="result px-">
                    <h3 class="text-2xl"><b>Hasil Diagnosa</b></h3>
                    <p class="">Nama: {{ Auth::user()->name }}</p>
                    <p class="">Tanggal Tes: {{ $hasil->created_at->format('d-m-Y') }}</p>
                    <p class="text-2xl" style="margin-top: 40px">{{ floor($hasil->nilai_akurasi * 100) }}% kemungkinan
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
                </div>
            </div>
        </div>
    </main>

</body>

</html>
