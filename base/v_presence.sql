
--8) Vue: vue_activites_validees_proches_sans_presences
-- Description: Affiche les activites qui sont proches pour faire la presence

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
    AND p.id_presence IS NULL -- Sans présence enregistrée
GROUP BY 
    a.id_activite, ta.nom_activite;


-- 2) Vue: vue_presences_activite
-- Description: Affiche la liste des membres présents lors d'une activité.

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

