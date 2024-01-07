@extends('layout.layout')

@section('title')
    Edit Items
@endsection

@section('contents')
    <section class="about-section">
        <div class="container logged-user-container">
            @include('logged_user/logged-user-menu-items')

            {{-- Edit-items-heading-section-start --}}
            <div class="row equal-height margin-bottom-50 e-commerce-product-items">
                <div class="col-12">
                    <div class="skills-heading">
                        <h2>Edit Items</h2>
                    </div>
                </div>
            </div>
            {{-- product-items-section-end --}}

            {{-- Edit-items-row-start --}}
            <div class="row equal-height margin-bottom-50">
                <div class="col-12">
                    <div class="items-row">
                        <form method="POST" action="{{ route('user.updateItems') }}" class="form-tag added-items-form"
                            name="editItemForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="editItemProductId" value="{{ $product->product_id }}">
                            <div class="form-group">
                                <label for="itemName">Name</label>
                                <input type="text" name="itemName" id="editItemName" class="nameClass"
                                    value="{{ $product->name }}" />
                                <span class="error" id="editItemNameError"></span>
                            </div>
                            <div class="form-group">
                                <label for="itemPrice">Price</label>
                                <input type="text" name="itemPrice" id="editItemPrice" class="nameClass"
                                    value="{{ $product->price }}" />
                                <span class="error" id="editItemPriceError"></span>
                            </div>
                            <div class="form-group form-image">
                                <label for="itemImage">Image</label>
                                <input type="file" name="itemImage" id="editItemImage" value="{{ $product->image }}"
                                    class="nameClass" />
                                <span class="error" id="editItemImageError"></span>
                            </div>
                            <div class="form-group-message">
                                <label for="itemDescription">Description</label>
                                <textarea name="itemDescription" id="editItemDescription" class="nameClass messageTextarea">{{ $product->description }}</textarea>
                                <span class="error" id="editItemDescriptionError"></span>
                            </div>
                            <div class="form-group-submit">
                                <button type="submit" class="btn">Update It</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- edit-items-row-end --}}

            @include('logged_user/logged-user-links')
        </div>
    </section>
@endsection

@section('scripts')
@endsection
