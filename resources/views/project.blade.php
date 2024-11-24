@extends('layout.layout')

@section('title')
    E-commerce
@endsection

@section('contents')
    <section class="about-section">
        <div class="container">
            @include('menu-item')

            {{-- e-commerce-section start --}}
            <div class="row">
                <div class="col-12">
                    <div class="e-commerce">
                        <h2 class="centered">E-commerce</h2>
                        <div class="login-signup">
                            <button type="button" class="btn lonInBtn">LogIn</button>
                            <button type="button" class="btn signUpBtn">SignUp</button>
                        </div>
                        <p class="forgot-password centered showForgotPasswordModel">
                            Forgot Password?
                        </p>
                    </div>
                </div>
            </div>
            {{-- e-commerce-section end --}}

            {{-- product-items-section-start --}}
            <div class="row equal-height margin-bottom-50 e-commerce-product-items">
                <div class="col-12">
                    <div class="skills-heading">
                        <ul class="product-items items-list">
                            <li>
                                <h2>Product Items</h2>
                            </li>
                            <li class="cartItems">
                                <i class="fa-solid fa-bag-shopping"></i>
                                <sup class="cart-quantity">0</sup>
                            </li>
                        </ul>
                    </div>
                </div>
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col-12 col-sm-6">
                            <div class="project-box">
                                <div class="project-img-box clickedProductDescription"
                                    data-product-id="{{ $product->product_id }}">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img"
                                        title="{{ $product->name }}">
                                    <div class="project-title">
                                        <p>{{ $product->name }}</p>
                                    </div>
                                </div>
                                <div class="about-project">
                                    <button type="button" class="btn">Buy Now</button>
                                    <button type="button" class="btn addToCart"
                                        data-product-id="{{ $product->product_id }}">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <h1 class="text-center">No product found yet!</h1>
                    </div>
                @endif
            </div>
            {{-- product-items-section-end --}}

            @include('links')
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        const loginRoute = "{{ route('logInECommerce') }}";
        const registerRoute = "{{ route('registerECommerce') }}";
    </script>

    <script src="{{ asset('assets/js/login-signup.js') }}" type="module"></script>
@endsection
