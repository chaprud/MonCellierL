Create database moncellier;
use moncellier;

CREATE table `utilisateur` (
id_utilisateur BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
nom_utilisateur varchar(100) NOT NULL,
prenom_utilisateur varchar(100) NOT NULL,
mail_utilisateur varchar(100) NOT NULL,
mdp_utilisateur varchar(100) NOT NULL
); 

CREATE table `type_utilisateur`(
id_type_utilisateur BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom_type_utilisateur varchar(50)
); 

CREATE table `gestionnaire_principal`(
id_gestionnaire BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom_gestionnaire varchar(100) NOT NULL
); 

CREATE table `messagerie_gestionnaire`(
id_messagerie BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
message text NOT NULL,
date_message datetime NOT NULL
); 

CREATE table `foyer`(
id_foyer BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom_foyer varchar(50) NOT NULL
); 

CREATE table `type_produit`(
id_type_produit BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom_type_produit varchar(100) NOT NULL
); 

CREATE table `stockage`(
id_stockage BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
nom_stockage varchar(50) NOT NULL
); 

CREATE table `produit`(
id_produit BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom_produit varchar(100) NOT NULL,
date_achat date,
date_peremption date
); 

CREATE table `liste`(
id_liste BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom_liste varchar(50) NOT NULL, 
date_liste date
); 

CREATE table `appartenir`(
id_utilisateur BIGINT NOT NULL, 
id_foyer BIGINT NOT NULL, 
PRIMARY KEY (id_utilisateur, id_foyer),
FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur), 
FOREIGN KEY (id_foyer) REFERENCES foyer (id_foyer)
); 

CREATE table `faire`(
id_utilisateur BIGINT NOT NULL, 
id_liste BIGINT NOT NULL,
PRIMARY KEY (id_utilisateur, id_liste),
FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
FOREIGN KEY (id_liste) REFERENCES liste(id_liste)
); 

CREATE table `localiser`(
id_produit BIGINT NOT NULL,
id_foyer BIGINT NOT NULL,
PRIMARY KEY (id_produit, id_foyer),
FOREIGN KEY(id_produit) REFERENCES produit(id_produit),
FOREIGN KEY(id_foyer) REFERENCES foyer(id_foyer)
); 

CREATE table `ajouter`(
id_produit BIGINT NOT NULL, 
id_liste BIGINT NOT NULL, 
quantite INT, 
PRIMARY KEY (id_produit, id_liste),
FOREIGN KEY (id_produit) REFERENCES produit(id_produit),
FOREIGN KEY (id_liste) REFERENCES liste (id_liste)
); 

CREATE table `categoriser`(
id_produit BIGINT NOT NULL, 
id_type_produit BIGINT NOT NULL, 
PRIMARY KEY (id_produit, id_type_produit),
FOREIGN KEY (id_produit) REFERENCES produit (id_produit),
FOREIGN KEY (id_type_produit) REFERENCES type_produit (id_type_produit)
); 

CREATE table `ranger`(
id_produit BIGINT NOT NULL, 
id_stockage BIGINT NOT NULL, 
quantite INT, 
PRIMARY KEY (id_produit, id_stockage),
FOREIGN KEY (id_produit) REFERENCES produit (id_produit),
FOREIGN KEY (id_stockage) REFERENCES stockage (id_stockage)
); 

ALTER TABLE utilisateur
ADD column id_type_utilisateur BIGINT,
ADD KEY id_type_utilisateur (id_type_utilisateur),
ADD CONSTRAINT FOREIGN KEY (id_type_utilisateur) REFERENCES type_utilisateur(id_type_utilisateur); 

ALTER TABLE foyer
ADD column id_gestionnaire BIGINT,
ADD KEY id_gestionnaire (id_gestionnaire),
ADD CONSTRAINT FOREIGN KEY (id_gestionnaire) REFERENCES gestionnaire_principal(id_gestionnaire);

ALTER TABLE messagerie_gestionnaire 
ADD column id_gestionnaire BIGINT,
ADD column id_utilisateur BIGINT,
ADD KEY id_gestionnaire (id_gestionnaire),
ADD KEY id_utilisateur (id_utilisateur),
ADD CONSTRAINT FOREIGN KEY (id_gestionnaire) REFERENCES gestionnaire_principal(id_gestionnaire),
ADD CONSTRAINT FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur); 

ALTER TABLE stockage
ADD column id_foyer BIGINT,
ADD KEY id_foyer (id_foyer),
ADD CONSTRAINT FOREIGN KEY (id_foyer) REFERENCES foyer(id_foyer);