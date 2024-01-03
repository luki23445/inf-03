function zamow() {
  let wynik = document.getElementById("wynik");
  let numer = parseInt(document.getElementById("numer").value);
  let waga = parseInt(document.getElementById("waga").value);
  let koszt = 0;
  switch (numer) {
    case (1):
      koszt = waga * 5;
      wynik.innerHTML = "Koszt zamówienia wynosi " + koszt + " złotych";
      break;
    case (2):
      koszt = waga * 6;
      wynik.innerHTML = "Koszt zamówienia wynosi " + koszt + " złotych";
      break;
    case (3):
      koszt = waga * 7;
      wynik.innerHTML = "Koszt zamówienia wynosi " + koszt + " złotych";
      break;
    default:
      wynik.innerHTML = "Koszt zamówienia wynosi " + koszt + " złotych";
  }
}