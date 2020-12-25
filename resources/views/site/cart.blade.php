<x-site-layout>
    <div class="py-6">
        <!-- Breadcrumbs -->
        <x-site-breadcrumbs></x-site-breadcrumbs>
        <!-- ./ Breadcrumbs -->

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    @if (\Cart::isEmpty())
                        <p class="alert alert-warning">Your shopping cart is empty.</p>
                    @else
                        <div class="card">
                            <table class="table table-hover shopping-cart-wrap">
                                <thead class="text-muted">
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col" width="120">Quantity</th>
                                            <th scope="col" width="120">Price</th>
                                            <th scope="col" class="text-right" width="200">Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach(\Cart::getContent() as $item)
                                        <tr>
                                                <td>
                                                    <figure class="media">
                                                        <figcaption class="media-body">
                                                            <h6 class="title text-truncate">{{ Str::words($item->name,20) }}</h6>
                                                            @foreach($item->attributes as $key  => $value)
                                                                <img src="{{ $value }}">
                                                            @endforeach
                                                        </figcaption>
                                                    </figure>
                                                </td>
                                                <td>
                                                    <var class="price">{{ $item->quantity }}</var>
                                                </td>
                                                <td>
                                                    <div class="price-wrap">
                                                        <var class="price">{{ config('settings.currency_symbol'). $item->price }}</var>
                                                        <small class="text-muted">each</small>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('checkout.cart.remove', $item->id) }}" class="btn btn-outline-danger"><i class="fa fa-times"></i> </a>
                                                </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
                <div class="md:flex-1 px-4">
                    <a href="{{ route('checkout.cart.clear') }}" class="btn btn-danger btn-block mb-4">Clear Cart</a>
                    <p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
                    <dl class="dlist-align h4">
                        <dt>Total:</dt>
                        <dd class="text-right"><strong>{{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }}</strong></dd>
                    </dl>
                    <hr>
                    <figure class="itemside mb-3">
                        <aside class="aside"><img src="{{ asset('img/icons/pay-visa.png') }}"></aside>
                        <div class="text-wrap small text-muted">
                            Pay 84.78 AED ( Save 14.97 AED ) By using ADCB Cards
                        </div>
                    </figure>
                    <figure class="itemside mb-3">
                        <aside class="aside"> <img src="{{ asset('img/icons/pay-mastercard.png') }}"> </aside>
                        <div class="text-wrap small text-muted">
                            Pay by MasterCard and Save 40%.
                            <br> Lorem ipsum dolor
                        </div>
                    </figure>
                    <a href="{{ route('checkout.index') }}" class="lg:mt-2 xl:mt-0 flex-shrink-0 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>
