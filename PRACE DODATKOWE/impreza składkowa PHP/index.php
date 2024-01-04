<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <title>Impreza składkowa</title>
</head>

<body>
    <div class="container">
        <h1>Kalkulator imprezy składkowej</h1>
        <form method="post">
            <div class="input-group">
                <label for="name1">Imię osoby 1:</label>
                <input type="text" name="imiona[]" id="name1">
                <label for="amount1">Kwota:</label>
                <input type="number" name="kwoty[]" id="amount1">
            </div>
            <div class="input-group">
                <label for="name2">Imię osoby 2:</label>
                <input type="text" name="imiona[]" id="name2">
                <label for="amount2">Kwota:</label>
                <input type="number" name="kwoty[]" id="amount2">
            </div>
            <div class="input-group">
                <label for="name3">Imię osoby 3:</label>
                <input type="text" name="imiona[]" id="name3">
                <label for="amount3">Kwota:</label>
                <input type="number" name="kwoty[]" id="amount3">
            </div>
            <div class="input-group">
                <label for="name4">Imię osoby 4:</label>
                <input type="text" name="imiona[]" id="name4">
                <label for="amount4">Kwota:</label>
                <input type="number" name="kwoty[]" id="amount4">
            </div>
            <button type="submit">Oblicz</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $imiona = $_POST['imiona'];
            $kwoty = $_POST['kwoty'];

            $sumaKwot = array_sum($kwoty);
            $udzial = $sumaKwot / 4;
            $saldo = array_map(function ($kwota) use ($udzial) {
                return $kwota - $udzial;
            }, $kwoty);

            echo "<div id='wynik'><h2>Wyniki:</h2>";

            for ($i = 0; $i < 4; $i++) {
                $komunikat = "{$imiona[$i]} ";
                if ($saldo[$i] > 0) {
                    $komunikat .= "musi dopłacić " . number_format($saldo[$i], 2) . " PLN";
                } elseif ($saldo[$i] < 0) {
                    $komunikat .= "otrzyma zwrot " . number_format(abs($saldo[$i]), 2) . " PLN";
                } else {
                    $komunikat .= "rozliczone";
                }

                echo "<p>{$komunikat}</p>";
            }

            echo "</div>";
        }
        ?>
    </div>
</body>

</html>