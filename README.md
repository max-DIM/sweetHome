# SweetHome

SweetHome est un projet inspiré par Airbnb fait avec symfony


## Objectif

L’objectif de cette application est de fournir une plateforme de recherche et de réservation pour location de biens immobiliers.
Les utilisateurs peuvent mettre des biens en ligne. D’autres utilisateurs peuvent consulter ces biens et effectuer une réservation en ligne.


### Diagramme de classe

![alt text](https://raw.githubusercontent.com/max-DIM/sweetHome/img/sweethome.png)


### Nos hypothèses sont les suivantes

L’objet Actor représente les utilisateurs qui ont créé un compte sur le site, que ce soit un locataire ou un propriétaire.
Un propriétaire ou un locataire sera défini par son rôle, mis en place par le module sécurité de Symfony (FosUserBundle). Il faudra prévoir une fonctionnalité qui permet de transformer un simple locataire en propriétaire (entraîne la modification du rôle)

L’objet Asset crée les différents logements, le type d’appartement sera distingué grâce à l’attribut AccomodationType.

Nous considérons qu’une proposition est une réservation dont le statut est ‘en-cours’. Une fois la proposition validée par le propriétaire, la réservation changera de statut en Accepté.

Concernant la gestion de la disponibilité du bien, l’entité AvailabilityCalendar contient les dates réservables pour chaque bien. Si la date n’est pas réservable, elle n’est pas enregitrée dans la table. Les dates réservables portent un statut qui indiquera la disponibilité de la date, par exemple Disponible ou Réservé, si la date n’est plus disponible. 
Côté vue utilisateur, il faudra appliquer ces informations sur un calendrier de façon à ce que les dates non reservables soient en gris, les dates réservables disponibles en vert, les dates réservables non disponible en rouge.

L’entité “Conditions” comprend les informations diverses sur l’appartement :  mode de paiement, heure d’arrivée/départ….


Les équipements sont regroupés par catégorie  (équipement de la catégorie “cuisine”, équipement de la catégorie “salle de bains”...) Un bien (Asset) contient plusieurs équipements.

### Point d’amélioration 

Certain attribut devrait avoir une table de référence comme accomodation type (Maison, appartement…).
L’adresse pourrait également être sortie de la table des biens pour être stocker dans une entité à part.

NB :  à ce stade du développement, nous avons dû temporairement enlever les relations des entités availabilityCalendar et Conditions suite à des erreurs sql (probablement pb à la conception)


## Contenu du site

Le site contient une page d’accueil présentant l’entreprise sweetHome et le projet de ce site web.
Dans le menu deux actions sont disponibles :
   - “Louer”, permets d’avoir accès à la liste de tous les logements présents dans la base de données
   - “Gérer les biens”, permets d’alimenter la base de données des logements.

![alt text](https://raw.githubusercontent.com/max-DIM/sweetHome/img/1.png)

Le premier bouton permet d’aller sur cette page :

![alt text](https://raw.githubusercontent.com/max-DIM/sweetHome/img/2.png)

(visualisation des biens immobiliers enregistrés dans la base de données)

le second bouton permet d’aller sur cette page :

![alt text](https://raw.githubusercontent.com/max-DIM/sweetHome/img/3.png)

(visualisation du formulaire permettant de créer un nouveau bien)

##Reste à faire

Pour finaliser le projet sweetHome, il faudrait inclure :
la gestion des rôles (admin, propriétaire et utilisateurs)
la possibilité de créer un compte utilisateur et/ou propriétaire
compléter les filtres mis en place dans la visualisation des biens immobiliers
gérer l’ajout d’images du biens
pouvoir préciser les disponibilités du logement
pouvoir effectuer une réservation
ajouter une note /laisser un commentaire sur un bien
pouvoir contacter un propriétaire (tchat)
finaliser le bouton recherche
finaliser le formulaire équipement

