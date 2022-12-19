<?php
namespace Test;

function array_at( array $a, int $licz ) {
    if ( $licz < 0 ) {
        $licz += count( $a );
    }
    return $a[$licz];
}
function dystans_levenshteina(string $s1, string $s2) {
    $macierz = array_fill(
        0,
        strlen( $s2 ), 
        array_fill(
            0,
            strlen( $s1 ),
            0
        )
    );
    $ls1 = str_split($s1);
    $ls2 = str_split($s2);
    foreach ( $ls1 as $i => $_ ) {
        $macierz[$i][0] = $i;
    }
    foreach ( $ls2 as $i => $_ ) {
        $macierz[0][$i] = $i;
    }
    foreach ( $ls1 as $i => $k ) {
        foreach ( $ls2 as $j => $l ) {
            $macierz[$i][$j] = min(
                array_at( $macierz, $i - 1 )[$j] + 1,
                array_at( $macierz[$i], $j - 1 ) + 1,
                array_at( array_at( $macierz, $i - 1 ), $j - 1 ) + ( $k != $l )
            );
        }
    }
    return array_at( array_at( $macierz, -1 ), -1);
}

