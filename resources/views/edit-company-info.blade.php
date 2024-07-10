@extends('layouts.app')

@section('script')
    @vite('resources/js/logout.js')
@endsection

@section('content')
    @include('layouts.navbar')
    @include('layouts.navbar2')
    <main>
        <div class="p-4 flex flex-col items-center justify-center">
            <div class="shadow-sm p-6 w-full max-w-full md:max-w-[65%] xl:max-w-[70%] rounded-lg bg-white mb-4">
                <div class="sm:flex">
                    <div class="flex justify-center items-center">
                        <img class="rounded-full w-26 h-auto md:size-42" src="{{ asset('storage/images/pp-company.png') }}" alt="">
                    </div>
                    <div class="flex flex-col justify-center items-center mt-5 sm:mt-0 sm:ml-5 sm:w-full md:w-[40%] lg:w-[35%] xl:w-[25%]">
                        <div>
                            <div class="mb-4">
                                <p>Personalize your company with a photo.</p>
                            </div>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white text-sm py-2 px-4 rounded" href="">Change Company Picture</button>
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::user()->type == 'P')
                <div class="w-full max-w-full md:max-w-[65%] xl:max-w-[70%] divide-y divide-gray-300 mb-4" x-data="{ EditCompanyInfo: false }">
                    <div class="flex justify-between px-4 py-3 rounded-t-lg bg-white">
                        <p>Profile Information</p>
                        <a @click="EditCompanyInfo = !EditCompanyInfo" href="#" class="text-blue-500 hover:text-blue-700 hover:underline">Edit profile</a>
                    </div>
                    <div class="bg-white divide-y divide-gray-300">
                        <button class="w-full h-auto hover:bg-gray-100" @click="EditCompanyInfo = !EditCompanyInfo">
                            <div class="flex px-4 py-4 text-start items-center">
                                <div class="w-full h-auto">
                                    <p class="text-sm text-gray-600">Company name</p>
                                </div>
                                <div class="w-full h-auto">
                                    <p class="text-sm md:text-base">{{ Auth::user()->company->company_name }}</p>
                                </div>
                                <div class="hidden md:inline w-full h-auto"></div>
                                <div class="w-auto h-auto">
                                    <i class="bi bi-chevron-right"></i>
                                </div>
                            </div>
                        </button>
                        <button class="w-full h-auto hover:bg-gray-100" @click="EditCompanyInfo = !EditCompanyInfo">
                            <div class="flex px-4 py-4 text-start items-center">
                                <div class="w-full h-auto">
                                    <p class="text-sm text-gray-600">Npwp Number</p>
                                </div>
                                <div class="w-full h-auto">
                                    <p class="text-sm md:text-base">{{ Auth::user()->company->npwp_number }}</p>
                                </div>
                                <div class="hidden md:inline w-full h-auto"></div>
                                <div class="w-auto h-auto">
                                    <i class="bi bi-chevron-right"></i>
                                </div>
                            </div>
                        </button>
                        <div x-show="EditCompanyInfo" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                            class="bg-gray-900 bg-opacity-50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
                                <div class="relative bg-white rounded-lg shadow">
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                        <h3 class="text-xl font-semibold text-gray-900">
                                            Edit Personal Info
                                        </h3>
                                        <button @click="EditCompanyInfo = !EditCompanyInfo" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="static-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('company.update') }}" method="post">
                                        @csrf
                                        <div class="p-4 md:p-5 items-center">
                                            <div class="flex flex-col">
                                                <div class="mb-2">
                                                    <div class="mb-2">
                                                        <label for="first_name">Company name</label>
                                                    </div>
                                                    <div>
                                                        <input type="text" name="company_name" id="company_name" placeholder="Company name" class="text-black block w-full border border-gray-400 p-3 md:p-3 text-xs md:text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 caret-blue-500" value="{{ Auth::user()->company->company_name }}" required>
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <div class="mb-2">
                                                        <label for="last_name">Npwp number</label>
                                                    </div>
                                                    <div>
                                                        <input type="number" name="npwp_number" id="npwp_number" placeholder="Npwp number" class="text-black block w-full border border-gray-400 p-3 md:p-3 text-xs md:text-lg rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 caret-blue-500" value="{{ Auth::user()->company->npwp_number }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-end p-2 md:p-3 border-t border-gray-200 rounded-b gap-2">
                                            <button type="button" @click="EditCompanyInfo = !EditCompanyInfo" class="bg-red-500 hover:bg-red-700 text-white text-sm py-2 px-4 rounded">Cancel</button>
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white text-sm py-2 px-4 rounded" href="">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex px-4 py-4 rounded-b-lg bg-white"></div>
                </div>
            @elseif (Auth::user()->type == 'C')
                <div class="w-full max-w-full md:max-w-[65%] xl:max-w-[70%] divide-y divide-gray-300 mb-4">
                    <div class="flex justify-between px-4 py-3 rounded-t-lg bg-white">
                        <p>Profile Information</p>
                    </div>
                    <div class="bg-white divide-y divide-gray-300">
                        <div class="w-full h-auto">
                            <div class="flex px-4 py-4 text-start items-center">
                                <div class="w-full h-auto">
                                    <p class="text-sm text-gray-600">Company name</p>
                                </div>
                                <div class="w-full h-auto">
                                    <p class="text-sm md:text-base">{{ Auth::user()->company->company_name }}</p>
                                </div>
                                <div class="hidden md:inline w-full h-auto"></div>
                            </div>
                        </div>
                        <div class="w-full h-auto">
                            <div class="flex px-4 py-4 text-start items-center">
                                <div class="w-full h-auto">
                                    <p class="text-sm text-gray-600">Npwp Number</p>
                                </div>
                                <div class="w-full h-auto">
                                    <p class="text-sm md:text-base">{{ Auth::user()->company->npwp_number }}</p>
                                </div>
                                <div class="hidden md:inline w-full h-auto"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex px-4 py-4 rounded-b-lg bg-white"></div>
                </div>
            @endif
        </div>
    </main>
@endsection
