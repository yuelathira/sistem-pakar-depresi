@extends('components.layout-admin')

@section('content')
    <main class="py-14 mb-20 min-h-screen">
        <div class="container flex flex-col h-full min-h-screen gap-10">
            <h1 class="text-center login">Edit Pengetahuan</h1>
            <div class="mt-10 flex items-center justify-center">
                <div class="w-[500px] rounded-[60px] flex flex-col items-center justify-center">
                    <form action="{{ route('admin.pengetahuan.update', $pengetahuan->id) }}" method="POST"
                        class="w-full flex flex-col gap-6 items-center">
                        @csrf
                        @method('PUT')
                        <input value="{{ $pengetahuan->gejala->id }}" required name="gejala_id" type="text"
                            placeholder="Kode gejala" class="input admin mx-auto">
                        <input value="{{ $pengetahuan->believe }}" required name="believe" type="text"
                            placeholder="Nilai Believe" class="input admin mx-auto">
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
                        <button class="mt-8 btn text-xl px-12 py-4">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
