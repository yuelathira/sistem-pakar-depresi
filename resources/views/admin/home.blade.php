@extends('components.layout-admin')

@section('content')
    <main class="py-14 mb-20">
        <div class="container flex flex-col h-full gap-10">
            <div class="flex gap-8">
                <div class="bg-white rounded-lg p-6 flex flex-col gap-2 flex-grow">
                    <p class="font-extrabold text-xl">Total Pengguna</p>
                    <p class="font-bold text-xl text-center">{{ count($users) }}</p>
                </div>
                <div class="bg-white rounded-lg p-6 flex flex-col gap-2 flex-grow">
                    <p class="font-extrabold text-xl">Total Diagnosa</p>
                    <p class="font-bold text-xl text-center">{{ count($diagnosas) }}</p>
                </div>
                <div class="bg-white rounded-lg p-6 flex flex-col gap-2 flex-grow">
                    <p class="font-extrabold text-xl">Total Gejala</p>
                    <p class="font-bold text-xl text-center">{{ count($gejalas) }}</p>
                </div>
                <div class="bg-white rounded-lg p-6 flex flex-col gap-2 flex-grow">
                    <p class="font-extrabold text-xl">Total Pengetahuan</p>
                    <p class="font-bold text-xl text-center">{{ count($pengetahuans) }}</p>
                </div>
            </div>

            <div class="flex h-full w-full items-center justify-between mt-10">
                <div>
                    <h1 class="font-bold text-3xl">Selamat Datang!</h1>
                    <p class="text-xl">Di Sistem Pakar Diagnosa Tingkat Depresi</p>
                </div>
                <img src="{{ asset('assets/images/login.png') }}" width="240px" alt="">
            </div>
        </div>
    </main>
@endsection
