--1) Vue: vue_reunions_sans_rapport
-- Description: Affiche la liste des activités de type réunion (id_type_activite=1) qui n'ont pas encore de rapport dans la table reunions.

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


-- 2) Vue: vue_reunions
-- Description: Liste des reunions avec rapports 

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

--3) Vue: vue_rapports_reunions
-- Description: Affiche les rapports faits par réunion, liés aux activités de type réunion.

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
