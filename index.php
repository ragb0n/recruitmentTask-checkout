<?php 
session_start();
?>

<!DOCTYPE html> 
<html>

<head>
    <title>Smartbees - checkout</title>
    <link rel="stylesheet" href="public/style.css">
    <meta charset="UTF-8">
    <meta name="keywords" content="smartbees, checkout, PHP, task, HTML, CSS, JavaScript">
    <meta name="description" content="Smartbees recruitment task">
    <meta name="author" content="Patryk Marcinkow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/c97458608f.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="public/scripts.js"></script>
</head>

<body>
    <section>
        <div id="container">
            <div class="column">
                <div class="column-header">
                    <i class="fas fa-user-alt"></i> 1. TWOJE DANE
                </div>
                <button onclick="showLoginForm()"id="show-login">Logowanie</button>
                <div class="loginPopup" id="loginWindow">
                    <div class="close-btn" onclick="closeLoginForm()">&times;</div>
                    <div id="login-form">
                        <h2>Zaloguj się</h2>
                        <div class="login-form-element">
                            <label for="login">Login</label>
                            <input type="text" id="login-Login" placeholder="Podaj login">
                        </div>
                        <div class="login-form-element">
                            <label for="password">Hasło</label>
                            <input type="password" id="login-Password" placeholder="Podaj hasło">
                        </div>
                        <div class="login-form-element">
                            <button>Zaloguj</button>
                        </div>
                        <div class="login-form-element">
                            <a href="#">Zapomniałeś hasła?</a>
                        </div>
                    </div>
                </div>
                <div id="text">
                    Masz już konto? Kliknij żeby się zalogować
                </div>
                <input type="checkbox" id="new-account" onclick="newUser()">
                <label for="new-account">Stwórz nowe konto</label>
                <form action="src/Checkout.php" method="POST" id="orderForm" name="newUserForm">
                    <div id="new-user-form">
                        <input type="text" name="login" id="login" placeholder="Login">
                        <span class="field-error" id="password-error"></span>
                        <input type="password" name="password" id="password" placeholder="Hasło">
                        <span class="field-error" id="passwordRepeat-error"></span>
                        <input type="password" name="repeatPassword" id="repeatPassword" placeholder="Powtórz hasło">
                    </div>
                        <span class="field-error" id="name-error"></span>
                        <input type="text" id="name" name="name" placeholder="Imię *">
                        <span class="field-error" id="surname-error"></span>
                        <input type="text" id="surname" name="surname" placeholder="Nazwisko *">
                        <select list="countryList" id="country" placeholder="Wybierz kraj">
                            <option value="PL">Polska</option>
                            <option value="RU">Rosja</option>
                            <option value="LT">Litwa</option>
                            <option value="BY">Białoruś</option>
                            <option value="UA">Ukraina</option>
                            <option value="SK">Słowacja</option>
                            <option value="CZ">Czechy</option>
                            <option value="DE">Niemcy</option>
                        </select>
                        <span class="field-error" id="address-error"></span>
                        <input type="text" name="address" id="address" placeholder="Adres *">
                        <div class="address-errors">
                            <span class="field-error" id="postalCode-error"></span>
                            <span class="field-error" id="city-error"></span>
                        </div>
                        <div id="address-info">
                            <input type="text" name="postalCode" id="postalCode" placeholder="Kod pocztowy *">
                            <input type="text" name="city" id="city" placeholder="Miasto *">
                        </div>
                        <span class="field-error" id="phone-error"></span>
                        <input type="text" name="phone" id="phone" placeholder="Telefon *">
                        <div>Pola oznaczone gwiazdką są wymagane</div>
                        <input type="checkbox" id="diff-address" onclick="differentAddress()">
                        <label for="diff-address">Dostawa pod inny adres</label>
                        <div id="diff-address-form">
                            <span class="field-error" id="diff-address-error"></span>
                            <input type="text" placeholder="Adres *" name="diffAddress" id="diffAddress">
                            <div class="address-errors">
                                <span class="field-error" id="diff-postalCode-error"></span>
                                <span class="field-error" id="diff-city-error"></span>
                            </div>
                            <div id="address-info">
                                <input type="text" placeholder="Kod pocztowy *" name="diffPostalCode" id="diffPostalCode">
                                <input type="text" placeholder="Miasto *" name="diffCity" id="diffCity">
                            </div>
                        </div>
                </div>
                <div class="column">
                    <div class="column-header">
                        <i class="fas fa-truck"></i> 2. METODA DOSTAWY
                    </div>
                    <span class="field-error" id="delivery-error"></span>
                    <div class="option">
                        <input type="radio" id="radioInpost" name="delivery" value="inpost" onclick="setPayment(), addDeliveryCost()">
                        <label for="radioInpost">
                            <img src="public/images/inpost_logo.png">
                            <span class="name">Paczkomaty 24/7</span>
                            <span class="price">10,99 zł</span>
                        </label>
                    </div>
                    <div class="option">
                        <input type="radio" id="radioDPD" name="delivery" value="dpd" onclick="setPayment(), addDeliveryCost()">
                        <label for="radioDPD">
                            <img src="public/images/dpd_logo.png">
                            <span class="name">Kurier DPD</span>
                            <span class="price">18,00 zł</span>
                        </label>
                    </div>
                    <div class="option">
                        <input type="radio" id="radioDPDPobranie" name="delivery" value="dpdpob" onclick="setPayment(), addDeliveryCost()">
                        <label for="radioDPDPobranie">
                            <img src="public/images/dpd_logo.png">
                            <span class="name">Kurier DPD pobranie</span>
                            <span class="price">22,00 zł</span>
                        </label>
                    </div>

                    <div class="column-header">
                        <i class="fas fa-credit-card"></i> 3. METODA PŁATNOŚCI
                    </div>
                    <span class="field-error" id="payment-error"></span>
                    <div class="option">
                        <input type="radio" id="radioPayU" name="payment" value="payu" disabled>
                        <img src="public/images/payu_logo.png">
                        <label for="radioPayU">
                            PayU
                        </label>
                    </div>
                    <div class="option">
                        <input type="radio" id="radioPobranie" name="payment" value="pobranie" disabled>
                        <img src="public/images/wallet.png">
                        <label for="radioPobranie">
                            Płatnośc przy odbiorze
                        </label>
                    </div>
                    <div class="option">
                        <input type="radio" id="radioPrzelew" name="payment" value="przelew" disabled>
                        <img src="public/images/przelew.jpg">
                        <label for="radioPrzelew">
                            Przelew bankowy - zwykły
                        </label>
                    </div>
                    <button type="button" onclick="enterDiscount()">Dodaj kod rabatowy</button>
                    <div id="discount-field">
                        <span class="field-error" id="discount-error"></span>
                        <input type="text" id="discount-code" name="discount-code" placeholder="Wpisz tutaj Twój kod rabatowy">
                        <button type="button" id="discount-btn">Nalicz zniżkę</button>
                    </div>
                    <script>
                        $("#discount-btn").click(function(event) {
                        event.preventDefault();
                        $.post(
                            'src/Checkout.php',
                            {
                            },
                            function(result){
                                if(result == "success"){
                                    $("#discount-error").html("Sukces!");
                                }else{
                                    $("#discount-error").html("oj oj byczq");
                                }
                            }
                        )
                        });
                </script>
                </div>
                <div class="column">
                    <div class="column-header" id="summary-column">
                        <i class="fas fa-clipboard-check"></i> 4. PODSUMOWANIE
                    </div>
                    <div class="item">
                        <div class="item-photo">
                            <img src="public/images/test.png">
                        </div>
                        <div class="item-info">
                            <span class="item-name">Testowy produkt</span> <span class="price">115,00 zł</span>                           
                           <div>Ilość: 1</div>
                        </div>
                    </div>
                    <hr class="separator">
                    <div id="summary">
                        <div>
                            Suma częściowa:
                            <span> 115,00 zł </span>
                        </div>
                        <div id="delivery-cost-text">
                            Dostawa:
                            <span id="delivery-cost"> 115,00 zł </span>
                        </div>
                        <div style="font-weight: bold; font-size: larger;">
                            Łącznie:
                            <span id="total-price"> 115,00 zł </span> 
                        </div>
                    </div>
                    <hr class="separator">
                    <div class="field-error" id="comment-error"></div>
                    <textarea placeholder="Komentarz" id="comment"></textarea>
                    <div>
                        <input type="checkbox" name="newsletterCheck" id="newsletter">
                        <label for="newsletter">Zapisz się, aby otrzymywać newsletter</label>
                    </div>
                    <div>
                        <div class="field-error" id="rules-error"></div>
                        <input type="hidden" value="false" name="rulesCheck">
                        <input type="checkbox" value="true" name="rulesCheck" id="rules">
                        <label for="rules">Zapoznałam/em się z <a href="#" style="text-decoration: none; color: blue;">Regulaminem</a> zakupów *</label>
                    </div>
                    <div style="text-align: center;">
                        <div class="field-error" id="captcha-error"></div>
                        <div class="g-recaptcha" data-sitekey="6LeUeRcbAAAAAIppnhuz2Q31ZQXxcTr3Rz62MKfO"></div>
                    </div>
                    <button type="submit" id="submitBtn" style="color: white; border-color: red; background-color: red;">Potwierdź zakup</button>
                </div>
        </form>
        <div class="loginPopup" id="thank-you">
            <div id="login-form">
                <h2>Dziękujemy za zakupy!</h2>
                <div class="login-form-element">
                    Numer Twojego zamówienia to: <span id="order-id"></span>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
