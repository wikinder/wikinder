$$e^{i \theta} = \cos \theta + i \sin \theta$$

$$(\cos \theta + i \sin \theta)^n = \cos n \theta + i \sin n \theta$$

$$\sin^2 \theta + \cos^2 \theta = 1$$

## Addition formulas

$$\sin(\alpha + \beta) = \sin \alpha \cos \beta + \cos \alpha \sin \beta$$

$$\cos(\alpha + \beta) = \cos \alpha \cos \beta - \sin \alpha \sin \beta$$

### Proof

$\cos(\alpha + \beta) + i \sin(\alpha + \beta)$

$= e^{i(\alpha + \beta)}$

$= e^{i \alpha} e^{i \beta}$

$= (\cos \alpha + i \sin \alpha)(\cos \beta + i \sin \beta)$

$= (\cos \alpha \cos \beta - \sin \alpha \sin \beta) + i(\sin \alpha \cos \beta + \cos \alpha \sin \beta)$

## Multiple-angle formulas

### Double-angle formulas

$$\sin 2 \theta = 2 \sin \theta \cos \theta$$

$$\cos 2 \theta = \cos^2 \theta - \sin^2 \theta$$

$$= 1 - 2 \sin^2 \theta$$

$$= 2 \cos^2 \theta - 1$$

#### Proof

$\cos 2 \theta + i \sin 2 \theta$

$= (\cos \theta + i \sin \theta)^2$

$= (\cos^2 \theta - \sin^2 \theta) + i(2 \sin \theta \cos \theta)$

### General formulas

$$\sin n \theta = \sum_{k = 0}^{\bigl\lfloor \frac{n - 1}{2} \bigr\rfloor} (-1)^k \binom{n}{2k + 1} \cos^{n - (2k + 1)} \theta \sin^{2k + 1} \theta$$

$$\cos n \theta = \sum_{k = 0}^{\bigl\lfloor \frac{n}{2} \bigr\rfloor} (-1)^k \binom{n}{2k} \cos^{n - 2k} \theta \sin^{2k} \theta$$

#### Proof

$\cos n \theta + i \sin n \theta$

$= (\cos \theta + i \sin \theta)^n$

$= \displaystyle \sum_{k = 0}^n \binom{n}{k} \cos^{n - k} \theta i^k \sin^k \theta$
