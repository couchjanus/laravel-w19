<x-layouts.blog>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>
    <section class="flex flex-col justify-center items-center">
        <div class="container px-5 py-24 mx-auto">
            <livewire:contact-form></livewire:contact-form>
        </div>
    </section>
</x-layouts.blog>
