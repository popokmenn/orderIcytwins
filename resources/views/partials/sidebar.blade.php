<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="">{{ env('APP_NAME') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">{{ strtoupper(substr(env('APP_NAME'), 0, 2)) }}</a>
    </div>
    <ul class="sidebar-menu">
        <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
        <li class="menu-header">CMS</li>
        <li class="{{ request()->is('admin/links') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.links') }}"><i class="fas fa-link"></i> <span>Link Management</span></a></li>
        {{--<li class="menu-header">Administration</li>
        <li><a class="nav-link" href="#"><i class="fas fa-users"></i> <span>User Management</span></a></li>--}}
        <li class="menu-header">Account</li>
        <li><a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
    </ul>
</aside>
