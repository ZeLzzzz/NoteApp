@extends('layouts.app')

@section('content')
    <section class="min-h-screen flex items-stretch text-white">
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
            <div class="w-full py-6 z-20 text-white lg:text-black">
                <div class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto">
                    <div>
                        <div class="flex justify-start">
                            <label class="text-white lg:text-black text-3xl font-bold md:text-4xl text-start">Email Sent !</label>
                        </div>
                        <div class="pb-20 flex justify-start text-start">
                            <label class="text-white lg:text-gray-400 text-lg md:text-xl">Please check your inbox and follow the instructions to verify your email.</label>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex justify-start text-start">
                            <label class="text-white lg:text-gray-400 text-lg md:text-xl">didn't get email?</label>
                        </div>
                        <div>
                            <form action="{{ route('verification.resend') }}" method="POST">
                                @csrf
                                <button type="submit" class="text-blue-500 text-lg mx-2">Resend Email</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
