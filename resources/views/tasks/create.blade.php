<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Title') }}</label>
                            <input type="text" name="title" id="title" class="form-control w-full border-gray-300 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Description') }}</label>
                            <textarea name="description" id="description" class="form-control w-full border-gray-300 rounded-md" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="assigned_by_id" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Admin Name') }}</label>
                            <select name="assigned_by_id" id="assigned_by_id" class="form-control w-full border-gray-300 rounded-md">
                                @foreach($admins as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="assigned_to_id" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Assigned User') }}</label>
                            <select name="assigned_to_id" id="assigned_to_id" class="form-control w-full border-gray-300 rounded-md">
                                @foreach($users as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Create Task') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
