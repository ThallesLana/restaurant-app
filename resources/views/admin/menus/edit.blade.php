<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="pt-2 pr-0 pb-4 pl-1">
            <a href="{{ route('admin.menus.index') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                Return
            </a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-slate-200 space-y-8 divide-y w-1/2">
            <div class="m-2 p-2">
                <form method="POST" action="{{ route('admin.menus.update', $menu) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Name -->
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="name" id="name" value="{{ $menu->name }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-500 peer"
                            placeholder=" " required="">
                        <label for="name"
                            class="peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500 peer-placeholder-shwon:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                    </div>
                    <!-- Image -->
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Upload File</label>
                        <div>
                            <img src="{{ Storage::url($menu->image) }}" class="w-32 h-32">
                        </div>
                        <input type="file" id="image" name="image"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg p-1 cursor-pointer bg-slate-100 focus:outline-none">
                    </div>
                    <!-- Description -->
                    <div class="sm:col-span-6 pt-5">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                        <textarea name="description" id="description" rows="3" placeholder="Leave a description..."  class="block p-2.5 w-full text-sm text-gray-900 bg-slate-50 rounded-lg border-2 border-gray-300 focus:ring-indigo-500">{{ $menu->description }}</textarea>
                    </div>
                    <!-- Price -->
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="number" name="price" id="price" min="0.00" max="10000.00" step="0.01" value="{{ $menu->price }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-500 peer"
                            placeholder=" " required="">
                        <label for="price"
                            class="peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500 peer-placeholder-shwon:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price</label>
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <label for="categories" class="block mb-2 text-sm font-medium text-gray-900">Select an option</label>
                        <select id="categories" name="categories[]" class="bg-slate-100 border-2 border-gray-300 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">                            
                            @foreach ($categories as $category)   
                                @if ($menu->id == $menu->categories->contains($category))
                                    <option value="{{ $category->id }}" selected="{{ $category->id }}">{{ $category->name }}</option>
                                @elseif ($menu->id !== $menu->categories->contains($category))
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="pt-5 pr-2 pb-0 pl-0.5">
                        <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-admin-layout>
