--1) Vue: vue_factures_details
-- Description: Affiche la liste des membres adhérents qui ont des cotisations en retard pour un mois donné.

CREATE VIEW vue_factures_details AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    f.id_facture AS id_facture,
    f.numero AS numero_facture,
    f.nom_client AS nom_client,
    f.date_facture AS date_facture,
    f.montant_total AS montant_facture_total,
    ma.id_membre_adherent AS id_responsable,
    ma.nom AS nom_responsable,
    ma.prenoms AS prenoms_responsable,
    ma.contact AS contact_responsable,
    ma.email AS email_responsable,
    df.id_detail_facture AS id_detail_facture,
    df.designation AS designation_detail,
    df.quantite AS quantite_detail,
    df.prix_unitaire AS prix_unitaire_detail,
    df.montant_total AS montant_total_detail
FROM 
    facture f
JOIN 
    membres_adherents ma ON f.responsable = ma.id_membre_adherent
JOIN 
    activites a ON f.id_activite = a.id_activite 
LEFT JOIN 
    detail_facture df ON f.id_facture = df.id_facture
ORDER BY 
    f.id_facture, df.id_detail_facture;

--2) Vue: vue_activites_avec_factures
-- Description: Affiche la liste actvites avec factures

CREATE VIEW vue_activites_avec_factures AS
SELECT DISTINCT ON (a.id_activite) 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    a.date_activite AS date_activite,
    a.heure_debut AS heure_debut,
    a.heure_fin AS heure_fin,
    a.lieu AS lieu_activite,
    f.numero AS numero_facture,
    f.date_facture AS date_facture,
    f.montant_total AS montant_facture,
    f.nom_client AS nom_client
FROM 
    activites a
JOIN 
    facture f ON a.id_activite = f.id_activite
ORDER BY 
    a.id_activite, f.date_facture DESC;


