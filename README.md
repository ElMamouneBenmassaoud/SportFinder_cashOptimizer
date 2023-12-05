# SportFinder_cashOptimizer


Ce projet implémente un algorithme pour optimiser le rendu de monnaie. L'algorithme a pour objectif de minimiser le nombre de billets rendus aux clients lors des paiements en espèces.

#### Où se trouve le code ?
###### Vous trouverez l'implémentation de l'algorithme dans le fichier ChangeCalculator.php -> [optimizeChange()]
```bash
 cd CashOptimizer/app/Models/
```
######  Vous trouverez l'implémentation des tests unitaires de l'algorithme dans le fichier ChangeCalculatorTest.php
```bash
 cd CashOptimizer/tests/Unit/
```
###### Vous trouverez l'implémentation des tests de la vue dans le fichier ChangeControllerTest.php
```bash
 cd CashOptimizer/tests/Feature/
```

## Démarrage

Ces instructions vous permettront de lancer les tests et le serveur sur votre machine locale.
###### Cloner le dépôt
```bash

git clone https://github.com/ElMamouneBenmassaoud/SportFinder_cashOptimizer.git
```
###### Accéder au répertoire du projet
```bash
cd CashOptimizer
```
###### Installer les dépendances PHP
```bash
composer install
```
###### Copier le fichier .env.example et le renommer en .env

```bash
cp .env.example .env
```
###### Générer une nouvelle clé d'application Laravel
```bash
php artisan key:generate
```

Pour lancer les tests localement.
```bash
php artisan test
```

Pour visualiser l'interface graphique localement

![image](https://github.com/ElMamouneBenmassaoud/SportFinder_cashOptimizer/assets/101842968/df049019-56c3-4487-be3e-c8e629064a97)

###### Lancer le serveur localement
```bash
php artisan serve
```
