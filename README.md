[![Open in Codespaces](https://classroom.github.com/assets/launch-codespace-7f7980b617ed060a017424585567c406b6ee15c891e84e1186181d67ecf80aa0.svg)](https://classroom.github.com/open-in-codespaces?assignment_repo_id=13951535)
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Exécution du projet : Recette de cuisine

Exécuter les commandes suivantes :

``` bash
  npm install
  npm run build
  php artisan migrate:fresh --seed
  php artisan serve
  ```

## Accès au CRUD

Pour accéder au CRUD, il n'y a pas de système d'authentification. L'accès se fait donc par la route admin suivante :
http://localhost:8000/admin/recipes

## Fonctionnalités supplémentaires implentées

<h2> 1 - Notes (+)</h2>



<h2> 2 - Gestion ingrédients (+)</h2>

Une table Ingredients a été créée. En conséquence, la lecture, l'ajout, la suppression et la modification d'une recette ont été mis à jour.

<h2> 3 - Gestion quantité ingrédient et nombre de personnes (+++)</h2>

Les attributs Quantitee et Type ont été ajoutés à la table Ingredients. En conséquence, la lecture, l'ajout, la suppression et la modification d'une recette ont été mis à jour. Par ailleurs, à la lecture d'une recette, un bouton de modification du nombre de personne(s) (minimum 1, maximum 20, par défaut 2) a été implémenté. La modification de sa valeur modifie les quantités d'ingrédients.

<h2> 4 - Un Webchat avec Pusher et Vue.js (++)</h2>

