## Exponent rules

1. $a^m a^n = a^{m + n}$
2. $(a^m)^n = a^{mn}$
3. $(ab)^n = a^n b^n$

### Proof

<details>
<summary>[show]</summary>

Let $a$ and $b$ be real numbers, and let $m$ and $n$ be positive integers.

**Definition (_Exponentiation_)**:

$`
\begin{array}{lcl}
a^1       & = & a, \\
a^{n + 1} & = & a^n a \text{ for } n \ge 1.
\end{array}
`$

By induction on $n$:

1. <details>
   <summary>[show]</summary>

   **Base case ($n = 1$)**:
   <br>
   $`
   \begin{align}
   a^m a^1
   &= a^m a \\
   &= a^{m + 1}.
   \end{align}
   `$

   **Inductive step**:
   <br>
   Assume $a^m a^n = a^{m + n}$. Then:

   $`
   \begin{align}
   a^m a^{n + 1}
   &= a^m (a^n a) \\
   &= (a^m a^n) a \\
   &= a^{m + n} a \\
   &= a^{(m + n) + 1} \\
   &= a^{m + (n + 1)}.
   \end{align}
   `$

   </details>

2. <details>
   <summary>[show]</summary>

   **Base case ($n = 1$)**:
   <br>
   $`
   \begin{align}
   (a^m)^1
   &= a^m \\
   &= a^{m \cdot 1}.
   \end{align}
   `$

   **Inductive step**:
   <br>
   Assume $(a^m)^n = a^{mn}$. Then:

   $`
   \begin{align}
   (a^m)^{n + 1}
   &= (a^m)^n a^m \\
   &= a^{mn} a^m \\
   &= a^{mn + m} \\
   &= a^{m(n + 1)}.
   \end{align}
   `$

   </details>

3. <details>
   <summary>[show]</summary>

   **Base case ($n = 1$)**:
   <br>
   $`
   \begin{align}
   (ab)^1
   &= ab \\
   &= a^1 b^1.
   \end{align}
   `$

   **Inductive step**:
   <br>
   Assume $(ab)^n = a^n b^n$. Then:

   $`
   \begin{align}
   (ab)^{n + 1}
   &= (ab)^n (ab) \\
   &= a^n b^n (ab) \\
   &= (a^n a) (b^n b) \\
   &= a^{n + 1} b^{n + 1}.
   \end{align}
   `$

   </details>

</details>

## Logarithm rules

1. $\log_b (xy) = \log_b x + \log_b y$
2. $\log_b (x^k) = k \log_b x$
3. $\log_b x = \frac{\log_c x}{\log_c b}$

### Proof

<details>
<summary>[show]</summary>

Let $x, y > 0$ and $k$ be real numbers, and let $b, c > 0$ be real numbers with $b, c \ne 1$. Since a logarithm is the inverse of exponentiation, we have:

$`b^{\log_b x} = \log_b (b^x) = x,`$

just like $f(f^{-1}(x)) = f^{-1}(f(x)) = x$. Using this:

1. <br>

   $`
   \begin{align}
   \log_b (xy)
   &= \log_b (b^{\log_b x} b^{\log_b y}) \\
   &= \log_b (b^{\log_b x + \log_b y}) \\
   &= \log_b x + \log_b y
   \end{align}
   `$

2. <br>

   $`
   \begin{align}
   \log_b (x^k)
   &= \log_b ((b^{\log_b x})^k) \\
   &= \log_b (b^{k \log_b x}) \\
   &= k \log_b x
   \end{align}
   `$

3. <br>

   $`
   \begin{align}
   \log_b x
   &= \frac{\log_b x \cdot \log_c b}{\log_c b} \\
   &= \frac{\log_c (b^{\log_b x})}{\log_c b} \\
   &= \frac{\log_c x}{\log_c b}
   \end{align}
   `$

</details>
