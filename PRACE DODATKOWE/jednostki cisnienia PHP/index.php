<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przelicznik Ciśnienia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #0056b3;
        }

        #wynik {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Przelicznik Ciśnienia</h1>
        <div>
            <form method="post">
                <label for="pressureInput">Podaj ciśnienie:</label>
                <input type="number" name="pressureInput" id="pressureInput" placeholder="Wprowadź wartość" required>
                <select name="fromUnit" id="fromUnit">
                    <option value="pascal">Paskal</option>
                    <option value="bar">Bar</option>
                    <option value="atm">Atmosfera</option>
                    <option value="psi">Psi</option>
                </select>
                <button type="submit" name="calculate">Przelicz</button>
            </form>
        </div>
        <div id="wynik">
            <?php
            if (isset($_POST['calculate'])) {
                $wartoscCiśnienia = floatval($_POST['pressureInput']);
                $jednostkaPoczątkowa = $_POST['fromUnit'];
                $wynik = '';

                switch ($jednostkaPoczątkowa) {
                    case 'pascal':
                        $wynik = "Bar: " . ($wartoscCiśnienia / 100000) . ", Atmosfera: " . ($wartoscCiśnienia / 101325) . ", Psi: " . ($wartoscCiśnienia / 6894.76);
                        break;
                    case 'bar':
                        $wynik = "Paskal: " . ($wartoscCiśnienia * 100000) . ", Atmosfera: " . ($wartoscCiśnienia / 1.01325) . ", Psi: " . ($wartoscCiśnienia * 14.5038);
                        break;
                    case 'atm':
                        $wynik = "Paskal: " . ($wartoscCiśnienia * 101325) . ", Bar: " . ($wartoscCiśnienia * 1.01325) . ", Psi: " . ($wartoscCiśnienia * 14.6959);
                        break;
                    case 'psi':
                        $wynik = "Paskal: " . ($wartoscCiśnienia * 6894.76) . ", Bar: " . ($wartoscCiśnienia / 14.5038) . ", Atmosfera: " . ($wartoscCiśnienia / 14.6959);
                        break;
                }

                echo $wynik;
            }
            ?>
        </div>
    </div>
</body>

</html>
