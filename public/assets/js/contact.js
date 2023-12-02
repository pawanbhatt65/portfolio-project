// import the function
import {
    nameChangeHandler,
    phoneChangeHandler,
    emailChangeHandler,
    subjectChangeHandler,
    successSubmitHandlerFunction,
    showModelHandler,
    closeModelHandler,
} from "./formChangeHandler.js";

("use strict");
document.addEventListener("DOMContentLoaded", function () {
    const body = document.body;
    // contact form email
    const contactFormSubmitHandler = document.contactFormSubmitHandler;
    const name = document.getElementById("name");
    let nameError = document.getElementById("nameError");
    const phone = document.getElementById("phone");
    let phoneError = document.getElementById("phoneError");
    const email = document.getElementById("email");
    let emailError = document.getElementById("emailError");
    const subject = document.getElementById("subject");
    let subjectError = document.getElementById("subjectError");
    const message = document.getElementById("message");
    let messageError = document.getElementById("messageError");
    let count = document.getElementById("count");
    const formGroupMessage = document.querySelector(".form-group-message");

    // contactModel.blade.php variable
    const contactModelBackdrop = document.querySelector(
        ".contact--model-backdrop"
    );
    const contactModelBox = document.querySelector(".contact-model-box");
    const modelCloseBtn = document.querySelectorAll(".model-close-btn");

    if (contactFormSubmitHandler) {
        window.intlTelInput(phone, {
            initialCountry: "NO", // initial country default value is US.
            separateDialCode: false, // separate dial code is true the show country code beside the country flag
            initialCountry: "in", // initial country is India
            nationalMode: false,
            preferredCountries: ["in"],
            utilsScript:
                "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
        });

        // input or textarea keyup validation
        name.addEventListener("keyup", nameChangeHandler.bind(nameError), {
            passive: false,
        });
        phone.addEventListener("keyup", phoneChangeHandler.bind(phoneError), {
            passive: false,
        });
        email.addEventListener("keyup", emailChangeHandler.bind(emailError), {
            passive: false,
        });
        subject.addEventListener(
            "keyup",
            function (event) {
                subjectChangeHandler.call(
                    subjectError,
                    null,
                    event,
                    "Please enter your subject"
                );
            },
            { passive: false }
        );
        message.addEventListener(
            "keyup",
            function (event) {
                subjectChangeHandler.call(
                    messageError,
                    formGroupMessage,
                    event,
                    "Please enter your message!"
                );
            },
            { passive: false }
        );

        // text area limit validation
        let limit = 500;
        count.textContent = 0 + "/" + limit;
        message.addEventListener("input", () => {
            let countValue = message.value.length;
            count.textContent = countValue + "/" + limit;
            if (countValue >= limit) {
                count.style.color = "#f91313";
            } else {
                count.style.color = "#fff";
            }
        });

        // click model close btn
        modelCloseBtn.forEach((btn) => {
            btn.addEventListener(
                "click",
                function(){
                    closeModelHandler(body, contactModelBackdrop, contactModelBox)
                }
            );
        });

        // contact form submit validation
        contactFormSubmitHandler.addEventListener(
            "submit",
            successSubmitHandlerFunction
        );
    }
});
