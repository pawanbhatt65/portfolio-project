import {
    showModelHandler,
    closeModelHandler,
    emailChangeHandler,
    loginPasswordChangeHandler,
    subjectChangeHandler,
    passwordShowHideFunctionHandler,
    preventFormSubmitHandler,
    nameChangeHandler,
    phoneChangeHandler,
    passwordChangeHandler,
    confirmPasswordChangeHandler,
    showEveryModelFunctionHandler,
} from "./formChangeHandler.js";

document.addEventListener("DOMContentLoaded", function () {
    // body
    const body = document.body;
    // login sign-up form show button variable
    const lonInBtn = document.querySelector(".lonInBtn");
    const signUpBtn = document.querySelector(".signUpBtn");

    // login model variable
    const logInModelBackdrop = document.querySelector(".login-model-backdrop");
    const logInContactBox = document.querySelector(".login-contact-box");
    const closeLoginModel = document.querySelector(".closeLoginModel");
    const loginFormSubmitHandler = document.loginFormSubmitHandler;
    const loginEmail = document.getElementById("loginEmail");
    let loginEmailError = document.getElementById("loginEmailError");
    const loginPassword = document.getElementById("loginPassword");
    let loginPasswordError = document.getElementById("loginPasswordError");
    const logInPasswordShowHide = document.querySelector(
        ".login-password-show-hide"
    );

    // signup / register model variable
    const registerModelBackdrop = document.querySelector(
        ".register-model-backdrop"
    );
    const registerModelContactBox = document.querySelector(
        ".register-contact-box"
    );
    const closeRegisterModel = document.querySelector(".closeRegisterModel");
    const registerFormSubmitHandler = document.registerFormSubmitHandler;
    const registerName = document.getElementById("registerName");
    let registerNameError = document.getElementById("registerNameError");
    const registerPhone = document.getElementById("registerPhone");
    let registerPhoneError = document.getElementById("registerPhoneError");
    const registerEmail = document.getElementById("registerEmail");
    let registerEmailError = document.getElementById("registerEmailError");
    const registerPassword = document.getElementById("registerPassword");
    let registerPasswordError = document.getElementById(
        "registerPasswordError"
    );
    const registerPasswordShowHide = document.querySelector(
        ".register-password-show-hide"
    );
    const registerConfirmPassword = document.getElementById(
        "registerConfirmPassword"
    );
    let registerConfirmPasswordError = document.getElementById(
        "registerConfirmPasswordError"
    );
    const registerConfirmPasswordShowHide = document.querySelector(
        ".register-confirm-password-show-hide"
    );

    // every model variable
    const everyModelBackDrop = document.querySelector(".every-model-backdrop");
    const everyModelBox = document.querySelector(".every-model-box");
    const closeEveryModelHandler = document.querySelectorAll(
        ".closeEveryModelHandler"
    );
    const everyModelHeading = document.querySelector(".everyModelHeading");

    // have login btn
    if (lonInBtn) {
        lonInBtn.addEventListener("click", function (event) {
            event.preventDefault();
            loginEmail.value = "";
            loginPassword.value = "";
            showModelHandler(logInModelBackdrop, logInContactBox);
        });
        closeLoginModel.addEventListener("click", function () {
            closeModelHandler(body, logInModelBackdrop, logInContactBox);
        });
        logInModelBackdrop.addEventListener("click", function () {
            closeModelHandler(body, logInModelBackdrop, logInContactBox);
        });
        // submit login form key up and submit function
        if (loginFormSubmitHandler) {
            loginEmail.addEventListener(
                "keyup",
                emailChangeHandler.bind(loginEmailError)
            );
            loginPassword.addEventListener(
                "keyup",
                loginPasswordChangeHandler.bind(loginPasswordError)
            );
            logInPasswordShowHide.addEventListener("click", function () {
                passwordShowHideFunctionHandler(
                    loginPassword,
                    logInPasswordShowHide
                );
            });
            // submit login form
            loginFormSubmitHandler.addEventListener(
                "submit",
                async function (event) {
                    const loginEmail = this.loginEmail;
                    const loginPassword = this.loginPassword;

                    if (loginEmail.value.trim().length === 0) {
                        preventFormSubmitHandler(
                            loginEmail,
                            (loginEmailError.textContent =
                                "Please enter your email address!"),
                            event
                        );
                        return false;
                    } else if (loginEmailError.textContent) {
                        preventFormSubmitHandler(
                            loginEmail,
                            (loginEmailError.textContent =
                                "Please enter your valid email address!"),
                            event
                        );
                        return false;
                    } else if (loginPassword.value.trim().length === 0) {
                        preventFormSubmitHandler(
                            loginPassword,
                            (loginPasswordError.textContent =
                                "Please enter your password!"),
                            event
                        );
                        return false;
                    } else if (loginPasswordError.textContent) {
                        preventFormSubmitHandler(
                            loginPassword,
                            (loginPasswordError.textContent =
                                "Please enter your valid password!"),
                            event
                        );
                        return false;
                    } else {
                        return;
                    }
                    // try {
                    //     let url = loginRoute;
                    //     let formData = new FormData(loginFormSubmitHandler);
                    //     const response = await fetch(url, {
                    //         method: "POST",
                    //         headers: {
                    //             Accept: "application/json",
                    //         },
                    //         body: formData,
                    //     });
                    //     // console.log(url);
                    //     if (response.ok) {
                    //         const data = await response.json();
                    //         // console.log(data)
                    //         if (data.message === "logged_in") {
                    //             closeModelHandler(
                    //                 body,
                    //                 logInModelBackdrop,
                    //                 logInContactBox
                    //             );
                    //             showEveryModelFunctionHandler(
                    //                 everyModelBackDrop,
                    //                 everyModelBox,
                    //                 (everyModelHeading.textContent =
                    //                     "User successfully logged in!")
                    //             );
                    //             // window.location.href=data.redirect_url;
                    //             console.log("User successfully logged in!");
                    //         } else if (
                    //             data.message === "password_not_matched"
                    //         ) {
                    //             event.preventDefault();
                    //             closeModelHandler(
                    //                 body,
                    //                 logInModelBackdrop,
                    //                 logInContactBox
                    //             );
                    //             showEveryModelFunctionHandler(
                    //                 everyModelBackDrop,
                    //                 everyModelBox,
                    //                 (everyModelHeading.textContent =
                    //                     "Password not matched!")
                    //             );
                    //             console.log("Password not matched!");
                    //         } else if (data.message === "email_verify") {
                    //             event.preventDefault();
                    //             closeModelHandler(
                    //                 body,
                    //                 logInModelBackdrop,
                    //                 logInContactBox
                    //             );
                    //             showEveryModelFunctionHandler(
                    //                 everyModelBackDrop,
                    //                 everyModelBox,
                    //                 (everyModelHeading.textContent =
                    //                     "Email not verified!")
                    //             );
                    //             console.log("Email not verified!");
                    //         } else if (data.message === "user_not_found") {
                    //             event.preventDefault();
                    //             closeModelHandler(
                    //                 body,
                    //                 logInModelBackdrop,
                    //                 logInContactBox
                    //             );
                    //             showEveryModelFunctionHandler(
                    //                 everyModelBackDrop,
                    //                 everyModelBox,
                    //                 (everyModelHeading.textContent =
                    //                     "User not register with us!")
                    //             );
                    //         } else {
                    //             event.preventDefault();
                    //             closeModelHandler(
                    //                 body,
                    //                 logInModelBackdrop,
                    //                 logInContactBox
                    //             );
                    //             showEveryModelFunctionHandler(
                    //                 everyModelBackDrop,
                    //                 everyModelBox,
                    //                 (everyModelHeading.textContent =
                    //                     "User not found 2!")
                    //             );
                    //         }
                    //     } else {
                    //         event.preventDefault();
                    //         console.error("server error: ");
                    //     }
                    // } catch (error) {
                    //     console.error("catch error: ", error.message);
                    // }
                }
            );
        }
    }

    // have sign up btn
    if (signUpBtn) {
        signUpBtn.addEventListener("click", function (event) {
            event.preventDefault();
            showModelHandler(registerModelBackdrop, registerModelContactBox);
        });
        closeRegisterModel.addEventListener("click", function () {
            closeModelHandler(
                body,
                registerModelBackdrop,
                registerModelContactBox
            );
        });
        registerModelBackdrop.addEventListener("click", function () {
            closeModelHandler(
                body,
                registerModelBackdrop,
                registerModelContactBox
            );
        });
        // register submit form key up and submit function
        if (registerFormSubmitHandler) {
            // phone add country flag and code
            window.intlTelInput(registerPhone, {
                separateDialCode: false, // if separateDialCode is false then show country code in placeholder
                initialCountry: "in",
                nationalMode: false,
                preferredCountries: ["in"],
                utilsScript:
                    "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
            });
            // key up validation
            registerName.addEventListener(
                "keyup",
                nameChangeHandler.bind(registerNameError)
            );
            registerPhone.addEventListener(
                "keyup",
                phoneChangeHandler.bind(registerPhoneError)
            );
            registerEmail.addEventListener(
                "keyup",
                emailChangeHandler.bind(registerEmailError)
            );
            registerPasswordShowHide.addEventListener("click", function () {
                passwordShowHideFunctionHandler(
                    registerPassword,
                    registerPasswordShowHide
                );
            });
            registerConfirmPasswordShowHide.addEventListener(
                "click",
                function () {
                    passwordShowHideFunctionHandler(
                        registerConfirmPassword,
                        registerConfirmPasswordShowHide
                    );
                }
            );
            registerPassword.addEventListener(
                "keyup",
                passwordChangeHandler.bind(registerPasswordError)
            );
            registerConfirmPassword.addEventListener("keyup", function (event) {
                confirmPasswordChangeHandler(
                    event,
                    registerPassword,
                    registerConfirmPasswordError
                );
            });
            // close every model handler
            closeEveryModelHandler.forEach((closeBtn) => {
                closeBtn.addEventListener("click", function () {
                    closeModelHandler(body, everyModelBackDrop, everyModelBox);
                });
            });
            // register form submit handler
            registerFormSubmitHandler.addEventListener(
                "submit",
                async function (event) {
                    event.preventDefault();
                    const registerName = this.registerName;
                    const registerPhone = this.registerPhone;
                    const registerEmail = this.registerEmail;
                    const registerPassword = this.registerPassword;
                    const registerConfirmPassword =
                        this.registerConfirmPassword;
                    everyModelHeading.textContent = "";

                    if (registerName.value.trim().length === 0) {
                        preventFormSubmitHandler(
                            registerName,
                            (registerNameError.textContent =
                                "Please enter your name!"),
                            event
                        );
                        return false;
                    } else if (registerNameError.textContent) {
                        preventFormSubmitHandler(
                            registerName,
                            (registerNameError.textContent =
                                "Please enter your valid name!"),
                            event
                        );
                        return false;
                    } else if (registerPhone.value.trim().length === 0) {
                        preventFormSubmitHandler(
                            registerPhone,
                            (registerPhoneError.textContent =
                                "Please enter your phone number with country code!"),
                            event
                        );
                        return false;
                    } else if (registerPhoneError.textContent) {
                        preventFormSubmitHandler(
                            registerPhone,
                            (registerPhoneError.textContent =
                                "Please enter your valid phone number with country code!"),
                            event
                        );
                        return false;
                    } else if (registerEmail.value.trim().length === 0) {
                        preventFormSubmitHandler(
                            registerEmail,
                            (registerEmailError.textContent =
                                "Please enter your email address!"),
                            event
                        );
                        return false;
                    } else if (registerEmailError.textContent) {
                        preventFormSubmitHandler(
                            registerEmail,
                            (registerEmailError.textContent =
                                "Please enter your valid email address!")
                        );
                        return false;
                    } else if (registerPassword.value.trim().length === 0) {
                        preventFormSubmitHandler(
                            registerPassword,
                            (registerPasswordError.textContent =
                                "Please enter your password!"),
                            event
                        );
                        return false;
                    } else if (registerPasswordError.textContent) {
                        preventFormSubmitHandler(
                            registerPassword,
                            (registerPasswordError.textContent =
                                "Please enter your valid password!"),
                            event
                        );
                        return false;
                    } else if (
                        registerConfirmPassword.value.trim().length === 0
                    ) {
                        preventFormSubmitHandler(
                            registerConfirmPassword,
                            (registerConfirmPasswordError.textContent =
                                "Please enter your confirm password!"),
                            event
                        );
                        return false;
                    } else if (registerConfirmPasswordError.textContent) {
                        preventFormSubmitHandler(
                            registerConfirmPassword,
                            (registerConfirmPasswordError.textContent =
                                "Password and Confirm Password be matched!"),
                            event
                        );
                        return false;
                    }

                    try {
                        let data = new FormData(registerFormSubmitHandler);
                        const url = registerRoute;
                        // console.log("url is: ", url)
                        // debugger;

                        const response = await fetch(url, {
                            method: "POST",
                            headers: {
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": document
                                    .querySelector("meta[name='csrf-token']")
                                    .getAttribute("content"),
                            },
                            body: data,
                        });

                        if (!response.ok) {
                            const errorData=await response.json();
                            // console.log("error data is: ", errorData)
                            closeModelHandler(
                                body,
                                registerModelBackdrop,
                                registerModelContactBox
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

                        const dataResponse = await response.json();
                        if (dataResponse.message === "mail_send") {
                            closeModelHandler(
                                body,
                                registerModelBackdrop,
                                registerModelContactBox
                            );
                            showEveryModelFunctionHandler(
                                everyModelBackDrop,
                                everyModelBox,
                                (everyModelHeading.textContent =
                                    "Registration has been successful verify your email!")
                            );
                        } else if (
                            dataResponse.message === "user_data_not_saved"
                        ) {
                            closeModelHandler(
                                body,
                                registerModelBackdrop,
                                registerModelContactBox
                            );
                            showEveryModelFunctionHandler(
                                everyModelBackDrop,
                                everyModelBox,
                                (everyModelHeading.textContent =
                                    "User data not saved!")
                            );
                        } else if (
                            dataResponse.message === "already_register"
                        ) {
                            closeModelHandler(
                                body,
                                registerModelBackdrop,
                                registerModelContactBox
                            );
                            showEveryModelFunctionHandler(
                                everyModelBackDrop,
                                everyModelBox,
                                (everyModelHeading.textContent =
                                    "You are already registered with us!")
                            );
                        } else {
                            closeModelHandler(
                                body,
                                registerModelBackdrop,
                                registerModelContactBox
                            );
                            showEveryModelFunctionHandler(
                                everyModelBackDrop,
                                everyModelBox,
                                (everyModelHeading.textContent =
                                    "Something want wrong!")
                            );
                        }
                    } catch (error) {
                        closeModelHandler(
                            body,
                            registerModelBackdrop,
                            registerModelContactBox
                        );
                        showEveryModelFunctionHandler(
                            everyModelBackDrop,
                            everyModelBox,
                            everyModelHeading.textContent = error.message
                        );
                        // console.error("Error:", error.message);
                    }
                }
            );
        }
    }
});
