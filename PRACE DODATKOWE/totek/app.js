function obliczPrawdopodobienstwo() {
    var wprowadzoneLiczby = document.getElementById('liczby').value;
    var tablicaLiczb = wprowadzoneLiczby.split(',').map(Number);

    if (tablicaLiczb.length < 3 || tablicaLiczb.length > 6) {
        alert('Podaj od 3 do 6 liczb.');
        return;
    }


    var wszystkieKombinacje = [57, 1032, 54201, 13983816];


    var indeksKombinacji = tablicaLiczb.length - 3;


    var prawdopodobienstwo = 1 / wszystkieKombinacje[indeksKombinacji];


    document.getElementById('wynik').innerHTML = 'Prawdopodobieństwo wygranej: 1 na ' + wszystkieKombinacje[indeksKombinacji];
}