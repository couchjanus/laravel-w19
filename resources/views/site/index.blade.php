<x-site-layout>
    <div class="py-6">
        <!-- Breadcrumbs -->
        <x-site-breadcrumbs></x-site-breadcrumbs>
        <!-- ./ Breadcrumbs -->

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        {{ $products->links() }} 
            <div class="grid gap-6 -mx-4 grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 my-4">
                @forelse($products as $product)
                    <div class="md:flex-1 px-4">
                        <div class="card flex flex-col justify-center p-10 bg-white rounded-lg shadow-2xl">
                            <div class="prod-title">
                                <p class="text-2xl uppercase text-gray-900 font-bold">{{ $product->name }}</p>
                            </div>
                            <div class="prod-img">
                                <img src="{{ $product->pictures[0]->filename ?? null}}"
                                    class="w-full object-cover object-center" />
                            </div>
                            <div class="prod-info grid gap-10">
                                <div class="flex flex-col md:flex-row justify-between items-center text-gray-900 mt-2">
                                    <p class="font-bold text-xl">{{ $product->details }} By <a href="{{ route('product.by.brand', $product->brand->id) }}"> {{ $product->brand->name }}</a></p>
                                    
                                    <a href="{{ route('shop.product', $product->id) }}" class="px-2 py-2 transition ease-in duration-200 hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                                    <svg class="h-6 w-6 leading-none stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                    </svg>
                                    </a>
                                </div>

                                <div>
                                    <ul class="list-reset flex flex-wrap">
                                        @forelse($product->categories as $category)
                                            <li class="mr-3">
                                                <a class="inline-block border border-blue-500 border-opacity-100 rounded py-1 px-3 bg-blue text-red-400" href="{{ route('product.by.category', $category->id) }}">{{ $category->name }}</a>
                                            </li>
                                        @empty
                                            No categories yet
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="flex flex-col md:flex-row justify-between items-center text-gray-900">
                                    <p class="font-bold text-xl">${{ $product->price }}</p>
                                    <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
                                        @csrf
                                        <input type="hidden" min="1" value="1" name="qty">
                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                        <input type="hidden" name="price" id="finalPrice" value="{{ $product->price }}">
                                        <button
                                            class="px-6 py-2 transition ease-in duration-200 uppercase rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none" type="submit">Add to cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    No products yet
                @endforelse
            </div>
            {{ $products->links() }} 
        </div>
    </div>

</x-site-layout>