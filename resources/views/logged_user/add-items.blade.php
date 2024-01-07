@extends('layout.layout')

@section('title')
    Add Items
@endsection

@section('contents')
    <section class="about-section">
        <div class="container logged-user-container">
            @include('logged_user/logged-user-menu-items')

            {{-- add-items-heading-section-start --}}
            <div class="row equal-height margin-bottom-50 e-commerce-product-items">
                <div class="col-12">
                    <div class="skills-heading">
                        <h2>Add Items</h2>
                    </div>
                </div>
            </div>
            {{-- product-items-section-end --}}

            {{-- add-items-row-start --}}
            <div class="row equal-height margin-bottom-50">
                <div class="col-12">
                    <div class="items-row">
                        <form method="POST" action="{{ route('user.storeItems') }}" class="form-tag added-items-form"
                            name="addItemForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="itemName">Name</label>
                                <input type="text" name="itemName" id="itemName" class="nameClass"
                                    value="{{ old('itemName') }}" />
                                <span class="error" id="itemNameError"></span>
                            </div>
                            <div class="form-group">
                                <label for="itemPrice">Price</label>
                                <input type="text" name="itemPrice" id="itemPrice" class="nameClass"
                                    value="{{ old('itemPrice') }}" />
                                <span class="error" id="itemPriceError"></span>
                            </div>
                            <div class="form-group form-image">
                                <label for="itemImage">Image</label>
                                <input type="file" name="itemImage" id="itemImage" class="nameClass" />
                                <span class="error" id="itemImageError"></span>
                            </div>
                            <div class="form-group-message">
                                <label for="itemDescription">Description</label>
                                <textarea name="itemDescription" id="itemDescription" class="nameClass messageTextarea">{{ old('itemDescription') }}</textarea>
                                <span class="error" id="itemDescriptionError"></span>
                            </div>
                            <div class="form-group-submit">
                                <button type="submit" class="btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- add-items-row-end --}}

            @include('logged_user/logged-user-links')
        </div>
    </section>
@endsection

@section('scripts')
@endsection
