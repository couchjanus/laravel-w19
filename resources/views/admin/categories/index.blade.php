<x-admin.admin-layout>
    <div class="main-card">
        <div class="header">
            Category list
            <a class="btn-sm btn-blue" href="{{ route('admin.categories.create') }}">Add New</a>
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
                            Status
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key => $category)
                        <tr data-entry-id="{{ $category->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $category->id ?? '' }}
                            </td>
                            <td>
                                {{ $category->name ?? '' }}
                            </td>
                            <td>
                                Active
                            </td>
                            <td>
                                <a class="btn-sm btn-indigo" href="{{ route('admin.categories.show', $category->id) }}">
                                        view
                                </a>
 
                                <a class="btn-sm btn-blue" href="{{ route('admin.categories.edit', $category->id) }}">
                                        edit
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are You Sure');" style="display: inline-block;">
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
