#include <iostream>
using namespace std;

int main() {
    int n, d = 2; // d od razu jest przypisane tutaj
    cin >> n; // pobierz liczbę od użytkownika
    int pierwsza = n > 1; // sprawdź, czy n jest większe od 1
    // Dla wartości logicznych można używać typu int,
    // ponieważ 0 oznacza fałsz, a inne liczby oznaczają prawdę
    while (pierwsza && d*d <= n) {
        // Powtarzaj dopóki liczba zostanie
        // wykryta jako złożona lub d^2 > n.

        // Czy n da się podzielić bez reszty przez d?
        if (n % d == 0) {
            // n jest liczbą złożoną
            pierwsza = 0;
        } else {
            // zwiększ d o 1
            d++;
        }
    }
    // Wypisuje TAK, jeśli liczba jest pierwsza, NIE, jeśli nie.
    cout << (pierwsza ? "TAK" : "NIE");
    // operator _?_:_ zastępuje instrukcję warunkową
    // gdzie wymagane byłoby wyrażenie
    return 0;
}
