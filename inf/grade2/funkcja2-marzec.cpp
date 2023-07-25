#include <iostream>
using namespace std;

int odejmijDwa(int n) {
    int wynik = n - 2;
    return wynik;
}

int main() {
    int a=2, b=2;
    cout << "Wartość a: " << a << endl;
    cout << "Wartość b: " << b << endl;
    b = odejmijDwa(a);
    cout << "Wartość a: " << a << endl;
    cout << "Wartość b: " << b << endl;
    return 0;
}
