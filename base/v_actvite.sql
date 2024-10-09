--1) Vue: vue_activites_sans_fiche
-- Description: Affiche la liste des activités qui n'ont pas encore de fiches techniques.

CREATE VIEW vue_activites_sans_fiche AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    ta.nom_activite AS type_activite,
    s.nom_section as nom_section,
    ta.id_type_activite as id_type_activite,
    a.date_activite AS date_activite,
    a.heure_debut AS heure_debut,
    a.heure_fin AS heure_fin,
    a.lieu AS lieu_activite,
    a.statut AS statut_activite
FROM 
    activites a
JOIN 
    section s ON a.id_section = s.id_section
JOIN 
    type_activite ta ON a.id_type_activite = ta.id_type_activite
LEFT JOIN 
    fiche_technique ft ON a.id_activite = ft.id_activite
WHERE 
    ft.id_fiche_technique IS NULL;

--2) Vue: vue_activites_validation_1
-- Description: Affiche la liste des activités avec statut et leur detail = 1 (pour première validation).

CREATE VIEW vue_activites_validation_1 AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    ta.nom_activite AS type_activite,
    a.date_activite AS date_activite,
    a.heure_debut AS heure_debut,
    a.heure_fin AS heure_fin,
    a.lieu AS lieu_activite,
    s.nom_section as nom_section,
    a.statut AS statut_activite,
    ft.objectif AS objectif,
    ft.methodologie AS methodologie,
    ft.participants AS participants,
    ft.justifications AS justifications,
    SUM(dp.montant_total) AS budget_previsionnel_total
FROM 
    activites a
JOIN 
    type_activite ta ON a.id_type_activite = ta.id_type_activite
JOIN 
    fiche_technique ft ON a.id_activite = ft.id_activite
JOIN 
    section s ON a.id_section = s.id_section
LEFT JOIN 
    depenses_previsionnel dp ON ft.id_fiche_technique = dp.id_fiche_technique
WHERE 
    a.statut = 1
GROUP BY 
    a.id_activite, ta.nom_activite, ft.objectif, ft.methodologie, ft.participants, ft.justifications, s.nom_section;

--3) Vue: vue_activites_validation_1_details
-- Description: Affiche les details des activités avec statut et leur detail = 1 (pour première validation).

CREATE VIEW vue_activites_validation_1_details AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    ta.nom_activite AS type_activite,
    a.date_activite AS date_activite,
    s.nom_section as nom_section,
    a.heure_debut AS heure_debut,
    a.heure_fin AS heure_fin,
    a.lieu AS lieu_activite,
    a.statut AS statut_activite,
    ft.objectif AS objectif,
    ft.methodologie AS methodologie,
    ft.participants AS participants,
    ft.justifications AS justifications,
    dp.designation AS designation_depense,
    dp.quantite AS quantite_depense,
    dp.prix_unitaire AS prix_unitaire_depense,
    dp.montant_total AS montant_total_depense,
    SUM(dp.montant_total) AS budget_previsionnel_total
FROM 
    activites a
JOIN 
    type_activite ta ON a.id_type_activite = ta.id_type_activite
JOIN 
    fiche_technique ft ON a.id_activite = ft.id_activite
JOIN 
    section s ON a.id_section = s.id_section
LEFT JOIN 
    depenses_previsionnel dp ON ft.id_fiche_technique = dp.id_fiche_technique
WHERE 
    a.statut = 1
GROUP BY 
    a.id_activite, ta.nom_activite, ft.objectif, ft.methodologie, ft.participants, ft.justifications ,dp.id_depense , s.nom_section
ORDER BY 
    a.id_activite, dp.id_depense;

--4) Vue: vue_activites_refuses
-- Description: Affiche les details des activités avec statut et leur detail = 0 (refuser).

CREATE VIEW vue_activites_refuses AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    ta.nom_activite AS type_activite,
    a.date_activite AS date_activite,
    s.nom_section as nom_section,
    a.heure_debut AS heure_debut,
    a.heure_fin AS heure_fin,
    a.lieu AS lieu_activite,
    a.statut AS statut_activite,
    ft.objectif AS objectif,
    ft.methodologie AS methodologie,
    ft.participants AS participants,
    ft.justifications AS justifications,
    dp.designation AS designation_depense,
    dp.quantite AS quantite_depense,
    dp.prix_unitaire AS prix_unitaire_depense,
    dp.montant_total AS montant_total_depense,
    SUM(dp.montant_total) AS budget_previsionnel_total
FROM 
    activites a
JOIN 
    type_activite ta ON a.id_type_activite = ta.id_type_activite
JOIN 
    fiche_technique ft ON a.id_activite = ft.id_activite
JOIN 
    section s ON a.id_section = s.id_section
LEFT JOIN 
    depenses_previsionnel dp ON ft.id_fiche_technique = dp.id_fiche_technique
WHERE 
    a.statut = 0
GROUP BY 
    a.id_activite, ta.nom_activite, ft.objectif, ft.methodologie, ft.participants, ft.justifications ,dp.id_depense,s.nom_section
ORDER BY 
    a.id_activite, dp.id_depense;


--5) Vue: vue_activites_validation_2
-- Description: Affiche la liste des activités avec statut = 5 (pour deuxième validation).

CREATE VIEW vue_activites_validation_2 AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    ta.nom_activite AS type_activite,
    s.nom_section as nom_section,
    a.date_activite AS date_activite,
    a.heure_debut AS heure_debut,
    a.heure_fin AS heure_fin,
    a.lieu AS lieu_activite,
    a.statut AS statut_activite,
    ft.objectif AS objectif,
    ft.methodologie AS methodologie,
    ft.participants AS participants,
    ft.justifications AS justifications,
    SUM(dp.montant_total) AS budget_previsionnel_total
FROM 
    activites a
JOIN 
    type_activite ta ON a.id_type_activite = ta.id_type_activite
JOIN 
    fiche_technique ft ON a.id_activite = ft.id_activite
JOIN 
    section s ON a.id_section = s.id_section
LEFT JOIN 
    depenses_previsionnel dp ON ft.id_fiche_technique = dp.id_fiche_technique
WHERE 
    a.statut = 5
GROUP BY 
    a.id_activite, ta.nom_activite, ft.objectif, ft.methodologie, ft.participants, ft.justifications,s.nom_section;

--6) Vue: vue_activites_validation_2_details
-- Description: Affiche la liste des activités avec statut = 5 (pour deuxième validation).

CREATE VIEW vue_activites_validation_2_details AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    ta.nom_activite AS type_activite,
    a.date_activite AS date_activite,
    a.heure_debut AS heure_debut,
    s.nom_section as nom_section,
    a.heure_fin AS heure_fin,
    a.lieu AS lieu_activite,
    a.statut AS statut_activite,
    ft.objectif AS objectif,
    ft.methodologie AS methodologie,
    ft.participants AS participants,
    ft.justifications AS justifications,
    dp.id_depense AS id_depense,
    dp.designation AS designation_depense,
    dp.quantite AS quantite_depense,
    dp.prix_unitaire AS prix_unitaire_depense,
    dp.montant_total AS montant_total_depense,
    SUM(dp.montant_total) AS budget_previsionnel_total
FROM 
    activites a
JOIN 
    type_activite ta ON a.id_type_activite = ta.id_type_activite
JOIN 
    fiche_technique ft ON a.id_activite = ft.id_activite
JOIN 
    section s ON a.id_section = s.id_section
LEFT JOIN 
    depenses_previsionnel dp ON ft.id_fiche_technique = dp.id_fiche_technique
WHERE 
    a.statut = 5
GROUP BY 
    a.id_activite, ta.nom_activite, ft.objectif, ft.methodologie, ft.participants, ft.justifications ,dp.id_depense ,s.nom_section
ORDER BY 
    a.id_activite, dp.id_depense;  -- Optionnel : ordonner par id d'activité et id de dépense


--6) Vue: vue_activites_validees
-- Description: Affiche la liste des activités entièrement validées et planifiées

CREATE VIEW vue_activites_validees AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    ta.nom_activite AS type_activite,
    a.date_activite AS date_activite,
    a.heure_debut AS heure_debut,
    a.heure_fin AS heure_fin,
    s.nom_section as nom_section,
    a.date_envoie as date_envoie,
    a.lieu AS lieu_activite,
    av.date_validation AS date_validation,
    ft.id_fiche_technique as id_fiche_technique,
    ft.objectif AS objectif,
    ft.methodologie AS methodologie,
    ft.participants AS participants,
    ft.justifications AS justifications,
    SUM(dp.montant_total) AS budget_previsionnel_total
FROM 
    activites a
JOIN 
    activite_valide av ON a.id_activite = av.id_activite
JOIN 
    type_activite ta ON a.id_type_activite = ta.id_type_activite
JOIN 
    fiche_technique ft ON a.id_activite = ft.id_activite
JOIN 
    section s ON a.id_section = s.id_section
LEFT JOIN 
    depenses_previsionnel dp ON ft.id_fiche_technique = dp.id_fiche_technique
GROUP BY 
    a.id_activite, ta.nom_activite, av.date_validation, ft.id_fiche_technique , ft.objectif, ft.methodologie, ft.participants, ft.justifications,s.nom_section;

--7) Vue: vue_activites_validees
-- Description: Affiche les details des activités entièrement validées et planifiées

CREATE VIEW vue_activites_validees_details AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    ta.nom_activite AS type_activite,
    a.date_activite AS date_activite,
    a.heure_debut AS heure_debut,
    s.nom_section as nom_section,
    a.heure_fin AS heure_fin,
    a.date_envoie AS date_envoie,
    a.lieu AS lieu_activite,
    av.date_validation AS date_validation,
    ft.id_fiche_technique AS id_fiche_technique,
    ft.objectif AS objectif,
    ft.methodologie AS methodologie,
    ft.participants AS participants,
    ft.justifications AS justifications,
    dp.id_depense AS id_depense,
    dp.designation AS designation_depense,
    dp.quantite AS quantite_depense,
    dp.prix_unitaire AS prix_unitaire_depense,
    dp.montant_total AS montant_total_depense,
    SUM(dp.montant_total) OVER (PARTITION BY a.id_activite) AS budget_previsionnel_total
FROM 
    activites a
JOIN 
    activite_valide av ON a.id_activite = av.id_activite
JOIN 
    type_activite ta ON a.id_type_activite = ta.id_type_activite
JOIN 
    section s ON a.id_section = s.id_section
JOIN 
    fiche_technique ft ON a.id_activite = ft.id_activite
LEFT JOIN 
    depenses_previsionnel dp ON ft.id_fiche_technique = dp.id_fiche_technique
ORDER BY 
    a.id_activite, dp.id_depense;  -- Optionnel : ordonner par id d'activité et id de dépense

--8) Vue: vue_activites_proches
-- Description: Affiche les activites qui sont proches pour ajouter des pièces jointes

CREATE VIEW vue_activites_proches AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    s.nom_section as nom_section,
    ta.nom_activite AS type_activite,
    a.date_activite AS date_activite,
    a.heure_debut AS heure_debut,
    a.heure_fin AS heure_fin,
    a.lieu AS lieu_activite,
    a.statut AS statut_activite,
    ft.objectif AS objectif,
    ft.methodologie AS methodologie,
    ft.participants AS participants,
    ft.justifications AS justifications,
    SUM(dp.montant_total) AS budget_previsionnel_total
FROM 
    activites a
JOIN 
    type_activite ta ON a.id_type_activite = ta.id_type_activite
JOIN 
    fiche_technique ft ON a.id_activite = ft.id_activite
JOIN 
    section s ON a.id_section = s.id_section
LEFT JOIN 
    depenses_previsionnel dp ON ft.id_fiche_technique = dp.id_fiche_technique
WHERE
    a.statut = 10
    AND (a.date_activite BETWEEN (CURRENT_DATE - INTERVAL '15 days') AND CURRENT_DATE 
         OR a.date_activite BETWEEN CURRENT_DATE AND (CURRENT_DATE + INTERVAL '15 days'))
GROUP BY 
    a.id_activite, ta.nom_activite, s.nom_section,ft.objectif, ft.methodologie, ft.participants, ft.justifications;

