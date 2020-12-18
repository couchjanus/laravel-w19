{{-- <div id="sidebar-disable" class="sidebar-disable hidden"></div> --}}

<div id="sidebar" class="sidebar-menu transform -translate-x-full ease-in">
    <div class="flex items-center justify-center mt-4">
        <div class="flex items-center">
            <span class="text-white text-2xl mx-2 font-semibold">Admin</span>
        </div>
    </div>
    <nav class="mt-4">
        <a class="nav-link{{ request()->is('admin') ? ' active' : '' }}" href="{{ route("admin.home") }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="mx-4">Dashboard</span>
        </a>

        <div class="nav-dropdown">
            <a class="nav-link" href="#">
                <i class="fa-fw fas fa-users"></i>
                <span class="mx-4">User Management</span>
                <i class="fa fa-caret-down ml-auto" aria-hidden="true"></i>
            </a>
            <div class="dropdown-items mb-1 hidden">
                <a class="nav-link{{ request()->is('admin/permissions*') ? ' active' : '' }}" href="#">
                    <i class="fa-fw fas fa-unlock-alt"></i>
                    <span class="mx-4">Permission</span>
                </a>
                <a class="nav-link{{ request()->is('admin/roles*') ? ' active' : '' }}" href="#">
                    <i class="fa-fw fas fa-briefcase"></i>
                    <span class="mx-4">Roles</span>
                </a>
                <a class="nav-link{{ request()->is('admin/users*') ? ' active' : '' }}" href="#">
                    <i class="fa-fw fas fa-user"></i>
                    <span class="mx-4">Users</span>
                </a>
            </div>
        </div>

        <a class="nav-link{{ request()->is('admin/categories*') ? ' active' : '' }}" href="{{ route('admin.categories.index') }}">
            <i class="fa-fw fas fa-project-diagram"></i>
            <span class="mx-4">Categories</span>
        </a>

    </nav>
</div>
