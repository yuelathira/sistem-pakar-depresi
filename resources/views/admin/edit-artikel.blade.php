@extends('components.layout-admin')

@section('content')
    <main class="py-14 mb-20 min-h-screen">
        <div class="container flex flex-col h-full min-h-screen gap-10">
            <h1 class="text-center login">Edit Artikel</h1>
            <div class="mt-10 flex items-center justify-center">
                <div class="w-[500px] rounded-[60px] flex flex-col items-center justify-center">
                    <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST"
                        class="w-full flex flex-col gap-6 items-center">
                        @csrf
                        @method('PUT')
                        <input required value="{{ $artikel->judul }}" name="judul" type="text"
                            placeholder="Kode gejala" class="input admin mx-auto">
                        <input required value="{{ $artikel->url }}" name="url" type="text"
                            placeholder="Nama gejala" class="input admin mx-auto">
                        <input required value="{{ $artikel->author }}" name="author" type="text"
                            placeholder="Nama gejala" class="input admin mx-auto">

                        <button class="mt-8 btn text-xl px-12 py-4">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
