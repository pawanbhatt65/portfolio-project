@extends('layout.layout')

@section('title')
    List Of Items
@endsection

@section('contents')
    <section class="about-section">
        <div class="container logged-user-container">
            @include('logged_user/logged-user-menu-items')

            {{-- List-items-heading-section-start --}}
            {{-- <div class="row equal-height margin-bottom-50 e-commerce-product-items">
                <div class="col-12">
                    <div class="skills-heading">
                        <h2>List of Items</h2>
                        <a href="{{ route('user.restoreItems') }}">
                            <button type="button" class="btn">Restore</button>
                        </a>
                    </div>
                </div>
            </div> --}}
            {{-- product-items-section-end --}}

            {{-- List-items-row-start --}}
            <div class="row equal_height margin-bottom-50">
                <div class="col-12">
                    <div class="product-table">
                        @if (count($product_lists) > 0)
                            <table class="responsive-table">
                                <thead>
                                    <tr>
                                        <th>S.NO.</th>
                                        <th>Product ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_lists as $product)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $product->product_id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('user.editItems') . '?product_id=' . $product->product_id }}">
                                                    <button class="btn" title="Edit">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('user.deleteItems') . '?product_id=' . $product->product_id }}"
                                                    data-confirm-delete="true">
                                                    <button class="btn" title="Delete">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="no-product">
                                <h1>No product added yet!</h1>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{-- List-items-row-end --}}

            @include('logged_user/logged-user-links')
        </div>
    </section>
@endsection

@section('scripts')
@endsection
