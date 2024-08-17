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

                    <div x-data="{ card1: false }">
                        <div @click="card1 = !card1" class="bg-[#3498DB] w-full lg:max-w-xs rounded-lg relative px-4 py-2 text-white cursor-pointer hover:shadow-lg">
                            <div class="flex justify-between md:flex-none p-4 w-full">
                                <div class="mt-6 md:mt-10">
                                    <h1 class="text-2xl font-semibold">Master User</h1>
                                    <p class="text-sm opacity-85 my-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos .</p>
                                </div>
                            </div>
                        </div>
                        <div x-show="card1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                            class="bg-gray-900 bg-opacity-50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                        <h3 class="text-xl font-semibold text-gray-900">
                                            Master User
                                        </h3>
                                        <button @click="card1 = !card1" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="static-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <div class="p-4 md:p-5 items-center">
                                        <div class="flex flex-col min-h-xl">
                                            @foreach ($user as $users)
                                                {{ $users->email }}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-end p-2 md:p-3 border-t border-gray-200 rounded-b">
                                        <p class="text-base leading-relaxed text-gray-500 mx-2">You can edit your Company information</p>
                                        <a href="{{ route('company.index') }}" data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Here!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endSection
