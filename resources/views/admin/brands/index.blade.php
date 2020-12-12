<x-admin.admin-layout>
    <div class="main-card">
        <div class="header">
            Btands list
            <a class="btn-sm btn-blue" href="{{ route('admin.brands.create') }}">Add New</a>
        </div>

    <div class="body">

        <div class="w-full">
        {{ $brands->links() }}
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
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $key => $brand)
                        <tr data-entry-id="{{ $brand->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $brand->id ?? '' }}
                            </td>
                            <td>
                                {{ $brand->name ?? '' }}
                            </td>
                            <td>
                                <a class="btn-sm btn-indigo" href="{{ route('admin.brands.show', $brand->id) }}">
                                        view
                                </a>
 
                                <a class="btn-sm btn-blue" href="{{ route('admin.brands.edit', $brand->id) }}">
                                        edit
                                </a>
                                <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" onsubmit="return confirm('Are You Sure');" style="display: inline-block;">
                                    @method("DELETE")
                                    @csrf
                                    <input type="submit" class="btn-sm btn-red" value="delete">
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        {{ $brands->links() }}
        </div>
    </div>
</div>
</x-admin.admin-layout>
