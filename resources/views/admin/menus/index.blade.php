<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="font-bold text-indigo-500 text-5xl border-b-2 pb-2 border-indigo-300">
                <h1>Menus</h1>
            </div>
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.menus.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    New Menu
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $menu->name }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <img src="{{ Storage::url($menu->image) }}" class="w-8 h-8 rounded">
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <p class="max-w-sm overflow-hidden text-ellipsis">{{ $menu->description }}</p>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                R$ {{ $menu->price }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                                    <form action="{{ route('admin.menus.destroy', $menu->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure?');"
                                        class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" id="delete">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
