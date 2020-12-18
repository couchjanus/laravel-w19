<x-admin-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add New Peoduct') }}
            </h2>
            <a class="text-white bg-blue-600 px-2" href="{{ route('admin.products.index') }}">Go Back</a>
            
        </div>
    </x-slot>

    <div class="body w-11/12 mx-auto mt-4">

        <form method="POST" action="{{ route("admin.products.store") }}" enctype="multipart/form-data">@csrf

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
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block text-sm font-medium text-gray-700" for="brand_id">Brand</label>
                    <select name="brand_id" id="brand_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('brand_id') is-invalid @enderror">
                        <option value="0">Select a brand</option>
                        @foreach($brands as $brand)
                            <option value={{ $brand->id }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('brand_id'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('brand_id') }}</p>
                    @endif
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block text-sm font-medium text-gray-700" for="categories">Categories</label>
                    <select name="categories[]" id="categories" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('categories') is-invalid @enderror" multiple>
                        <option value="0">Select acategories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('categories'))
                        <p class="text-red-500 text-xs italic">{{ $errors->first('categories') }}</p>
                    @endif
                </div>
            </div>
            {{--  --}}
            <div class="flex flex-col flex-grow mb-3">
                <div x-data="{ files: null }" id="FileUpload" class="block w-full py-2 px-3 relative bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray">
                    <input type="file" multiple name="images[]"
                        class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                        x-on:change="files = $event.target.files; console.log($event.target.files);"
                        x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')"
                    >
                    <template x-if="files !== null">
                        <div class="flex flex-col space-y-1">
                            <template x-for="(_,index) in Array.from({ length: files.length })">
                                <div class="flex flex-row items-center space-x-2">
                                    <template x-if="files[index].type.includes('audio/')"><i class="far fa-file-audio fa-fw"></i></template>
                                    <template x-if="files[index].type.includes('application/')"><i class="far fa-file-alt fa-fw"></i></template>
                                    <template x-if="files[index].type.includes('image/')"><i class="far fa-file-image fa-fw"></i></template>
                                    <template x-if="files[index].type.includes('video/')"><i class="far fa-file-video fa-fw"></i></template>
                                    <span class="font-medium text-gray-900" x-text="files[index].name">Uploading</span>
                                    <span class="text-xs self-end text-gray-500" x-text="filesize(files[index].size)">...</span>
                                </div>
                            </template>
                        </div>
                    </template>
                    <template x-if="files === null">
                        <div class="flex flex-col space-y-2 items-center justify-center">
                            <i class="fas fa-cloud-upload-alt fa-3x text-currentColor"></i>
                            <p class="text-gray-700">Drag your files here or click in this area.</p>
                            <a href="javascript:void(0)" class="flex items-center mx-auto py-2 px-4 text-white text-center font-medium border border-transparent rounded-md outline-none bg-red-700">Select a file</a>
                        </div>
                    </template>
                </div>
            </div>
            {{--  --}}

            <div class="flex items-center justify-end mt-4">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded ml-4" type="submit">
                    Add Product
                </button>
            </div>
        </form>
    </div>

</x-admin-layout>
