@extends('components.layout-admin')

@section('content')
    <main class="py-14 mb-20 min-h-screen">
        <div class="container flex flex-col h-full gap-10">
            <div class="p-4 bg-white bg-opacity-30 rounded-lg">
                <h1 class="login font-bold text-3xl">Pengguna</h1>
                <hr class="mt-3 border-black border-opacity-10">
                <a href="{{ route('admin.pengguna.create') }}"
                    class="btn flex text-base rounded-md px-4 py-2 font-bold w-fit mt-5">Tambah
                    Pengguna</a>
                <div class="mt-4">
                    <table class="w-full text-left text-neutral-500 rounded-md overflow-hidden">
                        <thead class="text-sm uppercase bg-tertiary text-white">
                            <tr class="text-center">
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Role
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penggunas as $user)
                                <tr class="border-[1px] border-secondary text-gray-900 bg-white bg-opacity-40">
                                    <td class="text-center border-[1px] border-secondary px-3">{{ $user->id }}</td>
                                    <td class="border-[1px] border-secondary px-3">{{ $user->name }}</td>
                                    <td class="border-[1px] border-secondary px-3">{{ $user->email }}</td>
                                    <td class="border-[1px] border-secondary px-3">
                                        {{ $user->role === 'admin' ? 'Admin' : 'user' }}
                                    </td>
                                    <td class="border-[1px] border-secondary px-3">
                                        <div class="flex gap-4 items-center py-3 w-full justify-center">
                                            <a href="{{ route('admin.pengguna.edit', $user->id) }}"
                                                class="btn px-4 py-2 font-bold">Ubah</a>
                                            <form action="{{ route('admin.pengguna.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn px-4 py-2 font-bold">Hapus</button>
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
