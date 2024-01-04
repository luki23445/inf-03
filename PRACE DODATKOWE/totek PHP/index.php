<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Totolotka</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            padding: 0;
        }

        #kalkulator {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #wynik {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div id="kalkulator">
        <h2>Kalkulator Totolotka</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="liczby">Podaj od 3 do 6 liczb (oddzielone przecinkami):</label>
            <input type="text" name="liczby" id="liczby" placeholder="np. 1,2,3,4,5,6">

            <button type="submit">Oblicz prawdopodobieństwo</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $wprowadzoneLiczby = $_POST['liczby'];
            $tablicaLiczb = explode(',', $wprowadzoneLiczby);

            if (count($tablicaLiczb) < 3 || count($tablicaLiczb) > 6) {
                echo '<p style="color: red;">Podaj od 3 do 6 liczb.</p>';
            } else {
                $wszystkieKombinacje = [57, 1032, 54201, 13983816];
                $indeksKombinacji = count($tablicaLiczb) - 3;
                $prawdopodobienstwo = 1 / $wszystkieKombinacje[$indeksKombinacji];

                echo '<div id="wynik">Prawdopodobieństwo wygranej: 1 na ' . $wszystkieKombinacje[$indeksKombinacji] . '</div>';
            }
        }
        ?>
    </div>
</body>

</html>