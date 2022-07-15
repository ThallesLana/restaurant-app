<?php
    $Hours = array (
        "08:00",
        "08:30",
        "09:00",
        "09:30",
        "10:00",
        "10:30",
        "11:00",
        "11:30",
        "12:00",
        "12:30",
        "13:00",
        "13:30",
        "14:00",
        "14:30",
        "15:00",
        "15:30",
        "16:00",
        "16:30",
        "19:00",
        "19:30",
        "20:00",
        "20:30",
        "21:00",
        "21:30",
        "22:00",
    );
?>
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

                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z"/></svg>
                                        </div>
                                        <input type="email" name="email" id="email" required
                                            class="bg-slate-100 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5"
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
                                        <input type="text" name="tel_number" id="tel_number" required
                                            class="bg-slate-100 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5"
                                            placeholder="(00) 00000-0000" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                {{-- Data --}}
                                <div class="relative z-0 w-full group">
                                    <label for="res_date" class="block text-sm font-medium text-gray-900">Reservation Date</label>
                                    <div class="z-0 w-full mb-6 mt-2 group">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pt-0.5 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M96 32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32zM448 464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192H448V464z"/></svg>
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
                                    <label for="res_time" class="block text-sm font-medium text-gray-900">Reservation Time</label>
                                    <div class="z-0 w-full mb-6 mt-2 group">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pt-0.5 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"/></svg>
                                        </div>
                                        <select id="res_time" name="res_time" class="bg-slate-100 border-2 border-gray-300 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5">
                                            <option selected="" value="NC">Choose a Reservation Time</option>
                                            @foreach ($Hours as $res_time)
                                                <option value="{{ $res_time }}">{{ $res_time }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <!-- Guest number -->
                                <div class="relative z-0 w-full mb-4 group">
                                    <label for="email" class="block text-sm font-medium text-gray-900 mb-2">Guest Number</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/></svg>
                                        </div>
                                        <input type="number" name="guest_number" id="guest_number" required
                                            class="bg-slate-100 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5"
                                            placeholder="Guest Number" required="">
                                    </div>
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
    <script type="module" src="index.js"></script>
    <script type="module" src="another-file.js"></script>
    <script>
        window._ = require('lodash');

        try {
            window.$ = window.jQuery = require('jquery');

            require('jquery-mask-plugin');
            $('.tel_number').mask('(00) 00000-0000', {reverse: true});
        } catch (error) {
            console.log(error);
        }
    </script>
    <script>
        let s= new Date().toLocaleString();
        console.log(s);
    </script>
</x-admin-layout>
