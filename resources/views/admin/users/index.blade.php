<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users list') }}
            </h2>
            <a class="text-white bg-blue-600 px-2" href="{{ route('admin.users.create') }}">Add New</a>
            
        </div>
    </x-slot>

    <div class="body">
        <div class="w-full">
        @livewire('users-table')
        </div>
    </div>
</div>
</x-admin-layout>
