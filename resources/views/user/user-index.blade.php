@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    @include('layouts.navbar2')

    <main>
        <div class="p-2">
            <div class="relative overflow-x-auto sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex justify-center items-center">
                                    *
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="hidden md:table-cell px-6 py-3">
                                Phone
                            </th>
                            <th scope="col" class="hidden md:table-cell px-6 py-3">
                                join in
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="w-4 p-4 cursor-pointer hover:bg-gray-100">
                                    <div class="flex items-center">
                                        <i class="bi bi-caret-right-fill"></i>
                                    </div>
                                </td>
                                <td scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                    <div class="flex gap-4">
                                        @if ($item->photo_profile == null)
                                            <img class="w-10 h-10 rounded-full" src="{{ asset('storage/images/default.png') }}" alt="{{ $item->username }}">
                                        @else
                                            <img class="w-10 h-10 rounded-full" src="{{ asset('storage/images/' . $item->photo_profile) }}" alt="{{ $item->username }}">
                                        @endif
                                        <div>
                                            <div class="text-base font-semibold">{{ $item->username }}</div>
                                            <div class="font-normal text-gray-500">{{ $item->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden md:table-cell px-6 py-4">
                                    {{ formatPhoneNumber($item->telepon) }}
                                </td>
                                <th class="hidden md:table-cell px-6 py-4">
                                    @if ($item->email_verified_at == null)
                                        this user has not joined
                                    @else
                                        {{ $item->email_verified_at->format('d M Y') }}
                                    @endif
                                </th>
                                <td class="px-6 py-4">
                                    @if (auth()->user()->username == $item->username)
                                        <a href="{{ route('account.index') }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                    @else
                                        <div class="flex">
                                            <div>
                                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                            </div>
                                            <div x-data="{ userdeletemodal: false }">
                                                <button @click="userdeletemodal = !userdeletemodal" class="font-medium text-red-600 hover:underline ms-3">Remove</button>
                                                <div x-show="userdeletemodal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                                    class="bg-gray-900 bg-opacity-50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
                                                        <div class="relative bg-white rounded-lg shadow">
                                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                                <h3 class="text-xl font-semibold text-gray-900">
                                                                    Delete User
                                                                </h3>
                                                                <button @click="userdeletemodal = !userdeletemodal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="static-modal">
                                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>
                                                            <div class="p-4 md:p-5 items-center">
                                                                <div class="flex flex-col">
                                                                    <p class="text-2xl md:text-3xl leading-relaxed text-black mx-2 font-bold">You are going to delete {{ $item->username }}</p>
                                                                    <p class="text-sm leading-relaxed text-gray-500 mx-2 mb-4">Are you sure?</p>
                                                                </div>
                                                            </div>
                                                            <div class="flex gap-2 items-center justify-end p-2 md:p-3 border-t border-gray-200 rounded-b">
                                                                <button @click="userdeletemodal = !userdeletemodal" data-modal-hide="static-modal" class="text-white bg-slate-500 hover:bg-slate-600 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Cancel</button>
                                                                <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="inline">
                                                                    @csrf
                                                                    <button data-modal-hide="static-modal" type="submit" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
