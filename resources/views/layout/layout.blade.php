<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- css --}}
    {{-- intltelinpt css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    {{-- logged-user-css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/logged-user/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/logged-user/style.css') }}">
    {{-- title --}}
    <title>@yield('title')</title>
</head>

<body>
    @include('sweetalert::alert')
    @if (url()->current() === route('contactUs'))
        @include('models.contactModel')
    @endif
    @include('models.everyModel')
    @if (url()->current() === route('dashboard') ||
            url()->current() === route('user.itemsList') ||
            url()->current() === route('user.addItems') ||
            url()->current() === route('user.editItems'))
        @include('models.updatePasswordModel')
    @endif

    @if (url()->current() === route('dashboard') || url()->current() === route('eCommerce'))
        @include('models.showProductDescriptionModel')
    @endif

    @if (url()->current() === route('eCommerce'))
        @include('models.loginModel')
        @include('models.registerModel')
        @include('models.cartItemModel')
    @endif

    @if (url()->current() === route('eCommerce'))
        @include('models.forgotPasswordModel')
    @endif

    @yield('contents')

    {{-- intl-tel-input js --}}
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
    <script src="{{ asset('assets/js/contact.js') }}" type="module"></script>
    <script src="{{ asset('assets/js/login-signup.js') }}" type="module"></script>
    <script src="{{ asset('assets/js/loggedUser/add-items.js') }}" type="module"></script>
    <script src="{{ asset('assets/js/loggedUser/update-password.js') }}" type="module"></script>
    <script src="{{ asset('assets/js/show-product-description.js') }}" type="module"></script>
    <script src="{{ asset('assets/js/cart.js') }}" type="module"></script>

    @if (url()->current() === route('eCommerce') || url()->current() === route('resetPassword'))
        <script src="{{ asset('assets/js/forgot_password.js') }}" type="module"></script>
    @endif

    @yield('scripts')
</body>

</html>
