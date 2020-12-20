{{-- <div id="sidebar-disable" class="sidebar-disable hidden"></div> --}}

<div id="sidebar" class="bg-gray-800 dark:bg-gray-800 min-h-screen">
    <div class="flex items-center justify-center mt-4">
        <div class="flex items-center">
            <span class="text-white text-2xl mx-2 font-semibold">Admin</span>
        </div>
    </div>
    <nav class="text-white mt-4">
        <a class="nav-link{{ request()->is('admin') ? ' active' : '' }}" href="{{ route("admin.home") }}">
            <i class="text-white fas fa-fw fa-tachometer-alt"></i>
            <span class="mx-4">Dashboard</span>
        </a>
        {{--
            Not meant to replace frameworks like Vue or React
            Use case is for when minimal JS is needed. Dropdowns, tabs, modals etc.
            Great for server rendered apps like Laravel or Rails ehere you just need to toggle some JS components
            Syntax is very similar to Vue< but no virtual DOM so easier to setup wirh no build steps

            Why use Alpine.js?
            Like Tailwind CSS for JS
            Easily write declarative code, as opposed to procedural code
            Small footprint: 4kb gzipped 

        --}}
        <div x-data="{open:false}" class="block w-11/12 mt-2 mx-auto">
            <button @click="open=true" class="cursor-pointer px-5 py-3 text-white text-center inline-block hover:opacity-75 hover:shadow hover:-mb-3 rounded-t">
                <i class="fa-fw fas fa-users"></i><span class="mx-4">User Management</span><i class="fa fa-caret-down ml-auto" x-bind:class="{ 'fa-caret-up': open !== false }" aria-hidden="true"></i></button>
            <ul x-show="open" @click.away="open=false">
                @can('permission_access')
                    <li class="border w-11/12">
                        <a class="nav-link{{ request()->is('admin/permissions*') ? ' active' : '' }}" href="/admin/permissions">
                        <i class="fa-fw fas fa-unlock-alt"></i>
                        <span class="mx-4">Permission</span>
                        </a>
                    </li>
                @endcan
                @can('role_access')
                    <li class="border w-11/12">
                        <a class="nav-link{{ request()->is('admin/roles*') ? ' active' : '' }}" href="/admin/roles">
                            <i class="fa-fw fas fa-briefcase"></i>
                            <span class="mx-4">Roles</span>
                        </a>
                    </li>
                @endcan
                <li class="border w-11/12">
                    <a class="nav-link{{ request()->is('admin/users*') ? ' active' : '' }}" href="/admin/users">
                        <i class="fa-fw fas fa-user"></i>
                        <span class="mx-4">Users</span>
                    </a>
                </li>
            </ul>
        </div>
        
        {{--  --}}

        <div x-data="{open:false}" class="block w-11/12 my-2 mx-auto">
            <button @click="open=true" class="cursor-pointer px-5 py-3 text-white text-center inline-block hover:opacity-75 hover:shadow hover:-mb-3 rounded-t">
                <i class="fa-fw fas fa-tachometer-alt"></i><span class="mx-4">Shop Management</span><i class="fa fa-caret-down ml-auto" x-bind:class="{ 'fa-caret-up': open !== false }" aria-hidden="true"></i></button>
            <ul x-show="open" @click.away="open=false">
                <li class="border w-11/12">
                    <a class="nav-link{{ request()->is('admin/categories*') ? ' active' : '' }}" href="{{ route('admin.categories.index') }}">
                    <i class="fa-fw fas fa-project-diagram"></i>
                    <span class="mx-4">Categories</span>
                    </a>
                </li>
                <li class="border w-11/12">
                    <a class="nav-link{{ request()->is('admin/brands*') ? ' active' : '' }}" href="{{ route('admin.brands.index') }}">
                        <i class="fa-fw fas fa-briefcase"></i>
                        <span class="mx-4">Brands</span>
                    </a>
                </li>
                <li class="border w-11/12">
                    <a class="nav-link{{ request()->is('admin/products*') ? ' active' : '' }}" href="/admin/products">
                        <i class="fa-fw fas fa-tachometer-alt"></i>
                        <span class="mx-4">Products</span>
                    </a>
                </li>
            </ul>
        </div>

    </nav>
</div>
