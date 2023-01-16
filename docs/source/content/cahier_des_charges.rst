=============================================
I-Site web PHP : concours photo
=============================================

-------------------------
Cadre et objectif général
-------------------------

Le projet à pour objectif de **créer un site web concours de photo** pour les étudiants de l'IUT.

Les étapes principales du projet consistent à :

* Authentifier les utilisateurs/administrateurs par ``mot de passe`` et ``email`` ;

* Les envoyer sur la page ``index.php`` afin de:
   * Phase 1:
      * De participer en envoyant une image;
   * Phase 2:
      * De voter pour la photo de leur choix;
   * Phase 3:
      * De voir le resultat du concours;
* Pour les administrateurs, accéder à la ``page admin`` afin de :
   * Modifier le timer qui organise le concours en diférentes phases;
   * Supprimer des photos qui ne respecte pas les règles du concours
      * Bannir de la phase d'envoi et de la phase de vote certains utilisateurs

--------------------------------------------
Environnement de développement et dépôt GIT
--------------------------------------------

Le projet est rattaché à un dépôt GIT que nous avons créé sur GitHub nommé ``SAE-302``.

-----------------------------------
Langages de scripting/programmation
-----------------------------------

Le projet utilise :

* le langage de programmation **PHP** (version > 8.0.26) pour les **codes sources** gérant la lecture, l'analyse, le traitement des données et la publication de leur analyse. 

* les langages de script **HTML et CSS** pour les scripts permettant l'affichage du "front" du site web (vu en **R209 - Initiation au développement Web**)



----------------------
Arborescence du projet
----------------------


L'arborescence de notre projet est :

   .. code-block:: bash

      SAE-302
      ├── .git/
      │
      ├── docs/
      │     ├── build/
      │     │    └── html/
      │     └── source/ 
      │    	 ├── index.rst 
      │    	 ├── conf.py 
      │    	 ├── content/ 
      │    	 ├── _static/ 
      │          └── _templates/    
      ├── concours
      │   ├── admin
      │   │      └── ...                        
      │   ├── config 
      │   │       └── crud.php
      │   │
      │   ├── admin.php
      │   │
      │   ├── index.php
      │   │
      │   ├── phase_envoi.php
      │   │
      │   ├── phase_result.php
      │   │
      │   ├── phase_timeout.php
      │   │
      │   ├── phase_vote.php
      │   │
      │   └── timer_update.php
      │
      ├── __init__.py
      │ 
      ├── AUTHORS
      ├── READ ME
      │ 
      └── requirements.txt





