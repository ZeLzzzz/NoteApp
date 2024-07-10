@extends('layouts.app')

@section('content')
    <section class="min-h-screen flex items-stretch text-white">
        <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0 bg-white">
            <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center" style="background-image: url({{ asset('storage/images/8-cfxX12xl3V9bi3g.png') }});">
                <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            </div>
            <div class="w-full py-6 z-20">
                <form action="{{route('register.store')}}" method="POST" class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto text-black">
                    @csrf
                    <div>
                        <div class="flex justify-start">
                            <label class="text-white lg:text-black text-3xl font-bold md:text-4xl">Register</label>
                        </div>
                        <div class="pb-12 flex justify-start">
                            <label class="text-white lg:text-gray-400 text-lg md:text-xl">Register Our Company account</label>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <label class="text-white lg:text-black text-lg md:text-xl">Personal Info</label>
                    </div>
                    <div class="pb-1 pt-4 flex justify-between gap-2">
                        <div class="w-1/2">
                            <input class="block w-full border border-gray-400 p-3 md:p-4 text-xs md:text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 caret-blue-500" type="text" name="first_name" id="first_name" placeholder="First name" required>
                        </div>
                        <div class="w-1/2">
                            <input class="block w-full border border-gray-400 p-3 md:p-4 text-xs md:text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 caret-blue-500" type="text" name="last_name" id="last_name" placeholder="last name" required>
                        </div>
                    </div>
                    <div class="pb-1 pt-4">
                        <input class="block w-full border border-gray-400 p-3 md:p-4 text-xs md:text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 caret-blue-500" type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="pb-1 pt-4">
                        <input class="block w-full border border-gray-400 p-3 md:p-4 text-xs md:text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 caret-blue-500" type="email" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="pb-1 pt-4">
                        <input class="block w-full border border-gray-400 p-3 md:p-4 text-xs md:text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 caret-blue-500" type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="pb-1 pt-4">
                        <input class="block w-full border border-gray-400 p-3 md:p-4 text-xs md:text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 caret-blue-500" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" required>
                    </div>
                    <div class="flex justify-start">
                        <label class="mt-4 text-white lg:text-black text-lg md:text-xl">Company Info</label>
                    </div>
                    <div class="pt-4 mb-2 md:flex">
                        <input type="text" name="company_name" id="company_name" placeholder="Company name" class="focus:outline-none focus:ring-2 focus:ring-blue-500 caret-blue-500 border border-gray-400 md:mb-0 block w-full md:mr-1 p-3 md:p-4 text-xs md:text-lg rounded-lg" required>
                    </div>
                    <div class="text-right text-white hover:text-gray-300 lg:text-gray-600 lg:hover:text-gray-500 hover:underline">
                        <a class="text-sm sm:text-base lg:text-base xl:text-lg" href="{{ route('login') }}">Have account ?</a>
                    </div>
                    <div class="pb-1 pt-4">
                        <button type="submit" class="uppercase block w-full p-3 md:p-4 text-xs md:text-lg rounded-full bg-blue-500 hover:bg-blue-600 focus:outline-none text-white">Register</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="lg:flex w-1/2 hidden bg-no-repeat bg-cover relative" style="background-image: url({{ asset('storage/images/8-cfxX12xl3V9bi3g.png') }});">
            <div class="absolute bg-black opacity-40 inset-0 z-0"></div>
            <div class="w-full px-12 z-10 mt-12">
                <h1 class="text-4xl font-bold text-left tracking-wide"><i class="bi bi-building mr-2"></i><span class="text-blue-500">h4.</span>web</h1>
            </div>
        </div>
    </section>
@endsection
