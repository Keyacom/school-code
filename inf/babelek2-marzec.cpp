#include <iostream>
// tu nie uwzględniam 'using namespace std;',
// ponieważ jest to dość duża przestrzeń nazw,
// co może powodować konflikty

const int N = 15;
int tab[N] = {13, 2, 5, 6, 1, 14, 11, 10, 7, 9, 8, 0, 4, 12, 3};

void wypisz() {
    std::cout << "{";
    for (int i = 0; i < N - 1; i++) {
        std::cout << tab[i] << ", ";
    }
    std::cout << tab[N - 1] << "}\n";
}

void babelek() {
    for (int i = 0; i < N - 1; i++) {
        if (tab[i] > tab[i + 1]) {
            std::swap(tab[i], tab[i + 1]);
        }
    }
}

void sort_b() {
    for (int i = 0; i < N - 1; i++) {
        babelek();
    }
}

int main() {
    wypisz();
    sort_b();
    wypisz();
    return 0;
}