/**
 * Algorytm do zamiany liczby z postaci
 * binarnej na dziesiętną.
 */

#include <iostream>
#include <string>

using namespace std;

int main() {
	int i,
	d = 0,
	potega = 1;
	string b = "";
	cout << "Podaj liczbę binarną: ";
	cin >> b;
	for (i = b.size() - 1; i >= 0; i--) {
		if (b[i] == '1') { // jeśli dany bit to 1...
			d += potega; // dodaj aktualną potęgę do p
		}
		potega *= 2; // podwój potęgę
	}
	cout << "Liczba dziesiętna: " << d;
	return 0;
}