@extends('layouts.app')

@section('content')
    <main class="min-h-screen flex items-stretch text-white">
        <div class="lg:flex w-1/2 hidden bg-no-repeat bg-cover relative" style="background-image: url({{ asset('storage/images/8-cfxX12xl3V9bi3g.png') }});">
            <div class="absolute bg-black opacity-40 inset-0 z-0"></div>
            <div class="w-full px-12 z-10 mt-12">
                <h1 class="text-4xl font-bold text-left tracking-wide text-white"><i class="bi bi-building mr-2"></i><span class="text-blue-500">h4.</span>web</h1>
            </div>
        </div>
        <div class="bg-white lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0">
            <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center" style="background-image: url({{ asset('storage/images/8-cfxX12xl3V9bi3g.png') }});">
                <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            </div>
            <div class="w-full py-6 z-20">
                <form method="POST" action="{{route('login.store')}}" class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto">
                    <div>
                        <div class="flex justify-start">
                            <label class="text-white lg:text-black text-3xl font-bold md:text-4xl">Login</label>
                        </div>
                        <div class="pb-20 flex justify-start">
                            <label class="text-white lg:text-gray-400 text-lg md:text-xl">Please login first</label>
                        </div>
                    </div>
                    @csrf
                    <div class="pb-2 pt-4">
                        <input type="email" name="email" id="email" placeholder="Email" class="text-black block w-full border border-gray-400 p-3 md:p-4 text-xs md:text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 caret-blue-500" required>
                    </div>
                    <div class="mb-2 pt-4">
                        <input class="text-black block w-full border border-gray-400 p-3 md:p-4 text-xs md:text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 caret-blue-500" type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="flex justify-between mb-2">
                        <div class="text-right hover:text-gray-300 text-sm sm:text-base lg:text-base xl:text-lg lg:text-gray-600 lg:hover:text-gray-500 hover:underline">
                            <a href="{{route('register.index')}}">Dont have account ?</a>
                        </div>
                        <div class="text-right hover:text-gray-300 text-sm sm:text-base lg:text-base xl:text-lg lg:text-gray-600 lg:hover:text-gray-500 hover:underline">
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                        </div>
                    </div>
                    <div class="pb-2 pt-4 text-white">
                        <button type="submit" class="uppercase block w-full p-3 md:p-4 text-xs md:text-lg rounded-full bg-blue-500 hover:bg-blue-600 focus:outline-none">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
