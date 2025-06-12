< [[Math formulas]]

## Euler's identities

## Expansion and factorization

## Quadratic formula

## Exponent rules

Let $a$ and $b$ be real numbers, and let $m$ and $n$ be positive integers.

**Definition (_Exponentiation_)**:

$a^1 = a, \quad \text{(Def. 1)}$

$a^{n + 1} = a^n a \quad \text{for } n \ge 1. \quad \text{(Def. 2)}$

By induction on $n$:

### Rule 1

$a^m a^n = a^{m + n}$

Base case ($n = 1$):

$a^m a^1 = a^m a \quad \text{(by Def. 1)}$

$= a^{m + 1}. \quad \text{(by Def. 2)}$

Inductive step: Assume $a^m a^n = a^{m + n}$. Then:

$a^m a^{n + 1} = a^m (a^n a) \quad \text{(by Def. 2)}$

$= (a^m a^n) a \quad \text{(by associativity)}$

$= a^{m + n} a \quad \text{(by the induction hypothesis)}$

$= a^{(m + n) + 1} \quad \text{(by Def. 2)}$

$= a^{m + (n + 1)}. \quad \text{(by associativity)}$

### Rule 2

$(a^m)^n = a^{mn}$

Base case ($n = 1$):

$(a^m)^1 = a^m \quad \text{(by Def. 1)}$

$= a^{m \cdot 1}. \quad \text{(by identity)}$

Inductive step: Assume $(a^m)^n = a^{mn}$. Then:

$(a^m)^{n + 1} = (a^m)^n a^m \quad \text{(by Def. 2)}$

$= a^{mn} a^m \quad \text{(by the induction hypothesis)}$

$= a^{mn + m} \quad \text{(by Rule 1)}$

$= a^{m(n + 1)}. \quad \text{(by distributivity)}$

### Rule 3

$(ab)^n = a^n b^n$

Base case ($n = 1$):

$(ab)^1 = ab \quad \text{(by Def. 1)}$

$= a^1 b^1. \quad \text{(by Def. 1)}$

Inductive step: Assume $(ab)^n = a^n b^n$. Then:

$(ab)^{n + 1} = (ab)^n (ab) \quad \text{(by Def. 2)}$

$= a^n b^n (ab) \quad \text{(by the induction hypothesis)}$

$= (a^n a) (b^n b) \quad \text{(by associativity and commutativity)}$

$= a^{n + 1} b^{n + 1}. \quad \text{(by Def. 2)}$

## Logarithm rules

Let $x, y > 0$ and $k$ be real numbers, and let $b, c > 0$ be real numbers with $b, c \ne 1$. Since a logarithm is the inverse of exponentiation, we have:

$$b^{\log_b x} = \log_b (b^x) = x,$$

just like $f(f^{-1}(x)) = f^{-1}(f(x)) = x$. Using this:

### Rule 1

$\log_b (xy) = \log_b (b^{\log_b x} b^{\log_b y})$

$= \log_b (b^{\log_b x + \log_b y})$

$= \log_b x + \log_b y.$

### Rule 2

$\log_b (x^k) = \log_b ((b^{\log_b x})^k)$

$= \log_b (b^{k \log_b x})$

$= k \log_b x.$

### Rule 3

$\log_b x = \log_b x \cdot \dfrac{\log_c b}{\log_c b}$

$= \dfrac{\log_c (b^{\log_b x})}{\log_c b}$

$= \dfrac{\log_c x}{\log_c b}.$

## Trigonometric identities

### Pythagorean identity

### Addition formulas

$\cos(\alpha + \beta) + i \sin(\alpha + \beta) = e^{i(\alpha + \beta)}$

$= e^{i \alpha} e^{i \beta}$

$= (\cos \alpha + i \sin \alpha)(\cos \beta + i \sin \beta)$

$= (\cos \alpha \cos \beta - \sin \alpha \sin \beta) + i(\sin \alpha \cos \beta + \cos \alpha \sin \beta)$

### Double-angle formulas

$\sin 2 \theta = \sin(\theta + \theta)$

$= \sin \theta \cos \theta + \cos \theta \sin \theta$

$= 2 \sin \theta \cos \theta$

$\cos 2 \theta = \cos(\theta + \theta)$

$= \cos \theta \cos \theta - \sin \theta \sin \theta$

$= \cos^2 \theta - \sin^2 \theta$

$\cos^2 \theta - \sin^2 \theta = (\cos^2 \theta + \sin^2 \theta) - 2 \sin^2 \theta$

$= 1 - 2 \sin^2 \theta$

$\cos^2 \theta - \sin^2 \theta = 2 \cos^2 \theta - (\cos^2 \theta + \sin^2 \theta)$

$= 2 \cos^2 \theta - 1$

### Multiple-angle formulas

$\cos n \theta + i \sin n \theta = (\cos \theta + i \sin \theta)^n$

$= \displaystyle \sum_{k = 0}^n \binom{n}{k} \cos^{n - k} \theta i^k \sin^k \theta$
