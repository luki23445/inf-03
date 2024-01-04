<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kolor</title>
    <style>
        .kolor {
            width: 100px;
            height: 10px;
            border: 2px black solid;
        }

        #kolor {
            width: 100px;
            height: 100px;
            border: 2px black solid;
        }
    </style>
</head>

<body>
    <div id="kolor"></div>
    <input type="number" id="r" placeholder="255" oninput="oblicz()">
    <input type="range" id="kolor_r_opacity" oninput="opacity('r')">
    <div id="kolor_r" class="kolor"></div>

    <input type="number" id="g" placeholder="255" oninput="oblicz()">
    <input type="range" id="kolor_g_opacity" oninput="opacity('g')">
    <div id="kolor_g" class="kolor"></div>

    <input type="number" id="b" placeholder="255" oninput="oblicz()">
    <input type="range" id="kolor_b_opacity" oninput="opacity('b')">
    <div id="kolor_b" class="kolor"></div>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $r = isset($_POST["r"]) ? $_POST["r"] : 0;
            $g = isset($_POST["g"]) ? $_POST["g"] : 0;
            $b = isset($_POST["b"]) ? $_POST["b"] : 0;
            $opacity_r = isset($_POST["opacity_r"]) ? $_POST["opacity_r"] : 100;
            $opacity_g = isset($_POST["opacity_g"]) ? $_POST["opacity_g"] : 100;
            $opacity_b = isset($_POST["opacity_b"]) ? $_POST["opacity_b"] : 100;

            echo '<style>
                    #kolor {
                        background-color: rgb(' . $r . ',' . $g . ',' . $b . ');
                    }
                    #kolor_r {
                        background-color: rgba(' . $r . ',0,0,' . $opacity_r / 100 . ');
                    }
                    #kolor_g {
                        background-color: rgba(0,' . $g . ',0,' . $opacity_g / 100 . ');
                    }
                    #kolor_b {
                        background-color: rgba(0,0,' . $b . ',' . $opacity_b / 100 . ');
                    }
                </style>';
        }
    ?>

    <script>
        function oblicz() {
            var r = document.getElementById("r").value;
            var g = document.getElementById("g").value;
            var b = document.getElementById("b").value;
            var kolor = document.getElementById("kolor");
            var kolor_r = document.getElementById("kolor_r");
            var kolor_g = document.getElementById("kolor_g");
            var kolor_b = document.getElementById("kolor_b");

            kolor.style.backgroundColor = "rgb(" + r + ", " + g + ", " + b + ")";
            kolor_r.style.backgroundColor = "rgb(" + r + ", 0, 0)";
            kolor_g.style.backgroundColor = "rgb(0," + g + ", 0)";
            kolor_b.style.backgroundColor = "rgb(0, 0, " + b + ")";
        }

        function opacity(color) {
            var opacity_value = document.getElementById("kolor_" + color + "_opacity").value;
            var kolor = document.getElementById("kolor_" + color);

            kolor.style.opacity = opacity_value / 100;
        }
    </script>
</body>

</html>
