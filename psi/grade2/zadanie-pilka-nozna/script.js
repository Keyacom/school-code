(() => {
    // Wyświetlanie drużyn

    const blokDruzyny = document.querySelector("#druzyny")
    if (blokDruzyny !== null) {
        let spec = blokDruzyny.innerHTML.trim()
        blokDruzyny.innerHTML = ''

        spec = spec.replace(/^[^\S\n]+|[^\S\n]+$/gm, '')
    
        let druzyny = spec.split(/\n/g)
        druzyny = druzyny.map(e => {
        /(\w+)\s*:\s*(\d+)\s*,\s*([ABC])/g.exec(e)
            return {
                skrot: RegExp.$1,
                numer: RegExp.$2,
                grupa: RegExp.$3
            }
        })
    
        druzyny.forEach(e => {
            const html = `<div class="druzyna">
                <div class="skrot">${e.skrot}</div>
                <div class="numer">${e.numer}</div>
                <div class="grupa">grupa: ${e.grupa}</div>
            </div>`

            blokDruzyny.innerHTML += html
        })
    }

    // Formularz

    const formularz = document.querySelector("#formularz")

    if (formularz !== null) {
        const pilkarze = {
            Bramkarze: ['Wojciech Szczęsny', 'Łukasz Skorupski'],
            Obrońcy: ['Jan Bednarek', 'Kamil Glik'],
            Pomocnicy: ['Grzegorz Krychowiak', 'Kamil Grosicki'],
            Napastnicy: ['Robert Lewandowski', 'Arkadiusz Milik']
        }

        const zobaczPilkarzy = function (event) {
            event.preventDefault()
            const wybor = document.querySelector("#pozycja")?.value

            const wynik = document.querySelector("#wynik-formularza")
            wynik.innerHTML = ''

            for (let i of pilkarze[wybor]) {
                wynik.innerHTML += `<li>${i}</li>`
            }
        }

        formularz.addEventListener("submit", zobaczPilkarzy)
    }
})()