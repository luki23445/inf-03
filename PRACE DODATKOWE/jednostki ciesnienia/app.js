function przeliczCiśnienie() {
    const wartoscCiśnienia = parseFloat(document.getElementById('pressureInput').value);
    const jednostkaPoczątkowa = document.getElementById('fromUnit').value;
    let wynik = '';

    switch (jednostkaPoczątkowa) {
        case 'pascal':
            wynik = `Bar: ${wartoscCiśnienia / 100000}, Atmosfera: ${wartoscCiśnienia / 101325}, Psi: ${wartoscCiśnienia / 6894.76}`;
            break;
        case 'bar':
            wynik = `Paskal: ${wartoscCiśnienia * 100000}, Atmosfera: ${wartoscCiśnienia / 1.01325}, Psi: ${wartoscCiśnienia * 14.5038}`;
            break;
        case 'atm':
            wynik = `Paskal: ${wartoscCiśnienia * 101325}, Bar: ${wartoscCiśnienia * 1.01325}, Psi: ${wartoscCiśnienia * 14.6959}`;
            break;
        case 'psi':
            wynik = `Paskal: ${wartoscCiśnienia * 6894.76}, Bar: ${wartoscCiśnienia / 14.5038}, Atmosfera: ${wartoscCiśnienia / 14.6959}`;
            break;
    }

    document.getElementById('wynik').innerText = wynik;
}
