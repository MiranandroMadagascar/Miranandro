--1) Vue: vue_budget_global
-- Description: Calcule et affiche le total des dons, le total des revenus, le total des dépenses, et le solde actuel.

CREATE VIEW vue_budget_global AS
SELECT 
    (SELECT SUM(montant) FROM caisse) AS total_revenus,
    (SELECT SUM(montant_total) FROM depenses) AS total_depenses,
    (SELECT SUM(montant) FROM caisse) - (SELECT SUM(montant_total) FROM depenses) AS solde_actuel;


--2) Vue: vue_depenses_comparaison
-- Description: Affiche le total du budget prévisionnel et le total des dépenses réelles par activité pour les comparer.

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


--3) Vue: vue_depenses_details
-- Description: Affiche les détails des dépenses prévisionnelles et réelles par activité.

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

--4) Vue: vue_revenus_mensuels
-- Description: Calcule le total des revenus mensuels.

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


--5) Vue: vue_depenses_mensuelles
-- Description: Calcule le total des dépenses mensuelles.

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

--6) Vue: vue_depenses_par_categorie
-- Description: Calcule le total des dépenses par catégorie de dépenses.

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

--7) Vue: vue_mouvements_caisse_mensuels
-- Description: Affiche l'historique des mouvements de la caisse par mois, y compris les entrees et sorties avec leurs descriptions.

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


--8) Vue: vue_solde_annuel
-- Description: Calcule le solde total annuel basé sur les mouvements de la caisse (entrees et sorties).

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

