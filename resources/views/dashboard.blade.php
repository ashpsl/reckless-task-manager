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
                    @forelse ($tasks as $task)
                        <div class="border-b border-gray-400 py-4" x-data="{ open: false }">
                            <button class="text-xl w-full text-left" x-on:click="open = !open">
                                {{ $task['name'] }}
                            </button>
                            <p class="text-sm text-gray-600">
                                {{ $task['status'] }}
                            </p>

                            <div class="overflow-hidden" :class="open ? 'h-auto mt-2' : 'h-0'">
                                {{ $task['description'] }}
                            </div>
                        </div>
                    @empty
                        <p>No tasks found</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
