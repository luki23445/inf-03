<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #calculator {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
        }

        button {
            width: 48%;
            padding: 10px;
            margin: 2px;
        }

        .result {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div id="calculator">
        <h2>Kalkulator</h2>
        <form method="post" action="">
            <input type="text" name="number1" placeholder="Liczba 1" required>
            <input type="text" name="number2" placeholder="Liczba 2">

            <button type="submit" name="operator" value="add">Dodaj</button>
            <button type="submit" name="operator" value="subtract">Odejmij</button>
            <button type="submit" name="operator" value="multiply">Mnóż</button>
            <button type="submit" name="operator" value="divide">Dziel</button>
            <button type="submit" name="operator" value="power">Potęga</button>
            <button type="submit" name="operator" value="sqrt">Pierwiastek</button>

        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $num1 = floatval($_POST['number1']);
            $num2 = isset($_POST['number2']) ? floatval($_POST['number2']) : null;
            $operator = $_POST['operator'];

            try {
                switch ($operator) {
                    case 'add':
                        $result = $num1 + $num2;
                        break;
                    case 'subtract':
                        $result = $num1 - $num2;
                        break;
                    case 'multiply':
                        $result = $num1 * $num2;
                        break;
                    case 'divide':
                        if ($num2 === 0) {
                            throw new DivisionByZeroError("Pamiętaj cholero, nie dziel przez zero!");
                        }
                        $result = $num1 / $num2;
                        break;
                    case 'power':
                        $result = pow($num1, $num2);
                        break;
                    case 'sqrt':
                        if ($num1 < 0) {
                            throw new Exception("Nie można obliczyć pierwiastka z liczby ujemnej");
                        }
                        $result = sqrt($num1);
                        break;
                    default:
                        $result = "Błędny operator";
                        break;
                }

                echo "<p class='result'>Wynik: $result</p>";
            } catch (DivisionByZeroError $e) {
                echo "<p class='result'>" . $e->getMessage() . "</p>";
            } catch (Exception $e) {
                echo "<p class='result'>" . $e->getMessage() . "</p>";
            }
        }
        ?>

    </div>

</body>
</html>
