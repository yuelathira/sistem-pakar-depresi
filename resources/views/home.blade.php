@extends('components.layout')

@section('content')
    <main class="py-14">
        <div class="container flex flex-col h-full gap-10">
            <div class="grid grid-cols-12">
                <div class="col-span-12 lg:col-span-4 gap-3">
                    <h1 class="text-2xl txtshdw-2 font-black text-white">Apa itu depresi?</h1>
                    <p class="mt-4 tracking-wider">
                        Depresi merupakan sebuah kondisi emosional dan psikis seseorang yang ditandai dengan perasaan sedih,
                        putus asa, berkurangnya nafsu makan dan hilangnya minat dan energi ketika melakukan aktivitas.
                        <br><br>
                        Yuk lakukan tes depresi untuk mengukur tingkat depresi dalam dirimu. Hasil dari tes ini akan sangat
                        membantu kamu mengetahui keadaan kesehatan mentalmu saat ini.
                    </p>

                    <a href="{{ route('screening') }}"
                        class="text-decoration-none mt-7 block w-fit font-bold text-white px-3 py-2 rounded-3xl bg-tertiary transition-all hover:bg-secondary-2">Mulai
                        Tes</a>
                </div>
                <div class="col-span-12 lg:col-span-4 mt-12 lg:mt-0 flex flex-col gap-3 items-center justify-center">
                    <img src="{{ asset('assets/images/logo1.png') }}" width="280px" alt="">
                </div>
                @if (count($artikel) > 0)
                    <div class="col-span-12 lg:col-span-4 mt-12 lg:mt-0 flex flex-col gap-3 items-center justify-center">
                        <p class="text-2xl txtshdw-2 font-black text-white">Baca Tentang Depresi</p>
                        @foreach ($artikel->take(2) as $item)
                            <a href="{{ $item->url }}"
                                class="article-card py-4 px-5 rounded-md border-[1px] bg-slate-50 flex items-center justify-center flex-col w-full lg:w-[400px]">
                                <h3 class="font-bold text-lg text-center text-secondary">{{ $item->judul }}</h3>
                                <p class="text-sm text-gray-600">{{ $item->author }}</p>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
            <h2 class="text-center mt-4 text-2xl text-white font-black">Tipe Tingkatan Depresi</h2>
            <div class="flex flex-col md:flex-row gap-8 justify-center w-full">
                <div class="flex flex-col items-center-justify-center bg-slate-100 rounded-md py-3 bg-opacity-20">
                    <p class="font-bold text-lg text-center">Depresi Ringan</p>
                    <p class="text-center">Pada depresi ringan seseorang akan mengalami cemas, tidak bersemangat, dan mood
                        yang rendah datang dan pergi.</p>
                </div>
                <div class="flex flex-col items-center-justify-center bg-slate-100 rounded-md py-3 bg-opacity-20">
                    <p class="font-bold text-lg text-center">Depresi Sedang</p>
                    <p class="text-center">Pada depresi sedang seseorang akan mengalami gejala fisik yang tiap orang akan
                        berbeda beda gejalanya dan mood yang rendah terjadi terus menerus</p>
                </div>
                <div class="flex flex-col items-center-justify-center bg-slate-100 rounded-md py-3 bg-opacity-20">
                    <p class="font-bold text-lg text-center">Depresi Berat</p>
                    <p class="text-center">Pada depresi berat seseorang akan mengalami gangguan saat bekerja, tidur, makan
                        dan menikmati hal yang membuatnya senang</p>
                </div>
            </div>
        </div>
    </main>
@endsection
