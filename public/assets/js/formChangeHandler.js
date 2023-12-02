// body
const body = document.body;
// contactModel.blade.php variable
const contactModelBackdrop = document.querySelector(".contact--model-backdrop");
const contactModelBox = document.querySelector(".contact-model-box");

// name change handler function
export const nameChangeHandler = function (event) {
    const nameValue = event.target.value;
    const nameRegex = /^[a-zA-Z\s]+$/;
    if (nameValue.trim().length === 0) {
        this.textContent = "Please enter your name!";
    } else if (!nameRegex.test(nameValue)) {
        this.textContent = "Please enter only letters";
    } else {
        this.textContent = "";
    }
};

// phone change handler function
export const phoneChangeHandler = function (event) {
    const phoneValue = event.target.value;
    const phoneRegEx = /^\+[1-9]{1}[0-9]{3,14}$/;

    if (phoneValue.trim().length === 0) {
        this.textContent = "Please enter your phone number with country code!";
    } else if (phoneValue.length < 7 || phoneValue.length > 14) {
        this.textContent =
            "Please enter your number between 7 and 14 digits with country code!";
    } else if (!phoneRegEx.test(phoneValue)) {
        this.textContent = "Please enter only number and plus(+)!";
    } else {
        this.textContent = "";
    }
};

// email change handler function
export const emailChangeHandler = function (event) {
    const emailValue = event.target.value;
    const emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
    if (emailValue.trim().length === 0) {
        this.textContent = "Please enter your email address!";
    } else if (!emailRegEx.test(emailValue)) {
        this.textContent = "Please enter your valid email address!";
    } else {
        this.textContent = "";
    }
};

// subject change handler function
export const subjectChangeHandler = function (formGroup, event, errorMessage) {
    const subjectValue = event.target.value;
    if (subjectValue.trim().length === 0) {
        this.textContent = errorMessage;
        if (formGroup) {
            formGroup.classList.add("active");
        }
    } else {
        this.textContent = "";
        if (formGroup) {
            formGroup.classList.remove("active");
        }
    }
};

// login password change handler function
export const loginPasswordChangeHandler=function(event){
    const passwordValue=event.target.value;
    if(passwordValue.trim().length===0){
        this.textContent="Please enter your password!";
    } else if (passwordValue.trim().length <= 8){
        this.textContent="Password must be 8 character!";
    }else {
        this.textContent="";
    }
}

// show model functionality
export const showModelHandler = function (backdrop, model) {
    backdrop.classList.add("active");
    model.classList.add("active");
    body.style.overflow = "hidden";
};

// close model handler function
export const closeModelHandler = function (modelBody, backdrop, model) {
    modelBody.style.overflow = "scroll";
    backdrop.classList.remove("active");
    model.classList.remove("active");
};

// contact form submit handler prevent
export const preventFormSubmitHandler = function (input, error, event) {
    input.focus();
    error;
    event.preventDefault();
};

// contact form submit handler function
export const successSubmitHandlerFunction = function (event) {
    const name = this.name;
    const phone = this.phone;
    const email = this.email;
    const subject = this.subject;
    const message = this.message;
    if (name.value.trim().length === 0) {
        preventFormSubmitHandler(
            name,
            (nameError.textContent = "Please enter your name!"),
            event
        );
        return false;
    } else if (nameError.textContent) {
        preventFormSubmitHandler(
            name,
            (nameError.textContent = "Please enter your valid name!"),
            event
        );
        return false;
    } else if (phone.value.trim().length === 0) {
        preventFormSubmitHandler(
            phone,
            (phoneError.textContent =
                "Please enter your phone number with country code!"),
            event
        );
        return false;
    } else if (phoneError.textContent) {
        preventFormSubmitHandler(
            phone,
            (phoneError.textContent =
                "Please enter your valid phone number with country code!"),
            event
        );
        return false;
    } else if (email.value.trim().length == 0) {
        preventFormSubmitHandler(
            email,
            (emailError.textContent = "Please enter your email!"),
            event
        );
        return false;
    } else if (emailError.textContent) {
        preventFormSubmitHandler(
            email,
            (emailError.textContent = "Please enter your valid email address"),
            event
        );
        return false;
    } else if (subject.value.trim().length === 0) {
        preventFormSubmitHandler(
            subject,
            (subjectError.textContent = "Please enter your subject!"),
            event
        );
        return false;
    } else if (subjectError.textContent) {
        preventFormSubmitHandler(
            subject,
            (subjectError.textContent = "Please enter your valid subject!"),
            event
        );
        return false;
    } else if (message.value.trim().length === 0) {
        preventFormSubmitHandler(
            message,
            (messageError.textContent = "Please enter your message!"),
            event
        );
        return false;
    } else if (messageError.textContent) {
        preventFormSubmitHandler(
            message,
            (messageError.textContent = "Please enter your valid message!"),
            event
        );
        return false;
    } else {
        showModelHandler(contactModelBackdrop, contactModelBox);
        return true;
    }
};

// password show hide function handler
export const passwordShowHideFunctionHandler = function (input, eye) {
    const inputType = input.getAttribute("type");
    let setInputType = inputType === "password" ? "text" : "password";
    input.setAttribute("type", setInputType);
    const eyeMark = eye.querySelector("i");
    if (eyeMark.classList.contains("fa-eye")) {
        eyeMark.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        eyeMark.classList.replace("fa-eye-slash", "fa-eye");
    }
};

// password change handler function
export const passwordChangeHandler = function (event) {
    const passwordValue = event.target.value;
    if (passwordValue.length < 7) {
        this.textContent =
            "Password must be carry 8 character, one digit, one lowercase letter, one uppercase letter, one special character except ~,`!";
    } else if (passwordValue.search(/[0-9]/) == -1) {
        this.textContent =
            "Password must be carry 8 character, one digit, one lowercase letter, one uppercase letter, one special character except ~,`!";
    } else if (passwordValue.search(/[a-z]/) == -1) {
        this.textContent =
            "Password must be carry 8 character, one digit, one lowercase letter, one uppercase letter, one special character except ~,`!";
    } else if (passwordValue.search(/[A-Z]/) == -1) {
        this.textContent =
            "Password must be carry 8 character, one digit, one lowercase letter, one uppercase letter, one special character except ~,`!";
    } else if (
        passwordValue.search(/[!\@\#\$\%\^\&\*\(\)\-\+\;\:\,\.]/) == -1
    ) {
        this.textContent =
            "Password must be carry 8 character, one digit, one lowercase letter, one uppercase letter, one special character except ~,`";
    } else {
        this.textContent = "";
    }
};

// check confirm password === password
export const confirmPasswordChangeHandler = function (event, input, error) {
    const confirmPasswordValue = event.target.value;
    // console.log(confirmPasswordValue, input.value);
    if (confirmPasswordValue !== input.value) {
        error.textContent = "Password and Confirm Password should be matched!";
    } else {
        error.textContent = "";
    }
};

// show every model
export const showEveryModelFunctionHandler = function (
    backdrop,
    model,
    modelText
) {
    backdrop.classList.add("active");
    model.classList.add("active");
    modelText;
    body.style.overflow = "hidden";
};
