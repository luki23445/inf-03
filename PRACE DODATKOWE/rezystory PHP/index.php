<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalkulator Rezystorów</title>
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

  <h2>Kalkulator Rezystorów</h2>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="config">Konfiguracja:</label>
    <select name="config" id="config">
      <option value="series">Szeregowo</option>
      <option value="parallel">Równolegle</option>
    </select>

    <label for="value">Wartość rezystora (Ohm):</label>
    <input type="number" name="value" id="value" placeholder="Podaj wartość rezystora">

    <label for="quantity">Ilość rezystorów:</label>
    <input type="number" name="quantity" id="quantity" placeholder="Podaj ilość rezystorów">

    <button type="submit">Oblicz</button>
  </form>

  <h3>Wartość ekwiwalentna rezystorów:</h3>
  <p id="wynik">-</p>

  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $konfiguracja = $_POST["config"];
      $wartosc = floatval($_POST["value"]);
      $ilosc = intval($_POST["quantity"]);

      if (empty($konfiguracja) || !is_numeric($wartosc) || !is_numeric($ilosc) || $ilosc < 1) {
        echo "<script>alert('Proszę wprowadzić poprawne wartości.')</script>";
      } else {
        $wartoscEkwiwalentna = ($konfiguracja === "series") ? $wartosc * $ilosc : $wartosc / $ilosc;
        echo "<script>document.getElementById('wynik').textContent = '$wartoscEkwiwalentna Ohm';</script>";
      }
    }
  ?>

</body>
</html>
