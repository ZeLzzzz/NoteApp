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
                <h1 class="text-3xl font-bold py-4">{{ Auth::user()->company->company_name }}</h1>
                <div class="border border-black rounded-full mb-4"></div>
                <div class="grid grid-col">
                    {{-- <div class="bg-red-500 w-full max-w-xs rounded-lg shadow-lg flex flex-col px-4 py-2">

                    </div> --}}
                </div>
            </div>
        </div>
    </main>
@endSection
