<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class=" block mb-8">
                <a href="{{ route('tasks.create') }}"
                    class="px-3 py-2 bg-green-600 hover:bg-green-900 my-4 rounded-lg text-white ">Add Task</a>
            </div>

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            S/N
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Description
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($tasks as $task)
                                        <tr>


                                            <td class="px-6 py-4 whitespace-nowrap w-1">
                                                @can('task_access')
                                                    {{ $loop->iteration }}
                                                @endcan
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $task->description }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap flex">
                                                <a href="{{ route('tasks.show', $task->id) }}"
                                                    class="m-1 text-blue-600 hover:text-blue-900 p-1">View</a>
                                                <a href="{{ route('tasks.edit', $task->id) }}"
                                                    class="m-1 text-indigo-600 hover:text-indigo-900 p-1">Edit</a>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="post"
                                                    onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        class="m-1 text-red-600 hover:text-red-900 p-1">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <!-- More items... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
