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
                            <th scope="col" class="px-6 py-3">
                                Phone
                            </th>
                            <th scope="col" class="px-6 py-3">
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
                                        <img class="w-10 h-10 rounded-full" src="{{ asset('storage/images/' . $item->photo_profile) }}" alt="{{ $item->username }}">
                                        <div>
                                            <div class="text-base font-semibold">{{ $item->username }}</div>
                                            <div class="font-normal text-gray-500">{{ $item->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    {{ formatPhoneNumber($item->telepon) }}
                                </td>
                                <th class="px-6 py-4">
                                    @if ($item->email_verified_at == null)
                                        this user is not joined
                                    @else
                                        {{ $item->email_verified_at->format('d M Y') }}
                                    @endif
                                </th>
                                <td class="px-6 py-4">
                                    @if (auth()->user()->username == $item->username)
                                        <a href="{{ route('account.index') }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                    @else
                                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="font-medium text-red-600 hover:underline ms-3">Remove</button>
                                        </form>
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
