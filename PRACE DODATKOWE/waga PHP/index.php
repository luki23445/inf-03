<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #result {
            margin-top: 20px;
        }
    </style>
    <title>Kalkulator Kalorii</title>
</head>

<body>
    <h2>Kalkulator Kalorii</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="wagaObecna">Waga obecna (kg):</label>
        <input type="number" name="wagaObecna" placeholder="Waga obecna" required>

        <label for="wagaDocelowa">Waga docelowa (kg):</label>
        <input type="number" name="wagaDocelowa" placeholder="Waga docelowa" required>

        <label for="iloscDni">Liczba dni:</label>
        <input type="number" name="iloscDni" placeholder="Liczba dni" required>

        <button type="submit" name="calculateButton">Oblicz</button>
    </form>

    <div id="wynik">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calculateButton"])) {
            $wagaObecna = floatval($_POST["wagaObecna"]);
            $wagaDocelowa = floatval($_POST["wagaDocelowa"]);
            $iloscDni = intval($_POST["iloscDni"]);

            if (empty($wagaObecna) || empty($wagaDocelowa) || empty($iloscDni)) {
                echo "Wprowadź poprawne wartości dla wagi obecnej, wagi docelowej i ilości dni.";
            } else {
                $roznicaKalorii = ($wagaDocelowa - $wagaObecna) * 7700;
                $dziennaZmianaKalorii = $roznicaKalorii / $iloscDni;

                if ($dziennaZmianaKalorii > 0) {
                    echo "Aby osiągnąć wagę docelową, musisz dodać około " . number_format($dziennaZmianaKalorii, 2) . " kcal dziennie.";
                } else if ($dziennaZmianaKalorii < 0) {
                    echo "Aby osiągnąć wagę docelową, musisz odjąć około " . number_format(abs($dziennaZmianaKalorii), 2) . " kcal dziennie.";
                } else {
                    echo "Już jesteś w swojej wadze docelowej!";
                }
            }
        }
        ?>
    </div>
</body>

</html>