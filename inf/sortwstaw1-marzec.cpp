#include <iostream>
#include <cstdlib>
#include <ctime>

using namespace std;

void sort(int tab[], int w) {
    int x, k;
    for (int i = 1; i < w; i++) {
        x = tab[i];
        for (k = i - 1; k >= 0; k--) {
            if (x < tab[k]) {
                tab[k+1] = tab[k];
            } else {
                break;
            }
        }
        tab[k+1] = x;
    }
}

int main() {
    const int w = 10;
    int tab[w];
    srand(time(NULL));
    for (int i = 0; i < w; i++) {
        tab[i] = 1 + rand() % 100;
    }
    sort(tab, w);
    for (int i = 0; i < w; i++) {
        cout << tab[i] << endl;
    }
    return 0;
}