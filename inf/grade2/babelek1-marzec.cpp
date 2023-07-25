#include <iostream>
#include <ctime>
#include <cstdlib>
// tu nie uwzględniam 'using namespace std;',
// ponieważ jest to dość duża przestrzeń nazw,
// co może powodować konflikty

const int N = 25;
int tab[N];

void losuj(int a, int b) {
	srand(time(NULL));
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

int main() {
	losuj(0, 100);
    wypisz();
    return 0;
}