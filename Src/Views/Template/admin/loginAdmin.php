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
</head>
<body>
    <?php if(!empty($_SESSION["loginAdmin"])) : ?>
        <?php flash("loginAdmin"); ?><i class="icon-cancel"></i>
    <?php endif; ?>
    <div class="login-panel">
        <img class="login-panel__img" src="/Public/image/logo_travel.png" />
        <h2 class="login-panel__title">Login Admin</h2>
        <h3 class="login-panel__sub-title">Dashboard</h3>
        <form class="login-panel__form" action="/admin" method="POST">
            <div class="login-panel__field">
                <label for="login" class="login-panel__label">Email</label>
                <input type="text" id="login" name="login" class="login-panel__input" placeholder="Enter your email" autocomplete="login" required>
            </div>
            <div class="login-panel__field">
                <label for="password" class="login-panel__label">Password</label>
                <input type="password" name="pwd" id="password" class="login-panel__input" placeholder="Enter your password" autocomplete="password" required>
            </div>
            <button type="submit" class="button-form button-form--positive">Login</button>
        </form>
    </div>
</body>
</html>