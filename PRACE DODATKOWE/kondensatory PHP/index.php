<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalkulator Kondensatorów</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
  </style>
</head>
<body>

  <h2>Kalkulator Kondensatorów</h2>

  <form method="post">
    <label for="config">Konfiguracja:</label>
    <select name="config" id="config">
      <option value="series">Szeregowo</option>
      <option value="parallel">Równolegle</option>
    </select>

    <label for="value">Wartość kondensatora (uF):</label>
    <input type="number" name="value" id="value" placeholder="Podaj wartość kondensatora">

    <label for="quantity">Ilość kondensatorów:</label>
    <input type="number" name="quantity" id="quantity" placeholder="Podaj ilość kondensatorów">

    <button type="submit">Oblicz</button>
  </form>

  <h3>Wartość ekwiwalentna kondensatorów:</h3>
  <p id="wynik">
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $konfiguracja = $_POST["config"];
        $wartosc = floatval($_POST["value"]);
        $ilosc = intval($_POST["quantity"]);

        if (is_numeric($wartosc) && is_numeric($ilosc) && $ilosc >= 1) {
          $wartoscEkwiwalentna = ($konfiguracja === "series") ? $wartosc * $ilosc : $wartosc / $ilosc;
          echo $wartoscEkwiwalentna . " uF";
        } else {
          echo "Proszę wprowadzić poprawne wartości.";
        }
      }
    ?>
  </p>

</body>
</html>
