#include <iostream>
using namespace std;

int dodajCztery(int liczbaPoczatkowa) {
    int wartosc = liczbaPoczatkowa + 4;
    return wartosc;
}

int main() {
    int a=2, b=2;
    cout << "Wartość a: " << a << endl;
    cout << "Wartość b: " << b << endl;
    b = dodajCztery(a);
    cout << "Wartość a: " << a << endl;
    cout << "Wartość b: " << b << endl; // oczekiwane wyjście: "Wartość b: 6"
    return 0;
}
