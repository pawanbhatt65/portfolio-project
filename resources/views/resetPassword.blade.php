@extends('layout.layout')

@section('title')
    Reset-Password
@endsection

@section('contents')
    <section class="head-menu">
        <div class="container">
            @include('menu-item')

            <div class="backdrop reset-password-model-backdrop"></div>
            <div class="model reset-password-model login-form">
                <div class="model-inner">
                    <div class="model-main-box">
                        <form action="{{ route('resetPasswordPost') }}" method="POST" name="resetPasswordFormSubmitHandler">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->user_register_id }}">
                            <div class="form-group">
                                <label for="resetPasswordEmail">Email</label>
                                <input type="text" name="email" id="resetPasswordEmail" value="{{ $user->email }}"
                                    class="nameClass" readonly />
                                <span class="error" id="resetPasswordEmailError"></span>
                            </div>
                            <div class="form-group login-password-form-group">
                                <label for="resetPasswordPassword">Password</label>
                                <input type="password" name="password" id="resetPasswordPassword" class="nameClass" />
                                <span class="resetPassword-password-show-hide password-show-hide">
                                    <i class="fa-regular fa-eye"></i>
                                </span>
                                <span class="error" id="resetPasswordPasswordError"></span>
                            </div>
                            <div class="form-group login-password-form-group">
                                <label for="resetPasswordConfirmPassword">Confirm Password</label>
                                <input type="password" name="cPassword" id="resetPasswordConfirmPassword"
                                    class="nameClass" />
                                <span class="resetPassword-confirm-password-show-hide password-show-hide">
                                    <i class="fa-regular fa-eye"></i>
                                </span>
                                <span class="error" id="resetPasswordConfirmPasswordError"></span>
                            </div>
                            <div class="login-form-group-submit">
                                <button type="submit" name="" id="" class="btn resetPassword-submit-form">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @include('links')
        </div>
    </section>
@endsection

@section('scripts')
@endsection
