## Algebra

$$(a + b)^2 = a^2 + 2ab + b^2$$

$$(a + b)^3 = a^3 + 3a^2 b + 3ab^2 + b^3$$

$$(a + b)^n = \sum_{k = 0}^n \binom{n}{k} a^{n - k} b^k, \text{where } \binom{n}{k} = \frac{n!}{k! (n - k)!}$$

## Exponent rules

$$a^m a^n = a^{m + n}$$

$$(a^m)^n = a^{mn}$$

$$(ab)^n = a^n b^n$$

## Logarithm rules

$$\log_b (xy) = \log_b x + \log_b y$$

$$\log_b (x^k) = k \log_b x$$

$$\log_b x = \dfrac{\log_c x}{\log_c b}$$

## Proofs

### Exponent rules

Let $a$ and $b$ be real numbers, and let $m$ and $n$ be positive integers.

**Definition (_Exponentiation_)**:

$$
\begin{array}{lll}
a^1 = a,          &                      & \text{(Def. 1)} \\
a^{n + 1} = a^n a & \text{for } n \ge 1. & \text{(Def. 2)}
\end{array}
$$

By induction on $n$:

(1) $a^m a^n = a^{m + n}$

Base case ($n = 1$):

$$
\begin{align*}
a^m a^1 & = a^m a      & & \text{(by Def. 1)} \\
        & = a^{m + 1}. & & \text{(by Def. 2)}
\end{align*}
$$

Inductive step: Assume $a^m a^n = a^{m + n}$. Then:

$$
\begin{align*}
a^m a^{n + 1} & = a^m (a^n a)      & & \text{(by Def. 2)} \\
              & = (a^m a^n) a      & & \text{(by associativity)} \\
              & = a^{m + n} a      & & \text{(by the induction hypothesis)} \\
              & = a^{(m + n) + 1}  & & \text{(by Def. 2)} \\
              & = a^{m + (n + 1)}. & & \text{(by associativity)}
\end{align*}
$$

(2) $(a^m)^n = a^{mn}$

Base case ($n = 1$):

$$
\begin{align*}
(a^m)^1 & = a^m            & & \text{(by Def. 1)} \\
        & = a^{m \cdot 1}. & & \text{(by identity)}
\end{align*}
$$

Inductive step: Assume $(a^m)^n = a^{mn}$. Then:

$$
\begin{align*}
(a^m)^{n + 1} & = (a^m)^n a^m   & & \text{(by Def. 2)} \\
              & = a^{mn} a^m    & & \text{(by the induction hypothesis)} \\
              & = a^{mn + m}    & & \text{(by Rule 1)} \\
              & = a^{m(n + 1)}. & & \text{(by distributivity)}
\end{align*}
$$

(3) $(ab)^n = a^n b^n$

Base case ($n = 1$):

$$
\begin{align*}
(ab)^1 & = ab       & & \text{(by Def. 1)} \\
       & = a^1 b^1. & & \text{(by Def. 1)}
\end{align*}
$$

Inductive step: Assume $(ab)^n = a^n b^n$. Then:

$$
\begin{align*}
(ab)^{n + 1} & = (ab)^n (ab)          & & \text{(by Def. 2)} \\
             & = a^n b^n (ab)         & & \text{(by the induction hypothesis)} \\
             & = (a^n a) (b^n b)      & & \text{(by associativity and commutativity)} \\
             & = a^{n + 1} b^{n + 1}. & & \text{(by Def. 2)}
\end{align*}
$$

### Logarithm rules

Let $x, y > 0$ and $k$ be real numbers, and let $b, c > 0$ be real numbers with $b, c \ne 1$. Since a logarithm is the inverse of exponentiation, we have:

$$b^{\log_b x} = \log_b (b^x) = x,$$

just like $f(f^{-1}(x)) = f^{-1}(f(x)) = x$. Using this:

(1)

$$
\begin{align*}
\log_b (xy) & = \log_b (b^{\log_b x} b^{\log_b y}) \\
            & = \log_b (b^{\log_b x + \log_b y}) \\
            & = \log_b x + \log_b y.
\end{align*}
$$

(2)

$$
\begin{align*}
\log_b (x^k) & = \log_b ((b^{\log_b x})^k) \\
             & = \log_b (b^{k \log_b x}) \\
             & = k \log_b x.
\end{align*}
$$

(3)

$$
\begin{align*}
\log_b x & = \log_b x \cdot \frac{\log_c b}{\log_c b} \\
         & = \frac{\log_c (b^{\log_b x})}{\log_c b} \\
         & = \frac{\log_c x}{\log_c b}.
\end{align*}
$$
