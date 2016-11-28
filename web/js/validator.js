"use strict";

var elements;
var i = 0;
var isError = false;
var errorMessage;
var correctMessage = "✓";
var errorSpan;
var username = document.querySelector('#username');
var password = document.querySelector('#password');
//var mountainOption = document.querySelector('.mountain-lake-options');
//var trampOption = document.querySelector('.tramp-options');
//var photoOption = document.querySelector('.photo-options');
//var dropDowns = document.querySelector('#dropdowns');


//when the page loads
function addFormValidation(theForm) {
    if (theForm === null || theForm.tagName.toUpperCase() !== 'FORM') {
        throw new Error("expected first parameter to addFormValidation to be a FORM.");
    }
    //disable HTML5 validation
    theForm.noValidate = true;

    //when the form is submitted
    theForm.addEventListener('submit', validateFields);

    elements = theForm.elements;

    //for loop cycles through all form elements
    for (i = 0; i < elements.length; i += 1) {
        //waits until form input loses focus
        elements[i].addEventListener("blur", function (evt) {

            //flag if particular field is invalid
            if (!isFieldValid(evt.target)) {
                isError = true;
            }
        });
    }

    function validateFields(evt) {
        //assume there are no errors
        isError = false;

        //check every field in the form is filled
        console.log(elements);
        for (i = 0; i < elements.length; i += 1) {

            //flag if field is invalid
            if (!isFieldValid(elements[i])) {
                isError = true;
            }
        }

        //if any field is found with an error
        if (isError) {
            //prevent form from submitting
            evt.preventDefault();
        }
    }

    //checks to see if fields are valid and meet input criteria
    function isFieldValid(field) {
        errorMessage = "";

        //Skip fields that are always considered valid
        if (!needsToBeValidated(field)) {
            //returns true if the field needs to be validated
            return true;
        }

        //throw an error if addFormValidation is passed an element that it can't use
        if (field.id.length === 0 && field.name.length === 0) {
            console.error("error: ", field);
            throw new Error("found a field that is missing an id and/or name attribute. name should be there. id is required for determining the field's error message element.");
        }

        //remove the invalid class of the field
        field.classList.remove('invalid');

        // give the error span a class and the error message.
        errorSpan = document.querySelector('#' + field.id + '-error');
        if (errorSpan === null) {
            console.error("error: ", field);
            throw new Error("could not find the '#" + field.id + "-error' element. It's needed for error messages if #" + field.id + " is ever invalid.");
        }

        //removes danger class from error span & gives user confirmation that their input is valid
        errorSpan.classList.remove('danger');
        errorSpan.innerHTML = correctMessage;

        //checks if firstname or lastname input matches minimum character limit
//        if ((field.id === "firstname" || field.id === "lastname") && !isCorrectLength(field.value)) {
//            errorMessage = "Must be 2 or more characters long.";
//        }
//
//        //checks if input is a valid email address
//        if (field.type === "email" && !isEmail(field.value)) {
//            errorMessage = "This should be a valid email address.";
//        }
//
//        //checks if valid phone number
//        if (field.id === "phone" && !isPhone(field.value)) {
//            errorMessage = "This must be a valid New Zealand phone number";
//        }
//
//        //checks if valid date
//        if (field.id === "date" && !isDate(field.value)) {
//            errorMessage = "Date must be in DD/MM/YYYY Format";
//        }

        //only check the fields that are required && if a field is left blank
        if (field.required && field.value.trim() === "") {
            errorMessage = "This field is required.";
        }


        //At the end, if the variable isn't a blank string, we put that error
        //message in the error span, and add the error classes.
        if (errorMessage !== "") {
            // give the field an error class
            field.classList.add('invalid');

            // give the error span a class and the error message.
            errorSpan.classList.add('danger');
            errorSpan.innerHTML = errorMessage;

            //an error is found
            return false;
        }
        return true;
    }

    //checks to see if fields need to be valid
    function needsToBeValidated(field) {
        if (field.offsetWidth === 0 && field.offsetHeight === 0) {
            return false;
        }
        // checks an array of all the automatically valid types to see if it contains the field's type.
        // If the field has type 'text', indexOf returns -1, and -1 === -1 is true, so returns true
        return ['submit', 'reset', 'button', 'hidden', 'fieldset'].indexOf(field.type) === -1;
    }

//    //checks to see if email input is valid email address format
//    function isEmail(input) {
//        return input.match(/^([a-z0-9_.\-+]+)@([\da-z.\-]+)\.([a-z]{2,})$/);
//    }
//
//    // checks if phone number is valid
//    function isPhone(input) {
//        return input.match(/^([0-9]*).{8,10}$/);
//    }
//
//    // checks if date is valid
//    function isDate(input) {
//        return input.match(/(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)/);
//    }

    //checks if name input is the correct length
    function isCorrectLength(input) {
        return input.match(/.{2}$/);
    }
}


