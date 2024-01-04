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

        #wynik {
            margin-top: 20px;
            font-weight: bold;
        }

        .input-container {
            display: none;
        }

        .input-container.active {
            display: block;
        }
    </style>
    <title>Obliczanie pola trójkąta</title>
</head>
<body>
    <h2>Obliczanie pola trójkąta</h2>

    <label for="opcja">Wybierz sposób obliczeń:</label>
    <select id="opcja">
        <option value="podstawaWysokosc">Podstawa i wysokość</option>
        <option value="trzyBoki">Trzy boki</option>
    </select>

    <div id="podstawaWysokoscInputs" class="input-container active">
        <label for="podstawa">Podstawa:</label>
        <input type="number" id="podstawa" placeholder="Podstawa">

        <label for="wysokosc">Wysokość:</label>
        <input type="number" id="wysokosc" placeholder="Wysokość">
    </div>

    <div id="trzyBokiInputs" class="input-container">
        <label for="bokA">Bok A:</label>
        <input type="number" id="bokA" placeholder="Bok A">

        <label for="bokB">Bok B:</label>
        <input type="number" id="bokB" placeholder="Bok B">

        <label for="bokC">Bok C:</label>
        <input type="number" id="bokC" placeholder="Bok C">
    </div>

    <button onclick="obliczPole()">Oblicz pole</button>

    <div id="wynik"></div>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $opcja = $_POST['opcja'];
            $wynikElement = "";

            if ($opcja == 'podstawaWysokosc') {
                $podstawa = isset($_POST['podstawa']) ? floatval($_POST['podstawa']) : 0;
                $wysokosc = isset($_POST['wysokosc']) ? floatval($_POST['wysokosc']) : 0;
                $pole = 0.5 * $podstawa * $wysokosc;
            } elseif ($opcja == 'trzyBoki') {
                $bokA = isset($_POST['bokA']) ? floatval($_POST['bokA']) : 0;
                $bokB = isset($_POST['bokB']) ? floatval($_POST['bokB']) : 0;
                $bokC = isset($_POST['bokC']) ? floatval($_POST['bokC']) : 0;
                $s = ($bokA + $bokB + $bokC) / 2;
                $pole = sqrt($s * ($s - $bokA) * ($s - $bokB) * ($s - $bokC));
            }

            if (!is_nan($pole)) {
                $wynikElement = "Pole trójkąta wynosi: " . number_format($pole, 2);
            } else {
                $wynikElement = "Wprowadź poprawne dane.";
            }

            echo '<script>document.getElementById("wynik").innerText = "'. $wynikElement .'";</script>';
        }
    ?>

    <script>
        function obliczPole() {
            const opcja = document.getElementById('opcja').value;
            const form = document.createElement('form');
            form.method = 'post';

            const opcjaInput = document.createElement('input');
            opcjaInput.type = 'hidden';
            opcjaInput.name = 'opcja';
            opcjaInput.value = opcja;

            form.appendChild(opcjaInput);

            if (opcja === 'podstawaWysokosc') {
                const podstawa = document.getElementById('podstawa').value;
                const wysokosc = document.getElementById('wysokosc').value;

                const podstawaInput = document.createElement('input');
                podstawaInput.type = 'hidden';
                podstawaInput.name = 'podstawa';
                podstawaInput.value = podstawa;

                const wysokoscInput = document.createElement('input');
                wysokoscInput.type = 'hidden';
                wysokoscInput.name = 'wysokosc';
                wysokoscInput.value = wysokosc;

                form.appendChild(podstawaInput);
                form.appendChild(wysokoscInput);
            } else if (opcja === 'trzyBoki') {
                const bokA = document.getElementById('bokA').value;
                const bokB = document.getElementById('bokB').value;
                const bokC = document.getElementById('bokC').value;

                const bokAInput = document.createElement('input');
                bokAInput.type = 'hidden';
                bokAInput.name = 'bokA';
                bokAInput.value = bokA;

                const bokBInput = document.createElement('input');
                bokBInput.type = 'hidden';
                bokBInput.name = 'bokB';
                bokBInput.value = bokB;

                const bokCInput = document.createElement('input');
                bokCInput.type = 'hidden';
                bokCInput.name = 'bokC';
                bokCInput.value = bokC;

                form.appendChild(bokAInput);
                form.appendChild(bokBInput);
                form.appendChild(bokCInput);
            }

            document.body.appendChild(form);
            form.submit();
        }

        document.getElementById('opcja').addEventListener('change', function() {
            const inputContainers = document.querySelectorAll('.input-container');
            inputContainers.forEach(container => container.classList.remove('active'));

            const selectedContainerId = this.value + 'Inputs';
            const selectedContainer = document.getElementById(selectedContainerId);
            selectedContainer.classList.add('active');
        });
    </script>
</body>
</html>
