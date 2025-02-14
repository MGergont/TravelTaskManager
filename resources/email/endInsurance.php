<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Powiadomienie o wygaśnięciu polisy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            text-align: center;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        h2 {
            color: #d9534f;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Twoja polisa ubezpieczeniowa wygasa!</h2>
        <p>Cześć, <strong><?= htmlspecialchars($name) ?></strong>!</p>
        <p>Informujemy, że Twoja polisa ubezpieczeniowa <strong>nr <?= htmlspecialchars($policyNumber) ?></strong> wygaśnie dnia <strong><?= htmlspecialchars($expiryDate) ?></strong>.</p>
        <div class="policy-details">
            <p>Nie zwlekaj! Aby uniknąć przerwy w ochronie, przedłuż swoją polisę już teraz.</p>
        </div>
    </div>
</body>
</html>