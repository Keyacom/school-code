/**
 * Algorytm do zamiany liczby z postaci
 * dziesiętnej na binarną.
 */

#include <iostream>
#include <string>

using namespace std;

int main() {
	int d;
	string b = "";
	cout << "Podaj liczbę dziesiętną: ";
	cin >> d;
	while (d > 0) {
		b = (d % 2 == 0 // sprawdź podzielność przez 2
			? '0' // podzielne przez 2 -- dodaj 0...
			: '1' // w przeciwnym razie -- dodaj 1...
		) + b; // ...na początku ciągu b
		d /= 2; // podziel d przez 2 i przypisz z powrotem
	}
	cout << "Liczba binarna: " << b;
	return 0;
}