function wynik(kolor) {
  let rozmiar = document.getElementById("procent").value;
  let styl = document.getElementById("styl").value;
  let wynik = document.getElementById("wynik");
  wynik.style.color = kolor;
  wynik.style.fontSize = rozmiar + "%";
  wynik.style.fontStyle = styl;
}