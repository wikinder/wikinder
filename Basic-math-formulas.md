## Exponent laws

$$a^m a^n = a^{m + n}$$

$$(a^m)^n = a^{mn}$$

$$(ab)^n = a^n b^n$$

### Proof

<details>
<summary>[show]</summary>

Let $a$ be a real number, and $m$ and $n$ be positive integers. By induction on $n$:

Base case ($n = 1$):
<br>
$a^m a^1 = a^m a = a^{m + 1}$.

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

</details>

## Logarithm laws

$$\log_b (xy) = \log_b x + \log_b y$$

$$\log_b (x^k) = k \log_b x$$

$$\log_b x = \frac{\log_c x}{\log_c b}$$
