"use strict";

import { showModelHandler, closeModelHandler, emailChangeHandler, preventFormSubmitHandler, loginPasswordChangeHandler, passwordShowHideFunctionHandler, passwordChangeHandler, confirmPasswordChangeHandler } from "../formChangeHandler.js";

document.addEventListener("DOMContentLoaded", () =>{
    // body
    const body=document.body;

    const updatePasswordBtn=document.querySelector(".updatePasswordBtn");
    const updatePasswordModelBackdrop=document.querySelector(".updatePassword-model-backdrop");
    const updatePasswordContactBox=document.querySelector(".updatePassword-contact-box");
    const closeUpdatePasswordModel=document.querySelector(".closeUpdatePasswordModel");
    // open backdrop variable
    const menuItem=document.getElementById("menuItem");
    const bars=document.querySelector(".bars");
    // model variable
    const updatePasswordFormSubmitHandler=document.updatePasswordFormSubmitHandler;
    const updatePasswordEmail=document.getElementById("updatePasswordEmail");
    let updatePasswordEmailError=document.getElementById("updatePasswordEmailError");
    const updateCurrentPassword=document.getElementById("updateCurrentPassword");
    const updatedCurrentPasswordShowHide=document.querySelector(".update-current-password-show-hide");
    let updateCurrentPasswordError=document.getElementById("updateCurrentPasswordError");
    const updateNewPassword=document.getElementById("updateNewPassword");
    const updateNewPasswordShowHide=document.querySelector(".update-new-password-show-hide");
    let updateNewPasswordError=document.getElementById("updateNewPasswordError");
    const confirmNewUpdatedPassword=document.getElementById("confirmNewUpdatedPassword");
    const confirmNewPasswordShowHide=document.querySelector(".confirm-new-updated-password-show-hide");
    let confirmNewUpdatedPasswordError=document.getElementById("confirmNewUpdatedPasswordError");

    if(updatePasswordBtn) {
        updatePasswordBtn.addEventListener("click",function(event) {
            event.preventDefault();
            showModelHandler(updatePasswordModelBackdrop, updatePasswordContactBox)
            menuItem.classList.remove("active")
            bars.classList.remove("active")
            const barsI=bars.querySelector("i");
            if(bars.classList.contains("fa-xmark")|| barsI.classList.contains("fa-xmark")){
                barsI.classList.replace("fa-xmark", "fa-bars")
            }
        })
        closeUpdatePasswordModel.addEventListener("click", function() {
            closeModelHandler(body, updatePasswordModelBackdrop, updatePasswordContactBox)
        }, {passive: false})

        if(updatePasswordFormSubmitHandler) {
            updatePasswordEmail.addEventListener("keyup", emailChangeHandler.bind(updatePasswordEmailError));
            updateCurrentPassword.addEventListener("keyup", loginPasswordChangeHandler.bind(updateCurrentPasswordError))
            updatedCurrentPasswordShowHide.addEventListener("click", function() {
                passwordShowHideFunctionHandler(updateCurrentPassword, updatedCurrentPasswordShowHide)
            })
            updateNewPassword.addEventListener("keyup", passwordChangeHandler.bind(updateNewPasswordError))
            updateNewPasswordShowHide.addEventListener("click", function() {
                passwordShowHideFunctionHandler(updateNewPassword, updateNewPasswordShowHide)
            })
            confirmNewUpdatedPassword.addEventListener("keyup", function(event) {
                confirmPasswordChangeHandler(event, updateNewPassword, confirmNewUpdatedPasswordError)
            })
            confirmNewPasswordShowHide.addEventListener("click", function() {
                passwordShowHideFunctionHandler(confirmNewUpdatedPassword, confirmNewPasswordShowHide)
            })

            updatePasswordFormSubmitHandler.addEventListener("submit", function(event) {
                const updatePasswordEmail=this.updatePasswordEmail;
                const updateCurrentPassword=this.updateCurrentPassword;
                const updateNewPassword=this.updateNewPassword;
                const confirmNewUpdatedPassword=this.confirmNewUpdatedPassword;

                if(updatePasswordEmail.value.trim().length===0) {
                    preventFormSubmitHandler(updatePasswordEmail, updatePasswordEmailError.textContent="Please enter your email address!", event);
                    return false;
                } else if (updatePasswordEmailError.textContent) {
                    preventFormSubmitHandler(
                        updatePasswordEmail,
                        (updatePasswordEmailError.textContent =
                            "Please enter your valid email address!"),
                        event
                    );
                    return false;
                } else if (updateCurrentPassword.value.trim().length===0) {
                    preventFormSubmitHandler(
                        updateCurrentPassword,
                        (updateCurrentPasswordError.textContent =
                            "Please enter your current password!"),
                        event
                    );
                    return false;
                } else if (updateCurrentPasswordError.textContent) {
                    preventFormSubmitHandler(
                        updateCurrentPassword,
                        (updateCurrentPasswordError.textContent =
                            "Please enter your valid current password!"),
                        event
                    );
                    return false;
                } else if (updateNewPassword.value.trim().length===0) {
                    preventFormSubmitHandler(
                        updateNewPassword,
                        (updateNewPasswordError.textContent =
                            "Please enter your new password!"),
                        event
                    );
                    return false;
                } else if (updateNewPasswordError.textContent) {
                    preventFormSubmitHandler(
                        updateNewPassword,
                        (updateNewPasswordError.textContent =
                            "Please enter your valid password!"),
                        event
                    );
                    return false;
                } else if (confirmNewUpdatedPassword.value.trim().length===0) {
                    preventFormSubmitHandler(
                        confirmNewUpdatedPassword,
                        (confirmNewUpdatedPasswordError.textContent =
                            "Please enter your confirm password!"),
                        event
                    );
                    return false;
                } else if (confirmNewUpdatedPasswordError.textContent) {
                    preventFormSubmitHandler(
                        confirmNewUpdatedPassword,
                        (confirmNewUpdatedPasswordError.textContent =
                            "Please enter your valid password!"),
                        event
                    );
                    return false;
                } else {
                    return true;
                }
            })
        }
    }
})
