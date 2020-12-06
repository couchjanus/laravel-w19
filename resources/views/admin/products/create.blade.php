<x-admin.admin-layout>

<div class="main-card">
    <div class="header">
        Create Product
        <a class="btn-sm btn-blue" href="{{ route('admin.products.index') }}">All Products</a>
    </div>

    <form class="w-full max-w-lg mx-auto" method="POST" action="{{ route("admin.products.store") }}" enctype="multipart/form-data">@csrf

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                    Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" type="text" value="{{ old('name') }}" required>
                @if($errors->has('name'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('name') }} Please fill out this field.</p>
                @endif
            </div>

            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="price">
                    Price
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 {{ $errors->has('price') ? ' is-invalid' : '' }}" id="price" name="price" type="text" value="{{ old('price') }}" required>
                @if($errors->has('price'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('price') }} Please fill out this field.</p>
                @endif
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                Description
            </label>
            <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="description" name="description"></textarea>
            <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="details">
                    Details
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white {{ $errors->has('details') ? ' is-invalid' : '' }}" id="details" name="details" type="text" value="{{ old('details') }}" required>
                @if($errors->has('details'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('details') }} Please fill out this field.</p>
                @endif
            </div>

            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    <input class="mr-2 leading-tight" name="featured" type="checkbox">
                    <span class="text-sm">
                        Chack featured
                    </span>
                </label>
            </div>
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
