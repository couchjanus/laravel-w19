<x-admin.admin-layout>

<div class="main-card">
    <div class="header">
        Show Category
        <a class="btn-sm btn-blue" href="{{ route('admin.categories.index') }}">All Categories</a>
    </div>

     <div class="body">
        <div class="block pb-4">
            <a class="btn-md btn-gray" href="{{ route('admin.categories.index') }}">
                back to list
            </a>
        </div>
        <table class="striped bordered show-table">
            <tbody>
                <tr>
                    <th>
                        id
                    </th>
                    <td>
                        {{ $category->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        name
                    </th>
                    <td>
                        {{ $category->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        description
                    </th>
                    <td>
                        {{ $category->description }}
                    </td>
                </tr>
             
            </tbody>
        </table>
        <div class="block pt-4">
            <a class="btn-md btn-gray" href="{{ route('admin.categories.index') }}">
                back to list
            </a>
        </div>
    </div>
    
</div>
</x-admin.admin-layout>