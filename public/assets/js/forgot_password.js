import {closeModelHandler, confirmPasswordChangeHandler, emailChangeHandler, passwordChangeHandler, passwordShowHideFunctionHandler, preventFormSubmitHandler, showEveryModelFunctionHandler, showModelHandler} from './formChangeHandler.js';

"use strict"

document.addEventListener("DOMContentLoaded", function() {
    // body
    const body=document.body;

    // when click this variable show forgot password model
    const showForgotPasswordModel_elm=document.querySelector(".showForgotPasswordModel")
    const backdrop_elm=document.querySelector(".forgotPassword-model-backdrop")
    const model_elm=document.querySelector(".forgotPassword-contact-box")
    const closeForgotPasswordModel_elm=document.querySelector(".closeForgotPasswordModel")

    // form variable
        const forgotPasswordEmail_elm=document.getElementById("forgotPasswordEmail");
        let forgotPasswordEmailError_elm=document.getElementById("forgotPasswordEmailError");

    // model form
    const forgotPasswordFormSubmitHandler_elm=document.forgotPasswordFormSubmitHandler;

    // every model variable
    const everyModelBackDrop = document.querySelector(".every-model-backdrop");
    const everyModelBox = document.querySelector(".every-model-box");
    const closeEveryModelHandler = document.querySelectorAll(
        ".closeEveryModelHandler"
    );
    const everyModelHeading = document.querySelector(".everyModelHeading");

    // resetPassword.blade.php variable
    const resetPasswordFormSubmitHandler_elm=document.resetPasswordFormSubmitHandler;
    const resetPasswordEmail_elm=document.getElementById("resetPasswordEmail");
    let resetPasswordEmailError_elm=document.getElementById("resetPasswordEmailError");
    const resetPasswordPassword_elm=document.getElementById("resetPasswordPassword");
    const resetPasswordPasswordShowHide=document.querySelector(".resetPassword-password-show-hide");
    let resetPasswordPasswordError_elm=document.getElementById("resetPasswordPasswordError");
    const resetPasswordConfirmPassword_elm=document.getElementById("resetPasswordConfirmPassword");
    const resetPasswordConfirmPasswordShowHide=document.querySelector(".resetPassword-confirm-password-show-hide");
    let resetPasswordConfirmPasswordError_elm=document.getElementById("resetPasswordConfirmPasswordError");

    // click variable: show forgot password model
    if (showForgotPasswordModel_elm) {
        showForgotPasswordModel_elm.addEventListener("click", function(event) {
            showModelHandler(backdrop_elm, model_elm)
            forgotPasswordEmail_elm.value="";
        })
    }
    // click close button
    if (closeForgotPasswordModel_elm) {
        closeForgotPasswordModel_elm.addEventListener("click", function() {
            closeModelHandler(body, backdrop_elm, model_elm)
        })
    }
    // close every model handler
    closeEveryModelHandler.forEach((closeBtn) => {
        closeBtn.addEventListener("click", function () {
            closeModelHandler(body, everyModelBackDrop, everyModelBox);
        });
    });
    // when model form is available
    if (forgotPasswordFormSubmitHandler_elm) {
        // email input box key up
        forgotPasswordEmail_elm.addEventListener("keyup", emailChangeHandler.bind(forgotPasswordEmailError_elm));

        // when the form is submit
        forgotPasswordFormSubmitHandler_elm.addEventListener("submit", async function(event) {
            event.preventDefault();
            const email=event.target.email;
            const url=event.target.getAttribute("action");
            // console.log("URL is: ", url)

            if (email.value.trim().length===0) {
                preventFormSubmitHandler(
                    forgotPasswordEmail_elm,
                    (forgotPasswordEmailError_elm.textContent =
                        "Please enter your email!"),
                    event
                );
                return false;
            } else if (forgotPasswordEmailError_elm.textContent) {
                preventFormSubmitHandler(
                    forgotPasswordEmail_elm,
                    (forgotPasswordEmailError_elm.textContent =
                        "Please enter your valid email!"),
                    event
                );
                return false;
            } else {
                try {
                    let fileData=new FormData();
                    fileData.append("email", email.value);

                    const response=await fetch(url, {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": document
                                .querySelector("meta[name='csrf-token']")
                                .getAttribute("content"),
                        },
                        body: fileData,
                    });

                    if (!response.ok) {
                        const errorData=await response.json();
                        // console.log("error data is: ", errorData)
                        closeModelHandler(
                            body,backdrop_elm, model_elm
                        );
                        showEveryModelFunctionHandler(
                            everyModelBackDrop,
                            everyModelBox,
                            everyModelHeading.textContent = errorData.message
                        );
                        throw new Error(
                            "Response not okay!",
                            response.statusText
                        );
                    }

                    const data = await response.json();
                    // console.log(data.message);
                    if (data.message==='error') {
                        closeModelHandler(
                            body,backdrop_elm, model_elm
                        );
                        showEveryModelFunctionHandler(
                            everyModelBackDrop,
                            everyModelBox,
                            everyModelHeading.textContent = 'User not registered with us!'
                        );
                    }
                    if (data.message==='success') {
                        closeModelHandler(
                            body,backdrop_elm, model_elm
                        );
                        showEveryModelFunctionHandler(
                            everyModelBackDrop,
                            everyModelBox,
                            everyModelHeading.textContent = 'Forgot password mail send successfully!'
                        );
                    }
                } catch (error) {
                    console.log("server error: ", error);
                }
            }
        })
    }

    // resetPassword.blade.php function handler
    if (resetPasswordFormSubmitHandler_elm) {
        resetPasswordEmail_elm.addEventListener("keyup", emailChangeHandler.bind(resetPasswordEmailError_elm));
        resetPasswordPassword_elm.addEventListener(
            "keyup",
            passwordChangeHandler.bind(resetPasswordPasswordError_elm)
        )
        resetPasswordPasswordShowHide.addEventListener("click", function () {
            passwordShowHideFunctionHandler(
                resetPasswordPassword_elm,
                resetPasswordPasswordShowHide
            );
        });
        resetPasswordConfirmPassword_elm.addEventListener("keyup", function (event) {
            confirmPasswordChangeHandler(
                event,
                resetPasswordPassword_elm,
                resetPasswordConfirmPasswordError_elm
            );
        });
        resetPasswordConfirmPasswordShowHide.addEventListener(
            "click",
            function () {
                passwordShowHideFunctionHandler(
                    resetPasswordConfirmPassword_elm,
                    resetPasswordConfirmPasswordShowHide
                );
            }
        );
        // while reset password form submit
        resetPasswordFormSubmitHandler_elm.addEventListener("submit", async event=> {
            event.preventDefault();
            const id=event.target.id.value;
            const email=event.target.email.value;
            const password=event.target.password.value;
            const cPassword=event.target.cPassword.value;

            const url=event.target.getAttribute("action");

            if (email.trim().length === 0) {
                preventFormSubmitHandler(
                    resetPasswordEmail_elm,
                    (resetPasswordEmailError_elm.textContent =
                        "Please enter your email address!"),
                    event
                );
                return false;
            } else if (resetPasswordEmailError_elm.textContent) {
                preventFormSubmitHandler(
                    resetPasswordEmail_elm,
                    (resetPasswordEmailError_elm.textContent =
                        "Please enter your valid email address!"), event
                );
                return false;
            } else if (password.trim().length === 0) {
                preventFormSubmitHandler(
                    resetPasswordPassword_elm,
                    (resetPasswordPasswordError_elm.textContent =
                        "Please enter your password!"),
                    event
                );
                return false;
            } else if (resetPasswordPasswordError_elm.textContent) {
                preventFormSubmitHandler(
                    resetPasswordPassword_elm,
                    (resetPasswordPasswordError_elm.textContent =
                        "Please enter your valid password!"),
                    event
                );
                return false;
            } else if (cPassword.trim().length === 0) {
                preventFormSubmitHandler(
                    resetPasswordConfirmPassword_elm,
                    (resetPasswordConfirmPasswordError_elm.textContent =
                        "Please enter your confirm password!"),
                    event
                );
                return false;
            } else if (resetPasswordConfirmPasswordError_elm.textContent) {
                preventFormSubmitHandler(
                    resetPasswordConfirmPassword_elm,
                    (resetPasswordConfirmPasswordError_elm.textContent =
                        "Password and Confirm Password be matched!"),
                    event
                );
                return false;
            }

            event.target.submit();

            // try {
            //     let formData=new FormData();
            //     formData.append("id", id);
            //     formData.append("email", email);
            //     formData.append("password", password);
            //     formData.append("cPassword", cPassword);

            //     let response=await fetch(url, {
            //         method: "POST",
            //         headers: {
            //             "X-Requested-With": "XMLHttpRequest",
            //             "X-CSRF-TOKEN": document
            //                 .querySelector("meta[name='csrf-token']")
            //                 .getAttribute("content"),
            //         },
            //         body: formData,
            //     });

            //     if (!response.ok) {
            //         const errorData=await response.json();
            //         // console.log("error data is: ", errorData)
            //         showEveryModelFunctionHandler(
            //             everyModelBackDrop,
            //             everyModelBox,
            //             everyModelHeading.textContent = errorData.message
            //         );
            //         throw new Error(
            //             "Response not okay!",
            //             response.statusText
            //         );
            //     }

            //     const data = await response.json();
            //     console.log(data.message);
            // } catch (error) {
            //     console.log("Server error: ", error)
            // }
        })
    }
})
