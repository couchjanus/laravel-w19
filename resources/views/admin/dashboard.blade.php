<x-admin-layout>
<x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
            
        </div>
    </x-slot>

    <div class="body">
        <div class="w-full">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               Admin Dashboard
            </div>
        </div>
    </div>
</x-admin-layout>