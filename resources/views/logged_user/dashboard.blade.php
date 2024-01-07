@extends('layout.layout')

@section('title')
    Dashboard
@endsection

@section('contents')
    <section class="about-section">
        <div class="container logged-user-container">
            @include('logged_user/logged-user-menu-items')

            {{-- product-items-section-start --}}
            <div class="row equal-height margin-bottom-50 e-commerce-product-items">
                <div class="col-12">
                    <div class="skills-heading">
                        <h2>Product Items</h2>
                    </div>
                </div>
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col-12 col-sm-6 col-md-3 col-lg-4">
                            <div class="project-box">
                                <div class="project-img-box clickedLoggedUserProductDescription"
                                    data-product-id="{{ $product->product_id }}">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img"
                                        title="{{ $product->name }}">
                                    <div class="project-title">
                                        <p>{{ $product->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="no-product">
                            <h1>No product found yet!</h1>
                        </div>
                    </div>
                @endif
            </div>
            {{-- product-items-section-end --}}

            @include('logged_user/logged-user-links')
        </div>
    </section>
@endsection

@section('scripts')
@endsection
