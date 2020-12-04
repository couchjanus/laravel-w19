
@extends('layouts.master')
@section('styles')
    @include('layouts.partials.admin._styles')
@endsection

@section('body')
<div class="flex h-screen bg-gray-200">
    <x-admin.sidebar></x-admin.sidebar>
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="main-header">
                <div class="flex items-center">
                    <button id="sidebar-enable" class="sidebar-enable">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="mx-auto px-6 py-8">
                    @if(session('message'))
                        <div class="alert success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if($errors->count() > 0)
                        <div class="alert danger">
                            <ul class="list-none">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                {{ $slot }}

            </div>
        </main>
        
        </div>
    </div>
@endsection

@push('scripts')
    @include('layouts.partials.admin._scripts')
@endpush