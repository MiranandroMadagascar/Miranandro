-- 16) Vue: vue_absences_activite
-- Description: Affiche la liste des membres de la section responsable d'une activité qui étaient absents.

-- CREATE VIEW vue_absences_activite AS
-- SELECT 
--     ma.id_membre_adherent,
--     ma.nom,
--     ma.prenoms,
--     a.id_activite,
--     a.titre AS titre_activite,
--     s.nom_section AS section_responsable
-- FROM 
--     activites a
-- JOIN 
--     section s ON a.id_section = s.id_section
-- JOIN 
--     membres_adherents ma ON ma.id_section = s.id_section
-- LEFT JOIN 
--     presence p ON ma.id_membre_adherent = p.id_membre_adherent AND a.id_activite = p.id_activite
-- WHERE 
--     p.id_presence IS NULL 
--     AND s.nom_section <> 'Coordination'
-- GROUP BY 
--     a.id_activite, a.titre, ma.id_membre_adherent, ma.prenoms, s.nom_section;



--24) Vue: vue_activites_valide_sans_depenses
-- Description: Listes des ctvités validés sans dépenses

-- CREATE VIEW vue_activites_sans_depenses AS
-- SELECT 
--     a.id_activite,
--     a.titre,
--     a.date_activite,
--     a.heure_debut,
--     a.heure_fin,
--     a.lieu,
--     av.date_validation
-- FROM 
--     activites a
-- JOIN 
--     activite_valide av ON a.id_activite = av.id_activite
-- LEFT JOIN 
--     depenses d ON a.id_activite = d.id_activite
-- WHERE 
--     d.id_depense IS NULL;  -- Aucune dépense associée



--25) Vue: vue_activites_avec_fiche_technique_sans_depenses_previsionnelles
-- Description: Listes des actvités sans dépenses prévisionels


-- CREATE VIEW vue_activites_sans_depenses_previsionnelles AS
-- SELECT 
--     a.id_activite,
--     a.titre as titre_activite,
--     a.date_activite,
--     a.heure_debut,
--     a.heure_fin,
--     a.lieu as lieu_activite,
--     s.nom_section,
--     ta.nom_activite AS type_activite,
--     ta.id_type_activite as id_type_activite
-- FROM 
--     activites a
-- LEFT JOIN 
--     fiche_technique ft ON a.id_activite = ft.id_activite
-- LEFT JOIN 
--     depenses_previsionnel dp ON ft.id_fiche_technique = dp.id_fiche_technique
-- JOIN 
--     section s ON a.id_section = s.id_section
-- JOIN 
--     type_activite ta ON a.id_type_activite = ta.id_type_activite
-- WHERE 
--     dp.id_depense IS NULL;


-- 27) Vue: vue_activites_validees_sans_presences
-- Description: Liste les activités validées (inférieures ou égales à la date d'aujourd'hui) sans présence enregistrée. Affiche le titre, la date, le lieu, l'heure et le type d'activité.

-- CREATE VIEW vue_activites_validees_sans_presences AS
-- SELECT 
--     a.id_activite AS id_activite,
--     a.titre AS titre_activite,
--     ta.nom_activite AS type_activite,
--     a.date_activite AS date_activite,
--     a.heure_debut AS heure_debut,
--     a.heure_fin AS heure_fin,
--     a.lieu AS lieu_activite
-- FROM 
--     activites a
-- JOIN 
--     type_activite ta ON a.id_type_activite = ta.id_type_activite
-- JOIN 
--     activite_valide av ON a.id_activite = av.id_activite
-- LEFT JOIN 
--     presence p ON a.id_activite = p.id_activite
-- WHERE 
--     a.date_activite <= CURRENT_DATE -- Activités passées ou en cours aujourd'hui
--     AND p.id_presence IS NULL -- Sans présence enregistrée
-- GROUP BY 
--     a.id_activite, ta.nom_activite;

