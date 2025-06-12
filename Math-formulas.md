## Binomial theorem

$$(a + b)^2 = a^2 + 2ab + b^2$$

$$(a + b)^3 = a^3 + 3a^2 b + 3ab^2 + b^3$$

$$(a + b)^n = \sum_{k = 0}^n \binom{n}{k} a^{n - k} b^k$$

## Quadratic formula

$$ax^2 + bx + c = 0$$

$$\implies x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$$

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

$a^1 = a, \quad \text{(Def. 1)}$

$a^{n + 1} = a^n a \quad \text{for } n \ge 1. \quad \text{(Def. 2)}$

By induction on $n$:

#### Rule 1

$a^m a^n = a^{m + n}$

Base case ($n = 1$):

$a^m a^1$

$= a^m a \quad \text{(by Def. 1)}$

$= a^{m + 1}. \quad \text{(by Def. 2)}$

Inductive step: Assume $a^m a^n = a^{m + n}$. Then:

$a^m a^{n + 1}$

$= a^m (a^n a) \quad \text{(by Def. 2)}$

$= (a^m a^n) a \quad \text{(by associativity)}$

$= a^{m + n} a \quad \text{(by the induction hypothesis)}$

$= a^{(m + n) + 1} \quad \text{(by Def. 2)}$

$= a^{m + (n + 1)}. \quad \text{(by associativity)}$

#### Rule 2

$(a^m)^n = a^{mn}$

Base case ($n = 1$):

$(a^m)^1$

$= a^m \quad \text{(by Def. 1)}$

$= a^{m \cdot 1}. \quad \text{(by identity)}$

Inductive step: Assume $(a^m)^n = a^{mn}$. Then:

$(a^m)^{n + 1}$

$= (a^m)^n a^m \quad \text{(by Def. 2)}$

$= a^{mn} a^m \quad \text{(by the induction hypothesis)}$

$= a^{mn + m} \quad \text{(by Rule 1)}$

$= a^{m(n + 1)}. \quad \text{(by distributivity)}$

#### Rule 3

$(ab)^n = a^n b^n$

Base case ($n = 1$):

$(ab)^1$

$= ab \quad \text{(by Def. 1)}$

$= a^1 b^1. \quad \text{(by Def. 1)}$

Inductive step: Assume $(ab)^n = a^n b^n$. Then:

$(ab)^{n + 1}$

$= (ab)^n (ab) \quad \text{(by Def. 2)}$

$= a^n b^n (ab) \quad \text{(by the induction hypothesis)}$

$= (a^n a) (b^n b) \quad \text{(by associativity and commutativity)}$

$= a^{n + 1} b^{n + 1}. \quad \text{(by Def. 2)}$

### Logarithm rules

Let $x, y > 0$ and $k$ be real numbers, and let $b, c > 0$ be real numbers with $b, c \ne 1$. Since a logarithm is the inverse of exponentiation, we have:

$$b^{\log_b x} = \log_b (b^x) = x,$$

just like $f(f^{-1}(x)) = f^{-1}(f(x)) = x$. Using this:

#### Rule 1

$\log_b (xy)$

$= \log_b (b^{\log_b x} b^{\log_b y})$

$= \log_b (b^{\log_b x + \log_b y})$

$= \log_b x + \log_b y.$

#### Rule 2

$\log_b (x^k)$

$= \log_b ((b^{\log_b x})^k)$

$= \log_b (b^{k \log_b x})$

$= k \log_b x.$

#### Rule 3

$\log_b x$

$= \log_b x \cdot \dfrac{\log_c b}{\log_c b}$

$= \dfrac{\log_c (b^{\log_b x})}{\log_c b}$

$= \dfrac{\log_c x}{\log_c b}.$
