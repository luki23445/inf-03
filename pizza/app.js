function oblicz() {
  let check = document.getElementById("check").checked;
  let km = document.getElementById("km").value;
  let res = document.getElementById("wynik");
  let koszt = 0;
  if (check) {
    res.innerHTML = "Dowieziemy Twoją pizzę za darmo";
  } else {
    koszt = km * 2;
    res.innerHTML = "Dowóz bedzie Cię kosztował " + koszt + " złotych";
  }
}