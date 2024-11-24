<div class="backdrop forgotPassword-model-backdrop"></div>
<div class="model forgotPassword-contact-box login-form">
    <div class="model-inner">
        <div class="model-close closeForgotPasswordModel">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="model-main-box">
            <form action="{{ route('forgotPassword') }}" method="POST" name="forgotPasswordFormSubmitHandler">
                @csrf
                <div class="form-group">
                    <label for="forgotPasswordEmail">Email</label>
                    <input type="text" name="email" id="forgotPasswordEmail" class="nameClass" />
                    <span class="error" id="forgotPasswordEmailError"></span>
                </div>
                <div class="login-form-group-submit">
                    <button type="submit" name="" id="" class="btn forgotPassword-submit-form">
                        Send Mail
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
