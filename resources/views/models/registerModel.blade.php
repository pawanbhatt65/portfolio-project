<div class="backdrop register-model-backdrop"></div>
<div class="model register-contact-box login-form">
    <div class="model-inner">
        <div class="model-close closeRegisterModel">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="model-main-box">
            <form action="" class="" method="POST" name="registerFormSubmitHandler">
                @csrf
                <div class="form-group">
                    <label for="registerName">Name</label>
                    <input type="text" name="registerName" id="registerName" class="nameClass" />
                    <span class="error" id="registerNameError"></span>
                </div>
                <div class="form-group">
                    <label for="registerPhone">Phone</label>
                    <input type="text" name="registerPhone" id="registerPhone" maxlength="14" class="nameClass" />
                    <span class="error" id="registerPhoneError"></span>
                </div>
                <div class="form-group">
                    <label for="registerEmail">Email</label>
                    <input type="text" name="registerEmail" id="registerEmail" class="nameClass" />
                    <span class="error" id="registerEmailError"></span>
                </div>
                <div class="form-group login-password-form-group">
                    <label for="registerPassword">Password</label>
                    <input type="password" name="registerPassword" id="registerPassword" class="nameClass" />
                    <span class="register-password-show-hide password-show-hide">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                    <span class="error" id="registerPasswordError"></span>
                </div>
                <div class="form-group login-password-form-group">
                    <label for="registerConfirmPassword">Confirm Password</label>
                    <input type="password" name="registerConfirmPassword" id="registerConfirmPassword"
                        class="nameClass" />
                    <span class="register-confirm-password-show-hide password-show-hide">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                    <span class="error" id="registerConfirmPasswordError"></span>
                </div>
                <div class="login-form-group-submit">
                    <button type="submit" name="submitRegisterForm" id="submitRegisterForm"
                        class="btn register-submit-form">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
