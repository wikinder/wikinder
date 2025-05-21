## Exponent laws

1. $`a^m a^n = a^{m + n}`$

2. $`(a^m)^n = a^{mn}`$

3. $`(ab)^n = a^n b^n`$

### Proof

<details>
<summary>[show]</summary>

Let $a$ and $b$ be real numbers, and $m$ and $n$ be positive integers. By induction on $n$:

1. Base case ($n = 1$):
   <br>
   $`a^m a^1 = a^m a = a^{m + 1}`$.

   Inductive step:
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

2. Base case:

3. Base case:

</details>

## Logarithm laws

$`\log_b (xy) = \log_b x + \log_b y`$

$`\log_b (x^k) = k \log_b x`$

$`\log_b x = \frac{\log_c x}{\log_c b}`$

### Proof

<details>
<summary>[show]</summary>

$`
\begin{align}
\log_b (xy)
&= \log_b (b^{\log_b x} b^{\log_b y}) \\
&= \log_b (b^{\log_b x + \log_b y}) \\
&= \log_b x + \log_b y
\end{align}
`$

$`
\begin{align}
\log_b (x^k)
&= \log_b [(b^{\log_b x})^k] \\
&= \log_b (b^{k \log_b x}) \\
&= k \log_b x
\end{align}
`$

$`
\begin{align}
\log_b x
&= \frac{\log_b x \cdot \log_c b}{\log_c b} \\
&= \frac{\log_c (b^{\log_b x})}{\log_c b} \\
&= \frac{\log_c x}{\log_c b}
\end{align}
`$

</details>
