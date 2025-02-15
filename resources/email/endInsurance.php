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
        .policy-details {
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        ul {
            text-align: left;
            padding-left: 20px;
        }
        .vehicle-list li {
            font-size: 14px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Polisa ubezpieczeniowa wygasa!</h2>
        <p>Cześć,</p>
        <p>Informujemy, że polisa ubezpieczeniowa na następujące pojazdy z Twojej floty wygasa dnia <strong><?= htmlspecialchars($end_of_insurance) ?></strong>:</p>
        
        <ul class="vehicle-list">
                <li><strong>Tablica rejestracyjna: <?= htmlspecialchars($license) ?></strong></li>
                <li><strong>Marka: <?= htmlspecialchars($brand) ?></strong></li>
                <li><strong>Model: <?= htmlspecialchars($model) ?></strong></li>
                <li><strong>Rok produkcji: <?= htmlspecialchars($production_year) ?></strong></li>
        </ul>

        <div class="policy-details">
            <p>Nie zwlekaj! Aby uniknąć przerwy w ochronie, przedłuż polisę jak najszybciej.</p>
        </div>
    </div>
</body>
</html>