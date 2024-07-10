<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between mb-6">
                        <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                            {{ __('Go to Home') }}
                        </a>
                        <a href="{{ route('tasks.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                            {{ __('Create Task') }}
                        </a>
                        <a href="{{ route('statistics.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                            {{ __('Go to Statistics') }}
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead class="bg-gray-100 border-b">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">{{ __('Title') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">{{ __('Description') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">{{ __('Assigned To') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">{{ __('Assigned By') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-6 py-4">{{ $task->title }}</td>
                                        <td class="px-6 py-4">{{ $task->description }}</td>
                                        <td class="px-6 py-4">{{ $task->assignedTo->name }}</td>
                                        <td class="px-6 py-4">{{ $task->assignedBy->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
