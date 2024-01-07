<div class="backdrop updatePassword-model-backdrop"></div>
<div class="model updatePassword-contact-box login-form">
    <div class="model-inner">
        <div class="model-close closeUpdatePasswordModel">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="model-main-box">
            <form action="{{ route('user.updatePasswordSendMail') }}" class="" method="POST"
                name="updatePasswordFormSubmitHandler">
                @csrf
                <div class="form-group">
                    <label for="updatePasswordEmail">Email</label>
                    <input type="text" name="updatePasswordEmail" id="updatePasswordEmail" class="nameClass" />
                    <span class="error" id="updatePasswordEmailError"></span>
                </div>
                <div class="form-group login-password-form-group">
                    <label for="updateCurrentPassword">Current Password</label>
                    <input type="password" name="updateCurrentPassword" id="updateCurrentPassword" class="nameClass" />
                    <span class="update-current-password-show-hide password-show-hide">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                    <span class="error" id="updateCurrentPasswordError"></span>
                </div>
                <div class="form-group login-password-form-group">
                    <label for="updateNewPassword">New Password</label>
                    <input type="password" name="updateNewPassword" id="updateNewPassword" class="nameClass" />
                    <span class="update-new-password-show-hide password-show-hide">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                    <span class="error" id="updateNewPasswordError"></span>
                </div>
                <div class="form-group login-password-form-group">
                    <label for="confirmNewUpdatedPassword">Confirm New Password</label>
                    <input type="password" name="confirmNewUpdatedPassword" id="confirmNewUpdatedPassword"
                        class="nameClass" />
                    <span class="confirm-new-updated-password-show-hide password-show-hide">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                    <span class="error" id="confirmNewUpdatedPasswordError"></span>
                </div>
                <div class="login-form-group-submit">
                    <button type="submit" name="updatePasswordSubmitForm" id="updatePasswordSubmitForm"
                        class="btn updatePassword-submit-form">
                        Send Mail
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
