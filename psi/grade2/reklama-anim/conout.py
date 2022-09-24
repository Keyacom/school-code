BG_D_RED = "\x1b[41m"
FG_L_YEL = "\x1b[93m"
FG_L_BLK = "\x1b[90m"
FG_L_CYA = "\x1b[96m"
TEXT_BOLD = "\x1b[1m"
RESET_ALL = "\x1b[0m"

print("$ ", FG_L_YEL, "technik ", FG_L_BLK, "-k ", RESET_ALL, "programista ", FG_L_BLK, "-u ", RESET_ALL, "cksulechow.pl ", sep="")
print(TEXT_BOLD, """Technikum programistyczne w Centrum Kształcenia Zawodowego
i Ustawicznego w Sulechowie: http://cksulechow.pl/

Jesteśmy otwarci na nowe wyzwania!""", RESET_ALL, sep="")
print(f"""
U nas się nauczysz:
- zarządzać {FG_L_CYA}stronami internetowymi{RESET_ALL} i je projektować
- programować i testować {FG_L_CYA}aplikacje{RESET_ALL} desktopowe, webowe i mobilne
- administrować {FG_L_CYA}CMSami{RESET_ALL} (systemami zarządzania treścią)
- użytkować {FG_L_CYA}relacyjne bazy danych{RESET_ALL}

Praca jako programista zapewnia:
- ogromną liczbę {FG_L_CYA}ofert pracy{RESET_ALL}
- {FG_L_CYA}wysokie zarobki{RESET_ALL} za pasjonujące zajęcie
- ogromne pole do {FG_L_CYA}rozwoju{RESET_ALL}
- dzięki pracy zdalnej możesz {FG_L_CYA}pracować skąd chcesz, wszędzie!{RESET_ALL}

{BG_D_RED + FG_L_YEL}Nie zwlekaj! Aplikuj teraz!{RESET_ALL}

$""")