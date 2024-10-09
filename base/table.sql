CREATE DATABASE miranandro_mada;
\c miranandro_mada;

-- Table pour les volets
CREATE TABLE volet (
    id_volet SERIAL PRIMARY KEY,
    nom_volet VARCHAR(100) NOT NULL UNIQUE
);

-- Table pour les sections
CREATE TABLE section (
    id_section SERIAL PRIMARY KEY,
    nom_section VARCHAR(100) NOT NULL,
    id_volet INT NOT NULL,
    FOREIGN KEY (id_volet) REFERENCES volet(id_volet) ON DELETE CASCADE
);

-- Table pour les postes (rôles spécifiques du staff et chef de volet)
CREATE TABLE poste (
    id_poste SERIAL PRIMARY KEY,
    nom_poste VARCHAR(150) NOT NULL UNIQUE
);

-- Table pour les types d'activité
CREATE TABLE type_activite (
    id_type_activite SERIAL PRIMARY KEY,
    nom_activite VARCHAR(100) NOT NULL
);

-- Table pour les types de dépense
CREATE TABLE type_depense (
    id_type_depense SERIAL PRIMARY KEY,
    nom_depense VARCHAR(100) NOT NULL
);

-- Table pour les types de dons
CREATE TABLE categorie_caisse (
    id_categorie_caisse SERIAL PRIMARY KEY,
    nom_categorie VARCHAR(100) NOT NULL 
);

--Table type_cotisation 
CREATE TABLE type_cotisation (
    id_type_cotisation SERIAL PRIMARY KEY,
    nom_cotisation VARCHAR(100) NOT NULL 
);


-- Table pour les membres adhérents (adultes)
CREATE SEQUENCE numAma
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO CYCLE;

-- INSERT INTO facture (numero)
-- VALUES (
--     'AMA' || LPAD(NEXTVAL('numAma')::TEXT, 10, '0')
-- );

CREATE TABLE membres_adherents (
    id_membre_adherent SERIAL PRIMARY KEY,
    numero VARCHAR(100) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenoms VARCHAR(200) NOT NULL,
    date_naissance DATE NOT NULL,
    genre VARCHAR(10),
    contact VARCHAR(150) NOT NULL,
    adresse VARCHAR(200) NOT NULL,
    date_adhesion DATE,
    id_section int not null,
    email VARCHAR(100),
    FOREIGN KEY (id_section) REFERENCES section(id_section) ON DELETE CASCADE
);

-- Table pour les membres bénéficiaires (enfants et parents)
CREATE SEQUENCE numApt
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO CYCLE;

-- INSERT INTO facture (numero)
-- VALUES (
--     'MPT' || LPAD(NEXTVAL('numApt')::TEXT, 10, '0')
-- );

CREATE TABLE membres_parents_tuteurs (
    id_parent_tuteur SERIAL PRIMARY KEY,
    numero varchar(100),
    nom VARCHAR(100) NOT NULL,
    prenoms VARCHAR(200) NOT NULL,
    date_naissance date NOT NULL,
    genre VARCHAR(10),  -- H pour homme, F pour femme
    profession VARCHAR(200),
    contact VARCHAR(150),
    adresse VARCHAR(200),
    date_adhesion DATE
);


CREATE SEQUENCE numAmi
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO CYCLE;

-- INSERT INTO facture (numero)
-- VALUES (
--     'AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 10, '0')
-- );

CREATE TABLE membres_enfants (
    id_membre_beneficiaire SERIAL PRIMARY KEY,
    numero varchar(100),
    nom VARCHAR(100) NOT NULL,
    prenoms VARCHAR(200) NOT NULL,
    date_naissance DATE NOT NULL,
    genre VARCHAR(10),
    ecole VARCHAR(100),
    classe VARCHAR(100) NOT NULL,
    annee_scolaire VARCHAR(100) NOT NULL,
    contact VARCHAR(150) NOT NULL,
    adresse VARCHAR(200) NOT NULL,
    nombre_fratrie INT,
    date_adhesion DATE,
    id_pere INT NULL,
    id_mere INT NULL,
    id_tuteur INT NULL,
    FOREIGN KEY (id_pere) REFERENCES membres_parents_tuteurs(id_parent_tuteur) ON DELETE SET NULL,
    FOREIGN KEY (id_mere) REFERENCES membres_parents_tuteurs(id_parent_tuteur) ON DELETE SET NULL,
    FOREIGN KEY (id_tuteur) REFERENCES membres_parents_tuteurs(id_parent_tuteur) ON DELETE SET NULL
);

-- Table pour le staff de Madagascar
CREATE TABLE staff_madagascar (
    id_staff SERIAL PRIMARY KEY,
    id_membre_adherent INT NOT NULL,
    id_poste INT NOT NULL,
    mot_de_passe VARCHAR(200) NOT NULL,
    FOREIGN KEY (id_membre_adherent) REFERENCES membres_adherents(id_membre_adherent) ON DELETE CASCADE,
    FOREIGN KEY (id_poste) REFERENCES poste(id_poste) ON DELETE CASCADE
);

-- Table pour le staff de France
CREATE TABLE staff_nice (
    id_staff SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenoms VARCHAR(200) NOT NULL,
    date_naissance DATE NOT NULL,
    genre VARCHAR(10),
    contact VARCHAR(150) NOT NULL,
    adresse VARCHAR(200) NOT NULL,
    id_poste INT NOT NULL,
    date_adhesion DATE,
    email VARCHAR(100) NOT NULL,
    mot_de_passe VARCHAR(200) NOT NULL,
    FOREIGN KEY (id_poste) REFERENCES poste(id_poste) ON DELETE CASCADE
);

-- Table pour les activités avec fiche technique intégrée
CREATE TABLE activites (
    id_activite SERIAL PRIMARY KEY,
    titre TEXT NOT NULL,
    id_type_activite INT NOT NULL,
    date_activite DATE,
    heure_debut TIME,
    heure_fin TIME,
    lieu VARCHAR(500),
    id_section INT,
    date_envoie date,
    statut INT NOT NULL,
    FOREIGN KEY (id_type_activite) REFERENCES type_activite(id_type_activite) ON DELETE CASCADE,
    FOREIGN KEY (id_section) REFERENCES section(id_section) ON DELETE CASCADE
);

create table activite_valide(
    id_actvite_valide serial PRIMARY KEY,
    id_activite integer,
    date_validation date,
    FOREIGN KEY (id_activite) REFERENCES activites(id_activite) ON DELETE CASCADE
);

create table activite_refuse(
    id_actvite_valide serial PRIMARY KEY,
    id_activite integer,
    date_refus date,
    commentaire text,
    FOREIGN KEY (id_activite) REFERENCES activites(id_activite) ON DELETE CASCADE
);

CREATE TABLE fiche_technique (
    id_fiche_technique serial PRIMARY KEY,
    id_activite int, 
    objectif TEXT,
    methodologie TEXT,
    participants TEXT,
    justifications TEXT,
    FOREIGN KEY (id_activite) REFERENCES activites(id_activite) ON DELETE CASCADE
);

--Table depenses previsionnels
CREATE TABLE depenses_previsionnel (
    id_depense SERIAL PRIMARY KEY,
    id_fiche_technique INT NOT NULL,
    designation TEXT NOT NULL,
    quantite INT NOT NULL,
    prix_unitaire DECIMAL(10,2) NOT NULL,
    montant_total DECIMAL(10,2) NOT NULL, 
    FOREIGN KEY (id_fiche_technique) REFERENCES fiche_technique(id_fiche_technique) ON DELETE CASCADE
);

-- Table pour les dépenses
CREATE TABLE depenses (
    id_depense SERIAL PRIMARY KEY,
    id_activite INT NOT NULL,
    designation TEXT NOT NULL,
    date_depense date,
    id_type_depense INT NOT NULL,
    quantite INT NOT NULL,
    prix_unitaire DECIMAL(10,2) NOT NULL,
    montant_total DECIMAL(10,2) NOT NULL, 
    FOREIGN KEY (id_activite) REFERENCES activites(id_activite) ON DELETE CASCADE,
    FOREIGN KEY (id_type_depense) REFERENCES type_depense(id_type_depense) ON DELETE CASCADE
);

-- Table pour les factures (sorties d'argent de la caisse)
CREATE SEQUENCE numFact
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO CYCLE;

-- INSERT INTO facture (numero)
-- VALUES (
--     'FACT' || LPAD(NEXTVAL('numFact')::TEXT, 10, '0'),
-- );

CREATE TABLE facture (
    id_facture SERIAL PRIMARY KEY,
    id_activite INT,
    numero VARCHAR(100) NOT NULL,
    responsable INT NOT NULL,
    nom_client VARCHAR(300),
    date_facture DATE NOT NULL,
    montant_total DECIMAL(10,2) NOT NULL ,-- Ce montant total est calculé à partir des dépenses associées
    FOREIGN KEY (id_activite) REFERENCES activites(id_activite) ON DELETE CASCADE,
    FOREIGN KEY (responsable) REFERENCES membres_adherents(id_membre_adherent) ON DELETE CASCADE
);

-- Table pour les details de factures (sorties d'argent de la caisse)
create table detail_facture(
    id_detail_facture serial PRIMARY KEY,
    id_facture int,
    designation TEXT NOT NULL,
    quantite INT NOT NULL,
    prix_unitaire DECIMAL(10,2) NOT NULL,
    montant_total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_facture) REFERENCES facture(id_facture) ON DELETE CASCADE
);


-- Table pour la caisse (entrées d'argent)
CREATE TABLE caisse (
    id_caisse SERIAL PRIMARY KEY,
    id_categorie_caisse INT NOT NULL,
    montant DECIMAL(10,2) NOT NULL,
    date_entree DATE,
    FOREIGN KEY (id_categorie_caisse) REFERENCES categorie_caisse(id_categorie_caisse) ON DELETE CASCADE
);

-- Table pour les cotisations

CREATE TABLE cotisation (
    id_cotisation SERIAL PRIMARY KEY,
    id_type_cotisation int not NULL,
    montant DECIMAL(10,2),
    FOREIGN KEY (id_type_cotisation) REFERENCES type_cotisation(id_type_cotisation) ON DELETE CASCADE
);

-- Table pour les cotisations payées par les membres adhérents et parents
CREATE TABLE cotisation_actif (
    id_cotisation_actif SERIAL PRIMARY KEY,
    id_membre_adherent INT NOT NULL,
    date_payement date,
    montant DECIMAL(10,2), ---Dénormalisation de montant de la table cotisation
    FOREIGN KEY (id_membre_adherent) REFERENCES membres_adherents(id_membre_adherent) ON DELETE CASCADE
);

CREATE TABLE cotisation_parental (
    id_cotisation_parental SERIAL PRIMARY KEY,
    id_parent_tuteur INT NOT NULL,
    date_payement date,
    montant DECIMAL(10,2), ---Dénormalisation de montant de la table cotisation
    FOREIGN KEY (id_parent_tuteur) REFERENCES membres_parents_tuteurs(id_parent_tuteur) ON DELETE CASCADE
);

-- Table pour la présence des membres aux réunions et activités
CREATE TABLE presence (
    id_presence SERIAL PRIMARY KEY,
    id_activite INT,
    id_membre_adherent INT,
    FOREIGN KEY (id_membre_adherent) REFERENCES membres_adherents(id_membre_adherent) ON DELETE CASCADE,
    FOREIGN KEY (id_activite) REFERENCES activites(id_activite) ON DELETE CASCADE
);

-- Table pour les reunions
create table reunions(
    id_reunion serial PRIMARY KEY,
    id_activite int,
    ordre_du_jour TEXT,
    proces_verbal TEXT,
    rapport TEXT,
    FOREIGN KEY (id_activite) REFERENCES activites(id_activite) ON DELETE CASCADE
);

-- Table pour les categorie des logistique
create table categorie_logistique ( 
	id_categorie_logistique SERIAL PRIMARY KEY,
	nom_categorie varchar(50)   
);

-- table pour les type de mouvements
create table type_mouvement ( 
	id_type_mouvement serial  PRIMARY KEY,
	nom_type_mouvement varchar(50)    
);

-- Table pour la logistique
create table logistique ( 
	id_logistique serial  PRIMARY KEY,
	nom_article varchar(100),
	id_categorie_logistique integer,
	description text,
    FOREIGN KEY (id_categorie_logistique) REFERENCES categorie_logistique(id_categorie_logistique) ON DELETE CASCADE
);

-- Table pour les mouvement de la logistique
create table mouvement_logistique ( 
	id_mouvement serial PRIMARY KEY,
	id_logistique integer,
	id_type_mouvement integer,
	quantite integer,
	date_mouvement date,
	description text ,
    FOREIGN KEY (id_logistique) REFERENCES logistique(id_logistique) ON DELETE CASCADE ,
    FOREIGN KEY (id_type_mouvement) REFERENCES type_mouvement(id_type_mouvement) ON DELETE CASCADE
);
