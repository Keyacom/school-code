#!/usr/bin/env python
# For a screenshot.
def sieve(stop):
    """
    Filters out prime numbers from 1 to ``stop``.
    """
    primes = []
    for i in range(1, stop):
        if (i % 2 == 0 and not i == 2
        or  i % 3 == 0 and not i == 3
        or  i % 5 == 0 and not i == 5
        or  i % 7 == 0 and not i == 7):
            continue
        primes += [i]
    return primes