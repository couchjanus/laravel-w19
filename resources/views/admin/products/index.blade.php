<x-admin.admin-layout>
    <div class="main-card">
        <div class="header">
            Product list
            <a class="btn-sm btn-blue" href="{{ route('admin.products.create') }}">Add New</a>
        </div>

    <div class="body">
        <div class="w-full">
            <table class="stripe hover bordered datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Id
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Price
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                        <tr data-entry-id="{{ $product->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $product->id ?? '' }}
                            </td>
                            <td>
                                {{ $product->name ?? '' }}
                            </td>
                            <td>
                                {{ $product->price ?? '' }}
                            </td>
                            <td>
                                <a class="btn-sm btn-indigo" href="{{ route('admin.products.show', $product->id) }}">
                                        view
                                </a>
 
                                <a class="btn-sm btn-blue" href="{{ route('admin.products.edit', $product->id) }}">
                                        edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are You Sure');" style="display: inline-block;">
                                    @method("DELETE")
                                    @csrf
                                    <input type="submit" class="btn-sm btn-red" value="delete">
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-admin.admin-layout>
