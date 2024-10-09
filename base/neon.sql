
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
    a.id_activite, dp.id_depense;  



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
    a.id_activite, dp.id_depense;  

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


CREATE VIEW vue_cotisations_actif_en_retard AS
SELECT 
    ma.id_membre_adherent as id,
    ma.numero,
    ma.nom,
    ma.prenoms,
    EXTRACT(YEAR FROM CURRENT_DATE) AS annee_retard
FROM 
    membres_adherents ma
LEFT JOIN 
    cotisation_actif ca 
    ON ma.id_membre_adherent = ca.id_membre_adherent
    AND EXTRACT(YEAR FROM ca.date_payement) = EXTRACT(YEAR FROM CURRENT_DATE)
WHERE 
    ca.id_cotisation_actif IS NULL;


CREATE VIEW vue_cotisations_parental_en_retard AS
SELECT 
    pt.id_parent_tuteur as id,
    pt.numero,
    pt.nom,
    pt.prenoms,
    EXTRACT(YEAR FROM CURRENT_DATE) AS annee_retard
FROM 
    membres_parents_tuteurs pt
LEFT JOIN 
    cotisation_parental cp 
    ON pt.id_parent_tuteur = cp.id_parent_tuteur
    AND EXTRACT(YEAR FROM cp.date_payement) = EXTRACT(YEAR FROM CURRENT_DATE)
WHERE 
    cp.id_cotisation_parental IS NULL;


CREATE VIEW vue_budget_global AS
SELECT 
    (SELECT SUM(montant) FROM caisse) AS total_revenus,
    (SELECT SUM(montant_total) FROM depenses) AS total_depenses,
    (SELECT SUM(montant) FROM caisse) - (SELECT SUM(montant_total) FROM depenses) AS solde_actuel;



CREATE VIEW vue_depenses_comparaison AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    a.date_activite AS date_activite,
    a.heure_debut AS heure_debut,
    a.heure_fin AS heure_fin,
    a.lieu AS lieu_activite,
    SUM(dp.montant_total) AS total_budget_previsionnel,
    SUM(d.montant_total) AS total_depenses_reelles
FROM 
    activites a
JOIN 
    fiche_technique ft ON a.id_activite = ft.id_activite
LEFT JOIN 
    depenses_previsionnel dp ON ft.id_fiche_technique = dp.id_fiche_technique
LEFT JOIN 
    depenses d ON a.id_activite = d.id_activite
GROUP BY 
    a.id_activite, a.titre, a.date_activite, a.heure_debut, a.heure_fin, a.lieu;



CREATE VIEW vue_depenses_details AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    'previsionnel' AS type_depense,
    dp.designation AS designation,
    dp.quantite AS quantite,
    dp.prix_unitaire AS prix_unitaire,
    dp.montant_total AS montant
FROM 
    activites a
JOIN 
    fiche_technique ft ON a.id_activite = ft.id_activite
LEFT JOIN 
    depenses_previsionnel dp ON ft.id_fiche_technique = dp.id_fiche_technique

UNION ALL

SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    'reel' AS type_depense,
    d.designation AS designation,
    d.quantite AS quantite,
    d.prix_unitaire AS prix_unitaire,
    d.montant_total AS montant
FROM 
    activites a
JOIN 
    fiche_technique ft ON a.id_activite = ft.id_activite
LEFT JOIN 
    depenses d ON a.id_activite = d.id_activite;


CREATE VIEW vue_revenus_mensuels AS
SELECT 
    TO_CHAR(date_entree, 'YYYY-MM') AS mois,
    SUM(montant) AS total_revenus
FROM 
    caisse
GROUP BY 
    TO_CHAR(date_entree, 'YYYY-MM')
ORDER BY 
    mois;



CREATE VIEW vue_depenses_mensuelles AS
SELECT 
    TO_CHAR(date_depense, 'YYYY-MM') AS mois,
    SUM(montant_total) AS total_depenses
FROM 
    depenses
GROUP BY 
    TO_CHAR(date_depense, 'YYYY-MM')
ORDER BY 
    mois;


CREATE VIEW vue_depenses_par_categorie AS
SELECT 
    td.nom_depense AS categorie_depense,
    SUM(d.montant_total) AS total_depenses
FROM 
    depenses d
JOIN 
    type_depense td ON d.id_type_depense = td.id_type_depense
GROUP BY 
    td.nom_depense
ORDER BY 
    total_depenses DESC;


CREATE VIEW vue_mouvements_caisse_mensuels AS
SELECT 
    TO_CHAR(c.date_entree, 'YYYY-MM') AS mois,
    'entree' AS type_mouvement,
    c.montant AS montant,
    c.date_entree AS date_mouvement,
    cc.nom_categorie AS categorie_caisse,
    NULL AS depense_description
FROM 
    caisse c
JOIN 
    categorie_caisse cc ON c.id_categorie_caisse = cc.id_categorie_caisse
UNION ALL
SELECT 
    TO_CHAR(d.date_depense, 'YYYY-MM') AS mois,
    'sortie' AS type_mouvement,
    d.montant_total AS montant,
    d.date_depense AS date_mouvement,
    NULL AS categorie_caisse,
    d.designation AS depense_description
FROM 
    depenses d
ORDER BY 
    mois, date_mouvement;



CREATE VIEW vue_solde_annuel AS
WITH cte_solde_base AS (
    SELECT 
        TO_CHAR(date_mouvement, 'YYYY') AS annee,
        SUM(CASE WHEN type_mouvement = 'entree' THEN montant ELSE 0 END) AS total_entrees,
        SUM(CASE WHEN type_mouvement = 'sortie' THEN montant ELSE 0 END) AS total_sorties
    FROM 
        vue_mouvements_caisse_mensuels
    GROUP BY 
        TO_CHAR(date_mouvement, 'YYYY')
),
cte_solde_cumule AS (
    SELECT 
        annee,
        total_entrees,
        total_sorties,
        total_entrees - total_sorties AS solde_annuel,
        SUM(total_entrees - total_sorties) OVER (ORDER BY annee ASC ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) AS solde_cumule
    FROM 
        cte_solde_base
)
SELECT 
    annee,
    total_entrees,
    total_sorties,
    solde_annuel,
    solde_cumule
FROM 
    cte_solde_cumule
ORDER BY 
    annee;


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


CREATE VIEW vue_logistique_disponible AS
SELECT 
    l.id_logistique AS logistique_id,
    l.nom_article AS nom_article,
    c.nom_categorie AS categorie_logistique,
    l.description AS description,
    COALESCE(SUM(CASE WHEN m.id_type_mouvement = 1 THEN m.quantite ELSE 0 END), 0) - 
    COALESCE(SUM(CASE WHEN m.id_type_mouvement = 2 THEN m.quantite ELSE 0 END), 0) AS quantite_disponible
FROM 
    logistique l
LEFT JOIN 
    mouvement_logistique m ON l.id_logistique = m.id_logistique
LEFT JOIN 
    categorie_logistique c ON l.id_categorie_logistique = c.id_categorie_logistique
GROUP BY 
    l.id_logistique, l.nom_article, c.nom_categorie, l.description;


CREATE VIEW vue_staff_madagascar AS
SELECT 
    sm.id_staff AS staff_id,
    ma.id_section AS id_section, 
    ma.numero,
    ma.nom AS nom,
    ma.prenoms AS prenoms,
    ma.date_naissance AS date_naissance,
    ma.genre AS genre,
    ma.contact AS contact,
    ma.adresse AS adresse,
    ma.email AS email,
    s.nom_section AS nom_section,
    p.nom_poste AS nom_poste,
    sm.mot_de_passe AS mot_de_passe
FROM 
    staff_madagascar sm
JOIN 
    membres_adherents ma ON sm.id_membre_adherent = ma.id_membre_adherent
JOIN 
    poste p ON sm.id_poste = p.id_poste
JOIN 
    section s ON ma.id_section = s.id_section; 


CREATE VIEW vue_couples_parents_tuteurs AS
SELECT 
    e.id_membre_beneficiaire,
    p1.id_parent_tuteur AS id_pere,
    p1.numero as numero_pere,
    p1.nom AS nom_pere,
    p1.prenoms AS prenom_pere,
    p1.date_naissance AS date_naissance_pere,
    p1.genre AS genre_pere,
    p1.profession AS profession_pere,
    p2.id_parent_tuteur AS id_mere,
    p2.numero as numero_mere,
    p2.nom AS nom_mere,
    p2.prenoms AS prenom_mere,
    p2.date_naissance AS date_naissance_mere,
    p2.genre AS genre_mere,
    p2.profession AS profession_mere,
    t.id_parent_tuteur AS id_tuteur,
    t.numero as numero_tuteur,
    t.nom AS nom_tuteur,
    t.prenoms AS prenom_tuteur,
    t.date_naissance AS date_naissance_tuteur,
    t.genre AS genre_tuteur,
    t.profession AS profession_tuteur
FROM 
    membres_enfants e
LEFT JOIN 
    membres_parents_tuteurs p1 ON e.id_pere = p1.id_parent_tuteur  
LEFT JOIN 
    membres_parents_tuteurs p2 ON e.id_mere = p2.id_parent_tuteur 
LEFT JOIN 
    membres_parents_tuteurs t ON e.id_tuteur = t.id_parent_tuteur  
GROUP BY 
    e.id_membre_beneficiaire, p1.id_parent_tuteur, p2.id_parent_tuteur, t.id_parent_tuteur,
    p1.nom, p1.prenoms, p1.date_naissance, p1.genre, p1.profession,
    p2.nom, p2.prenoms, p2.date_naissance, p2.genre, p2.profession,
    t.nom, t.prenoms, t.date_naissance, t.genre, t.profession
ORDER BY 
    e.id_membre_beneficiaire;

CREATE or REPLACE VIEW vue_enfants_parents_tuteurs AS
SELECT 
    e.id_membre_beneficiaire,
    e.numero,
    e.nom,
    e.prenoms,
    e.date_naissance,
    e.genre,
    e.ecole,
    e.classe,
    e.contact,
    e.adresse,
    e.annee_scolaire,
    p1.nom AS nom_pere,
    p1.prenoms AS prenoms_pere,
    p1.contact as contact_pere,
    p2.nom AS nom_mere,
    p2.prenoms AS prenoms_mere,
    p2.contact as contact_mere,
    t.nom AS nom_tuteur,
    t.prenoms AS prenoms_tuteur,
    t.contact as contact_tuteur
FROM 
    membres_enfants e
LEFT JOIN 
    membres_parents_tuteurs p1 ON e.id_pere = p1.id_parent_tuteur
LEFT JOIN 
    membres_parents_tuteurs p2 ON e.id_mere = p2.id_parent_tuteur
LEFT JOIN 
    membres_parents_tuteurs t ON e.id_tuteur = t.id_parent_tuteur;


CREATE VIEW vue_membres_sections AS
SELECT 
    ma.id_membre_adherent,
    s.id_section AS id_section,
    s.nom_section AS section,
    ma.numero AS numero_membre,
    ma.nom AS nom_membre,
    ma.prenoms AS prenoms_membre,
    ma.date_naissance AS date_naissance,
    ma.genre AS genre,
    ma.contact AS contact,
    ma.adresse AS adresse,
    ma.date_adhesion AS date_adhesion,
    ma.email AS email
FROM 
    membres_adherents ma
JOIN 
    section s ON ma.id_section = s.id_section
ORDER BY 
    s.nom_section, ma.nom, ma.prenoms;


CREATE VIEW vue_totaux_membres AS
SELECT 
    (SELECT COUNT(*) FROM membres_enfants) AS total_membres_enfants,
    (SELECT COUNT(*) FROM membres_adherents) AS total_membres_adherents,
    (SELECT COUNT(*) FROM membres_parents_tuteurs) AS membres_parents_tuteurs,
    (SELECT COUNT(*) FROM membres_enfants WHERE date_adhesion >= date_trunc('month', CURRENT_DATE)) +
    (SELECT COUNT(*) FROM membres_parents_tuteurs WHERE date_adhesion >= date_trunc('month', CURRENT_DATE)) +
    (SELECT COUNT(*) FROM membres_adherents WHERE date_adhesion >= date_trunc('month', CURRENT_DATE)) AS total_nouveaux_inscrits_ce_mois_ci;



CREATE VIEW vue_activites_validees_proches_sans_presences AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    ta.nom_activite AS type_activite,
    a.date_activite AS date_activite,
    a.heure_debut AS heure_debut,
    a.heure_fin AS heure_fin,
    a.lieu AS lieu_activite
FROM 
    activites a
JOIN 
    type_activite ta ON a.id_type_activite = ta.id_type_activite
JOIN 
    activite_valide av ON a.id_activite = av.id_activite
LEFT JOIN 
    presence p ON a.id_activite = p.id_activite
WHERE 
    (a.date_activite BETWEEN (CURRENT_DATE - INTERVAL '15 days') AND CURRENT_DATE
    OR a.date_activite BETWEEN CURRENT_DATE AND (CURRENT_DATE + INTERVAL '15 days'))
    AND p.id_presence IS NULL 
GROUP BY 
    a.id_activite, ta.nom_activite;


CREATE VIEW vue_presences_activite AS
SELECT 
    ma.id_membre_adherent,
    ma.nom,
    ma.prenoms,
    a.id_activite,
    a.date_activite as date_activite,
    a.titre AS titre_activite,
    a.lieu as lieu_activite,
    a.heure_debut as heure_debut,
    a.heure_fin as heure_fin,
    s.nom_section AS section_responsable
FROM 
    activites a
JOIN 
    section s ON a.id_section = s.id_section
JOIN 
    membres_adherents ma ON ma.id_section = s.id_section
JOIN 
    presence p ON ma.id_membre_adherent = p.id_membre_adherent AND a.id_activite = p.id_activite
GROUP BY 
    a.id_activite, a.titre, ma.id_membre_adherent, ma.prenoms, s.nom_section;


CREATE VIEW vue_reunions_sans_rapport AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    a.date_activite AS date_activite,
    a.heure_debut AS heure_debut,
    a.heure_fin AS heure_fin,
    a.lieu AS lieu_activite,
    r.rapport AS rapport
FROM 
    activites a
JOIN 
    activite_valide av ON a.id_activite = av.id_activite
LEFT JOIN 
    reunions r ON a.id_activite = r.id_activite
WHERE 
    a.id_type_activite = 1 
    AND r.rapport IS NULL;




CREATE VIEW vue_reunions AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    a.date_activite AS date_activite,
    a.heure_debut AS heure_debut,
    a.heure_fin AS heure_fin,
    a.lieu AS lieu_activite
FROM 
    activites a
JOIN 
    activite_valide av ON a.id_activite = av.id_activite
JOIN 
    reunions r ON a.id_activite = r.id_activite
WHERE 
    a.id_type_activite = 1;


CREATE VIEW vue_rapports_reunions AS
SELECT 
    a.id_activite AS id_activite,
    a.titre AS titre_activite,
    a.date_activite as date_activite,
    r.ordre_du_jour AS ordre_du_jour,
    r.proces_verbal AS proces_verbal,
    r.rapport AS rapport
FROM 
    activites a
JOIN 
    reunions r ON a.id_activite = r.id_activite
WHERE 
    a.id_type_activite = 1;
