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
</head>

<body>
    <section>
        <form methos="post" id="container">
                <div class="column">
                    <div class="column-header">
                        <i class="fas fa-user-alt"></i> 1. TWOJE DANE
                    </div>
                    <button>Logowanie</button>
                    <div id="text">
                        Masz już konto? Kliknij żeby się zalogować
                    </div>
                    <input type="checkbox" id="new-account">
                    <label for="new-account">Stwórz nowe konto</label>
                    <input type="text" placeholder="Login">
                    <input type="password" placeholder="Hasło">
                    <input type="password" placeholder="Powtórz hasło">
                    <input type="text" placeholder="Imię *">
                    <input type="text" placeholder="Nazwisko *">
                    <input list="countries" placeholder="Wybierz kraj">
                    <datalist id="countries">
                        <option value="Polska">
                        <option value="Czechy">
                        <option value="Niemcy">
                        <option value="Słowacja">
                        <option value="Litwa">
                    </datalist>
                    <input type="text" placeholder="Adres *">
                    <div id="address-info">
                        <input type="text" placeholder="Kod pocztowy *">
                        <input type="text" placeholder="Miasto *">
                    </div>
                    <input type="text" placeholder="Telefon *">
                    <input type="checkbox" id="diff-address">
                    <label for="diff-address">Dostawa pod inny adres</label>

                </div>
                <div class="column">
                    <div class="column-header">
                        <i class="fas fa-truck"></i> 2. METODA DOSTAWY
                    </div>

                    <div class="option">
                        <input type="radio" id="radioInpost" name="delivery" value="Packomat24/7">
                        <label for="radioInpost">
                            <img src="public/images/inpost_logo.png">
                            <span class="name">Paczkomaty 24/7</span>
                            <span class="price">10,99 zł</span>
                        </label>
                    </div>
                    <div class="option">
                        <input type="radio" id="radioDPD" name="delivery" value="DPD">
                        <label for="radioDPD">
                            <img src="public/images/dpd_logo.png">
                            <span class="name">Kurier DPD</span>
                            <span class="price">18,00 zł</span>
                        </label>
                    </div>
                    <div class="option">
                        <input type="radio" id="radioDPDPobranie" name="delivery" value="DPDPob">
                        <label for="radioDPDPobranie">
                            <img src="public/images/dpd_logo.png">
                            <span class="name">Kurier DPD pobranie</span>
                            <span class="price">22,00 zł</span>
                        </label>
                    </div>

                    <div class="column-header">
                        <i class="fas fa-credit-card"></i> 3. METODA PŁATNOŚCI
                    </div>

                    <div class="option">
                        <input type="radio" id="radioPayU" name="payment" alue="PayU">
                        <img src="public/images/payu_logo.png">
                        <label for="radioPayU">
                            PayU
                        </label>
                    </div>
                    <div class="option">
                        <input type="radio" id="radioPobranie" name="payment" value="Pobranie">
                        <img src="public/images/wallet.png">
                        <label for="radioPobranie">
                            Płatnośc przy odbiorze
                        </label>
                    </div>
                    <div class="option">
                        <input type="radio" id="radioPrzelew" name="payment" value="Przelew">
                        <img src="public/images/przelew.jpg">
                        <label for="radioPrzelew">
                            Przelew bankowy - zwykły
                        </label>
                    </div>
                    <button>Dodaj kod rabatowy</button>

                </div>
                <div class="column">
                    <div class="column-header">
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
                    <div class="item">
                        <div class="item-photo">
                            <img src="public/images/test.png">
                        </div>
                        <div class="item-info">
                            <span class="item-name">Testowy produkt</span> <span class="price">115,00 zł</span>                           
                           <div>Ilość: 1</div>
                        </div>
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
                        <div style="font-weight: bold; font-size: larger;">
                            Łącznie:
                            <span> 115,00 zł </span> 
                        </div>
                    </div>
                    <hr class="separator">
                    <textarea placeholder="Komentarz"></textarea>
                    <div>
                        <input type="checkbox" id="newsletter">
                        <label for="newsletter">Zapisz się, aby otrzymywać newsletter</label>
                    </div>
                    <div>
                        <input type="checkbox" id="rules">
                        <label for="rules">Zapoznałam/em się z <a href="/" style="text-decoration: none; color: blue;">Regulaminem</a> zakupów</label>
                    </div>
                    <button style="color: white; border-color: red; background-color: red;">Potwierdź zakup</button>
                </div>
        </form>
    </section>
</body>
</html>