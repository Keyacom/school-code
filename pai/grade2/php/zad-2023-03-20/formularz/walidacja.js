{
  const FORM = document.getElementById("form-rejestracja")
  // czlon1 lub czlon1-czlon2
  const RE_IMIE_NAZWISKO = /^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+(?:-[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+)?$/
  // Dowolna kombinacja liter, cyfr, myślników, kropek i podłóg (nie może się zaczynać od myślnika, kropki lub podłogi).
  const RE_LOGIN = /^[0-9A-Z][0-9A-Z_.-]*$/i
  // Co najmniej 8 znaków innych niż spacje
  const RE_HASLO = /^\S{8,}$/
  // Adres e-mail
  const RE_EMAIL = /^[0-9a-zA-Z_.-]+@[0-9a-zA-Z_.-]+\.[a-z]{2,3}$/
  // Dziewięć cyfr
  const RE_TEL = /^\d{9}$/

  FORM.addEventListener('submit', (event) => {
    const POLE_LOGIN = FORM.querySelector("#login")
    const POLE_HASLO = FORM.querySelector("#haslo")
    const POLE_POWT_HASLO = FORM.querySelector("#powt-haslo")
    const POLE_IMIE = FORM.querySelector("#imie")
    const POLE_NAZWISKO = FORM.querySelector("#nazwisko")
    const POLE_EMAIL = FORM.querySelector("#email")
    const POLE_TEL = FORM.querySelector("#tel")
    if (!RE_LOGIN.test(POLE_LOGIN.value)) {
      alert("Login powinien być dowolną kombinacją liter, cyfr, myślników, kropek i podłóg (nie może się zaczynać od myślnika, kropki lub podłogi).")
      POLE_LOGIN.focus()
      return event.preventDefault()
    }
    if (!RE_HASLO.test(POLE_HASLO.value)) {
      alert("Hasło powinno być kombinacją co najmniej ośmiu znaków innych niż spacje.")
      POLE_HASLO.focus()
      return event.preventDefault()
    }
    if (POLE_POWT_HASLO.value != POLE_HASLO.value) {
      alert("Hasła są różne.")
      POLE_POWT_HASLO.focus()
      return event.preventDefault()
    }
    if (!RE_IMIE_NAZWISKO.test(POLE_IMIE.value)) {
      alert("Imię powinno mieć formę <człon 1> lub <człon 1>-<człon 2>. Każdy człon powinien zaczynać się wielką literą.")
      POLE_IMIE.focus()
      return event.preventDefault()
    }
    if (!RE_IMIE_NAZWISKO.test(POLE_NAZWISKO.value)) {
      alert("Nazwisko powinno mieć formę <człon 1> lub <człon 1>-<człon 2>. Każdy człon powinien zaczynać się wielką literą.")
      POLE_NAZWISKO.focus()
      return event.preventDefault()
    }
    if (!RE_EMAIL.test(POLE_EMAIL.value)) {
      alert("Adres e-mail powinien mieć formę example@example.com.")
      POLE_EMAIL.focus()
      return event.preventDefault()
    }
    if (!RE_TEL.test(POLE_TEL.value)) {
      alert("Numer telefonu musi mieć 9 cyfr.")
      POLE_TEL.focus()
      return event.preventDefault()
    }
  })
}