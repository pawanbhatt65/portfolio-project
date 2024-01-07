<div class="row">
    <div class="col-12 header-col">
        <div class="logo">
            <a href="{{ route('home') }}">pawanbhatt</a>
        </div>
        <div class="menu-item">
            <button class="bars" id="showMenuItem">
                <i class="fa-solid fa-bars"></i>
            </button>
            <ul class="menu" id="menuItem">
                <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                    <a href="{{ route('about') }}" class="menu-link">About</a>
                </li>
                <li class="{{ request()->routeIs('eCommerce') ? 'active' : '' }}">
                    <a href="{{ route('eCommerce') }}" class="menu-link">Products</a>
                </li>
                <li class="{{ request()->routeIs('contactUs') ? 'active' : '' }}">
                    <a href="{{ route('contactUs') }}" class="menu-link">Contact Us</a>
                </li>
            </ul>
            <div class="link-git">
                <p><a href="https://github.com/pawanbhatt65" target="_blank">Follow On GitHub</a></p>
            </div>
        </div>
    </div>
</div>
