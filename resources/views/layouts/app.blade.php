<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NoteApp</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])

    <!-- Script -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

    @yield('script')
</head>

<body class="bg-[#EDEDED] font-nunito">
    @if ($errors->any())
        <div class="absolute right-0 top-0 z-50 flex flex-col items-end p-2">
            @foreach ($errors->all() as $key => $error)
                <div class="p-2 select-none" x-data="{ showerror{{ $key }}: true }" x-init="setTimeout(() => showerror{{ $key }} = false, 10000)" x-show="showerror{{ $key }}" x-transition:leave="transition ease-in duration-500 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" id="error-notification-{{ $key }}">
                    <div class="flex items-center w-full max-w-xs p-2 lg:p-4 text-gray-700 bg-red-300 rounded-lg shadow" role="alert">
                        <div class="mx-3 text:sm lg:text-base font-normal">{{ $error }}</div>
                        <button @click="showerror{{ $key }} = false" type="button" class="ms-auto -mx-1.5 -my-1.5 h-full hover:text-gray-700 rounded-lg p-1.5 inline-flex items-center justify-center w-8" data-dismiss-target="#toast-default" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if (session('success'))
        <div class="fixed md:absolute right-0 top-0 z-50 flex flex-col items-end p-2">
            <div class="p-2 select-none" x-data="{ showsuccess: true }" x-init="setTimeout(() => showsuccess = false, 10000)" x-show="showsuccess" x-transition:leave="transition ease-in duration-500 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" id="success-notification-">
                <div class="flex items-center w-full max-w-xs p-2 lg:p-4 text-gray-700 bg-green-300 rounded-lg shadow" role="alert">
                    <div class="mx-3 text:sm lg:text-base font-normal">{{ session('success') }}</div>
                    <button @click="showsuccess = false" type="button" class="ms-auto -mx-1.5 -my-1.5 h-full hover:text-gray-700 rounded-lg p-1.5 inline-flex items-center justify-center w-8" data-dismiss-target="#toast-default" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    @endif

    @yield('content')
</body>

</html>
