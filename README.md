# StageHub

StageHub est une plate-forme centralisée de gestion des demandes de stages, permettant aux candidats de soumettre leurs demandes de stage et aux administrateurs de les gérer efficacement.

## Fonctionnalités

- **Gestion des Comptes** :

  - Les candidats peuvent créer un compte ou se connecter s'ils en ont déjà un.
  - Les administrateurs peuvent également se connecter depuis la même page, le système identifie automatiquement le type de session.
- **Demandes de Stage** :

  - Les candidats peuvent soumettre une demande de stage en spécifiant le domaine, l'école, la durée et en téléchargeant les pièces jointes requises.
  - Si une demande de stage est en attente de réponse, un message informe le candidat.
  - Une fois la demande acceptée par l'administrateur, le candidat est informé et se voit attribuer un projet.
- **Gestion des Stagiaires** :

  - Les administrateurs peuvent consulter l'état des stagiaires, voir s'ils sont en train de réaliser leur projet ou s'ils ont terminé.
  - L'utilisation de la classe Command de Laravel permet d'automatiser la vérification quotidienne de l'état des stagiaires.
- **Gestion des Administrateurs** :

  - Les administrateurs peuvent ajouter d'autres sous-administrateurs et supprimer les données des candidats pour se conformer au règlement général sur la protection des données (RGPD) de l'UE.
- **Gestion des Projets** :

  - Les administrateurs peuvent ajouter et supprimer des projets dans la banque de projets.
  - Ils peuvent également ajouter et supprimer des domaines d'intérêt pour l'entreprise.

## Développement

- Méthode d'authentification sécurisée recommandée par Laravel.
- Données sensibles dans la base de données hachées.
- Utilisation de la bibliothèque TailWind pour une expérience utilisateur ergonomique et une adaptation du projet à toutes les tailles d'écrans.

## Contributeurs

Ce projet a été réalisé par Baslih Anas, Baabou Rim, Bassou Oussama, Pruvot Rémi et Paulin Maxence et moi-même dans le cadre d'un projet pour le cycle ingénieur de deuxième année à l'École Ingénieur Littoral Côte d'Opale de Calais.

Un grand merci à madame Boutaina SABIRI pour son encadrement durant la réalisation de ce projet.
