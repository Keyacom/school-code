let values = {
    siteTitle: "Tworzenie Aplikacji Internetowych — Projekt",
    navLinks: [
        "index.html", "Strona główna",
        "oferta.html", "Technikum",
        "dlaczego.html","Dlaczego ta szkoła",
        "perspektywy.html", "Perspektywy",
        "cena.html","Oblicz cenę",
        "login.html","Zaloguj"
    ]
}

function plural(n,s_nom,s_gen,p_nom,p_gen) {
    n = parseFloat(n);
    if (n == 1) { // czy jest równe 1?
        return s_nom;
    } else if (n % 1 > 0) { // czy jest część dziesiętna?
        return s_gen;
    } else if (n % 10 >= 2 && n % 10 <= 4) { // czy ostatnia cyfra to 2, 3 lub 4?
        return p_nom;
    } else {
        return p_gen;
    }
}