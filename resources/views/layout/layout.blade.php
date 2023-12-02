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
    {{-- title --}}
    <title>@yield('title')</title>
</head>

<body>
    @include('models.contactModel')
    @include('models.loginModel')
    @include('models.registerModel')
    @include('models.everyModel')
    @yield('contents')

    {{-- intl-tel-input js --}}
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
    <script src="{{ asset('assets/js/contact.js') }}" type="module"></script>
    <script src="{{ asset('assets/js/login-signup.js') }}" type="module"></script>
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    @yield('scripts')
</body>

</html>
