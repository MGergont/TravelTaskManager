<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>

    <?php flash("loginAdmin"); ?>

    <form action="/admin" method="POST">
        <input type="text" name="login" placeholder="Login" autocomplete="login" required><br><br>
        <input type="password" name="pwd" placeholder="Hasło" autocomplete="password" required><br><br>

        <button type="submit" >Zaloguj</button>
    </form>
</body>
</html>