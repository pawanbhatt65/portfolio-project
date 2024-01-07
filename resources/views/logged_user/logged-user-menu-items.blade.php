<div class="row logged-user-header-row">
    <div class="col-12 header-col">
        <div class="logo">
            <a href="{{ route('dashboard') }}">pawanbhatt</a>
        </div>
        <div class="menu-item">
            <button class="bars" id="showMenuItem">
                <i class="fa-solid fa-bars"></i>
            </button>
            <ul class="menu" id="menuItem">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="menu-link">Dashboard</a>
                </li>
                <li class="{{ request()->routeIs('user.addItems') ? 'active' : '' }}">
                    <a href="{{ route('user.addItems') }}" class="menu-link">Add Items</a>
                </li>
                <li class="{{ request()->routeIs('user.itemsList') ? 'active' : '' }}">
                    <a href="{{ route('user.itemsList') }}" class="menu-link">List Items</a>
                </li>
                <li class="">
                    <a href="javascript:void(0)" class="menu-link updatePasswordBtn">Update Password</a>
                </li>
                <li class="">
                    <a href="{{ route('logout') }}" class="menu-link">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</div>
