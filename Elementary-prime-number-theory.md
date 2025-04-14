**Definition (<dfn>Prime number</dfn>)**: An integer $n > 1$ is prime iff it is not divisible by any integer $i$ such that $2 \le i \le n - 1$.

```python
def is_prime(n: int) -> bool:
    """Determines if an integer is prime."""

    # Negative numbers and the numbers 0 and 1 are
    # not prime.
    if n <= 1:
        return False

    # If `n` is divisible by any integer in the
    # interval $[2, n)$, then it is not prime.
    for i in range(2, n):
        if n % i == 0:
            return False

    # Otherwise, `n` is prime.
    return True


# Displays all prime numbers less than 100.
for i in range(100):
    if is_prime(i):
        print(i)
```

```
2
3
...
97
```
