<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <div class="mt-8 space-y-4">
                <a href="{{ route('tasks.index') }}" class="block w-full text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg shadow-md">
                    {{ __('Task List') }}
                </a>
                <a href="{{ route('tasks.create') }}" class="block w-full text-center bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg shadow-md">
                    {{ __('Create Task') }}
                </a>
                <a href="{{ route('statistics.index') }}" class="block w-full text-center bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-4 rounded-lg shadow-md">
                    {{ __('Statistics') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
