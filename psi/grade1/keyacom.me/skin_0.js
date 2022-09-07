let header = document.createElement("div");
// definicja zmiennej main przeniesiona do script.js
let body = document.querySelector("body");

header.id = "header";

header.innerHTML = '<header><div class="header-image"><img src="logo-notext.png" alt="Logo - keyacom.me" draggable="false" height="96" width="96"><h1 class="primary">Keyacom</h1><h1 class="secondary">.me</h1></div><div class="pagetitle"><h1>'+config.values.gPageTitle+'</h1></div><div id="header-filler"></div></header><div id="navigation"><input type="checkbox" id="main-menu-opener" class="menu-opener" autofocus="false"><label for="main-menu-opener">Menu</label><nav id="menu"></nav></div>'

body.insertBefore(header,main);

let nav = document.querySelector("nav");
let block_menu = nav.appendChild(document.createElement("ul"));

block_menu.id = "block-menu";

// definicja zmiennej pages jest w script.js
for(i=0;i<pages.length;i++) {
    let menuItem = document.createElement("li");
    let link = document.createElement("a");
    link.href = pages[i][0];
    link.innerText = pages[i][1];
    menuItem.appendChild(link);
    block_menu.appendChild(menuItem);
}

let footer = document.createElement("footer");
body.insertBefore(footer,main.nextSibling);

footer.innerHTML = '<div class="ws-pre">Autor: Wojciech Marzec\nUtworzono 4 kwietnia 2022 r.\nOstatnio zmodyfikowano 11 kwietnia 2022 r.\nStworzono w Visual Studio Code.\n</div><div><a href="kontakt.html">Kontakt</a></div>';

function toggleMenu() {
    let button = document.querySelector("#menu-opener div");
    button.classList.toggle("triangle-l");
    button.classList.toggle("triangle-d");
    let nav = document.querySelector("nav");
    nav.classList.toggle("visible");
}