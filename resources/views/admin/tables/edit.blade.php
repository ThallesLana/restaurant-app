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
                    <h1>Tables</h1>
                </div>
            </div>
            <div class="flex justify-center p-4 m-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-slate-200 w-4/6">
                    <div class="m-2 p-2">
                        <div class="font-bold text-indigo-500 text-xl border-b-2 pb-1 border-indigo-300 flex justify-center">
                            <h1>New Table</h1>
                        </div>
                        <form method="POST" action="{{ route('admin.tables.update', $table->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Name -->
                            <div class="relative z-0 w-full mb-6 group mt-4">
                                <input type="text" name="name" id="name" value="{{ $table->name }}"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-500 peer"
                                    placeholder=" " required="">
                                <label for="name"
                                    class="peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500 peer-placeholder-shwon:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                            </div>
                            <!-- Guest number -->
                            <div class="relative z-0 w-full mb-6 group mt-4">
                                <input type="number" name="guest_number" id="guest_number" min="0" max="100" step="1" value="{{ $table->guest_number }}"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-500 peer"
                                    placeholder=" " required="">
                                <label for="guest_number"
                                    class="peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500 peer-placeholder-shwon:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Guest Number</label>
                            </div>
                            {{-- Status --}}
                            <div class="sm:col-span-6">
                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Select an option for status</label>
                                <select id="status" name="status" class="bg-slate-100 border-2 border-gray-300 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">
                                    @foreach ($tableStatus = array ( "Pending" => "pending", "Avaliable" => "avaliable", "Unavaliable" => "unavaliable"); as $status => $value)
                                        <option value="{{ $value }}" <?php if($table->status == $value){ ?> selected="{{ $value }}" <?php } ?> >{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Location --}}
                            <div class="sm:col-span-6 pt-3">
                                <label for="location" class="block mb-2 text-sm font-medium text-gray-900">Select an option for location</label>
                                <select id="location" name="location" class="bg-slate-100 border-2 border-gray-300 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">
                                    @foreach ($tableLocation = array ( "Front" => "front", "Inside" => "inside", "Outside" => "outside"); as $location => $value)
                                        <option value="{{ $value }}" <?php if($table->location == $value){ ?> selected="{{ $value }}" <?php } ?> >{{ $location }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="pt-5 pr-2 pb-0 pl-0.5 flex justify-between">
                                <a href="{{ route('admin.tables.index') }}"
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

</x-admin-layout>
