#include <iostream>
using namespace std;

int main() {
    int n, d = 5; // d od razu jest przypisane tutaj
    cin >> n; // pobierz liczbę od użytkownika
    int pierwsza = n > 1; // sprawdź, czy n jest większe od 1
    if (n > 2 && n % 2 == 0) { // sprawdź, czy n > 2 ORAZ n MOD 2 = 0
        // n jest liczba złożoną
        pierwsza = 0;
    }
    if (n > 3 && n % 3 == 0) { // sprawdź, czy n > 3 ORAZ n MOD 3 = 0
        // n jest liczba złożoną
        pierwsza = 0;
    }
    // Dla wartości logicznych można używać typu int,
    // ponieważ 0 oznacza fałsz, a inne liczby oznaczają prawdę
    while (pierwsza && d*d <= n) {
        // Powtarzaj dopóki liczba zostanie
        // wykryta jako złożona lub d^2 > n.

        // Czy n da się podzielić bez reszty przez d?
        if (n % d == 0) {
            // n jest liczbą złożoną
            pierwsza = 0;
        // Czy n da się podzielić bez reszty przez d + 2?
        } else if (n % (d + 2) == 0) {
            // n jest liczbą złożoną
            pierwsza = 0;
        } else {
            // zwiększ d o 6
            d += 6;
        }
    }
    cout << (pierwsza ? "TAK" : "NIE");

    // operator _?_:_ zastępuje instrukcję warunkową
    // gdzie wymagane byłoby wyrażenie
    return 0;
}
