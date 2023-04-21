#include <iostream>
using namespace std;

int main() {
    int n, d = 3;
    cin >> n;
    int pierwsza = n > 1;
    if (n > 2 && n % 2 == 0) {
        pierwsza = 0; // 0 = false
    }
    while (pierwsza && d*d <= n) {
        if (n % d == 0) {
            pierwsza = 0;
        } else {
            d += 2;
        }
    }
    cout << (pierwsza ? "TAK" : "NIE");
    return 0;
}
