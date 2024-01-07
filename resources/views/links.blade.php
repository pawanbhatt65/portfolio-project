<div class="media-link">
    <ul class="media-icon-link">
        <li>
            <a href="https://github.com/pawanbhatt65" target="_blank" rel="no-referrer">
                <i class="fa-brands fa-github"></i>
            </a>
        </li>
        <li>
            <a href="https://www.linkedin.com/in/pawan-bhatt-72961511b/" target="_blank" rel="no-referrer">
                <i class="fa-brands fa-linkedin-in"></i>
            </a>
        </li>
    </ul>
</div>
<div class="arrow-btns">
    <ul class="arrow">
        <li>
            @if (url()->current() === route('home'))
            @elseif (url()->current() === route('about'))
                <a href="{{ route('home') }}">
                    <button class="arrow-left arrow-btn">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                </a>
            @elseif (url()->current() === route('eCommerce'))
                <a href="{{ route('about') }}">
                    <button class="arrow-left arrow-btn">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                </a>
            @elseif (url()->current() === route('contactUs'))
                <a href="{{ route('eCommerce') }}">
                    <button class="arrow-left arrow-btn">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                </a>
            @endif
        </li>
        <li>
            @if (url()->current() === route('home'))
                <a href="{{ route('about') }}">
                    <button class="arrow-right arrow-btn">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </a>
            @elseif (url()->current() === route('about'))
                <a href="{{ route('eCommerce') }}">
                    <button class="arrow-right arrow-btn">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </a>
            @elseif (url()->current() === route('eCommerce'))
                <a href="{{ route('contactUs') }}">
                    <button class="arrow-right arrow-btn">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </a>
            @elseif (url()->current() === route('contactUs'))
            @endif

        </li>
    </ul>
</div>
