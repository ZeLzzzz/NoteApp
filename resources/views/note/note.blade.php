@extends('layouts.app')

@section('script')
    @vite('resources/js/logout.js')
@endsection

@section('content')
    @include('layouts.navbar')
    @include('layouts.navbar2')

    <main>
        <div class="p-4">
            <form action="{{ route('note.update', $note->slug) }}" method="post" class="text-black relative">
                @csrf
                <button type="submit" class="z-10 fixed bottom-10 right-4 bg-blue-500 hover:bg-blue-700 text-white text-lg py-3 px-5 rounded-lg"><i class="bi bi-check-lg mr-2"></i> Save</button>
                <input type="text" class="w-full font-semibold bg-transparent py-3 text-5xl focus:outline-none" value="{{ $note->title }}" name="title">
                <div class="flex gap-4">
                    <p class="font-normal text-gray-500">Created at {{ $note->created_at->format('d/m/Y, H:i') }},</p>
                    <p class="font-normal text-gray-500">Updated at {{ $note->updated_at->format('d/m/Y, H:i') }}</p>
                </div>
                <textarea placeholder="Start typing" name="note" class="rounded-lg p-2 mt-2 w-full h-96 font-normal text-lg focus:outline-none">{{ $note->note }}</textarea>
            </form>
            @csrf
            <div x-data="{ deletenote: false }">
                <button @click="deletenote = !deletenote" class="z-10 fixed bottom-10 right-36 bg-red-500 hover:bg-red-700 text-white text-lg py-3 px-5 rounded-lg"><i class="bi bi-trash3-fill"></i></button>
                <div x-show="deletenote" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="bg-gray-900 bg-opacity-50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
                        <div class="relative bg-white rounded-lg shadow">
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Delete User
                                </h3>
                                <button @click="deletenote = !deletenote" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="static-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <div class="p-4 md:p-5 items-center">
                                <div class="flex flex-col">
                                    <p class="text-2xl md:text-3xl leading-relaxed text-black mx-2 font-bold">You are going to delete {{ $note->title }}</p>
                                    <p class="text-sm leading-relaxed text-gray-500 mx-2 mb-4">Are you sure?</p>
                                </div>
                            </div>
                            <div class="flex gap-2 items-center justify-end p-2 md:p-3 border-t border-gray-200 rounded-b">
                                <button @click="deletenote = !deletenote" data-modal-hide="static-modal" class="text-white bg-slate-500 hover:bg-slate-600 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Cancel</button>
                                <form action="{{ route('note.destroy', $note->slug) }}" method="post">
                                    @csrf
                                    <button data-modal-hide="static-modal" type="submit" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
