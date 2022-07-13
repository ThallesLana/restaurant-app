<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Escolha da Ray <3 -->
            <div class="flex justify-center">
                <div class="font-bold text-indigo-500 text-5xl border-b-2 pb-2 border-indigo-300">
                    <h1>Reservations</h1>
                </div>
            </div>
            <div class="flex justify-center p-4 m-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-slate-200 w-4/6">
                    <div class="m-2 p-2">
                        <div class="font-bold text-indigo-500 text-xl border-b-2 pb-1 border-indigo-300 flex justify-center">
                            <h1>New Reservation</h1>
                        </div>
                        <form method="POST" action="{{ route('admin.reservations.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <!-- First Name -->
                                <div class="relative z-0 w-full mb-6 group mt-4">
                                    <input type="text" name="first_name" id="first_name" required
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-500 peer"
                                        placeholder=" ">
                                    <label for="first_name"
                                        class="peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500 peer-placeholder-shwon:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Name</label>
                                </div>
                                <!-- Last Name -->
                                <div class="relative z-0 w-full mb-6 group mt-4">
                                    <input type="text" name="last_name" id="last_name" required
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-500 peer"
                                        placeholder=" ">
                                    <label for="last_name"
                                        class="peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500 peer-placeholder-shwon:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last Name</label>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <!-- Email -->
                                <div class="relative z-0 w-full mb-4 group">
                                    <label for="email" class="block text-sm font-medium text-gray-900 mb-2">Email</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                        </div>
                                        <input type="email" name="email" id="email" required
                                            class="bg-slate-200 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5"
                                            placeholder="name@gmail.com" required="">
                                    </div>
                                </div>
                                <!-- Phone Number -->
                                <div class="relative z-0 w-full mb-4 group">
                                    <label for="tel_number" class="block text-sm font-medium text-gray-900 mb-2">Phone Number</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"/></svg>
                                        </div>
                                        <input type="tel" pattern="[0-9]{3}-[0-9]{5}-[0-9]{4}" name="tel_number" id="tel_number" required
                                            class="bg-slate-200 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5"
                                            placeholder="123-45678-9012" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                {{-- Data --}}
                                <div class="relative z-0 w-full group">
                                    <label for="res_date" class="block text-sm font-medium text-gray-900">Reservation Date</label>
                                    <div class="z-0 w-full mb-6 mt-2 group">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                        </div>
                                        <input
                                            datepicker
                                            datepicker-autohide
                                            datepicker-format="dd/mm/yyyy"
                                            type="text" placeholder="Select date" id="res_date" name="res_date"
                                            class="bg-slate-100 border-2 cursor-pointer border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5 ">
                                    </div>
                                </div>

                                {{-- Time --}}
                                <div class="relative z-0 w-full group">
                                    <label for="res_date" class="block text-sm font-medium text-gray-900">Reservation Time</label>
                                    <div class="z-0 w-full mb-6 mt-2 group">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                        </div>
                                        <input
                                            datepicker
                                            datepicker-autohide
                                            datepicker-format="dd/mm/yyyy"
                                            type="text" placeholder="Select time" id="res_date" name="res_date"
                                            class="bg-slate-100 border-2 cursor-pointer border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5 ">
                                    </div>
                                </div>

                            </div>

                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <!-- Guest number -->
                                <div class="relative z-0 w-full group mb-6">
                                    <input type="number" name="guest_number" id="guest_number" min="0" max="100" step="1" required
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-500 peer"
                                        placeholder=" " required="">
                                    <label for="guest_number"
                                        class="peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500 peer-placeholder-shwon:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Guest Number</label>
                                </div>

                                {{-- Table id --}}
                                <div class="relative z-0 w-full group">
                                    <div class="sm:col-span-6">
                                        <label for="table_id" class="block mb-2 text-sm font-medium text-gray-900">Select an option for status</label>
                                        <select id="table_id" name="table_id" class="bg-slate-100 border-2 border-gray-300 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">
                                            <option selected="">Choose a table</option>
                                            @foreach ($tables as $table)
                                                <option value="{{ $table->id }}">{{ $table->name }} ({{ $table->guest_number }} guests)</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-5 pr-2 pb-0 pl-0.5 flex justify-between">
                                <a href="{{ route('admin.reservations.index') }}"
                                    class="flex justify-start px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                                    Return
                                </a>
                                <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</x-admin-layout>
