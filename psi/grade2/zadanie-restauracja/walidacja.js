const walidacja = function(event) {
    event.preventDefault();

    const pola = {
        data: this.querySelector("#data"),
        osoby: this.querySelector("#osoby"),
        tel: this.querySelector("#tel"),
        zgoda: this.querySelector("#zgoda")
    };
    pola.data.value = pola.data.value.trim()
    pola.osoby.value = pola.osoby.value.trim()
    pola.tel.value = pola.tel.value.trim()

    if (!/\d{4}-\d{2}-\d{2}/.test(pola.data.value)) {
        alert('Pole `data` nie jest prawidłowo wypełnione!')
        pola.data.focus();
        return false;
    }
    if (Number.isNaN(Number.parseInt(pola.osoby.value))) {
        alert('Pole `osoby` nie jest liczbą!')
        pola.osoby.focus();
        return false;
    }
    if (!/\d{9}/.test(pola.tel.value)) {
        alert('Pole `tel` nie jest prawidłowym numerem telefonu!')
        pola.tel.focus();
        return false;
    }
    if (!pola.zgoda.checked) {
        alert('Pole `zgoda` nie jest zaznaczone!')
        pola.zgoda.focus();
        return false;
    }
    this.submit();
    return true;
}

const formularz = document.querySelector("#rezerwacja");

formularz.addEventListener("submit", walidacja);