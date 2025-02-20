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
                            <a href="#" class="menu-user__dropdown-link"><?php $this->LangContentsNav('userProfil')?></a>
                        </li>
                        <li class="menu-user__dropdown-item">
                            <a href="#" class="menu-user__dropdown-link"><?php $this->LangContentsNav('settings')?></a>
                        </li>
                        <li class="menu-user__dropdown-item">
                            <a href="/logout" class="menu-user__dropdown-link"><?php $this->LangContentsNav('logOut')?></a>
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
                    <li class="sidebar__item"><a href="/admin-dashboard" class="sidebar__link"><?php $this->LangContentsNav('homePage')?></a></li>
                    <li class="sidebar__item"><a href="/operators" class="sidebar__link"><?php $this->LangContentsNav('user')?></a></li>
                    <li class="sidebar__item"><a href="/admins" class="sidebar__link"><?php $this->LangContentsNav('admin')?></a></li>
                    <li class="sidebar__item"><a href="/register" class="sidebar__link"><?php $this->LangContentsNav('addUser')?></a></li>
                </ul>
            </nav>
        </div>
        <main class="content">
            <h2 class="content__title"><?php $this->LangContents('title')?></h2>
            <div class="register-admin">
                <form class="modal-form" action="/register" method="POST">
                    <!-- //TODOdane osobiste -->
                    <div class="modal-form__row">
                        <div class="modal-form__full">
                            <div class="field">
                                <label for="login" class="field__label"><?php $this->LangContents('AddUser1')?></label>
                                <input type="text" id="login" name="login" class="field__input" placeholder="<?php $this->LangContents('AddUser1')?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-form__row">
                        <div class="modal-form__column">
                            <div class="field">
                                <label for="name" class="field__label"><?php $this->LangContents('AddUser2')?></label>
                                <input type="text" id="name" name="name" class="field__input" placeholder="<?php $this->LangContents('AddUser2')?>" required>
                            </div>
                        </div>
                        <div class="modal-form__column">
                            <div class="field">
                                <label for="lastName" class="field__label"><?php $this->LangContents('AddUser3')?></label>
                                <input type="text" id="lastName" name="lastName" class="field__input" placeholder="<?php $this->LangContents('AddUser3')?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-form__row">
                        <div class="modal-form__column">
                            <div class="field">
                                <label for="phoneNumber" class="field__label"><?php $this->LangContents('AddUser4')?></label>
                                <input type="text" id="phoneNumber" name="phoneNumber" class="field__input" placeholder="<?php $this->LangContents('AddUser4')?>" required>
                            </div>
                        </div>
                        <div class="modal-form__column">
                            <div class="field">
                                <label for="email" class="field__label"><?php $this->LangContents('AddUser5')?></label>
                                <input type="text" id="email" name="email" class="field__input" placeholder="<?php $this->LangContents('AddUser5')?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-form__row">
                        <div class="modal-form__trio">
                            <div class="field">
                                <label for="houseNumber" class="field__label"><?php $this->LangContents('AddUser6')?></label>
                                <input type="text" id="houseNumber" name="houseNumber" class="field__input" placeholder="<?php $this->LangContents('AddUser6')?>" required>
                            </div>
                        </div>
                        <div class="modal-form__trio">
                            <div class="field">
                                <label for="street" class="field__label"><?php $this->LangContents('AddUser7')?></label>
                                <input type="text" id="street" name="street" class="field__input" placeholder="<?php $this->LangContents('AddUser7')?>" required>
                            </div>
                        </div>
                        <div class="modal-form__trio">
                            <div class="field">
                                <label for="town" class="field__label"><?php $this->LangContents('AddUser8')?></label>
                                <input type="text" id="town" name="town" class="field__input" placeholder="<?php $this->LangContents('AddUser8')?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-form__row">
                        <div class="modal-form__column">
                            <div class="field">
                                <label for="zipCode" class="field__label"><?php $this->LangContents('AddUser9')?></label>
                                <input type="text" id="zipCode" name="zipCode" class="field__input" placeholder="<?php $this->LangContents('AddUser9')?>" required>
                            </div>
                        </div>
                        <div class="modal-form__column">
                            <div class="field">
                                <label for="city" class="field__label"><?php $this->LangContents('AddUser10')?></label>
                                <input type="text" id="city" name="city" class="field__input" placeholder="<?php $this->LangContents('AddUser10')?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-form__row">
                        <div class="modal-form__full">
                            <div class="field">
                                <label for="privileges" class="field__label"><?php $this->LangContents('AddUser11')?></label>
                                <select name="privileges" id="privileges" class="field__input">
                                    <option value="admin"><?php $this->LangContents('AddUser14')?></option>
                                    <option value="manager"><?php $this->LangContents('AddUser12')?></option>
                                    <option value="user"><?php $this->LangContents('AddUser13')?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-form__row">
                        <div class="modal-form__column">
                            <div class="field">
                                <label for="pwd" class="field__label"><?php $this->LangContents('AddUser15')?></label>
                                <input type="password" id="pwd" name="pwd" class="field__input" placeholder="Hasło" required>
                            </div>
                        </div>
                        <div class="modal-form__column">
                            <div class="field">
                                <label for="repeatPwd" class="field__label"><?php $this->LangContents('AddUser16')?></label>
                                <input type="password" id="repeatPwd" name="repeatPwd" class="field__input" placeholder="Powtórz hasło" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="button button--positive"><?php $this->LangContents('btmConf')?></button>
                </form>
            </div>
        </main>
    </div>
</body>
<script>
    const sidebar = document.querySelector('.sidebar');
    const topbarHamburger = document.querySelector('.topbar__hamburger');

    
    function toggleSidebar() {
        sidebar.classList.toggle('sidebar--hidden');
    }

    if (topbarHamburger) {
        topbarHamburger.addEventListener('click', toggleSidebar);
    }
</script>

</html>