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
                        <p class="forgot-password centered">Forgot Password?</p>
                    </div>
                </div>
            </div>
            {{-- e-commerce-section end --}}

            {{-- product-items-section-start --}}
            <div class="row equal-height margin-bottom-50 e-commerce-product-items">
                <div class="col-12">
                    <div class="skills-heading">
                        <h2>Product Items</h2>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/findnest.png') }}" alt="FindNest" class="img"
                                title="FindNest">
                            <div class="project-title">
                                <p>FindNest</p>
                            </div>
                        </div>
                        <div class="about-project">
                            <button type="button" class="btn">Buy Now</button>
                            <button type="button" class="btn">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/findnest.png') }}" alt="FindNest" class="img"
                                title="FindNest">
                            <div class="project-title">
                                <p>FindNest</p>
                            </div>
                        </div>
                        <div class="about-project">
                            <button type="button" class="btn">Buy Now</button>
                            <button type="button" class="btn">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/findnest.png') }}" alt="FindNest" class="img"
                                title="FindNest">
                            <div class="project-title">
                                <p>FindNest</p>
                            </div>
                        </div>
                        <div class="about-project">
                            <button type="button" class="btn">Buy Now</button>
                            <button type="button" class="btn">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="project-box">
                        <div class="project-img-box">
                            <img src="{{ asset('assets/images/findnest.png') }}" alt="FindNest" class="img"
                                title="FindNest">
                            <div class="project-title">
                                <p>FindNest</p>
                            </div>
                        </div>
                        <div class="about-project">
                            <button type="button" class="btn">Buy Now</button>
                            <button type="button" class="btn">Add to Cart</button>
                        </div>
                    </div>
                </div>
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
