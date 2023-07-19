@extends('components.layout-admin')

@section('content')
    <main class="py-14 mb-20 min-h-screen">
        <div class="container flex flex-col h-full min-h-screen gap-10">
            <div>
                <h1 class="login font-bold text-3xl">Tambah {{ $name }}</h1>
                <hr class="border-white border-opacity-70 mt-3">
            </div>
            <div class="flex items-center justify-stretch w-full">
                <div class="w-full rounded-[60px] flex flex-col items-center justify-center">
                    @if ($name === 'Pengguna')
                        <form action="{{ route('admin.pengguna.store') }}" method="POST"
                            class="w-full flex flex-col gap-4 items-center">
                            @csrf
                            <input required name="name" type="text" placeholder="Nama" class="input admin mx-auto">
                            <input required name="email" type="email" placeholder="Email" class="input admin mx-auto">
                            <input required name="role" type="text" placeholder="Role" class="input admin mx-auto">
                            <input required name="password" type="password" placeholder="Password"
                                class="input admin mx-auto">
                            <input required name="confirm_password" type="password" placeholder="Confirm Password"
                                class="input admin mx-auto">

                            <button class="mt-8 btn text-lg px-12 py-3 rounded-md">SIMPAN</button>
                        </form>
                    @elseif($name === 'Diagnosa')
                        <form action="{{ route('admin.diagnosa.store') }}" method="POST"
                            class="w-full flex flex-col gap-4 items-center">
                            @csrf
                            <input required name="kodediagnosa" type="text" placeholder="Kode penyakit"
                                class="input admin mx-auto">
                            <input required name="namadiagnosa" type="text" placeholder="Nama penyakit"
                                class="input admin mx-auto">

                            <button class="mt-8 btn text-lg px-12 py-3 rounded-md">SIMPAN</button>
                        </form>
                    @elseif($name === 'Gejala')
                        <form action="{{ route('admin.gejala.store') }}" method="POST"
                            class="w-full flex flex-col gap-4 items-center">
                            @csrf
                            <input required name="kodegejala" type="text" placeholder="Kode gejala"
                                class="input admin mx-auto">
                            <input required name="namagejala" type="text" placeholder="Nama gejala"
                                class="input admin mx-auto">

                            <button class="mt-8 btn text-lg px-12 py-3 rounded-md">SIMPAN</button>
                        </form>
                    @elseif($name === 'Artikel')
                        <form action="{{ route('admin.artikel.store') }}" method="POST"
                            class="w-full flex flex-col gap-4 items-center">
                            @csrf
                            <input required name="judul" type="text" placeholder="Judul artikel"
                                class="input admin mx-auto">
                            <input required name="url" type="text" placeholder="Link artikel"
                                class="input admin mx-auto">
                            <input required name="author" type="text" placeholder="Nama pencipta/author"
                                class="input admin mx-auto">

                            <button class="mt-8 btn text-lg px-12 py-3 rounded-md">SIMPAN</button>
                        </form>
                    @else
                        <form action="{{ route('admin.pengetahuan.store') }}" method="POST"
                            class="w-full flex flex-col gap-4 items-center">
                            @csrf
                            <input required name="gejala_id" type="text" placeholder="Kode gejala"
                                class="input admin mx-auto">
                            <input required name="believe" type="text" placeholder="Nilai Believe"
                                class="input admin mx-auto">
                            <p class="self-start">Diagnosa</p>
                            <div class="flex items-center gap-3 self-start">
                                <label for="p1">
                                    <input type="checkbox" name="diagnosa_check[]" value="p1" id="p1">
                                    P1
                                </label>
                                <label for="p2">
                                    <input type="checkbox" name="diagnosa_check[]" value="p2" id="p2">
                                    P2
                                </label>
                                <label for="p3">
                                    <input type="checkbox" name="diagnosa_check[]" value="p3" id="p3">
                                    P3
                                </label>
                            </div>
                            <button class="mt-8 btn text-lg px-12 py-3 rounded-md">Simpan</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
