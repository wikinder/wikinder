**Definition (_Prime number_)**: An integer $n > 1$ is _prime_ iff it is not divisible by any integer $i$ such that $2 \le i \le n - 1$.

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

**Definition (_Divisibility_)**: Let $n$, $m$, and $k$ be integers with $m \ne 0$. We say that $n$ is _divisible_ by $m$ iff there exists $k$ such that $n = km$.

**Theorem**: If $m < n$, then $m \le \frac{n}{2}$.

**Proof**: From $m < n$, we have:

$$
\begin{array}{lll}
km = n & <   & kn \\
1      & <   & k \\
2      & \le & k.
\end{array}
$$

Then we have:

$$
\begin{array}{lll}
2m & \le & km = n \\
m  & \le & \frac{n}{2}.
\end{array}
$$

**Theorem**: If $p$ is a prime divisor of $n$, then $p \le \sqrt{n}$.

**Proof**:
