<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }

        #container {
            width: 300px;
            margin: 0 auto;
        }
    </style>
    <title>Kalkulator Oszczędności CO2</title>
</head>

<body>
    <div id="container">
        <h2>Kalkulator Oszczędności CO2</h2>
        <form method="post" action="">
            <label for="inputMieszkancy">Liczba mieszkańców:</label>
            <input type="number" name="inputMieszkancy" id="inputMieszkancy" min="1"
                placeholder="Podaj liczbę mieszkańców">

            <button type="submit" name="obliczCO2">Oblicz</button>
        </form>

        <div id="wynik">
            <?php
            if (isset($_POST['obliczCO2'])) {
                $liczbaMieszkancow = isset($_POST['inputMieszkancy']) ? intval($_POST['inputMieszkancy']) : 0;

                if ($liczbaMieszkancow <= 0) {
                    echo "Proszę podać prawidłową liczbę mieszkańców.";
                } else {
                    $watyOszczedzoneNaOsobe = 100 - 5;
                    $calkowiteWatyzOszczedzone = $liczbaMieszkancow * $watyOszczedzoneNaOsobe;

                    $wspolczynnikEmisjiCO2 = 0.4;

                    $CO2Oszczedzone = ($calkowiteWatyzOszczedzone * 24 * 365 * $wspolczynnikEmisjiCO2) / 1000;

                    echo "Oszczędność CO2: " . number_format($CO2Oszczedzone, 2) . " kg CO2 na rok.";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>