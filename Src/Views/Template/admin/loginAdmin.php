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
    <h2>Admin Login</h2>

    <?php flash("loginAdmin"); ?>

<div class="login-panel">
    <h2 class="login-panel__title">Login</h2>
    
    <form class="login-panel__form">
        <div class="login-panel__field">
            <label for="email" class="login-panel__label">Email</label>
            <input type="email" id="email" class="login-panel__input" placeholder="Enter your email" required>
        </div>
        
        <div class="login-panel__field">
            <label for="password" class="login-panel__label">Password</label>
            <input type="password" id="password" class="login-panel__input" placeholder="Enter your password" required>
        </div>

        <div class="login-panel__actions">
            <button type="submit" class="login-panel__submit">Login</button>
        </div>
    </form>
</div>

    

    <!-- <form action="/admin" method="POST">
        <input type="text" name="login" placeholder="Login" autocomplete="login" required><br><br>
        <input type="password" name="pwd" placeholder="Hasło" autocomplete="password" required><br><br>

        <button type="submit" >Zaloguj</button>
    </form> -->
</body>
</html>