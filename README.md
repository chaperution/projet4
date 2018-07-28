# projet4

Projet 4 - Créer un blog pour un écrivain

Développement d'une application de blog simple en PHP et avec une base de données MySQL. 
Elle fournit une interface frontend (lecture des billets) et une interface backend (administration des billets pour l'écriture).
On y retrouve tous les éléments d'un CRUD :

    Create : création de billets
    Read : lecture de billets
    Update : mise à jour de billets
    Delete : suppression de billets
    
Chaque billet permet l'ajout de commentaires, qui peuvent être modérés dans l'interface d'administration au besoin.
Les lecteurs ont la possibilité de "signaler" les commentaires pour que ceux-ci remontent plus facilement dans l'interface d'administration pour
être modérés.

L'interface d'administration est protégée par mot de passe. La rédaction de billets se fait dans une interface WYSIWYG basée sur TinyMCE, 
pour que l'utilisateur n'ait pas besoin de rédiger le contenu en HTML.

Développement en PHP sans utiliser de framework pour se familiariser avec les concepts de base de la programmation. 
Le code est construit sur une architecture MVC. Le modèle est construit sous forme d'objet.
