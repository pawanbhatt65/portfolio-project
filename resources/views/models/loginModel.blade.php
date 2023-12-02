<div class="backdrop login-model-backdrop"></div>
<div class="model login-contact-box login-form">
    <div class="model-inner">
        <div class="model-close closeLoginModel">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="model-main-box">
            <form action="" class="" method="POST" name="loginFormSubmitHandler">
                @csrf
                <div class="form-group">
                    <label for="loginEmail">Email</label>
                    <input type="text" name="loginEmail" id="loginEmail" class="nameClass" />
                    <span class="error" id="loginEmailError"></span>
                </div>
                <div class="form-group login-password-form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" name="loginPassword" id="loginPassword" class="nameClass" />
                    <span class="login-password-show-hide password-show-hide">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                    <span class="error" id="loginPasswordError"></span>
                </div>
                <div class="login-form-group-submit">
                    <button type="submit" name="submitLoginForm" id="submitLoginForm" class="btn login-submit-form">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
