<x-site-layout>
    <div class="py-6">
        <!-- Breadcrumbs -->
        <x-site-breadcrumbs></x-site-breadcrumbs>
        <!-- ./ Breadcrumbs -->
        <form action="{{ route('checkout.place.order') }}" method="POST" role="form">
            @csrf
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                <div class="flex flex-col md:flex-row -mx-4">

                    <div class="md:flex-1 px-4">

                        <article class="card-body">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Billing Details</h4>
                            </header>

                            <div class="md:flex md:items-center mb-1">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="first_name">
                                        First name
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 {{ $errors->has('first_name') ? ' is-invalid' : '' }}" id="first_name" name="first_name" type="text" required>
                                </div>
                                @if($errors->has('first_name'))
                                    <p class="invalid-feedback">{{ $errors->first('first_name') }}</p>
                                @endif
                            </div>

                            <div class="md:flex md:items-center mb-1">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="last_name">
                                        Last name
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 {{ $errors->has('last_name') ? ' is-invalid' : '' }}" id="last_name" name="last_name" type="text" required>
                                </div>
                                @if($errors->has('last_name'))
                                    <p class="invalid-feedback">{{ $errors->first('last_name') }}</p>
                                @endif
                            </div>
                            
                            <div class="md:flex md:items-center mb-1">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="address">
                                        Address
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 {{ $errors->has('address') ? ' is-invalid' : '' }}" id="address" name="address" type="text" required>
                                </div>
                                @if($errors->has('address'))
                                    <p class="invalid-feedback">{{ $errors->first('address') }}</p>
                                @endif
                            </div>
                            
                            <div class="md:flex md:items-center mb-1">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="city">
                                        City
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 {{ $errors->has('city') ? ' is-invalid' : '' }}" id="city" name="city" type="text" required>
                                </div>
                                @if($errors->has('city'))
                                    <p class="invalid-feedback">{{ $errors->first('city') }}</p>
                                @endif
                            </div>
                            
                            <div class="md:flex md:items-center mb-1">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="country">
                                        Country
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 {{ $errors->has('country') ? ' is-invalid' : '' }}" id="country" name="country" type="text" required>
                                </div>
                                @if($errors->has('country'))
                                    <p class="invalid-feedback">{{ $errors->first('country') }}</p>
                                @endif
                            </div>
                            
                            <div class="md:flex md:items-center mb-1">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="post_code">
                                        Post Code
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 {{ $errors->has('post_code') ? ' is-invalid' : '' }}" id="post_code" name="post_code" type="text" required>
                                </div>
                                @if($errors->has('post_code'))
                                    <p class="invalid-feedback">{{ $errors->first('post_code') }}</p>
                                @endif
                            </div>

                            <div class="md:flex md:items-center mb-1">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="phone_number">
                                        Phone Number
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" id="phone_number" name="phone_number" type="text" required>
                                </div>
                                @if($errors->has('phone_number'))
                                    <p class="invalid-feedback">{{ $errors->first('phone_number') }}</p>
                                @endif
                            </div>

                            <div class="md:flex md:items-center">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="email">
                                        Email Address
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="email" name="email" type="email" value="{{ auth()->user()->email }}" disabled>
                                </div>
                                
                            </div>
                            
                            <span class="block text-gray-500 font-bold text-right mb-1">
                                We'll never share your email with anyone else.
                            </span>
                            
                           
                            <div class="md:flex md:items-center mb-1">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="notes">
                                        Order Notes
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="notes" name="notes" type="text">
                                </div>
                                
                            </div>
                        </article>
                    </div>

                    <div class="md:flex-1 px-4">

                        <article class="card-body">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Your Order</h4>
                            </header>
                            <dl class="dlist-align">
                                <dt>Total cost: </dt>
                                <dd class="text-right h5 b"> 
                                {{ config('settings.currency_symbol', '$') }}{{ \Cart::getSubTotal() }} </dd>
                            </dl>
                            <button type="submit" class="lg:mt-2 xl:mt-0 flex-shrink-0 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Place Order</button>

                        </article>

                    </div>


                </div>
            </div>
        </form>
    </div>
</x-site-layout>

