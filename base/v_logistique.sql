--1) Vue: vue_logistique_disponible
-- Description: Calcule le reste des logistiques disponibles pour chaque article.

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
