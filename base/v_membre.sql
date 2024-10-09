--1) Vue: vue_staff_madagascar
-- Description: Affiche la liste des staffs à Madagascar avec leurs informations complètes, y compris la section et le poste.

CREATE VIEW vue_staff_madagascar AS
SELECT 
    sm.id_staff AS staff_id,
    ma.id_section AS id_section, -- Directement depuis la table membres_adherents
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
    section s ON ma.id_section = s.id_section; -- Jointure directe avec section via id_section

--2) Vue: vue_couples_parents_tuteurs
-- Description: Listes des parents et tuteurs 
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
    membres_parents_tuteurs p1 ON e.id_pere = p1.id_parent_tuteur  -- Jointure pour le père
LEFT JOIN 
    membres_parents_tuteurs p2 ON e.id_mere = p2.id_parent_tuteur  -- Jointure pour la mère
LEFT JOIN 
    membres_parents_tuteurs t ON e.id_tuteur = t.id_parent_tuteur  -- Jointure pour le tuteur
GROUP BY 
    e.id_membre_beneficiaire, p1.id_parent_tuteur, p2.id_parent_tuteur, t.id_parent_tuteur,
    p1.nom, p1.prenoms, p1.date_naissance, p1.genre, p1.profession,
    p2.nom, p2.prenoms, p2.date_naissance, p2.genre, p2.profession,
    t.nom, t.prenoms, t.date_naissance, t.genre, t.profession
ORDER BY 
    e.id_membre_beneficiaire;

--3) Vue: vue_enfants_parents_tuteurs
-- Description: Affiche les informations des enfants et leurs parents ou tuteurs, avec les relations ou bien membres benenficiaires (père, mère, tuteur).

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


--4) Vue : Membres par section 
-- Description : Affiche les membres par section

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

--5) Vue: vue_totaux_membres
-- Description: Calcule et affiche les totaux des membres enfants, membres adhérents, membres parents, et les nouveaux inscrits ce mois-ci.

CREATE VIEW vue_totaux_membres AS
SELECT 
    (SELECT COUNT(*) FROM membres_enfants) AS total_membres_enfants,
    (SELECT COUNT(*) FROM membres_adherents) AS total_membres_adherents,
    (SELECT COUNT(*) FROM membres_parents_tuteurs) AS membres_parents_tuteurs,
    (SELECT COUNT(*) FROM membres_enfants WHERE date_adhesion >= date_trunc('month', CURRENT_DATE)) +
    (SELECT COUNT(*) FROM membres_parents_tuteurs WHERE date_adhesion >= date_trunc('month', CURRENT_DATE)) +
    (SELECT COUNT(*) FROM membres_adherents WHERE date_adhesion >= date_trunc('month', CURRENT_DATE)) AS total_nouveaux_inscrits_ce_mois_ci;
