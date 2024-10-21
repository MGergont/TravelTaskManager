<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apliakcja internetowa ułatwiająca pracownikom oraz pracodawcy zarzadzane wyjazdami służbowymi">
    <meta name="keywords" content="travel, management, business, tasks, coordination, planning, automation, trips">
    <title>TravelFlow.pl</title>
    <link rel="icon" href="/Public/image/icon.png" type="image/png">
    <link rel="stylesheet" href="/Public/css/main.min.css">
    <link rel="stylesheet" href="/Public/fonts/icon/fontello/css/fontello.css">
</head>

<body>
    <?php if (!empty($_SESSION["addOperator"])) : ?>
        <?php flash("addOperator"); ?>
    <?php endif; ?>
    <header class="topbar">
        <div class="topbar__hamburger">
            <i class="topbar__bar icon-menu"></i>
        </div>
        <img class="topbar__logo" src="/Public/image/logo_main.png" alt="logo Travel Flow" />
        <img class="topbar__logo2" src="/Public/image/logo_slim.png" alt="logo Travel Flow" />
        <div class="menu-user">
            <ul class="menu-user__list">
                <li class="menu-user__item menu-user__item--dropdown">
                    <a href="#" class="menu-user__link1"><?php echo $_SESSION['userLogin']; ?><i class="icon-down-open"></i></a>
                    <a href="#" class="menu-user__link2"><i class="icon-torso"></i></a>
                    <ul class="menu-user__dropdown">
                        <li class="menu-user__dropdown-item">
                            <a href="#" class="menu-user__dropdown-link">Profil</a>
                        </li>
                        <li class="menu-user__dropdown-item">
                            <a href="#" class="menu-user__dropdown-link">Ustawienia</a>
                        </li>
                        <li class="menu-user__dropdown-item">
                            <a href="/logout" class="menu-user__dropdown-link">wyloguj się</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <div>
        <div class="sidebar">
            <nav class="sidebar__menu">
                <ul class="sidebar__list">
                    <li class="sidebar__item"><a href="/admin-dashboard" class="sidebar__link">Strona główna</a></li>
                    <li class="sidebar__item"><a href="/register" class="sidebar__link">Dodaj użytkownika</a></li>
                    <li class="sidebar__item"><a href="#" class="sidebar__link">Services</a></li>
                    <li class="sidebar__item"><a href="#" class="sidebar__link">Contact</a></li>
                </ul>
            </nav>
        </div>
        <main class="content">
            <h2 class="content__title">Add User</h2>
            <form class="form-add" action="/register" method="POST">
                <!-- //TODOdane osobiste -->
                <div class="form-add__login">
                    <div class="field">
                        <label for="login" class="field__label">Login</label>
                        <input type="text" id="login" name="login" class="field__input" placeholder="Login" required>
                    </div>
                </div>
                <div class="form-add__name">
                    <div class="field">
                        <label for="name" class="field__label">Imię</label>
                        <input type="text" id="name" name="name" class="field__input" placeholder="Imię" required>
                    </div>
                    <div class="field">
                        <label for="lastName" class="field__label">Nazwisko</label>
                        <input type="text" id="lastName" name="lastName" class="field__input" placeholder="Nazwisko" required>
                    </div>
                </div>
                <div class="form-add__name-data">
                    <div class="field">
                        <label for="phoneNumber" class="field__label">Nume telefonu</label>
                        <input type="text" id="phoneNumber" name="phoneNumber" class="field__input" placeholder="Nume telefonu" required>
                    </div>

                    <div class="field">
                        <label for="email" class="field__label">Adres email</label>
                        <input type="text" id="email" name="email" class="field__input" placeholder="Adres email" required>
                    </div>
                </div>
                <!-- //TODO dane adresowe -->
                <div class="form-add__addres">
                    <div class="field">
                        <label for="houseNumber" class="field__label">Numer domu</label>
                        <input type="text" id="houseNumber" name="houseNumber" class="field__input" placeholder="Numer domu" required>
                    </div>
                    <div class="field">
                        <label for="street" class="field__label">Ulica</label>
                        <input type="text" id="street" name="street" class="field__input" placeholder="Ulica" required>
                    </div>
                    <div class="field">
                        <label for="town" class="field__label">Miejscowość</label>
                        <input type="text" id="town" name="town" class="field__input" placeholder="Miejscowość" required>
                    </div>
                    <div class="field">
                        <label for="zipCode" class="field__label">Kod pocztowy</label>
                        <input type="text" id="zipCode" name="zipCode" class="field__input" placeholder="Kod pocztowy" required>
                    </div>
                    <div class="field">
                        <label for="city" class="field__label">Miasto</label>
                        <input type="text" id="city" name="city" class="field__input" placeholder="Miasto" required>
                    </div>
                </div>
                <!-- //TODO uprawnienia -->
                <div class="form-add__priv">
                    <div class="select-wrapper">
                        <label for="privileges" class="select-wrapper__label">Uprawnienia</label>
                        <select name="privileges" id="privileges" class="select-wrapper__select">
                            <option value="admin">Administrator</option>
                            <option value="manager">Menedżer</option>
                            <option value="user">Użytkownik</option>
                        </select>
                    </div>
                </div>
                <!-- //TODO hasło -->
                <div class="form-add__pwd">
                    <div class="field">
                        <label for="pwd" class="field__label">Hasło</label>
                        <input type="text" id="pwd" name="pwd" class="field__input" placeholder="Hasło" required>
                    </div>
                    <div class="field">
                        <label for="repeatPwd" class="field__label">Powtórz hasło</label>
                        <input type="text" id="repeatPwd" name="repeatPwd" class="field__input" placeholder="Powtórz hasło" required>
                    </div>
                </div>
                <button type="submit" class="button-form button-form--positive">Dodaj</button>
            </form>
        </main>
    </div>
</body>
<script>
    // Pobranie elementów
    const sidebar = document.querySelector('.sidebar');
    const topbarHamburger = document.querySelector('.topbar__hamburger');

    // Funkcja do otwierania/zamykania menu na telefonach
    function toggleSidebar() {
        sidebar.classList.toggle('sidebar--hidden');
    }

    if (topbarHamburger) {
        topbarHamburger.addEventListener('click', toggleSidebar);
    }
</script>

</html>