--1) Vue: vue_cotisations_actif_en_retard
-- Description: Affiche la liste des membres adhérents qui ont des cotisations en retard pour un mois donné.

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


--2) Vue: vue_cotisations_parental_en_retard
-- Description: Affiche la liste des membres adhérents qui ont des cotisations en retard pour un mois donné.

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

