#include <ctime> // tylko dla funkcji 'srand'
#include <cstdlib>
#include <cstdio>
#include <utility> // Tu jest zdefiniowana funkcja 'std::swap'
#include <chrono> // dokładniejsze pomiary czasu

const int N = 10000;
int tab_babelek[N];
int tab_wstaw[N];

void losowe_wypelnij(int a, int b) {
    srand(time(NULL));
	for (int i = 0; i < N; i++) {
		tab_babelek[i] = a + rand() % (b - a + 1);
		tab_wstaw[i] = a + rand() % (b - a + 1);
	}
}

void babelek(int tab[], int w) {
    for (int _ = 0; _ < w - 1; _++) {
        for (int i = 0; i < w - 1; i++) {
            if (tab[i] > tab[i + 1]) {
                std::swap(tab[i], tab[i + 1]);
            }
        }
    }
}

void wstaw(int tab[], int w) {
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

using namespace std::chrono;

// 'typedef': nadaje alias typowi
// tutaj, definiuję alias 'uint' dla typu 'unsigned int'
typedef unsigned int uint;

/// Zwraca czas w milisekundach potrzebny do posortowania tablicy sortowaniem bąbelkowym.
uint zmierz_babelek() {
    // 'auto': wybiera typ na podstawie typu wartości zwracanej przez funkcję
    auto teraz = system_clock::now();
    babelek(tab_babelek, N);
    auto potem = system_clock::now();
    return duration_cast<milliseconds>(potem - teraz).count();
}

/// Zwraca czas w milisekundach potrzebny do posortowania tablicy sortowaniem przez wstawienie.
uint zmierz_wstaw() {
    auto teraz = system_clock::now();
    wstaw(tab_wstaw, N);
    auto potem = system_clock::now();
    return duration_cast<milliseconds>(potem - teraz).count();
}

int main() {
    printf("Sortowanie losowych tablic %i-elementowych\n\n", N);
    losowe_wypelnij(0, N);
    
    uint b = zmierz_babelek();
    printf("===== Sortowanie bąbelkowe =====\n\n");
    printf("Sortowanie zajęło %i ms.\n\n", b);
    
    uint w = zmierz_wstaw();
    printf("== Sortowanie przez wstawienie =\n\n");
    printf("Sortowanie zajęło %i ms.\n", w);
    
    return 0;
}

