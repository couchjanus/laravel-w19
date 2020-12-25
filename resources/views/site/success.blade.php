<x-site-layout>
    <div class="py-6">
        <!-- Breadcrumbs -->
        <x-site-breadcrumbs></x-site-breadcrumbs>
        <!-- ./ Breadcrumbs -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <h2 class="title-page">Order Completed</h2>
                    <p class="alert alert-success">Your order placed successfully. Your order number is : {{ $order['order_number'] }}.</p>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>
