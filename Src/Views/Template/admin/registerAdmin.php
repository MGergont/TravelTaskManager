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
    <h2>Register Login</h2>

    <?php flash("addOperator"); ?>

    <form action="/register" method="POST">
        <!-- //TODOdane osobiste -->
        <input type="text" name="login" placeholder="Login" required><br><br>
        <input type="text" name="name" placeholder="Imię" required><br><br>
        <input type="text" name="lastName" placeholder="Nazwisko" required><br><br>
        <input type="text" name="phoneNumber" placeholder="Nume telefonu" required><br><br>
        <input type="email" name="email" placeholder="Adres email" required><br><br>
        <!-- //TODO dane adresowe -->
        <input type="text" name="houseNumber" placeholder="Numer domu" required><br><br>
        <input type="text" name="street" placeholder="Ulica" required><br><br>
        <input type="text" name="town" placeholder="Miejscowość" required><br><br>
        <input type="text" name="zipCode" placeholder="Kod pocztowy" value="XX-XXX" required><br><br>
        <input type="text" name="city" placeholder="Miasto" required><br><br>
        <!-- //TODO uprawnienia -->
        <select type="text" name="privileges" placeholder="Uprawnienia" required>
            <option value="admin">Administrator</option>
            <option value="manager">Menedżer</option>
            <option value="user">Użytkownik</option>
        </select><br><br>
        <!-- //TODO hasło -->
        <input type="password" name="pwd" placeholder="Hasło" required><br><br>
        <input type="password" name="repeatPwd" placeholder="Powtórz hasło" required><br><br>

        <button type="submit">Dodaj</button>
    </form>
</body>
</html>