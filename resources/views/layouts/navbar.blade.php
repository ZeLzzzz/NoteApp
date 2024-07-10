<nav class="z-0 flex items-center justify-between px-4 md:px-6 py-2 bg-white border-b border-gray-300">
    <div class="flex items-center md:ml-5 select-none">
        <a href="{{ route('home') }}">
            <h1 class="text-2xl md:text-3xl font-bold"><i class="bi bi-building mr-2"></i><span class="text-blue-500">h4.</span>web</h1>
        </a>
    </div>
    <div class="flex items-center select-none">
        <div class="flex items-center" x-data="{ dropDownUser: false }">
            <div x-data="{ companyModal: false }">
                <button class="hover:underline" @click="companyModal = !companyModal">
                    <p class="mr-2 text-gray-600 font-semibold text-xs md:text-base md:mr-4 hover:text-gray-500">{{ Auth::user()->company->company_name }}</p>
                </button>
                <div x-show="companyModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="bg-gray-900 bg-opacity-50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
                        <div class="relative bg-white rounded-lg shadow">
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Company Info
                                </h3>
                                <button @click="companyModal = !companyModal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="static-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <div class="p-4 md:p-5 items-center">
                                <div class="flex flex-col">
                                    <p class="text-3xl leading-relaxed text-black mx-2 font-bold">{{ Auth::user()->company->company_name }}</p>
                                    <p class="text-sm leading-relaxed text-gray-500 mx-2 mb-4">Created by: {{ Auth::user()->company->createUser->first_name }}</p>
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
            <button class="md:flex md:justify-center md:items-center md:border md:border-gray-300 md:rounded-lg md:py-1 md:px-3 md:hover:bg-gray-50 md:hover:border-blue-300" @click="dropDownUser = !dropDownUser">
                <p class="hidden md:block md:mr-4">{{ Auth::user()->username }}</p>
                <img class="rounded-full size-9" src="{{ asset('storage/images/pp.png') }}" alt="">
            </button>
            <div @click.away="dropDownUser = false" x-show="dropDownUser" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute top-14 right-0 py-1 bg-white rounded-md shadow-lg z-50"
                style="width: max-content; max-width: 100%; right: 0;">
                <div x-data="{ personalinfo: false }">
                    <button @click="personalinfo = !personalinfo" class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100"><i class="bi bi-person-fill mr-2"></i>Personal Info</button>
                    <div x-show="personalinfo" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                        class="bg-gray-900 bg-opacity-50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
                            <div class="relative bg-white rounded-lg shadow">
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                    <h3 class="text-xl font-semibold text-gray-900">
                                        Personal Info
                                    </h3>
                                    <button @click="personalinfo = !personalinfo" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="static-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <div class="p-4 md:p-5 flex items-center">
                                    <div>
                                        <img src="{{ asset('storage/images/pp.png') }}" alt="" class="rounded-full m-2">
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="text-4xl leading-relaxed text-black mx-2 font-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                                        <p class="text-sm leading-relaxed text-gray-500 mx-2 mb-4">{{ Auth::user()->username }}</p>
                                        @if (Auth::user()->type == 'P')
                                            <p class="text-sm leading-relaxed text-gray-500 mx-2">You are the one who built the company <a href="{{ route('company.index') }}" class="text-blue-500 hover:underline">{{ Auth::user()->company->company_name }}</a></p>
                                        @else
                                            <p class="text-sm leading-relaxed text-gray-500 mx-2">you are part of the <a href="#" class="text-blue-500 hover:underline">{{ Auth::user()->company->company_name }}</a> company</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex items-center justify-end p-2 md:p-3 border-t border-gray-200 rounded-b">
                                    <p class="text-base leading-relaxed text-gray-500 mx-2">You can edit your personal information</p>
                                    <a href="{{ route('account.index') }}" data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Here!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" id="logout-link" class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100"><i class="bi bi-box-arrow-left mr-2"></i>Logout</a>
            </div>
        </div>
    </div>
</nav>
