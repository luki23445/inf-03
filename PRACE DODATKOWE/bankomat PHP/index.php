<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bankomat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #bankomat {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div id="bankomat">
        <form method="post">
            <label for="1zl">1 zł:</label>
            <input type="number" name="1zl" id="1zl" min="0">

            <label for="2zl">2 zł:</label>
            <input type="number" name="2zl" id="2zl" min="0">

            <label for="5zl">5 zł:</label>
            <input type="number" name="5zl" id="5zl" min="0">

            <label for="10zl">10 zł:</label>
            <input type="number" name="10zl" id="10zl" min="0">

            <label for="20zl">20 zł:</label>
            <input type="number" name="20zl" id="20zl" min="0">

            <label for="50zl">50 zł:</label>
            <input type="number" name="50zl" id="50zl" min="0">

            <label for="100zl">100 zł:</label>
            <input type="number" name="100zl" id="100zl" min="0">

            <label for="200zl">200 zł:</label>
            <input type="number" name="200zl" id="200zl" min="0">

            <label for="500zl">500 zł:</label>
            <input type="number" name="500zl" id="500zl" min="0">

            <label for="amount">Kwota do wypłaty:</label>
            <input type="number" name="amount" id="amount" min="0">

            <button type="submit" name="submit">Oblicz wypłatę</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            obliczWydanie();
        }

        function obliczWydanie()
        {
            $nominaly = [500, 200, 100, 50, 20, 10, 5, 2, 1];
            $ilosci = [];

            foreach ($nominaly as $nominal) {
                $poleName = $nominal . 'zl';
                $ilosc = isset($_POST[$poleName]) ? intval($_POST[$poleName]) : 0;
                array_push($ilosci, $ilosc);
            }

            $kwotaWypłaty = isset($_POST['amount']) ? intval($_POST['amount']) : 0;
            $pozostalaKwota = $kwotaWypłaty;

            $wynik = [];

            for ($i = 0; $i < count($nominaly); $i++) {
                $nominal = $nominaly[$i];
                $ilosc = min($ilosci[$i], floor($pozostalaKwota / $nominal));
                if ($ilosc > 0) {
                    $wynik[$nominal . 'zl'] = $ilosc;
                    $pozostalaKwota -= $ilosc * $nominal;
                }
            }

            echo '<div id="wynik">';
            if ($pozostalaKwota === 0) {
                wyswietlWynik($wynik);
            } else {
                echo 'Błąd: Brak wystarczających środków.';
            }
            echo '</div>';
        }

        function wyswietlWynik($wynik)
        {
            echo 'Wypłacono: ';
            $wynikTekst = array_map(
                function ($nominal, $ilosc) {
                    return $ilosc . ' x ' . $nominal;
                },
                array_keys($wynik),
                $wynik
            );
            echo implode(', ', $wynikTekst);
        }
        ?>
    </div>
</body>

</html>