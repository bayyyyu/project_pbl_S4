<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Navigation</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->is('Admin/Dashboard') ? 'active' : '' }}">
                    <x-layout.sidebar.menu-item url="Admin/Dashboard" label="Dashboard" icon="feather icon-home" />
                </li>
                <li class="{{ request()->is('Admin/Event*') ? 'active' : '' }}">
                    <x-layout.sidebar.menu-item url="Admin/Event" label="Event" icon="feather icon-calendar" />
                </li>
                <li class="{{ request()->is('Admin/Tanaman*') ? 'active' : '' }}">
                    <x-layout.sidebar.menu-item url="Admin/Tanaman" label="Penanaman" icon="fa fa-tree" />
                </li>
                <li class="{{ request()->is('Admin/User*') ? 'active' : '' }}">
                    <x-layout.sidebar.menu-item url="Admin/User" label="User" icon="feather icon-user" />
                </li>
            </ul>

        </div>
</nav>
