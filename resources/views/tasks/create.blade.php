<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('tasks.store') }}" method="post">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="description"
                                class="block font-bold text-md text-gray-700 mb-3">Description</label>
                            <input type="text" name="description" id="description"
                                class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm "
                                value=" {{ old('description', '') }}">
                            @error('description')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-white">
                            <button class="bg-gray-800 px-4 py-2 rounded-md text-white">Create</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
