#include <iostream>
#include <ctime>
#include <cstdlib>
// tu nie uwzględniam 'using namespace std;',
// ponieważ jest to dość duża przestrzeń nazw,
// co może powodować konflikty

const int N = 15;
int tab[N];
// wystarczy tylko jedna inicjalizacja generatora liczb losowych
srand(time(NULL));

void losuj(int a, int b) {
	for (int i = 0; i < N; i++) {
		tab[i] = a + rand() % (b - a + 1);
	}
}

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
	losuj(0, 100);
    wypisz();
    sort_b();
    wypisz();
    return 0;
}