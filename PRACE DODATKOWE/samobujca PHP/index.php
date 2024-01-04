<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>samobujca</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      margin: 50px;
    }

    label {
      display: block;
      margin-top: 10px;
    }

    button {
      margin-top: 20px;
      padding: 10px;
      font-size: 16px;
      cursor: pointer;
    }

    #wynik {
      margin-top: 20px;
      font-size: 18px;
    }
  </style>
</head>
<body>

  <h2>Obliczanie czasu spadku</h2>

  <form method="post" action="">
    <label for="wysokosc">Wysokość kondygnacji (m):</label>
    <input type="number" name="wysokosc" placeholder="Wysokość kondygnacji" required>

    <label for="kondygnacje">Ilość kondygnacji:</label>
    <input type="number" name="kondygnacje" placeholder="Ilość kondygnacji" required>

    <button type="submit" name="oblicz">Oblicz</button>
  </form>

  <?php
    if(isset($_POST['oblicz'])){
      $wysokoscKondygnacji = floatval($_POST['wysokosc']);
      $iloscKondygnacji = intval($_POST['kondygnacje']);

      if (empty($wysokoscKondygnacji) || empty($iloscKondygnacji) || $wysokoscKondygnacji <= 0 || $iloscKondygnacji <= 0) {
        echo '<script>alert("Wprowadź poprawne dane.")</script>';
      } else {
        $g = 9.8;
        $czasSpadku = sqrt((2 * $wysokoscKondygnacji) / $g) * $iloscKondygnacji;
        echo '<div id="wynik">Czas spadku wynosi: ' . number_format($czasSpadku, 2) . ' sekundy.</div>';
      }
    }
  ?>

</body>
</html>
