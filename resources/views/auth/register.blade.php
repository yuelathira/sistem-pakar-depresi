@extends('components.layout', ['authVar' => true])

@push('styles')
    <link rel="stylesheet" href="css/register.css">
@endpush

@section('content')
    <main class="py-14 mb-20 min-h-screen">
        <div class="container flex flex-col items-center justify-center h-full min-h-screen gap-10">
            <div class="container-register">
                <div class="register">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h1 class="text-3xl">Register</h1>
                        <hr>
                        <p class="text-lg">Sistem Pakar Diagnosa Depresi</p>
                        @if ($message = Session::get('error'))
                            <div
                                class="alert alert-danger alert-block mt-5 w-full p-2 text-gray-900 bg-rose-100 rounded-md">
                                {{ $message }}
                            </div>
                        @endif
                        <label for="">Nama</label>
                        <input required type="text" name="name" placeholder="Nama">
                        <label for="">Email</label>
                        <input required type="text" name="email" placeholder="Email">
                        @error('email')
                            <span class="text-sm mt-1 text-rose-600 text-opacity-80" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <label>Password</label>
                        <input required type="password" name="password" placeholder="Password">
                        @error('password')
                            <span class="text-sm mt-1 text-rose-600 text-opacity-80" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <label>Confirm Password</label>
                        <input required type="password" name="password_confirmation" placeholder="Confirm Password">
                        @error('password_confirmation')
                            <span class="text-sm mt-1 text-rose-600 text-opacity-80" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <button>Register</button>
                        <p class="text-lg font-normal">Sudah punya akun? Login <a class="text-blue-500 underline"
                                href="{{ route('login') }}">disini</a></p>
                    </form>
                </div>
                <div class="right">
                    <img src="assets/images/register.png" alt="">
                </div>
            </div>

            {{-- <div class="w-[500px] rounded-[60px] bg-red px-20 py-10 bxshdw flex flex-col items-center justify-center">
                <form method="POST" action="{{ route('register') }}" class="mt-10 w-full flex flex-col gap-6 items-center">
                    @csrf
                    <div class="w-full">
                        <input name="name" type="text" placeholder="Nama" class="input mx-auto w-full">
                        @error('name')
                            <span class="text-sm mt-1 text-white text-opacity-80" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <input name="email" type="email" placeholder="Email" class="input mx-auto w-full">
                        @error('email')
                            <span class="text-sm mt-1 text-white text-opacity-80" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <input name="password" type="password" placeholder="Password" class="input mx-auto w-full">
                        @error('password')
                            <span class="text-sm mt-1 text-white text-opacity-80" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <input name="password_confirmation" type="password" placeholder="Password confirm"
                            class="input mx-auto w-full">
                        @error('password_confirmation')
                            <span class="text-sm mt-1 text-white text-opacity-80" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="mt-8 input w-fit text-red px-10 font-bold">DAFTAR</button>

                    <p class="txtshdw text-cream tracking-widest">
                        Sudah memiliki akun?
                        <a href="{{ route('register') }}" class="underline">Login Sekarang</a>
                    </p>
                </form>
            </div> --}}
        </div>
    </main>
@endsection
