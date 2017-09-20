
--Voir toutes les BDD :
SHOW DATABASES;

--Supprimer une BDD :
DROP DATABASE nom_de_la_bdd;

--Se connecter à une BDD :
USE entreprise;

-- Voir les tables de la bdd :
SHOW TABLES;

--Créer une nouvelle BDD :
CREATE DATABASE nom_de_la_bdd;

--Afficher toutes les infos de tous les employés :
SELECT * FROM employes;

--Afficher les employes + salaire :
SELECT prenom, nom, salaire FROM employes;

--Je souhaite afficher tous les services :
SELECT DISTINCT service FROM employes;
--DISTINCT permet d'éviter les doublons.

--Afficher les employes du service informatique :
SELECT prenom, nom, service FROM employes WHERE service = 'informatique';

--Afficher les employes qui ne sont pas du service informatique
SELECT prenom, nom, service FROM employes WHERE service != 'informatique';
-- != s'écris aussi <>

--Afficher les employes qui gagnent un salaire supérieur à 2000€
SELECT prenom, nom, salaire FROM employes WHERE salaire > 2000;

--Combien de personne gagne moins de 2000€
SELECT COUNT(*) FROM employes WHERE salaire <= 2000;
-- AS : permet de créer un alias
SELECT COUNT(*) AS sommme FROM employes WHERE salaire <= 2000;

-- Afficher la masse salariale annuelle de mon entreprise :
SELECT SUM(salaire * 12) AS masse_salariale FROM employes;
--
SELECT SUM(salaire * 12) AS 'masse salariale' FROM employes;

--LIKE
SELECT prenom FROM employes WHERE prenom LIKE 'a%';
--Avec LIKE, le % signifie 'peu importe ce qui suit, ou peu importe ce qui précède'.
SELECT prenom FROM employes WHERE prenom LIKE '%a%';
--

--Afficher tous les employes dans l'ordre de celui qui gagne le plus à celui qui gagne le moins.
SELECT prenom, nom, salaire FROM employes ORDER BY salaire DESC;

-- Afficher les 3 employes qui gagnent le plus
SELECT prenom, nom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,3;

--Afficher la personne qui gagne le plus petit salaire :
SELECT prenom, nom, salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;

--Afficher le plus petit salaire :
SELECT salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;
--
SELECT MIN(salaire) FROM employes;

--Afficher le prénom de la personne qui gagne le plus petit salaire en utilisant MIN().
SELECT prenom FROM employes WHERE salaire = (SELECT min(salaire) FROM employes);
--Requete imbriquée


--Afficher tous les employes des services informatique et commercial
SELECT prenom, nom, service FROM employes WHERE service = 'informatique' OR service = 'commercial';
--
SELECT prenom, nom, service FROM employes WHERE service IN ('informatique', 'commercial');

--Afficher tous les employes hors des services informatique et commercial :
SELECT prenom, nom, service FROM employes WHERE service !='informatique' AND service != 'commercial';
--
SELECT prenom, nom, service  FROM employes WHERE service NOT IN ('informatique', 'commercial');

--Afficher le nom de femmes dans l'entreprise :
SELECT count(*) FROM employes WHERE sexe = 'f';

--Afficher le nombre d'employes par sexe :
SELECT sexe, count(*) FROM employes GROUP BY sexe;

--Le nombre de salarié du service informatique ou commercial
SELECT count(*) FROM employes WHERE service IN ('commercial', 'informatique');
--
SELECT service, count(*) FROM employes GROUP BY service HAVING service IN ('informatique', 'commercial');

----------------------
---INSERTION EN BDD---
----------------------
INSERT INTO employes (prenom, nom, service, sexe, salaire, date_embauche) VALUES('Julien', 'Ledoux', 'informatique', 'm', 5001, CURDATE());

----------------------
---- MODIFICATION ----
----------------------

-- On modifie tous les salaires de tous les employes
UPDATE employes set salaire = 3000;

-- On modifie le salaire 'Julien' :
UPDATE employes set salaire = 35000 WHERE id_employes = 991;
-- On modifie le salaire 'Laura' :
UPDATE employes set salaire = 35000 WHERE prenom = 'Laura';

REPLACE INTO employes (id_employes, prenom, nom, service, salaire, date_embauche, sexe) VALUES (992, 'Julien', 'Ledoux', 'informatique', 6500, CURDATE(), 'm');

UPDATE employes set service = 'marketing', salaire = 3200 WHERE id_employes = 547;

UPDATE employes set salaire = salaire + 100;

----------------------
----  SUPPRESSION ----
----------------------

DELETE FROM employes WHERE id_employes = 992;


--
