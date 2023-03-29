const LEWA = document.getElementById('lewa')
const PRAWA = document.getElementById('prawa')

function zmienKolorTla() {
    PRAWA.style.backgroundColor = this.value
}

LEWA.querySelector('#kolor-tla-I').addEventListener('click', zmienKolorTla)
LEWA.querySelector('#kolor-tla-S').addEventListener('click', zmienKolorTla)
LEWA.querySelector('#kolor-tla-O').addEventListener('click', zmienKolorTla)

function zmienKolorTekstu() {
    PRAWA.style.color = this.value
}

LEWA.querySelector('#kolor-czcionki').addEventListener('change', zmienKolorTekstu)

function zmienRozmiarTekstu() {
    PRAWA.style.fontSize = this.value
}

LEWA.querySelector('#rozmiar-czcionki').addEventListener('blur', zmienRozmiarTekstu)

function zmienWyswietlanieRamki() {
    PRAWA.querySelector('img').style.borderStyle = (this.checked ? 'solid' : 'none')
}

LEWA.querySelector('#cb-ramka').addEventListener('click', zmienWyswietlanieRamki)

function zmienRodzajPunktorow(e, r) {
    PRAWA.style.listStyle = r
}

LEWA.querySelector('#r-punktor-dysk').addEventListener('click', (e) => zmienRodzajPunktorow(e, 'disc'))
LEWA.querySelector('#r-punktor-kwadrat').addEventListener('click', (e) => zmienRodzajPunktorow(e, 'square'))
LEWA.querySelector('#r-punktor-okrag').addEventListener('click', (e) => zmienRodzajPunktorow(e, 'circle'))