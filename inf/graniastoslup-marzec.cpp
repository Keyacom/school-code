#include <iostream>
using namespace std;

int main() {
    float wymiary[2];
    cout << "Podaj pole podstawy: ";
    cin >> wymiary[0];
    cout << endl << "Podaj wysokość: ";
    cin >> wymiary[1];
    cout << endl << "Objętość: " << wymiary[0] * wymiary[1];
    return 0;
}
