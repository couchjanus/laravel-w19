<x-admin.admin-layout>

<div class="main-card">
    <div class="header">
        Create Category
        <a class="btn-sm btn-blue" href="{{ route('admin.categories.index') }}">All Categories</a>
    </div>

    <form method="POST" action="{{ route("admin.categories.store") }}" enctype="multipart/form-data"  class="w-full max-w-sm">
        @csrf

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                    Name
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" type="text" value="{{ old('name') }}" required>
            </div>
            @if($errors->has('name'))
                <p class="invalid-feedback">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">
                    Description
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" name="description" type="text" value="{{ old('description') }}">
            </div>
            @if($errors->has('description'))
                <p class="invalid-feedback">{{ $errors->first('description') }}</p>
            @endif
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3"></div>
            <label class="md:w-2/3 block text-gray-500 font-bold">
                <input class="mr-2 leading-tight" type="checkbox">
                <span class="text-sm">
                    Chack me out!
                </span>
            </label>
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                Save
            </button>
            </div>
        </div>
    </form>
</div>

</x-admin.admin-layout>
