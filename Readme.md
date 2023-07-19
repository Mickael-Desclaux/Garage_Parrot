# Projet - Formation Développeur web et web mobile

J'ai réalisé ce projet dans le cadre de ma formation développeur web et web mobile
chez STUDI. Le projet a pour objectif la création du site web d'un garage automobile
proposant divers services (réparations, entretien et vente de véhicules d'occasions).
Le site doit aussi intégrer un espace administrateur permettant aux employés du garage
de gérer les différentes données stockées (annonces de voitures, demandes de contacts,
modération des avis clients, etc...).

Le site est déployé via Heroku ici : https://gentle-citadel-96157-851d1ed7efae.herokuapp.com/

## Exécution du projet en local :

+ Installez le [CLI de Symfony](https://symfony.com/download)
+ Clonez le dépôt git du projet en utilisant la commande `git clone https://github.com/Mickael-Desclaux/Garage_Parrot`
+ Rendez-vous dans le dossier du projet `cd Garage_Parrot`
+ Installez les dépendances avec la commande `composer install`
+ Pour visualiser le site en local sur votre navigateur, entrez la commande `symfony serve`
+ Par défaut, le site sera accessible sur le port 8000 : https://localhost:8000

## Création d'un nouvel administrateur :

+ Rendez-vous dans le dossier du projet `cd Garage_Parrot`
+ Entrez la commande `symfony console app:create-admin {adresse mail} {mot de passe}`
+ Le mot de passe doit contenir au moins 8 caractères, une lettre majuscule et minuscule ainsi qu'un chiffre