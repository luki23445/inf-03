const iloscProduktow = document.querySelectorAll('.ilosc')
const nazwaProduktow = document.querySelectorAll('.produkt')
const aktualizujPrzycisk = document.querySelectorAll('.aktualizuj')
const zamowPrzycisk = document.querySelectorAll('.zamow')
let idZamowienia = 0

function sprawdz() {
    iloscProduktow.forEach((produkt) => {
        if (produkt.innerHTML == 0) {
            produkt.style = 'background-color: red;'
        }
        if (produkt.innerHTML >= 1 && produkt.innerHTML <= 5) {
            produkt.style = 'background-color: yellow;'
        }
        if (produkt.innerHTML > 5) {
            produkt.style = 'background-color: Honeydew;'
        }
    })
}

aktualizujPrzycisk.forEach((przycisk, i) => {
    przycisk.addEventListener('click', () => {
        const nowaIlosc = prompt('Podaj nową ilość:')
        iloscProduktow[i].innerHTML = nowaIlosc
        sprawdz()
    })
})

zamowPrzycisk.forEach((przycisk, i) => {
    przycisk.addEventListener('click', () => {
        alert('Zamówienie nr: ' + idZamowienia + ' Produkt: ' + nazwaProduktow[i].innerHTML)
        idZamowienia++
    })
})
sprawdz()