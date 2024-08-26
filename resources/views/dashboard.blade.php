@extends('layouts.app')

@section('script')
    @vite('resources/js/logout.js')
@endsection

@section('content')
    @include('layouts.navbar')
    @include('layouts.navbar2')
    <main>
        <div class="p-4 flex flex-col items-center justify-center">
            <div class="w-full max-w-full md:max-w-[65%] xl:max-w-[70%]">
                <h1 class="text-2xl md:text-3xl font-bold py-4">{{ Auth::user()->company->company_name }}</h1>
                <div class="border border-black rounded-full mb-4"></div>
                <div class="grid grid-cols-none md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-8">

                    <a href="{{ route('users.index') }}">
                        <div class="bg-[#3498DB] w-full lg:max-w-xs rounded-lg relative px-4 py-2 text-white cursor-pointer hover:shadow-lg">
                            <div class="flex justify-between md:flex-none p-4 w-full">
                                <div class="mt-6 md:mt-8">
                                    <h1 class="text-2xl font-semibold">Master User</h1>
                                    <p class="text-sm opacity-85 my-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos .</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endSection
