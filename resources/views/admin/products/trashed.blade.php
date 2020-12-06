<x-admin.admin-layout>
    <div class="main-card">
        <div class="header">
            Trashed Products
            <a class="btn-sm btn-blue" href="{{ route('admin.products.index') }}">Product List</a>
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
                            Deleted At
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $key => $product)
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
                                {{ $product->deleted_at ?? '' }}
                            </td>
                            <td>
                                <form action="{{ route('admin.products.restore',  $product->id) }}" method="post" style="display: inline">
                                @csrf
                                <button title="Restore product" type="submit" class="btn-sm btn-green"><i class="fas fa-restore"></i> Restore</button>
                                </form>    
                    
                                <form action="{{ route('admin.products.force',  $product->id) }}" method="post" style="display: inline">
                                    @method('DELETE') 
                                    @csrf
                                    <button title="Force Delete Product" type="submit" class="btn-sm btn-red"><i class="fas fa-trash"></i> Delete</button>
                                </form>  
                            </td>

                        </tr>
                    @empty
                        <p>No trashed posts yet...</p>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-admin.admin-layout>
