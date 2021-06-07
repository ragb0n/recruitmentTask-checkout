//pokazanie formularza logowania
function showLoginForm(){
    $("#loginWindow.loginPopup").addClass("active");
};

//chowanie formularza logowania
function closeLoginForm(){
    $("#loginWindow.loginPopup").removeClass("active");
};

//pokazywanie/chowanie pól login, hasło przy wybraniu opcji tworzenia nowego konta
function newUser(){
    var form = $("#new-user-form");
    if($("#new-account").prop("checked")){
        $("#password, #repeatPassword").val("");
        form.css("display", "block");
    }else{
        form.css("display", "none");
    }
}

//odpowiednie zmienianie dostępnych form płatności w zależności od wybranej opcji dostawy
function setPayment() {
    if($("#radioDPDPobranie").prop("checked")) {
        $("#radioPayU").prop("checked", false);
        $("#radioPayU").prop("disabled", true);
        $("#radioPobranie").prop("disabled", false);
        $("#radioPrzelew").prop("checked", false);
        $("#radioPrzelew").prop("disabled", true);
    }else{
        $("#radioPayU").prop("disabled", false);
        $("#radioPobranie").prop("checked", false);
        $("#radioPobranie").prop("disabled", true);
        $("#radioPrzelew").prop("disabled", false);
    }
}

//chowanie/pokazywanie pól formularza związanych z innym adresem dostawy
function differentAddress(){ 
    if($("#diff-address").prop("checked")){
        $("#diff-address-form :input").val("");
        $("#diff-address-form").css("display", "block");
    }else{
        $("#diff-address-form").css("display", "none");
    }
}

//chowanie/pokazywanie pola wpisania kodu rabatowego
function enterDiscount(){ 
    if($("#discount-field").css("display") == "block"){
        $("#discount-field").css("display", "none");
    }else{
        $("#discount-field").css("display", "block");
    }
}

// dodanie ceny wybranej dostawy do kwoty łącznej zakupu
function addDeliveryCost(){
    var cost;
    var currency = " zł";
    var deliveryCost = $("#delivery-cost");
    $("#delivery-cost-text").css("display", "block");

    if($("#radioInpost").prop("checked")){
        cost = 10.99;
        deliveryCost.html("10,99 zł");
    }
    if(document.getElementById("radioDPD").checked){
        cost = 18.00;
        deliveryCost.html("18,00 zł");    
    }
    if(document.getElementById("radioDPDPobranie").checked){
        cost = 22.00;
        deliveryCost.html("22,00 zł");    
    }
    var totalCost = 115.00 + cost;
    $("#total-price").html(totalCost.toFixed(2).concat(currency));
}

//walidacja formularza
function formValidation(){
    var password = $("input[name=password]");
    var repeatPassword = $("input[name=repeatPassword]");
    var name = $("input[name=name]");
    var surname = $("input[name=surname]");
    var address = $("input[name=address]");
    var postalCode = $("input[name=postalCode]");
    var city = $("input[name=city]");
    var diffAddress = $("input[name=diffAddress]");
    var diffPostalCode = $("input[name=diffPostalCode]");
    var diffCity = $("input[name=diffCity]");
    var phone = $("input[name=phone]");
    var rules = $("#rules");
    var comment = $("#comment");
    var radioInpost = $("#radioInpost");
    var radioDPD = $("#radioDPD");
    var radioDPDPobranie = $("#radioDPDPobranie");
    var radioPayU = $("#radioPayU");
    var radioPobranie = $("#radioPobranie");
    var radioPrzelew = $("#radioPrzelew");
    const letterPattern =/^[a-zA-ZąęćżźńłóśĄĆĘŁŃÓŚŹŻ\s]+$/;
    const postalCodePattern = /^\d\d-\d\d\d$/;
    const phoneNumberPatter = /^([0-9]{9})$/;
    var isValid = true;

    $("input, textarea").css("background-color", "white");
    $(".field-error").html("");

    if (password.val() != "" || repeatPassword.val() != ""){
        if(password.val() != "" && repeatPassword.val() == ""){
            $("#passwordRepeat-error").html("Podaj hasło ponownie!");
            repeatPassword.css("background-color", "pink");
        }

        if(password.val() == "" && repeatPassword.val() != ""){
            $("#password-error").html("Podaj hasło!");
            password.css("background-color", "pink");
        }

        if(password.val() != "" && repeatPassword.val() != ""){
            if(repeatPassword.val() != password.val()){
                $("#passwordRepeat-error").html("Hasła nie są identyczne!");
                repeatPassword.css("background-color", "pink");
            }
        }
    }

    if(name.val() == ""){
       name.css("background-color", "pink");
       $("#name-error").html("To pole nie może być puste!");
       isValid = false;
    }else{
        if(!name.val().match(letterPattern)){
            name.css("background-color", "pink");
            $("#name-error").html("Imię moża zawierac wyłącznie litery!");
            isValid = false;
        }
    }

    if(surname.val() == ""){
        surname.css("background-color", "pink");
        $("#surname-error").html("To pole nie może być puste!");
        isValid = false;
    }else{
        if(!surname.val().match(letterPattern)){
            surname.css("background-color", "pink");
            $("#surname-error").html("Nazwisko może zawierać wyłącznie litery!");
            isValid = false;
        }
    }

    if(address.val() == ""){
        address.css("background-color", "pink");
        $("#address-error").html("To pole nie może być puste!");
        isValid = false;
    }

    if(postalCode.val() == ""){
        postalCode.css("background-color", "pink");
        $("#postalCode-error").html("To pole nie może być puste!");
        isValid = false;
    }else{
        if(!postalCode.val().match(postalCodePattern)){
            postalCode.css("background-color", "pink");
            $("#postalCode-error").html("Niepoprawny format kodu pocztowego!");
            isValid = false;
        }
    }

    if(city.val() == ""){
        city.css("background-color", "pink");
        $("#city-error").html("To pole nie może być puste!");
        isValid = false;
    }

    if(phone.val() == ""){
        phone.css("background-color", "pink");
        $("#phone-error").html("To pole nie może być puste!");
        isValid = false;
    }else{
        if(!phone.val().match(phoneNumberPatter)){
            phone.css("background-color", "pink");
            $("#phone-error").html("Niepoprawny numer telefonu!");
            isValid = false;
        }
    }

    if($("#diff-address").prop("checked")){
        if(diffAddress.val() == ""){
            diffAddress.css("background-color", "pink");
            $("#diff-address-error").html("To pole nie może być puste!");
            isValid = false;
        }
    
        if(diffPostalCode.val() == ""){
            diffPostalCode.css("background-color", "pink");
            $("#diff-postalCode-error").html("To pole nie może być puste!");
            isValid = false;
        }else{
            if(!diffPostalCode.val().match(postalCodePattern)){
                diffPostalCode.css("background-color", "pink");
                $("#diff-postalCode-error").html("Niepoprawny format kodu pocztowego!");
                isValid = false;
            }
        }
    
        if(diffCity.val() == ""){
            diffCity.css("background-color", "pink");
            $("#diff-city-error").html("To pole nie może być puste!");
            isValid = false;
        }
    }

    if(!radioInpost.prop("checked") && !radioDPD.prop("checked") && !radioDPDPobranie.prop("checked")){
        $("#delivery-error").html("Wybierz metodę dostawy!");
        isValid = false;
    }

    if(!radioPayU.prop("checked") && !radioPobranie.prop("checked") && !radioPrzelew.prop("checked")){
        $("#payment-error").html("Wybierz formę płatności!");
        isValid = false;
    }

    if(comment.val().length > 100){
        $("#comment-error").html("Komentarz do zamówienia może mieć maksymalnie 100 znaków!");
        comment.css("background-color", "pink");
        isValid = false;
    }

    if(!rules.prop("checked")){
        $("#rules-error").html("Musisz zaakceptować regulamin zakupów!");
        isValid = false;
    }
    
    if(grecaptcha.getResponse().length === 0){
        $("#captcha-error").html("Potwierdź, że nie jesteś robotem");
    }
    
    if(isValid == true){
        return true;
    }else{
        return false;
    }
}

//ajax do wysłania formularza z zamówieniem
$(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault();
        if(formValidation()){
            $(".field-error").html("");
            $("input").css("background-color", "white");
            var formData = {
                login: $("#login").val(),
                password: $("#password").val(),
                repeatPassword: $("#repeatPassword").val(),
                name: $("#name").val(),
                surname: $("#surname").val(),
                address: $("#address").val(),
                country: $("#country").val(),
                postalCode: $("#postalCode").val(),
                city: $("#city").val(),
                phone: $("#phone").val(),
                delivery: $("input[name='delivery']:checked").val(),
                payment: $("input[name='payment']:checked").val(),
                discount: $("#discount-code").val(),
                comment: $("#comment").val(),
                rules: "false",
                newsletter: "false"
            };

            if($("#diff-address").prop("checked")){
                formData.diffAddress = $("#diffAddress").val(),
                formData.diffPostalCode = $("#diffPostalCode").val(),
                formData.diffCity = $("#diffCity").val()
            }

            if($("#rules").prop("checked")){
                formData.rules = "true";
            }
            
            if($("#newsletter").prop("checked")){
                formData.newsletter = "true";
            }

            validate(formData);
        }
    });
    });

    //walidacja formularza przez Validation.php
    function validate(formData){
        $.ajax({
            type: "POST",
            url: "src/Validation.php",
            data: formData,
            dataType: "json",
            encode: true,
            }).done(function (data) {
                if (!data.success) {
                    console.log(data);

                    if  (data.errors.password){
                        $("#password").css("background-color", "pink");
                        $("#password-error").html(data.errors.password);
                    }

                    if  (data.errors.repeatPassword){
                        $("#repeatPassword").css("background-color", "pink");
                        $("#passwordRepeat-error").html(data.errors.repeatPassword);
                    }
                    if (data.errors.name) {
                        $("#name").css("background-color", "pink");
                        $("#name-error").html(data.errors.name);
                    }

                    if (data.errors.surname) {
                        $("#surname").css("background-color", "pink");
                        $("#surname-error").html(data.errors.surname);
                    }

                    if (data.errors.address) {
                        $("#address").css("background-color", "pink");
                        $("#address-error").html(data.errors.address);
                    }

                    if (data.errors.postalCode) {
                        $("#postalCode").css("background-color", "pink");
                        $("#postalCode-error").html(data.errors.postalCode);
                    }

                    if (data.errors.city) {
                        $("#city").css("background-color", "pink");
                        $("#city-error").html(data.errors.city);
                    }

                    if (data.errors.diffAddress) {
                        $("#diffAddress").css("background-color", "pink");
                        $("#diff-address-error").html(data.errors.diffAddress);
                    }

                    if (data.errors.diffPostalCode) {
                        $("#diffPostalCode").css("background-color", "pink");
                        $("#diff-postalCode-error").html(data.errors.diffPostalCode);
                    }

                    if (data.errors.diffCity) {
                        $("#diffCity").css("background-color", "pink");
                        $("#diff-city-error").html(data.errors.diffCity);
                    }

                    if (data.errors.phone) {
                        $("#phone").css("background-color", "pink");
                        $("#phone-error").html(data.errors.phone);
                    }

                    if(data.errors.delivery){
                        $("#delivery-error").html(data.errors.delivery);
                    }

                    if(data.errors.payment){
                        $("#payment-error").html(data.errors.payment);
                    }

                    if(data.errors.comment){
                        $("#comment").css("background-color", "pink");
                        $("#comment-error").html(data.errors.comment);
                    }

                    if(data.errors.rules){
                        $("#rules-error").html(data.errors.rules);
                    }

                }else{
                    captchaValidate(formData);
                };
            });
    }

    //wysyłanie zamówienia do bazy danych
    function sendOrderToDatabase(formData){
        $.ajax({
            type: "POST",
            url: "src/Checkout.php",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (response) {
            showThankYou(response.orderId);   
        }).fail(function (response){
            console.log(response);
        })
    }

    //wyświetlanie okienka z podziękowaniem i numerem zamówienia
    function showThankYou(orderId){
        $("#order-id").html(orderId);
        $("#thank-you.loginPopup").addClass("active");
    }

    //walidacja recaptcha
    function captchaValidate(formData){
        var captchaResponse = grecaptcha.getResponse();
        $.ajax({
            url: 'src/Captcha.php',
            type: "post",
            data: {captchaResponse},
            dataType: 'json',
        }).done(function(captchaValidationResponse) {
            console.log(captchaValidationResponse);
            if(captchaValidationResponse.status === "valid"){
                sendOrderToDatabase(formData);
            }else if(captchaValidationResponse.status === "invalid"){
                $("#captcha-error").html(captchaValidationResponse.message);
            }else if(captchaValidationResponse.status === "noCaptcha"){
                $("#captcha-error").html(captchaValidationResponse.message);
            }

            }).fail(function(captchaValidationResponse) {
                console.log("failed");
            })
    }