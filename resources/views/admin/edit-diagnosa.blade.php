@extends('components.layout-admin')

@section('content')
    <main class="py-14 mb-20 min-h-screen">
        <div class="container flex flex-col h-full min-h-screen gap-10">
            <h1 class="text-center login">Edit Diagnosa</h1>
            <div class="mt-10 flex items-center justify-center">
                <div class="w-[500px] rounded-[60px] flex flex-col items-center justify-center">
                    <form action="{{ route('admin.diagnosa.update', $diagnosa->id) }}" method="POST"
                        class="w-full flex flex-col gap-6 items-center">
                        @csrf
                        @method('PUT')
                        <input required value="{{ $diagnosa->kodediagnosa }}" name="kodediagnosa" type="text"
                            placeholder="Kode penyakit" class="input admin mx-auto">
                        <input required value="{{ $diagnosa->namadiagnosa }}" name="namadiagnosa" type="text"
                            placeholder="Nama penyakit" class="input admin mx-auto">

                        <button class="mt-8 btn text-xl px-12 py-4">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
