@extends('components.layout-admin')

@section('content')
    <main class="py-14 mb-20 min-h-screen">
        <div class="container flex flex-col h-full min-h-screen gap-10">
            <div class="p-4 bg-white bg-opacity-30 rounded-lg">
                <h1 class="login font-bold text-3xl">Basis Pengetahuan</h1>
                <hr class="mt-3 border-black border-opacity-10">
                <a href="{{ route('admin.pengetahuan.create') }}"
                    class="btn flex text-base rounded-md px-4 py-2 font-bold w-fit mt-5">Tambah Basis
                    Pengetahuan</a>
                <div class="mt-4">
                    <table class="w-full text-left text-neutral-500 rounded-md overflow-hidden">
                        <thead class="text-sm uppercase bg-tertiary text-white">
                            <tr class="text-center">
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kode Gejala
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nilai Believe
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nilai Plausability
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Diagnosa
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengetahuans as $key => $item)
                                <tr class="border-[1px] border-secondary text-gray-900 bg-white bg-opacity-40">
                                    <td class="text-center border-[1px] border-secondary px-3">{{ ++$key }}</td>
                                    <td class="border-[1px] border-secondary px-3">
                                        {{ 'G' . str_pad($item->gejala->kodegejala, 2, '0', STR_PAD_LEFT) }}</td>
                                    <td class="border-[1px] border-secondary px-3">{{ $item->believe }}</td>
                                    <td class="border-[1px] border-secondary px-3">{{ $item->plausability }}</td>
                                    <td class="border-[1px] border-secondary px-3">{{ $item->diagnosa_check }}</td>
                                    <td class="border-[1px] border-secondary px-3">
                                        <div class="flex gap-4 items-center py-3 w-full justify-center">
                                            <a href="{{ route('admin.pengetahuan.edit', $item->id) }}"
                                                class="btn">Ubah</a>
                                            <form action="{{ route('admin.pengetahuan.destroy', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
