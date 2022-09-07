/* naprawienie buga, który sprawia, że nie pojawia się na samej górze */
window.scroll({
    top: -57,
    left: 0,
    behavior: 'auto'
});
document.querySelector("html").classList.add("smooth-scroll");

let config = {
    values: {
        gSeparator: " | ",
        gSiteTitle: "Projekt strony",
        gPageTitle: ""
    }
}

config.values.gPageTitle = document.title.replace(config.values.gSiteTitle+config.values.gSeparator,"");

let pages = [
    ["strona_glowna.html","Strona główna"], // [adres, tytuł]
    ["pojecia.html","Pojęcia"],
    ["identyfikatory.html","Identyfikatory"],
    ["include.html","#include"],
    ["css_position.html","Pozycja w CSS"],
    ["galeria.html","Galeria"],
    ["kontakt.html","Kontakt"],
    ["register.html","Rejestracja"]
]

let main = document.querySelector("main");

let headings = ["h1","h2","h3","h4","h5","h6"];

// nie jestem w stanie zoptymalizować ten kod, by mógł zapobiegać powielonym identyfikatorom
for (i=0;i<headings.length;i++) {
    let curLevel = document.querySelectorAll("main "+headings[i]);
    for (j=0;j<curLevel.length;j++) {
        let id = curLevel[j].innerText;
        id = id.replaceAll(/\s/g,"_");
        id = id.replaceAll("#","_");
        id = id.replaceAll(":","_");
        id = id.replaceAll(".","_");
        curLevel[j].id = id;
    }
}

let firstHeading = document.createElement("h1");
firstHeading.id = "firstHeading";
firstHeading.innerHTML = config.values.gPageTitle;

main.insertBefore(firstHeading,main.firstChild);