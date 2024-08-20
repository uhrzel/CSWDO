@auth
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <!-- Sidebar Brand -->
        <div class="sidebar-brand">
            <a href="/home">CSWDO - RMS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/home">
                <img src="{{ asset('img/cswdopnglogo.png') }}" class="logo h-10 w-10" alt="Logo">
            </a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('home') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @if (Auth::user()->role == 'admin')
            <li class="menu-header">Case Listing</li>
            <li class="{{ Request::is('admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin') }}"><i class="fas fa-user-shield"></i> <span>Case Listing</span></a>
            </li>
            @endif
            <!-- profile ganti password -->
            <li class="menu-header">Profile</li>
            <li class="{{ Request::is('profile/edit') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/edit') }}"><i class="far fa-user"></i> <span>Profile</span></a>
            </li>
            <li class="{{ Request::is('profile/change-password') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/change-password') }}"><i class="fas fa-key"></i> <span>Change Password</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('blank-page') }}"><i class="far fa-square"></i> <span>Blank Page</span></a>
            </li>
        </ul>
    </aside>
</div>
@endauth