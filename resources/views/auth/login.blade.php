@extends('components.layout', ['authVar' => true])

@push('styles')
    <link rel="stylesheet" href="css/login.css">
@endpush

@section('content')
    <main class="flex items-center justify-center">
        <div class="container !m-0 flex flex-col items-center justify-center h-full gap-10">
            <div class="container-login">
                <div class="login !w-full max-w-[400px]">
                    <form action="{{ route('login') }}" method="POST" class="w-full max-w-[300px]">
                        @csrf
                        <h1 class="text-3xl">Login</h1>
                        <hr>
                        <p class="text-lg">Sistem Pakar Diagnosa Depresi</p>
                        @if ($message = Session::get('error'))
                            <div
                                class="alert alert-danger alert-block mt-5 w-full p-2 text-gray-900 bg-rose-100 rounded-md">
                                {{ $message }}
                            </div>
                        @endif
                        <label for="">Email </label>
                        <input required name="email" type="email" placeholder="Email">
                        <label>Password</label>
                        <input required name="password" type="password" placeholder="Password">
                        <button>Login</button>
                        <p class="text-lg font-normal">Tidak mempunyai akun? Buat <a class="text-blue-500 underline"
                                href="{{ route('register') }}">disini</a></p>
                    </form>
                </div>
                <div class="right hidden lg:block">
                    <img src="/assets/images/login.png" alt="">
                </div>
            </div>
        </div>
    </main>
@endsection
