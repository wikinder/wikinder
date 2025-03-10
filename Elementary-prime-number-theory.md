**Definition (<dfn>Prime number</dfn>)**
<br>
An integer $n > 1$ is prime iff it is not divisible by any integer $i$ such that $2 \le i \le n - 1$.

**primes.py**

```python
def is_prime(n: int) -> bool:
    """Determines if an integer is prime."""

    # 0, 1, and negative numbers are not prime.
    if n <= 1:
        return False

    # If `n` is divisible by `i` such that
    # 2 <= `i` <= `n` - 1, then it is not prime.
    for i in range(2, n):
        if n % i == 0:
            return False

    # Otherwise, `n` is prime.
    return True


# Displays all prime numbers less than 100.
for i in range(1, 100):
    if is_prime(i):
        print(i)
```

**Output**

```
$ python primes.py
2
3
...
97
```
