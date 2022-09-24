//utworzenie funkcji o nazwie czas
function czas() {
    var data = new Date(); //tworzymy obiekt typu data
    var godzina = data.getHours(); //pobieramy godzinę
    var minuta = data.getMinutes(); //pobieramy minutę
    var sekunda = data.getSeconds(); //pobieramy sekundy
    var dzien = data.getDate(); //dzien mies
    var rok = data.getFullYear(); //rok
    var dzient = data.getDay();
    var mies = data.getMonth();

    var dni_tyg = ["niedziela","ponie\u00ADdziałek","wtorek","środa","czwartek","piątek","sobota"];
    var miesiace_gen = ["stycznia","lutego","marca","kwietnia","maja","czerwca","lipca","sierpnia","września","października","listopada","grudnia"]

    document.querySelector("#zegar").innerHTML = (godzina < 10 ? "0" : "")+ godzina + ":" +(minuta < 10 ? "0" : "")+ minuta + ":" + (sekunda < 10 ? "0" : "")+sekunda + "<br>Dzisiaj jest "+dni_tyg[dzient]+", " + dzien+ " "+miesiace_gen[mies] +" "+ rok+"&nbsp;r.";

    var countdownDate = new Date(data.getFullYear(),5,24).getTime();
    var now = data.getTime();
    var dist = countdownDate - now; // odległość do tej daty

    var cdDni = Math.floor(dist / (1000*60*60*24));
    var cdGodz = Math.floor((dist % (1000*60*60*24)) / (1000*60*60));
    var cdMin = Math.floor((dist % (1000*60*60)) / (1000*60));
    var cdSek = Math.floor((dist % (1000*60)) / 1000);

    document.querySelector("#zegar").innerHTML = document.querySelector("#zegar").innerHTML + "<br>Do końca semes\u00ADtru "+plural(cdDni,"został","zostało","zostały","zostało")+" "+cdDni+" "+plural(cdDni,"dzień","dnia","dni","dni")+", "+cdGodz+" "+plural(cdGodz,"godzina","godziny","godziny","godzin")+", "+cdMin+" "+plural(cdMin,"minuta","minuty","minuty","minut")+", i "+cdSek+" "+plural(cdSek,"sekun\u00ADda","sekun\u00ADdy","sekun\u00ADdy","sekund");

    setTimeout(czas, 1000); //samowywołanie się funkcji po 1s
}
window.addEventListener("load", czas); //wywołanie funkcji czas po załadowaniu strony

let body = document.querySelector("body");
let main = document.querySelector("main");
let header = document.createElement("div");
let aside = document.querySelector("aside");

header.id = "header";
header.innerHTML = '<div id="header-fill"></div><header><img src="logo.png" height="75" width="102"><h1>Tworzenie Aplikacji Internetowych — Projekt</h1></header><div id="navigation" class="navigation"><input type="checkbox" id="main-menu-opener" class="menu-opener"><label for="main-menu-opener"></label><nav></nav></div>';

body.insertBefore(header,aside);

let nav = document.querySelector("nav");

for (i=0;i<values.navLinks.length/2;i++) {
    let navItem = document.createElement("a");
    navItem.href = values.navLinks[2*i];
    navItem.innerText = values.navLinks[2*i+1];
    nav.appendChild(navItem);
}

let footer = document.createElement("footer");
footer.id = "footer"; // możliwość stworzenia linka na dół strony
footer.innerHTML = 
`<span>Autorzy: Kewin Kral i Wojciech Marzec</span>
<span>Ostatnia modyfikacja: 18 maja 2022&nbsp;r.</span>
<span>Wszelkie prawa zastrzeżone</span>`;

body.appendChild(footer);

let tables = document.querySelectorAll("main table");
for (let i in tables) {
    tables[i].outerHTML = `<div class="scroll-x">${tables[i].outerHTML}</div>`
}