-- Volet
INSERT INTO volet (nom_volet) 
VALUES 
('Volet Coordination'),
('Volet Social et Citoyennete'),
('Volet Education et Soutien aux parents'),
('Volet Hygiene et Environnement');


-- Section par volet
INSERT INTO section (nom_section, id_volet) 
VALUES 
('Section Coordination', 1),
('Section Social', 2),
('Section Citoyennete', 2),
('Section Education', 3),
('Section Soutien aux Parents', 3),
('Section Hygiene', 4),
('Section Environnement', 4); --Amelioration de cadre de vie 


-- Poste
INSERT INTO poste (nom_poste) 
VALUES 
('President(e)'),
('Vice-president(e)'),
('Tresorier(e)'),
('Tresorier(e) adjoint(e)'),
('Conseiller(e)'),
('Conseiller(e) adjoint(e)'),
('Secretaire'),
('Secretaire adjoint(e)'),
('CS Social'),         -- Chef de section Social
('CS Citoyennete'),    -- Chef de section Citoyennete
('CS education'),      -- Chef de section education
('CS Soutien aux Parents'), -- Chef de section Soutien aux Parents
('CS Hygiene'),        -- Chef de section Hygiene
('CS Environnement');  -- Chef de section Environnement


--Type activite
INSERT INTO type_activite (nom_activite) 
VALUES 
('Reunion'),
('Formation'),
('Atelier'),
('Conference'),
('Seminaire'),
('Campagne de sensibilisation'),
('Activite de benevolat'),
('Collecte de fonds'),
('Projet communautaire'),
('evenement social'),
('Activite sportive'),
('Visite de terrain'),
('Programme educatif'),
('Camp d ete');


-- Type de depenses
INSERT INTO type_depense (nom_depense) 
VALUES 
('Logistique'),
('Transport'),
('Location de salle'),
('Materiel'),
('Catering/Repas'),
('Publicite et communication'),
('Papeterie et fournitures'),
('Honoraires'),
('Frais de voyage'),
('Hebergement'),
('Impression'),
('equipements techniques'),
('Frais bancaires'),
('Cadeaux et recompenses'),
('Assurances'),
('Frais administratifs'),
('Services externes');


--Type de caisse
INSERT INTO categorie_caisse (nom_categorie) 
VALUES 
('Dons recus'),
('Subventions'),
('Revenus des evenements'),
('Budget de fonctionnement'),
('Fonds de reserve'),
('Ventes de produits'),
('Evenements de collecte de fonds'),
('Cotisations des membres actifs'),
('Cotisations des membres parents'),
('Partenariats'),
('Recette collecte de fonds');

--relations_parents
-- INSERT INTO relations_parentales (nom_relation)
-- VALUES 
-- ('pere'),
-- ('mere'),
-- ('tuteur');


INSERT INTO type_cotisation (nom_cotisation) VALUES 
('Cotisation actif'),   -- Cotisation annuelle des membres actifs
('Cotisation Parental');   -- Cotisation annuelle des parents

--Membres adherents 
INSERT INTO membres_adherents (numero , nom, prenoms, date_naissance, genre, contact, adresse, date_adhesion, id_section, email) 
VALUES 
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rakotomalala', 'Andry', '1985-03-21', 'H', '0341234567', 'Lot IVD 54, Rue Ravelo, Antananarivo', '2022-01-15', 1, 'andry.rakotomalala@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rasoamanana', 'Hanta', '1990-05-12', 'F', '0342345678', 'Villa Orchidee, Rue Ratsimilaho, Toamasina', '2022-02-20', 1, 'hanta.rasoamanana@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Ratsimba', 'Jean', '1975-07-30', 'H', '0343456789', 'Lot IIIB 76, Rue Ampanjaka, Antsirabe', '2022-03-18', 1, 'jean.ratsimba@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Randrianarison', 'Lalao', '1982-11-10', 'F', '0344567890', 'Bungalow Maroala, Rue Ampanjaka, Fianarantsoa', '2023-04-05', 1, 'lalao.randrianarison@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rabenandrasana', 'Fetra', '1992-09-22', 'H', '0345678901', 'Appartement 3B, Rue Razakandrainy, Mahajanga', '2023-05-14', 1, 'fetra.rabenandrasana@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Ramaroson', 'Tiana', '1988-01-19', 'F', '0346789012', 'Lot 23C, Rue Andriamihaja, Toliara', '2022-06-25', 1, 'tiana.ramaroson@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Razafindrazaka', 'Ny Kanto', '1995-12-03', 'F', '0347890123', 'Maison Razafy, Lot IVG 12, Antananarivo', '2022-07-30', 1, 'nykanto.razafindrazaka@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rakotomavo', 'Zo', '1987-04-07', 'H', '0348901234', 'Cite des Fleurs, Lot 24B, Antsiranana', '2022-08-20', 1, 'zo.rakotomavo@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Raharinaivo', 'Voahirana', '1993-08-14', 'F', '0349012345', 'Villa Voary, Rue Ampanjaka, Manakara', '2022-09-10',2, 'voahirana.raharinaivo@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rakotonirina', 'Herizo', '1981-06-02', 'H', '0340123456', 'Lot IIA 47, Rue Ambohijatovo, Morondava', '2022-10-15',2, 'herizo.rakotonirina@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rabe', 'Mahery', '1990-02-28', 'H', '0340234567', 'Lot 56, Rue Ampasanimalo, Antananarivo', '2022-11-10',3, 'mahery.rabe@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Raharimanana', 'Miora', '1987-07-15', 'F', '0340345678', 'Villa Miora, Lot IIB 15, Toamasina', '2023-01-22',3, 'miora.raharimanana@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Randrianasolo', 'Fandresena', '1984-05-05', 'H', '0340456789', 'Cite Ramaroson, Lot 78C, Antsirabe', '2023-02-18',4, 'fandresena.randrianasolo@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rasolofonirina', 'Aina', '1992-11-25', 'F', '0340567890', 'Maison Aina, Rue Ambohitrakely, Fianarantsoa', '2023-08-12',4, 'aina.rasolofonirina@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rahajarizafy', 'Nirina', '1978-10-30', 'H', '0340678901', 'Lot IVN 35, Rue Ankorondrano, Antananarivo', '2022-03-28',5, 'nirina.rahajarizafy@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rafidison', 'Liva', '1993-04-10', 'H', '0340789012', 'Villa Liva, Lot IIC 16, Toamasina', '2022-05-19',5, 'liva.rafidison@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rakotoarisoa', 'Rina', '1986-03-08', 'F', '0340890123', 'Lot 67D, Rue Amparibe, Antsirabe', '2022-06-22',6, 'rina.rakotoarisoa@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Randriamalala', 'Fara', '1991-09-09', 'F', '0340901234', 'Villa Fara, Lot 12A, Antananarivo', '2022-07-29',6, 'fara.randriamalala@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rakotomandimby', 'Haja', '1979-12-20', 'H', '0341012345', 'Cite Mandimby, Lot 23F, Fianarantsoa', '2022-08-10',7, 'haja.rakotomandimby@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Razafimahefa', 'Malala', '1994-06-14', 'F', '0341123456', 'Maison Malala, Rue Ambohijanahary, Mahajanga', '2022-09-11',7, 'malala.razafimahefa@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Razanamalala', 'Hasinjo', '1980-01-14', 'H', '0342234567', 'Lot IIK 34, Ambohidahy, Antananarivo', '2022-12-05',2, 'hasinjo.razanamalala@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Raveloarison', 'Vola', '1991-02-18', 'F', '0342345678', 'Lot IVL 56, Andohalo, Antananarivo', '2023-01-15',2, 'vola.raveloarison@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Randrianantenaina', 'Hery', '1985-03-25', 'H', '0342456789', 'Lot IIIE 23, Ankadifotsy, Antananarivo', '2023-02-17',3, 'hery.randrianantenaina@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rambeloson', 'Rindra', '1993-04-12', 'F', '0342567890', 'Lot IVE 78, Ambatomainty, Antananarivo', '2023-03-19',3, 'rindra.rambeloson@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Raharimalala', 'Irintsoa', '1988-05-03', 'F', '0342678901', 'Lot IVA 45, Ambohibao, Antananarivo', '2023-04-25',4, 'irintsoa.raharimalala@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Randrianatoandro', 'Feno', '1982-06-07', 'H', '0342789012', 'Lot IVD 67, Andraharo, Antananarivo', '2023-05-22',4, 'feno.randrianatoandro@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rakotondraibe', 'Tianasoa', '1990-07-10', 'H', '0342890123', 'Lot IVG 12, Ambohipo, Antananarivo', '2023-06-18',5, 'tianasoa.rakotondraibe@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Ratsimandresy', 'Lovasoa', '1987-08-19', 'H', '0342901234', 'Lot IVJ 89, Ambatoroka, Antananarivo', '2023-07-27',5, 'lovasoa.ratsimandresy@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rakotondrabe', 'Sarobidy', '1995-09-11', 'F', '0343012345', 'Lot IIA 32, Anosibe, Antananarivo', '2023-08-10',6, 'sarobidy.rakotondrabe@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rasamimanana', 'Faramalala', '1992-10-04', 'F', '0343123456', 'Lot IIIK 15, Ambohimanarina, Antananarivo', '2023-09-18',6, 'faramalala.rasamimanana@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Ratsimba', 'Andrianina', '1989-11-23', 'H', '0343234567', 'Lot IVL 27, Anosizato, Antananarivo', '2023-10-05',7, 'andrianina.ratsimba@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Randrianasolo', 'Hasina', '1994-12-19', 'F', '0343345678', 'Lot IVG 65, Ampandrana, Antananarivo', '2022-01-12',7, 'hasina.randrianasolo@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rabenarivo', 'Mandimby', '1986-01-31', 'H', '0343456789', 'Lot IVE 89, Ankorondrano, Antananarivo', '2022-02-23',2, 'mandimby.rabenarivo@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rasoloson', 'Manoa', '1991-02-25', 'F', '0343567890', 'Lot IIIE 12, Soarano, Antananarivo', '2022-03-17',2 ,'manoa.rasoloson@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rafanomezantsoa', 'Tahina', '1984-03-10', 'H', '0343678901', 'Lot IVN 45, Alarobia, Antananarivo', '2022-04-24',3, 'tahina.rafanomezantsoa@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Randrianarisoa', 'Mionintsoa', '1993-04-09', 'F', '0343789012', 'Lot IIIC 76, Mahamasina, Antananarivo', '2022-05-20',3, 'mionintsoa.randrianarisoa@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Ravoninahitriniarivo', 'Fetraniaina', '1987-05-16', 'H', '0343890123', 'Lot IVA 54, Andravoahangy, Antananarivo', '2022-06-27',4, 'fetraniaina.ravoninahitriniarivo@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Randriamanana', 'Mirana', '1992-06-25', 'F', '0343901234', 'Lot IIC 38, Ambohipo, Antananarivo', '2022-07-15',4, 'mirana.randriamanana@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rakotonirina', 'Heriniaina', '1985-07-29', 'H', '0344012345', 'Lot IVJ 34, Anjanahary, Antananarivo', '2022-08-30',5, 'heriniaina.rakotonirina@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rasoavololona', 'Vonjy', '1989-08-20', 'F', '0344123456', 'Lot IVB 23, Tsaralalàna, Antananarivo', '2022-09-25',5, 'vonjy.rasoavololona@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Randrianarivo', 'Solohery', '1984-03-22', 'H', '0345234567', 'Lot IVE 78, Ambohimanarina, Antananarivo', '2022-11-19',6, 'solohery.randrianarivo@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rasoamanana', 'Vola', '1992-02-14', 'F', '0345345678', 'Lot IIK 98, Ankatso, Antananarivo', '2023-01-28',6, 'vola.rasoamanana@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Ratsimbazafy', 'Fenohasina', '1986-04-12', 'H', '0345456789', 'Lot IIIA 23, Behoririka, Antananarivo', '2023-02-14',7, 'fenohasina.ratsimbazafy@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Razafindramavo', 'Mirindra', '1989-05-11', 'F', '0345567890', 'Lot IVD 11, Ampasanimalo, Antananarivo', '2023-03-18',7, 'mirindra.razafindramavo@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rasoanarivo', 'Toky', '1990-06-22', 'H', '0345678901', 'Lot IVL 89, Ambohimirary, Antananarivo', '2023-04-10',2, 'toky.rasoanarivo@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Razanamahasoa', 'Fitia', '1985-07-13', 'F', '0345789012', 'Lot IIIE 65, Andraisoro, Antananarivo', '2023-05-20',2, 'fitia.razanamahasoa@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Randriambololona', 'Faniry', '1994-08-25', 'H', '0345890123', 'Lot IVA 98, Ambohitsoa, Antananarivo', '2023-06-15',3, 'faniry.randriambololona@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rasoloarimanana', 'Mitia', '1991-09-16', 'F', '0345901234', 'Lot IIK 54, Soanierana, Antananarivo', '2023-07-25',3, 'mitia.rasoloarimanana@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Raharimalala', 'Mioty', '1983-10-19', 'H', '0346012345', 'Lot IVD 23, Ambatoroka, Antananarivo', '2023-08-14',4, 'mioty.raharimalala@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rakotonandrasana', 'Hariliva', '1995-11-28', 'F', '0346123456', 'Lot IVB 67, Isotry, Antananarivo', '2023-09-22',4, 'hariliva.rakotonandrasana@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rabenoro', 'Mirado', '1988-12-20', 'H', '0346234567', 'Lot IIIB 12, Andohatapenaka, Antananarivo', '2022-01-18',5, 'mirado.rabenoro@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rasolonjatovo', 'Tendry', '1991-01-15', 'F', '0346345678', 'Lot IVN 89, Antanimena, Antananarivo', '2022-02-25',5, 'tendry.rasolonjatovo@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Randrianarisoa', 'Henintsoa', '1987-02-28', 'H', '0346456789', 'Lot IVE 54, Ambohipo, Antananarivo', '2022-03-14',6, 'henintsoa.randrianarisoa@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rakotondravelo', 'Ranto', '1993-03-20', 'H', '0346567890', 'Lot IVJ 12, Ankadifotsy, Antananarivo', '2022-04-30',6, 'ranto.rakotondravelo@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rasoavololona', 'Lova', '1984-04-17', 'F', '0346678901', 'Lot IVA 65, Anjanahary, Antananarivo', '2022-05-15',7, 'lova.rasoavololona@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Raharijaona', 'Fanilo', '1992-05-22', 'H', '0346789012', 'Lot IVD 89, Ambatonakanga, Antananarivo', '2022-06-20',7, 'fanilo.raharijaona@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rafidimanana', 'Tina', '1985-06-25', 'F', '0346890123', 'Lot IIIC 45, Ambohidahy, Antananarivo', '2022-07-22',2, 'tina.rafidimanana@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Randrianatoandro', 'Anita', '1989-07-28', 'F', '0346901234', 'Lot IIK 98, Ampandrana, Antananarivo', '2022-08-19',2, 'anita.randrianatoandro@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rakotomandimby', 'Manda', '1983-08-13', 'H', '0347012345', 'Lot IIIE 76, Ambohibao, Antananarivo', '2022-09-23',3, 'manda.rakotomandimby@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rasolonjatovo', 'Tovo', '1990-09-29', 'H', '0347123456', 'Lot IVL 45, Ambatomainty, Antananarivo', '2022-10-25',3, 'tovo.rasolonjatovo@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Ravelojaona', 'Faly', '1982-01-13', 'H', '0348234567', 'Lot IIB 34, Antanimena, Antananarivo', '2022-11-25',4, 'faly.ravelojaona@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Randriamanana', 'Tahiry', '1991-02-21', 'H', '0348345678', 'Lot IVL 98, Andavamamba, Antananarivo', '2023-01-30',4, 'tahiry.randriamanana@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Razanamparany', 'Mamy', '1985-03-18', 'F', '0348456789', 'Lot IIIE 78, Anosizato, Antananarivo', '2023-02-25',5, 'mamy.razanamparany@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rafiringa', 'Sitraka', '1987-04-24', 'H', '0348567890', 'Lot IVK 12, Ambanidia, Antananarivo', '2023-03-22',5, 'sitraka.rafiringa@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Ratsimbazafy', 'Tovohery', '1990-05-11', 'H', '0348678901', 'Lot IIIC 56, Soanierana, Antananarivo', '2023-04-17',6, 'tovohery.ratsimbazafy@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Raharivelo', 'Hantatiana', '1984-06-16', 'F', '0348789012', 'Lot IVD 98, Antohomadinika, Antananarivo', '2023-05-20',6, 'Hantatiana.raharivelo@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rambelomanana', 'Fitahiana', '1992-07-23', 'H', '0348890123', 'Lot IVN 12, Ankadikely, Antananarivo', '2023-06-18',7, 'fitahiana.rambelomanana@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rafalimanana', 'Dimby', '1989-08-14', 'H', '0348901234', 'Lot IVG 45, Ambanitsena, Antananarivo', '2023-07-21',7, 'dimby.rafalimanana@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rasoarimalala', 'Volasoa', '1993-09-22', 'F', '0349012345', 'Lot IIIB 67, Anjanahary, Antananarivo', '2023-08-19',2, 'volasoa.rasoarimalala@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rakotonjanahary', 'Fanirintsoa', '1987-10-10', 'H', '0349123456', 'Lot IVD 89, Andavamamba, Antananarivo', '2023-09-25',2, 'fanirintsoa.rakotonjanahary@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rasoanaivo', 'Miotisoa', '1985-11-19', 'F', '0349234567', 'Lot IVK 12, Ambatomaro, Antananarivo', '2022-01-29',3, 'miotisoa.rasoanaivo@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Ramaroson', 'Lovatiana', '1990-12-15', 'F', '0349345678', 'Lot IIA 34, Ampitatafika, Antananarivo', '2022-02-21',3, 'lovatiana.ramaroson@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Ratsirahonana', 'Harena', '1983-01-24', 'H', '0349456789', 'Lot IIIE 54, Ambanidia, Antananarivo', '2022-03-23',4, 'Harena.ratsirahonana@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Randrianarimanana', 'Hoby', '1991-02-28', 'H', '0349567890', 'Lot IVL 76, Andoharanofotsy, Antananarivo', '2022-04-18',4, 'hoby.randrianarimanana@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rafanomezantsoa', 'Mino', '1988-03-19', 'F', '0349678901', 'Lot IIC 89, Alarobia, Antananarivo', '2022-05-22',5, 'mino.rafanomezantsoa@gmail.com'),

('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Ravoniharisoa', 'Laza', '1986-04-25', 'H', '0349789012', 'Lot IVB 98, Analamahitsy, Antananarivo', '2022-06-20',5, 'laza.ravoniharisoa@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Raharimanana', 'Ony', '1990-05-27', 'F', '0349890123', 'Lot IVG 34, Ampandrana, Antananarivo', '2022-07-23',6, 'ony.raharimanana@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rabarison', 'Tojo', '1984-06-18', 'H', '0349901234', 'Lot IVD 76, Ambanitsena, Antananarivo', '2022-08-19',6, 'tojo.rabarison@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Ravelojaona', 'Sariaka', '1989-07-12', 'F', '0340012345', 'Lot IIIB 45, Ambohitsoa, Antananarivo', '2022-09-25',7, 'sariaka.ravelojaona@gmail.com'),
('AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') , 'Rakotoniaina', 'Najaina', '1985-08-21', 'H', '0340123456', 'Lot IVN 12, Ankazomanga, Antananarivo', '2022-10-30',7, 'najaina.rakotoniaina@gmail.com');

--Membres parents 
-- Parents de Randria Miora
INSERT INTO membres_parents_tuteurs (
    numero, nom, prenoms, genre, profession, contact, adresse, date_naissance, date_adhesion
)
VALUES 
-- Parents de Randria Miora
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Randria', 'Rado', 'H', 'Enseignant', '0342345678', 'Lot IIA 456, Antananarivo', '1975-04-12', '2023-01-15'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rava', 'Faramalala', 'F', 'Secretaire', '0342345678', 'Lot IIA 456, Antananarivo', '1978-09-30', '2023-01-15'),

-- Parents de Ramiaramanana Hangotiana
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ramiaramanana', 'Henika', 'H', 'Architecte', '0344567890', 'Lot VVA 012, Antananarivo', '1972-11-25', '2023-02-20'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotondrasoa', 'Lalao', 'F', 'Professeur', '0344567890', 'Lot VVA 012, Antananarivo', '1975-05-18', '2023-02-20'),

-- Parents de Rakotomalala Malala
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotomalala', 'Francis', 'H', 'Pharmacien', '0346789012', 'Lot VIIIC 678, Antananarivo', '1970-08-22', '2023-03-10'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Razafimandimby', 'Solo', 'F', 'Entrepreneuse', '0346789012', 'Lot VIIIC 678, Antananarivo', '1973-02-10', '2023-03-10'),

-- Parents de Ramanantsoa Veronica
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ramanantsoa', 'Dimby', 'H', 'Directeur', '0348901234', 'Lot XD 234, Antananarivo', '1968-12-15', '2023-04-05'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rasamimanana', 'Sahondra', 'F', 'Chef de projet', '0348901234', 'Lot XD 234, Antananarivo', '1972-07-07', '2023-04-05'),

-- Parents de Rasoanaivo Olivia
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rasoanaivo', 'Zinot', 'H', 'Chercheur', '0340123456', 'Lot XIIC 890, Antananarivo', '1971-03-20', '2023-05-02'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ratsimbazafy', 'Hendry', 'F', 'Biochimiste', '0340123456', 'Lot XIIC 890, Antananarivo', '1976-11-01', '2023-05-02'),

-- Parents de Rakotomanga Lilia
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotomanga', 'Solofo', 'H', 'Manager', '0342345678', 'Lot XIVC 456, Antananarivo', '1970-06-13', '2023-06-08'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rafalimanana', 'Stephanie', 'F', 'Journaliste', '0342345678', 'Lot XIVC 456, Antananarivo', '1974-09-24', '2023-06-08'),

-- Parents de Ratsiraka Nazia
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ratsiraka', 'Sitraka', 'H', 'Administrateur', '0344567890', 'Lot XVIC 012, Antananarivo', '1969-10-11', '2023-07-15'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rafandray', 'Tiana', 'F', 'Comptable', '0344567890', 'Lot XVIC 012, Antananarivo', '1975-04-05', '2023-07-15'),

-- Parents de Ramaroson Tahina
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ramaroson', 'Jean', 'H', 'Agent de securite', '0346789012', 'Lot XVIIE 678, Antananarivo', '1978-01-22', '2023-08-01'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotoniaina', 'Soely', 'F', 'Caissiere', '0346789012', 'Lot XVIIE 678, Antananarivo', '1980-06-11', '2023-08-01'),

-- Parents de Rakotondrabe Valisoa
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotondrabe', 'Tendry', 'H', 'Technicien', '0348901234', 'Lot XIXG 234, Antananarivo', '1973-07-19', '2023-09-10'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rasolo', 'Malala', 'F', 'Assistante medicale', '0348901234', 'Lot XIXG 234, Antananarivo', '1975-03-29', '2023-09-10'),

-- Parents de Rasolonirina Aina
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rasolonirina', 'William', 'H', 'Commerçant', '0340123456', 'Lot XXI 890, Antananarivo', '1974-05-17', '2023-10-05'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ravonirina', 'Josee', 'F', 'Secretaire', '0340123456', 'Lot XXI 890, Antananarivo', '1978-08-21', '2023-10-05'),

-- (Continuez pour chaque parent avec leur date d'adhésion respective)

-- Parents de Razanamalala Manitra
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Razanamalala', 'Christian', 'H', 'Enseignant', '0342345678', 'Lot IIA 456, Antananarivo', '1973-03-12','2023-02-20'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rava', 'Christine', 'F','Secretaire', '0342345678', 'Lot IIA 456, Antananarivo', '1975-07-19','2023-02-20'),

-- Parents de Ramamonjisoa Hanitra
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ramamonjisoa', 'Fenosoa', 'H', 'Architecte', '0344567890', 'Lot VVA 012, Antananarivo', '1972-11-10','2023-04-10'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotondrasoa', 'Fanja', 'F', 'Professeur', '0344567890', 'Lot VVA 012, Antananarivo', '1974-06-23','2023-04-10'),

-- Parents de Rakotobe Sylvia
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotobe', 'Yves', 'H', 'Pharmacien', '0346789012', 'Lot VIIIC 678, Antananarivo', '1976-05-30','2023-06-25'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Razafimandimby', 'Helisoa', 'F', 'Entrepreneuse', '0346789012', 'Lot VIIIC 678, Antananarivo', '1979-08-25','2023-06-25'),

-- Parents de Ramananarivo Manoa
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ramananarivo', 'Albert', 'H', 'Directeur', '0348901234', 'Lot XD 234, Antananarivo', '1970-04-17','2023-08-09'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rasamimanana', 'Anita', 'F', 'Chef de projet', '0348901234', 'Lot XD 234, Antananarivo', '1974-11-12','2023-08-09'),

-- Parents de Rasoarivony Daniella
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rasoarivony', 'Herizo', 'H', 'Chercheur', '0340123456', 'Lot XIIC 890, Antananarivo', '1973-09-04','2023-10-03'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ratsimbazafy', 'Haingotiana', 'F', 'Biochimiste', '0340123456', 'Lot XIIC 890, Antananarivo', '1976-03-14','2023-10-03'),

-- Parents de Rakotomanga Andrea
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotomanga', 'Benja', 'H', 'Manager', '0342345678', 'Lot XIVC 456, Antananarivo', '1971-02-21','2023-12-29'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rafalimanana', 'Lilie', 'F', 'Journaliste', '0342345678', 'Lot XIVC 456, Antananarivo', '1975-12-02','2023-12-29'),

-- Parents de Ratsiraka Felicia
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ratsiraka', 'Rojo', 'H', 'Administrateur', '0344567890', 'Lot XVIC 012, Antananarivo', '1970-10-15','2023-02-25'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rafandray', 'Volasoa', 'F', 'Comptable', '0344567890', 'Lot XVIC 012, Antananarivo', '1974-07-28','2023-02-25'),

-- Parents de Ramaroson Mino
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ramaroson', 'Jeremy', 'H', 'Agent de securite', '0346789012', 'Lot XVIIE 678, Antananarivo', '1978-01-25','2023-04-19'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotoniaina', 'Rebeka', 'F', 'Caissiere', '0346789012', 'Lot XVIIE 678, Antananarivo', '1980-09-10','2023-04-19'),

-- Parents de Rakotondrabe Valisoa
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotondrabe', 'Martin', 'H', 'Technicien', '0348901234', 'Lot XIXG 234, Antananarivo', '1972-07-19','2023-06-15'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rasolo', 'Victorine', 'F', 'Assistante medicale', '0348901234', 'Lot XIXG 234, Antananarivo', '1975-05-22','2023-06-15'),

-- Parents de Rasolonirina Anjatiana
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rasolonirina', 'Diary', 'H', 'Commerçant', '0340123456', 'Lot XXI 890, Antananarivo', '1974-03-05','2023-08-18'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ravonirina', 'Nampoina', 'F', 'Secretaire', '0340123456', 'Lot XXI 890, Antananarivo', '1977-11-09','2023-08-18'),

-- Parents de Razanamalala Anita
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Razanamalala', 'Ricardo', 'H', 'Enseignant', '0342345678', 'Lot IIA 456, Antananarivo', '1972-09-10','2023-02-20'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rava', 'Lalao', 'F', 'Secretaire', '0342345678', 'Lot IIA 456, Antananarivo', '1975-11-15','2023-02-20'),

-- Parents de Ramamonjisoa Fitia
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ramamonjisoa', 'Zinot', 'H', 'Architecte', '0344567890', 'Lot VVA 012, Antananarivo', '1973-04-20','2023-04-10'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotondrasoa', 'Sarobidy', 'F','Professeur', '0344567890', 'Lot VVA 012, Antananarivo', '1977-12-05','2023-04-10'),

-- Parents de Rakotobe Fitiavana
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotobe', 'Josee', 'H', 'Pharmacien', '0346789012', 'Lot VIIIC 678, Antananarivo', '1971-08-17','2023-06-25'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Razafimandimby', 'Armel', 'F', 'Entrepreneuse', '0346789012', 'Lot VIIIC 678, Antananarivo', '1975-03-30','2023-06-25'),

-- Parents de Ramananarivo Vaniah
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ramananarivo', 'Nomenjanahary', 'H', 'Directeur', '0348901234', 'Lot XD 234, Antananarivo', '1970-10-25','2023-08-09'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rasamimanana', 'Rita', 'F', 'Chef de projet', '0348901234', 'Lot XD 234, Antananarivo', '1974-07-12','2023-08-09'),

-- Parents de Rasoarivony Ilaina
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rasoarivony', 'Njaka', 'H', 'Chercheur', '0340123456', 'Lot XIIC 890, Antananarivo', '1972-05-18','2023-10-03'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ratsimbazafy', 'Claudia', 'F', 'Biochimiste', '0340123456', 'Lot XIIC 890, Antananarivo', '1975-09-22','2023-10-03'),

-- Parents de Rakotomanga Hiraina
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotomanga', 'Barijaona', 'H', 'Manager', '0342345678', 'Lot XIVC 456, Antananarivo', '1971-12-11','2023-12-29'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rafalimanana', 'Fitiavana', 'F', 'Journaliste', '0342345678', 'Lot XIVC 456, Antananarivo', '1975-03-21','2023-12-29'),

-- Parents de Ratsiraka Erica
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ratsiraka', 'Alain', 'H', 'Administrateur', '0344567890', 'Lot XVIC 012, Antananarivo', '1970-11-19','2023-02-25'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rafandray', 'Miah', 'F', 'Comptable', '0344567890', 'Lot XVIC 012, Antananarivo', '1974-06-29','2023-02-25'),

-- Parents de Ramaroson Noelah
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ramaroson', 'Mahery', 'H', 'Agent de securite', '0346789012', 'Lot XVIIE 678, Antananarivo', '1978-04-06','2023-04-19'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotoniaina', 'Jouhanah', 'F', 'Caissiere', '0346789012', 'Lot XVIIE 678, Antananarivo', '1980-10-11','2023-04-19'),

-- Parents de Rakotondrabe Elinnah
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rakotondrabe', 'Allan', 'H','Technicien', '0348901234', 'Lot XIXG 234, Antananarivo', '1973-02-08','2023-06-15'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rasolo', 'Mirana', 'F', 'Assistante medicale', '0348901234', 'Lot XIXG 234, Antananarivo', '1976-11-23','2023-06-15'),

-- Parents de Rasolonirina Avotra
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Rasolonirina', 'Rija', 'H', 'Commerçant', '0340123456', 'Lot XXI 890, Antananarivo', '1974-05-01','2023-08-18'),
('MPT' || LPAD(NEXTVAL('numApt')::TEXT, 5, '0'), 'Ravonirina', 'Ando', 'F', 'Secretaire', '0340123456', 'Lot XXI 890, Antananarivo', '1977-12-15','2023-08-18');


--Membres_enfants
INSERT INTO membres_enfants (
    numero, nom, prenoms, date_naissance, genre, ecole, classe, annee_scolaire, 
    contact, adresse, id_pere, id_mere, nombre_fratrie, date_adhesion
)
VALUES 
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Randria', 'Miora', '2006-08-20', 'F', 'College Saint Michel', '11eme', '2023-2024', '0342345678', 'Lot IIA 456, Antananarivo', 1, 2, 2, '2023-02-20'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Ramiaramanana', 'Hangotiana', '2007-01-10', 'F', 'College Sacre-Cœur', '10eme', '2023-2024', '0344567890', 'Lot VVA 012, Antananarivo', 3, 4, 1, '2023-04-10'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rakotomalala', 'Malala', '2006-11-25', 'F', 'College La Source', '12eme', '2023-2024', '0346789012', 'Lot VIIIC 678, Antananarivo', 5, 6, 2, '2023-06-25'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Ramanantsoa', 'Veronica', '2007-05-09', 'F', 'College Saint François Xavier', '10eme', '2023-2024', '0348901234', 'Lot XD 234, Antananarivo', 7, 8, 1, '2023-08-09'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rasoanaivo', 'Olivia', '2006-02-03', 'F', 'College La Source', '11eme', '2023-2024', '0340123456', 'Lot XIIC 890, Antananarivo', 9, 10, 1, '2023-10-03'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rakotomanga', 'Lilia', '2007-03-29', 'F', 'College Saint Michel', '10eme', '2023-2024', '0342345678', 'Lot XIVC 456, Antananarivo', 11, 12, 2, '2023-12-29'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Ratsiraka', 'Nazia', '2006-08-25', 'F', 'College Sacre-Cœur', '12eme', '2023-2024', '0344567890', 'Lot XVIC 012, Antananarivo', 13, 14, 3, '2023-02-25'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Ramaroson', 'Tahina', '2007-01-19', 'F', 'College Saint François Xavier', '10eme', '2023-2024', '0346789012', 'Lot XVIIE 678, Antananarivo', 15, 16, 4, '2023-04-19'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rakotondrabe', 'Valisoa', '2006-05-15', 'F', 'College La Source', '11eme', '2023-2024', '0348901234', 'Lot XIXG 234, Antananarivo', 17, 18, 3, '2023-06-15'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rasolonirina', 'Aina', '2007-04-18', 'F', 'College Saint Michel', '10eme', '2023-2024', '0340123456', 'Lot XXI 890, Antananarivo', 19, 20, 2, '2023-08-18'),

('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Razanamalala', 'Manitra', '2009-08-20', 'F', 'College Saint Michel', '8eme', '2023-2024', '0342345678', 'Lot IIA 456, Antananarivo', 21, 22, 2, '2023-02-20'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Ramamonjisoa', 'Hanitra', '2011-01-10', 'F', 'College Saint François Xavier', '7eme', '2023-2024', '0344567890', 'Lot VVA 012, Antananarivo', 23, 24, 1, '2023-04-10'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rakotobe', 'Sylvia', '2010-11-25', 'F', 'College Sacre-Cœur', '7eme', '2023-2024', '0346789012', 'Lot VIIIC 678, Antananarivo', 25, 26, 2, '2023-06-25'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Ramananarivo', 'Manoa', '2011-05-09', 'F', 'College Saint François Xavier', '7eme', '2023-2024', '0348901234', 'Lot XD 234, Antananarivo', 27, 28, 1, '2023-08-09'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rasoarivony', 'Daniella', '2010-02-03', 'F', 'College Saint Michel', '7eme', '2023-2024', '0340123456', 'Lot XIIC 890, Antananarivo', 29, 30, 1, '2023-10-03'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rakotomanga', 'Andrea', '2011-03-29', 'F', 'College Saint François Xavier', '7eme', '2023-2024', '0342345678', 'Lot XIVC 456, Antananarivo', 31, 32, 2, '2023-12-29'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Ratsiraka', 'Felicia', '2010-08-25', 'F', 'College La Source', '7eme', '2023-2024', '0344567890', 'Lot XVIC 012, Antananarivo', 33, 34, 3, '2023-02-25'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Ramaroson', 'Mino', '2011-01-19', 'F', 'College Saint Michel', '7eme', '2023-2024', '0346789012', 'Lot XVIIE 678, Antananarivo', 35, 36, 4, '2023-04-19'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rakotondrabe', 'Francia', '2010-05-15', 'F', 'College Sacre-Cœur', '7eme', '2023-2024', '0348901234', 'Lot XIXG 234, Antananarivo', 37, 38, 3, '2023-06-15'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rasolonirina', 'Anjatiana', '2011-04-18', 'F', 'College Saint Michel', '7eme', '2023-2024', '0340123456', 'Lot XXI 890, Antananarivo', 39, 40, 2, '2023-08-18'),

('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Razanamalala', 'Anita', '2009-08-20', 'F', 'College Saint Michel', '8eme', '2023-2024', '0342345678', 'Lot IIA 456, Antananarivo', 41, 42, 2, '2023-02-20'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Ramamonjisoa', 'Fitia', '2011-01-10', 'F', 'College Saint François Xavier', '7eme', '2023-2024', '0344567890', 'Lot VVA 012, Antananarivo', 43, 44, 1, '2023-04-10'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rakotobe', 'Fitiavana', '2010-11-25', 'F', 'College Sacre-Cœur', '7eme', '2023-2024', '0346789012', 'Lot VIIIC 678, Antananarivo', 45, 46, 2, '2023-06-25'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Ramananarivo', 'Vaniah', '2011-05-09', 'F', 'College Saint François Xavier', '7eme', '2023-2024', '0348901234', 'Lot XD 234, Antananarivo', 47, 48, 1, '2023-08-09'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rasoarivony', 'Ilaina', '2010-02-03', 'F', 'College Saint Michel', '7eme', '2023-2024', '0340123456', 'Lot XIIC 890, Antananarivo', 49, 50, 1, '2023-10-03'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rakotomanga', 'Hiraina', '2011-03-29', 'F', 'College Saint François Xavier', '7eme', '2023-2024', '0342345678', 'Lot XIVC 456, Antananarivo', 51, 52, 2, '2023-12-29'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Ratsiraka', 'Erica', '2010-08-25', 'F', 'College La Source', '7eme', '2023-2024', '0344567890', 'Lot XVIC 012, Antananarivo', 53, 54, 3, '2023-02-25'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Ramaroson', 'Noelah', '2011-01-19', 'F', 'College Saint Michel', '7eme', '2023-2024', '0346789012', 'Lot XVIIE 678, Antananarivo', 55, 56, 4, '2023-04-19'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rakotondrabe', 'Elinnah', '2010-05-15', 'F', 'College Sacre-Cœur', '7eme', '2023-2024', '0348901234', 'Lot XIXG 234, Antananarivo', 57, 58, 3, '2023-06-15'),
('AMI' || LPAD(NEXTVAL('numAmi')::TEXT, 5, '0'), 'Rasolonirina', 'Avotra', '2011-04-18', 'F', 'College Saint Michel', '7eme', '2023-2024', '0340123456', 'Lot XXI 890, Antananarivo', 59, 60, 2, '2023-08-18');


--Staff_madagascar
INSERT INTO staff_madagascar (id_membre_adherent, id_poste,mot_de_passe)
VALUES
(1, 1,'password1'),  -- President(e)
(2, 2,'password2'),  -- Vice-president(e)
(3, 3,'password3'),  -- Tresorier(e)
(4, 4,'password4'),  -- Tresorier(e) adjoint(e)
(5, 5,'password5'),  -- Conseiller(e)
(6, 6,'password6'),  -- Conseiller(e) adjoint(e)
(7, 7,'password7'),  -- Secretaire
(8, 8,'password8'),  -- Secretaire adjoint(e)
-- Section Social (id_section = 2)
(21, 9,'password9'),  -- CS Social
-- Section Citoyennete (id_section = 3)
(25, 10,'password10'),  -- CS Citoyennete
-- Section education (id_section = 4)
(29, 11,'password11'), -- CS education
-- Section Soutien aux Parents (id_section = 5)
(15, 12,'password12'),  -- CS Soutien aux Parents
-- Section Hygiene (id_section = 6)
(37, 13,'password13'),  -- CS Hygiene
-- Section Environnement (id_section = 7)
(79, 14,'password14');  -- CS Environnement

--staff France
INSERT INTO staff_nice (nom, prenoms, date_naissance, genre, contact, adresse, id_poste, date_adhesion, email, mot_de_passe)
VALUES
('Rakotoarisoa', 'Jean', '1985-03-14', 'Homme', '+33 6 12 34 56 78', '10 Rue de la Paix, 75002 Paris, France', 1, '2023-01-10', 'jean.rakotoarisoa@example.com', 'motdepasse1'),
('Rasoamanarivo', 'Sahondra', '1990-07-22', 'Femme', '+33 6 98 76 54 32', '25 Avenue des Champs-elysees, 75008 Paris, France', 2, '2023-02-15', 'sahondra.rasoamanarivo@example.com', 'motdepasse2'),
('Andrianarivo', 'Michel', '1978-01-30', 'Homme', '+33 7 65 43 21 09', '14 Boulevard Haussmann, 75009 Paris, France', 3, '2023-03-20', 'michel.andrianarivo@example.com', 'motdepasse3'),
('Razanadrakoto', 'Lalao', '1983-11-12', 'Femme', '+33 6 43 21 09 87', '32 Rue du Faubourg Saint-Honore, 75008 Paris, France', 4, '2023-04-25', 'lalao.razanadrakoto@example.com', 'motdepasse4'),
('Dupont', 'Pierre', '1980-04-18', 'Homme', '+33 6 45 67 89 01', '3 Rue de Rivoli, 75004 Paris, France', 5, '2023-05-10', 'pierre.dupont@example.com', 'motdepasse5'),
('Lefebvre', 'Marie', '1987-09-05', 'Femme', '+33 7 12 34 56 78', '18 Rue de la Republique, 69002 Lyon, France', 6, '2023-06-15', 'marie.lefebvre@example.com', 'motdepasse6'),
('Martin', 'Jacques', '1975-12-23', 'Homme', '+33 6 23 45 67 89', '6 Rue de la Liberte, 33000 Bordeaux, France', 7, '2023-07-20', 'jacques.martin@example.com', 'motdepasse7'),
('Durand', 'Sophie', '1992-05-14', 'Femme', '+33 7 89 01 23 45', '15 Avenue Victor Hugo, 06000 Nice, France', 8, '2023-08-25', 'sophie.durand@example.com', 'motdepasse8');


--Activites 
INSERT INTO activites (titre, id_type_activite, date_activite, heure_debut, heure_fin, lieu, id_section, date_envoie, statut)
VALUES
('Reunion de planification annuelle', 1, '2022-01-10', '09:00', '12:00', 'Salle de conference A, Antananarivo', 1, '2021-10-10', 10),
('Reunion d evaluation trimestrielle', 1, '2022-12-15', '14:00', '17:00', 'Salle de reunion B, Antananarivo', 1, '2022-09-15', 10),
('Formation en gestion de projet', 2, '2022-03-25', '09:00', '16:00', 'Centre de formation, Antananarivo', 3, '2021-12-25', 10),
('Formation en communication efficace', 2, '2022-04-12', '08:00', '15:00', 'Hotel Ibis, Antananarivo', 3, '2022-01-12', 10),
('Atelier sur les techniques de fundraising', 3, '2022-05-02', '08:00', '12:00', 'Salle des ateliers, Antananarivo', 2, '2022-02-02', 10),
('Atelier de developpement personnel', 3, '2022-06-10', '09:00', '12:00', 'Centre communautaire, Antananarivo', 2, '2022-03-10', 10),
('Conference sur le developpement durable', 4, '2022-07-28', '09:00', '12:00', 'Universite d Antananarivo', 4, '2022-04-28', 10),
('Conference sur les droits des enfants', 4, '2022-08-15', '14:00', '17:00', 'Palais des congres, Antananarivo', 4, '2022-05-15', 10),
('Seminaire sur la gestion des ressources humaines', 5, '2022-09-13', '09:00', '17:00', 'Hotel Carlton, Antananarivo', 1, '2022-06-13', 10),
('Seminaire sur le leadership communautaire', 5, '2022-10-20', '08:00', '16:00', 'Centre des affaires, Antananarivo', 1, '2022-07-20', 10),
('Reunion du comite de direction', 1, '2022-11-05', '10:00', '13:00', 'Siege de l association, Antananarivo', 1, '2022-08-05', 10),
('Reunion des chefs de section', 1, '2022-12-18', '08:30', '11:30', 'Salle de conference C, Antananarivo', 1, '2022-09-18', 10),
('Formation sur la gestion des benevoles', 2, '2023-01-20', '09:30', '15:30', 'Siege de l association, Antananarivo', 3, '2022-10-20', 10),
('Formation en securite et sante au travail', 2, '2023-02-07', '08:30', '17:00', 'Centre de conference, Antananarivo', 3, '2022-11-07', 10),
('Atelier de creation de projet social', 3, '2023-03-17', '14:00', '17:00', 'Siege de l association, Antananarivo', 2, '2022-12-17', 10),
('Atelier sur la gestion du stress', 3, '2023-04-25', '10:00', '13:00', 'Maison des jeunes, Antananarivo', 2, '2023-01-25', 10),
('Conference sur la sante publique', 4, '2023-05-08', '09:30', '12:30', 'Siege de l OMS, Antananarivo', 4, '2023-02-08', 10),
('Conference sur l economie solidaire', 4, '2023-06-05', '13:00', '16:00', 'Hotel de ville, Antananarivo', 4, '2023-03-05', 10),
('Seminaire sur la communication institutionnelle', 5, '2023-07-12', '09:30', '16:30', 'Centre de conference, Antananarivo', 1, '2023-04-12', 10),
('Seminaire sur la gestion des conflits', 5, '2023-08-28', '08:30', '15:30', 'Hotel Ibis, Antananarivo', 1, '2023-05-28', 10),
('Campagne de sensibilisation sur la sante mentale', 6, '2023-09-22', '08:00', '12:00', 'Place de l Independance, Antananarivo', 4, '2023-06-22', 10),
('Campagne de sensibilisation contre le tabagisme', 6, '2023-10-03', '09:00', '13:00', 'Parc Botanique, Antananarivo', 4, '2023-07-03', 10),
('Activite de benevolat pour la reforestation', 7, '2023-11-29', '07:30', '12:00', 'Colline d Ambohimanga, Antananarivo', 4, '2023-08-29', 10),
('Activite de benevolat dans un orphelinat', 7, '2023-12-14', '09:00', '15:00', 'Orphelinat Sainte-Famille, Antananarivo', 2, '2023-09-14', 10),
('Collecte de fonds pour les enfants defavorises', 8, '2024-01-20', '09:00', '18:00', 'Stade Municipal, Antananarivo', 2, '2023-10-20', 10),
('Collecte de fonds pour la construction d une ecole', 8, '2024-02-11', '08:00', '16:00', 'Centre Commercial, Antananarivo', 3, '2023-11-11', 10),
('Projet communautaire pour la renovation d une ecole', 9, '2024-03-16', '08:00', '17:00', 'ecole Primaire, Antananarivo', 3, '2023-12-16', 10),
('Projet communautaire pour l assainissement d un quartier', 9, '2024-04-21', '07:30', '16:00', 'Quartier Besarety, Antananarivo', 4, '2024-01-21', 10),
('Evenement social pour les familles defavorisees', 10, '2024-05-08', '09:00', '17:00', 'Parc de Tsimbazaza, Antananarivo', 2, '2024-02-08', 10),
('Evenement social pour les personnes âgees', 10, '2024-06-15', '10:00', '16:00', 'Maison de retraite Akamasoa, Antananarivo', 2, '2024-03-15', 10),

--sans fiche technique donc pas encore valide
('Activite sportive : tournoi de football', 11, '2024-07-12', '08:00', '18:00', 'Stade Mahamasina, Antananarivo', 1, '2024-04-12', 1),
('Activite sportive : course à pied', 11, '2024-08-23', '07:00', '11:00', 'Boulevard de l Independance, Antananarivo', 1, '2024-05-23', 1),
('Visite de terrain pour evaluer un projet agricole', 12, '2024-09-20', '09:00', '15:00', 'Ferme Ecole, Antananarivo', 3, '2024-06-20', 1),
('Visite de terrain dans une communaute rurale', 12, '2024-10-30', '08:30', '14:30', 'Village Andoharanofotsy, Antananarivo', 3, '2024-07-30', 1),
('Programme educatif sur l education à la paix', 13, '2024-11-25', '09:00', '17:00', 'Universite d Antananarivo', 3, '2024-08-25', 1),
('Programme educatif sur la protection de l environnement', 13, '2024-12-01', '08:00', '16:00', 'Centre des Jeunes, Antananarivo', 4, '2024-09-01', 1),
('Camp d ete pour les jeunes leaders', 14, '2024-12-05', '08:00', '17:00', 'Parc National d Andasibe, Antananarivo', 1, '2024-09-05', 1),
('Camp d ete sur le developpement personnel', 14, '2024-12-10', '09:00', '16:00', 'Centre d education, Antananarivo', 2, '2024-09-10', 1),
('Campagne de sensibilisation sur l hygiene et la sante', 6, '2024-12-18', '09:00', '12:00', 'Marche de la Digue, Antananarivo', 4, '2024-09-18', 1),
('Projet communautaire pour l amelioration des infrastructures sanitaires', 9, '2024-12-29', '08:00', '15:00', 'Quartier Ambohipo, Antananarivo', 4, '2024-09-29', 1);

--Fiche technique
INSERT INTO fiche_technique (id_activite, objectif, methodologie, participants, justifications)
VALUES
(1, 'Promouvoir la cooperation entre les membres.', 'Discussion en groupe, presentation des resultats.', 'Membres de la Section Coordination.', 'Renforcer l unite dans l association.'),
(2, 'Ameliorer les competences en gestion des membres.', 'Sessions de formation interactives.', 'Tous les membres de la Section Social.', 'Necessite de renforcer les capacites organisationnelles.'),
(3, 'Renforcer les competences des membres dans divers domaines.', 'Ateliers pratiques et theoriques.', 'Membres actifs de la section Citoyennete.', 'Besoin de developper des competences specifiques.'),
(4, 'Informer sur les enjeux actuels.', 'Conferenciers experts et seances de questions-reponses.', 'Membres et invites de l association.', 'Augmenter la sensibilisation.'),
(5, 'Mettre à jour les connaissances des membres.', 'Seminaires thematiques.', 'Membres de toutes les sections.', 'Besoin de formations continues.'),
(6, 'Sensibiliser sur la sante mentale.', 'Distribution de depliants, discussions.', 'Communaute locale.', 'Augmenter la prise de conscience sur la sante mentale.'),
(7, 'Reduire le taux de tabagisme.', 'Ateliers de sensibilisation, conferences.', 'Fumeurs et non-fumeurs de la communaute.', 'Probleme de sante publique.'),
(8, 'Participer à la reforestation.', 'Plantation d arbres, sensibilisation.', 'Membres volontaires.', 'Reponse à la deforestation.'),
(9, 'Apporter de l aide aux orphelins.', 'Activites recreatives et educatives.', 'Enfants de l orphelinat et membres benevoles.', 'Soutenir les orphelins dans leur developpement.'),
(10, 'Collecter des fonds pour soutenir les enfants.', 'Organiser des evenements de collecte de fonds.', 'Membres de la communaute et sponsors.', 'Besoin de financer des projets pour les enfants.'),
(11, 'Construire une ecole pour les enfants defavorises.', 'Campagne de levee de fonds.', 'Membres, parents et bienfaiteurs.', 'Besoins en infrastructure educative.'),
(12, 'Renovation d une ecole en difficulte.', 'Travaux communautaires.', 'Membres de la communaute et benevoles.', 'Ameliorer les conditions d apprentissage.'),
(13, 'Assainir un quartier defavorise.', 'Nettoyage collectif et sensibilisation.', 'Residents et membres volontaires.', 'Reduire les risques sanitaires.'),
(14, 'Organiser un evenement social pour familles defavorisees.', 'Jeux, repas communautaire.', 'Familles, benevoles.', 'Renforcer la cohesion sociale.'),
(15, 'Soutenir les personnes âgees isolees.', 'Activites de divertissement et repas.', 'Personnes âgees et benevoles.', 'Ameliorer la qualite de vie des personnes âgees.'),
(16, 'Promouvoir le sport et la sante.', 'Organisation d un tournoi de football.', 'Jeunes de la communaute.', 'Encourager l activite physique.'),
(17, 'Encourager la pratique de la course à pied.', 'Organisation d une course à pied.', 'Membres de l association et la communaute.', 'Favoriser le sport pour tous.'),
(18, 'evaluer l avancement d un projet agricole.', 'Visite guidee, discussion avec les beneficiaires.', 'Membres de la section education.', 'Suivi des projets finances.'),
(19, 'Observer les conditions de vie dans une communaute rurale.', 'Visite de terrain, interviews.', 'Membres de l association et experts.', 'Recueillir des donnees pour des projets futurs.'),
(20, 'eduquer les jeunes à la paix.', 'Sessions educatives et jeux de role.', 'Jeunes de la communaute.', 'Reduire la violence parmi les jeunes.'),
(21, 'Proteger l environnement à travers l education.', 'Ateliers, jeux educatifs.', 'Jeunes et membres de la communaute.', 'Preserver l environnement pour les generations futures.'),
(22, 'Former des jeunes leaders.', 'Conferences, ateliers de leadership.', 'Jeunes de l association.', 'Developper les futurs leaders.'),
(23, 'Developpement personnel pour les jeunes.', 'Ateliers, discussions en groupe.', 'Jeunes participants.', 'Encourager le developpement personnel.'),
(24, 'Sensibiliser à l hygiene et la sante.', 'Distributions de kits d hygiene, ateliers.', 'Population locale.', 'Ameliorer les pratiques d hygiene.'),
(25, 'Ameliorer les infrastructures sanitaires.', 'Construction et renovation.', 'Membres de la communaute et benevoles.', 'Ameliorer les conditions sanitaires.'),
(26, 'Sensibiliser la communaute sur les dangers du tabac.', 'Campagne mediatique, stands d information.', 'Fumeurs et non-fumeurs.', 'Reduire le tabagisme.'),
(27, 'Soutenir les femmes dans l entrepreneuriat.', 'Ateliers, mentorat.', 'Femmes entrepreneures.', 'Renforcer l autonomie des femmes.'),
(28, 'Proteger les forets de Madagascar.', 'Sensibilisation, projets de reboisement.', 'Communautes locales.', 'Reduire la deforestation.'),
(29, 'Soutenir l education des filles.', 'Campagnes de sensibilisation, bourses.', 'Filles scolarisees et leurs familles.', 'Promouvoir l education des filles.'),
(30, 'Encourager le recyclage dans les foyers.', 'Ateliers, distribution de materiels.', 'Familles de la communaute.', 'Reduire les dechets menagers.');

INSERT INTO depenses_previsionnel (id_fiche_technique, designation, quantite, prix_unitaire, montant_total)
VALUES
(1, 'Location de salle pour la reunion ', 1, 140000.00, 140000.00),
(1, 'Papeterie pour la prise de notes ', 15, 4500.00, 67500.00),
(1, 'Catering pour les participants ', 10, 24000.00, 240000.00),
(2, 'Honoraires du formateur ', 1, 190000.00, 190000.00),
(2, 'Materiel de formation ', 10, 14000.00, 140000.00),
(2, 'Frais de transport pour les participants ', 15, 9500.00, 142500.00),
(3, 'Location de salle pour l atelier ', 1, 95000.00, 95000.00),
(3, 'Materiel pour les ateliers pratiques ', 25, 4800.00, 120000.00),
(3, 'Cadeaux pour les participants ', 10, 9500.00, 95000.00),
(4, 'Honoraires du conferencier ', 1, 290000.00, 290000.00),
(4, 'Impression de supports de conference ', 45, 1900.00, 85500.00),
(4, 'Publicite pour l evenement ', 1, 48000.00, 48000.00),
(5, 'Frais de transport pour les intervenants ', 5, 29000.00, 145000.00),
(5, 'Location de salle pour le seminaire ', 1, 190000.00, 190000.00),
(5, 'Catering pour les participants ', 18, 14500.00, 261000.00),
(6, 'Impression de depliants ', 90, 900.00, 81000.00),
(6, 'Honoraires des intervenants ', 2, 48000.00, 96000.00),
(6, 'Transport des materiels de sensibilisation ', 1, 48000.00, 48000.00),
(7, 'Publicite et communication s', 1, 72000.00, 72000.00),
(7, 'Cadeaux pour les participants ', 18, 4800.00, 86400.00),
(7, 'Location de materiel de presentation ', 4, 19000.00, 76000.00),
(8, 'Achat de plants d arbres ', 450, 480.00, 216000.00),
(8, 'Transport des volontaires ', 10, 9500.00, 95000.00),
(8, 'Publicite pour l evenement ', 1, 48000.00, 48000.00),
(9, 'Jeux et materiels pour les enfants ', 28, 1900.00, 53200.00),
(9, 'Transport des benevoles ', 8, 14500.00, 116000.00),
(9, 'Catering pour les enfants ', 18, 4800.00, 86400.00),
(10, 'Location d une salle pour la collecte ', 1, 140000.00, 140000.00),
(10, 'Publicite pour la collecte de fonds ', 1, 95000.00, 95000.00),
(10, 'Catering pour les participants ', 12, 19000.00, 228000.00),
(11, 'Materiaux de construction', 50, 120000.00, 6000000.00),
(11, 'Location d engins', 3, 500000.00, 1500000.00),
(11, 'Main-d œuvre', 15, 100000.00, 1500000.00),
(11, 'Frais administratifs', 1, 50000.00, 50000.00),
(12, 'Materiaux de renovation', 40, 150000.00, 6000000.00),
(12, 'Location de materiel de construction', 2, 500000.00, 1000000.00),
(12, 'Main-d œuvre', 10, 100000.00, 1000000.00),
(13, 'Location d equipements de nettoyage', 5, 200000.00, 1000000.00),
(13, 'Transport des dechets', 10, 50000.00, 500000.00),
(13, 'Materiaux de nettoyage', 50, 5000.00, 250000.00),
(14, 'Location de salle', 1, 1000000.00, 1000000.00),
(14, 'Catering pour les familles', 100, 10000.00, 1000000.00),
(14, 'Jeux et animations', 10, 50000.00, 500000.00),
(15, 'Organisation d activites recreatives', 5, 50000.00, 250000.00),
(15, 'Catering pour les participants', 50, 5000.00, 250000.00),
(15, 'Transport des participants', 10, 20000.00, 200000.00),
(16, 'Organisation du tournoi', 1, 1000000.00, 1000000.00),
(16, 'Materiel sportif', 30, 10000.00, 300000.00),
(16, 'Recompenses pour les participants', 20, 50000.00, 1000000.00),
(17, 'Organisation de la course', 1, 500000.00, 500000.00),
(17, 'Materiel de course', 30, 10000.00, 300000.00),
(17, 'Recompenses pour les participants', 10, 50000.00, 500000.00),
(18, 'Organisation de la visite', 1, 500000.00, 500000.00),
(18, 'Materiel d evaluation', 20, 10000.00, 200000.00),
(18, 'Catering pour les participants', 20, 10000.00, 200000.00),
(19, 'Organisation de la visite', 1, 400000.00, 400000.00),
(19, 'Materiel d observation', 20, 8000.00, 160000.00),
(19, 'Catering pour les participants', 20, 10000.00, 200000.00),
(20, 'Organisation des sessions educatives', 1, 600000.00, 600000.00),
(20, 'Materiel educatif', 50, 8000.00, 400000.00),
(20, 'Catering pour les participants', 30, 10000.00, 300000.00),
(21, 'Location de salle de formation', 1, 300000.00, 300000.00),
(21, 'Materiel de formation', 20, 15000.00, 300000.00),
(21, 'Frais de formateur', 5, 100000.00, 500000.00),
(22, 'Manuels scolaires', 100, 5000.00, 500000.00),
(22, 'Location de salle de cours', 1, 200000.00, 200000.00),
(22, 'Frais de formateur', 5, 100000.00, 500000.00),
(23, 'Construction de puits', 2, 3000000.00, 6000000.00),
(23, 'Systemes de filtration d eau', 10, 200000.00, 2000000.00),
(23, 'Frais de maintenance', 1, 500000.00, 500000.00),
(24, 'Kits scolaires', 200, 10000.00, 2000000.00),
(24, 'Transport des kits', 1, 300000.00, 300000.00),
(24, 'Distribution des kits', 1, 200000.00, 200000.00),
(25, 'Construction de latrines', 5, 500000.00, 2500000.00),
(25, 'Materiaux sanitaires', 10, 200000.00, 2000000.00),
(25, 'Frais de main-d oeuvre', 10, 100000.00, 1000000.00),
(26, 'Distribution de repas nutritifs', 500, 5000.00, 2500000.00),
(26, 'Programmes de sensibilisation', 10, 100000.00, 1000000.00),
(26, 'Frais de suivi et evaluation', 1, 500000.00, 500000.00),
(27, 'Fourniture de semences ameliorees', 100, 20000.00, 2000000.00),
(27, 'Materiel agricole', 50, 50000.00, 2500000.00),
(27, 'Formation des agriculteurs', 10, 100000.00, 1000000.00),
(28, 'Organisation de seminaires', 5, 200000.00, 1000000.00),
(28, 'Fonds de demarrage pour les projets', 10, 500000.00, 5000000.00),
(28, 'Coaching et mentorat', 5, 150000.00, 750000.00),
(29, 'Ateliers de sensibilisation', 5, 150000.00, 750000.00),
(29, 'Materiel educatif', 100, 5000.00, 500000.00),
(29, 'Formation du personnel', 10, 100000.00, 1000000.00),
(30, 'Organisation de spectacles', 3, 500000.00, 1500000.00),
(30, 'Promotion et publicite', 1, 300000.00, 300000.00),
(30, 'Remuneration des artistes locaux', 10, 50000.00, 500000.00);

--Insertion des actvites valides
INSERT INTO activite_valide (id_activite, date_validation)
VALUES
(1, '2021-10-20'),
(2, '2022-09-25'),
(3, '2022-01-04'),
(4, '2022-01-22'),
(5, '2022-02-12'),
(6, '2022-03-20'),
(7, '2022-05-08'),
(8, '2022-05-25'),
(9, '2022-06-23'),
(10, '2022-07-30'),
(11, '2022-08-15'),
(12, '2022-09-28'),
(13, '2022-10-30'),
(14, '2022-11-17'),
(15, '2023-01-04'),
(16, '2023-02-18'),
(17, '2023-03-15'),
(18, '2023-03-15'),
(19, '2023-04-22'),
(20, '2023-05-08'),
(21, '2023-06-02'),
(22, '2023-06-13'),
(23, '2023-08-29'),
(24, '2023-09-24'),
(25, '2023-10-30'),
(26, '2023-11-21'),
(27, '2023-12-26'),
(28, '2024-02-01'),
(29, '2024-03-31'),
(30, '2024-03-25');


-- Depenses pour l'activite
INSERT INTO depenses (id_activite, designation, date_depense,id_type_depense, quantite, prix_unitaire, montant_total)
VALUES
(1, 'Location de salle pour la reunion','2022-01-10', 3, 1, 150000.00, 150000.00),
(1, 'Papeterie pour la prise de notes','2022-01-10', 7, 20, 5000.00, 100000.00),
(1, 'Catering pour les participants','2022-01-10', 5, 10, 25000.00, 250000.00),
(2, 'Honoraires du formateur','2022-12-15', 8, 1, 200000.00, 200000.00),
(2, 'Materiel de formation','2022-12-15', 4, 10, 15000.00, 150000.00),
(2, 'Frais de transport pour les participants','2022-12-15', 2, 15, 10000.00, 150000.00),
(3, 'Location de salle pour l atelier','2022-03-25', 3, 1, 100000.00, 100000.00),
(3, 'Materiel pour les ateliers pratiques','2022-03-25', 4, 30, 5000.00, 150000.00),
(3, 'Cadeaux pour les participants','2022-03-25', 14, 10, 10000.00, 100000.00),
(4, 'Honoraires du conferencier','2022-04-12', 8, 1, 300000.00, 300000.00),
(4, 'Impression de supports de conference','2022-04-12', 11, 50, 2000.00, 100000.00),
(4, 'Publicite pour l evenement','2022-04-12', 6, 1, 50000.00, 50000.00),
(5, 'Frais de transport pour les intervenants','2022-05-02', 2, 5, 30000.00, 150000.00),
(5, 'Location de salle pour le seminaire','2022-05-02', 3, 1, 200000.00, 200000.00),
(5, 'Catering pour les participants','2022-05-02', 5, 20, 15000.00, 300000.00),
(6, 'Impression de depliants','2022-06-10', 11, 100, 1000.00, 100000.00),
(6, 'Honoraires des intervenants','2022-06-10', 8, 2, 50000.00, 100000.00),
(6, 'Transport des materiels de sensibilisation','2022-06-10', 2, 1, 50000.00, 50000.00),
(7, 'Publicite et communication','2022-07-28', 6, 1, 75000.00, 75000.00),
(7, 'Cadeaux pour les participants','2022-07-28', 14, 20, 5000.00, 100000.00),
(7, 'Location de materiel de presentation','2022-07-28', 4, 5, 20000.00, 100000.00),
(8, 'Achat de plants d arbres','2022-08-15', 4, 500, 500.00, 250000.00),
(8, 'Transport des volontaires','2022-08-15', 2, 10, 10000.00, 100000.00),
(8, 'Publicite pour l evenement','2022-08-15', 6, 1, 50000.00, 50000.00),
(9, 'Jeux et materiels pour les enfants','2022-09-13', 4, 30, 2000.00, 60000.00),
(9, 'Transport des benevoles','2022-09-13', 2, 10, 15000.00, 150000.00),
(9, 'Catering pour les enfants','2022-09-13', 5, 20, 5000.00, 100000.00),
(10, 'Location d une salle pour la collecte','2022-10-20', 3, 1, 150000.00, 150000.00),
(10, 'Publicite pour la collecte de fonds','2022-10-20', 6, 1, 100000.00, 100000.00),
(10, 'Catering pour les participants','2022-10-20', 5, 15, 20000.00, 300000.00),
(11, 'Logistique pour le projet communautaire','2022-11-05', 1, 1, 300000.00, 300000.00),
(11, 'Materiel de construction','2022-11-05', 4, 50, 10000.00, 500000.00),
(11, 'Frais administratifs','2022-11-05', 16, 1, 50000.00, 50000.00),
(12, 'Transport pour l evenement social','2022-12-18', 2, 10, 20000.00, 200000.00),
(12, 'Catering pour les invites','2022-12-18', 5, 30, 15000.00, 450000.00),
(12, 'Papeterie pour les activites','2022-12-18', 7, 15, 5000.00, 75000.00),
(13, 'Location de materiel sportif','2023-01-20', 4, 10, 50000.00, 500000.00),
(13, 'Honoraires pour les arbitres','2023-01-20', 8, 2, 100000.00, 200000.00),
(13, 'Assurances pour les participants','2023-01-20', 15, 1, 100000.00, 100000.00),
(14, 'Transport pour la visite de terrain','2023-02-07', 2, 5, 30000.00, 150000.00),
(14, 'Hebergement pour les participants','2023-02-07', 10, 5, 100000.00, 500000.00),
(14, 'Papeterie pour la documentation','2023-02-07', 7, 10, 3000.00, 30000.00),
(15, 'Materiel educatif pour le programme','2023-03-17', 4, 20, 10000.00, 200000.00),
(15, 'Honoraires pour les formateurs','2023-03-17', 8, 2, 150000.00, 300000.00),
(15, 'Publicite pour le programme educatif','2023-03-17', 6, 1, 50000.00, 50000.00),
(16, 'Logistique pour le camp d ete','2023-04-25', 1, 1, 400000.00, 400000.00),
(16, 'Catering pour les enfants','2023-04-25', 5, 50, 10000.00, 500000.00),
(16, 'Materiel de camping','2023-04-25', 4, 30, 15000.00, 450000.00),
(17, 'Location de salle pour la reunion','2023-05-08', 3, 1, 100000.00, 100000.00),
(17, 'Papeterie pour les notes','2023-05-08', 7, 20, 4000.00, 80000.00),
(17, 'Catering pour les participants','2023-05-08', 5, 10, 20000.00, 200000.00),
(18, 'Transport pour les formateurs','2023-06-05', 2, 3, 50000.00, 150000.00),
(18, 'Materiel de formation','2023-06-05', 4, 25, 8000.00, 200000.00),
(18, 'Honoraires des formateurs','2023-06-05', 8, 2, 100000.00, 200000.00),
(19, 'Location de salle pour l atelier','2023-07-12', 3, 1, 80000.00, 80000.00),
(19, 'Materiel pour les ateliers','2023-07-12', 4, 20, 6000.00, 120000.00),
(19, 'Catering pour les participants','2023-07-12', 5, 15, 15000.00, 225000.00),
(20, 'Transport des intervenants pour la conference','2023-08-28', 2, 5, 25000.00, 125000.00),
(20, 'Impression de supports de conference','2023-08-28', 11, 50, 2000.00, 100000.00),
(21, 'Materiel de sensibilisation','2023-09-22', 4, 40, 5000.00, 200000.00),
(21, 'Publicite pour la campagne','2023-09-22', 6, 1, 150000.00, 150000.00),
(21, 'Transport pour les benevoles','2023-09-22', 2, 10, 20000.00, 200000.00),
(22, 'Logistique pour la collecte de fonds','2023-10-03', 1, 1, 250000.00, 250000.00),
(22, 'Papeterie et fournitures','2023-10-03', 7, 15, 5000.00, 75000.00),
(22, 'Honoraires pour les intervenants','2023-10-03', 8, 3, 100000.00, 300000.00),
(23, 'Catering pour le projet communautaire','2023-11-29', 5, 30, 10000.00, 300000.00),
(23, 'equipements techniques','2023-11-29', 12, 5, 40000.00, 200000.00),
(23, 'Cadeaux pour les participants','2023-11-29', 14, 20, 15000.00, 300000.00),
(24, 'Location de salle pour l evenement social','2023-12-14', 3, 1, 200000.00, 200000.00),
(24, 'Frais bancaires pour les transactions','2023-12-14', 13, 1, 50000.00, 50000.00),
(24, 'Publicite et communication','2023-12-14', 6, 1, 100000.00, 100000.00),
(25, 'Logistique pour l activite sportive','2024-01-20', 1, 1, 300000.00, 300000.00),
(25, 'Transport des equipements sportifs','2024-01-20', 2, 5, 40000.00, 200000.00),
(25, 'Assurances pour les participants','2024-01-20', 15, 1, 150000.00, 150000.00),
(26, 'Papeterie pour la visite de terrain','2024-02-11', 7, 10, 3000.00, 30000.00),
(26, 'Transport pour les participants','2024-02-11' ,2, 4, 25000.00, 100000.00),
(26, 'Frais de voyage','2024-02-11',9, 5, 50000.00, 250000.00),
(27, 'Materiel pour le programme educatif','2024-03-16', 4, 20, 15000.00, 300000.00),
(27, 'Honoraires pour les educateurs','2024-03-16', 8, 2, 120000.00, 240000.00),
(27, 'Publicite pour le programme','2024-03-16', 6, 1, 50000.00, 50000.00),
(28, 'Logistique pour le camp d ete','2024-04-21', 1, 1, 400000.00, 400000.00),
(28, 'Hebergement des participants','2024-04-21', 10, 10, 30000.00, 300000.00),
(28, 'Cadeaux pour les enfants','2024-04-21', 14, 20, 10000.00, 200000.00),
(29, 'Catering pour la reunion','2024-05-08', 5, 15, 15000.00, 225000.00),
(29, 'Papeterie pour les documents','2024-05-08', 7, 20, 4000.00, 80000.00),
(29, 'Services externes pour la logistique','2024-05-08', 17, 1, 100000.00, 100000.00),
(30, 'Transport pour les formateurs','2024-06-15', 2, 5, 20000.00, 100000.00),
(30, 'Materiel de formation','2024-06-15', 4, 25, 8000.00, 200000.00),
(30, 'Assurances pour les participants','2024-06-15', 15, 1, 100000.00, 100000.00);


--Facture
INSERT INTO facture (numero, id_activite,responsable, nom_client, date_facture, montant_total)
VALUES 
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 1, 3, 'Nary', '2024-01-15', 500000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 1, 3,'Bao', '2024-02-20', 500000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 2, 3,'Jao', '2024-03-10', 350000.00),

    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 4, 4,'Lalao', '2024-04-05', 450000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 5, 4,'Miora', '2024-05-17', 650000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 6, 4,'Mario', '2024-06-25', 250000.00),

    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 7, 4,'Fenosoa', '2024-07-13', 175000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 8, 4,'Voahirana', '2024-08-22', 400000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 9, 4,'Mirana', '2024-09-30', 310000.00),

    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 10, 3,'Suzette', '2024-10-19', 550000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 11, 3,'Paquerette', '2024-11-08', 500000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 12, 3,'Sahondra', '2024-12-12', 500000.00),

    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 13, 4,'Ainamir', '2024-01-25', 350000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 14, 4,'Claude', '2024-02-18', 450000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 15, 4,'Claudia', '2024-03-15', 650000.00),

    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 16, 3,'Florence', '2024-04-10', 250000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 17, 3,'Finaritra', '2024-05-12', 175000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 18, 3,'Miarisoa', '2024-06-20', 400000.00),

    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 19, 4,'Fidy', '2024-07-08', 310000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 20, 4,'Victor', '2024-08-15', 550000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 21, 4,'Arphine', '2024-09-25', 550000.00),

    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 22, 3,'Andry', '2024-10-05', 425000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 23, 3,'Christine', '2024-11-02', 800000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 24, 3,'Chritophe', '2024-12-20', 350000.00),

    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 25, 4,'Miahy', '2024-01-18', 650000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 26, 4,'Miary', '2024-02-28', 380000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 27, 4,'Lea', '2024-03-22', 590000.00),

    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 28, 3,'Leon', '2024-04-18', 900000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 29, 3,'Armand', '2024-05-25', 405000.00),
    ('FACT' || LPAD(NEXTVAL('numFact')::TEXT, 5, '0'), 30, 3,'Noeline', '2024-06-15', 400000.00);


--Details Facture 
-- Insertion des details de facture pour les 10 premieres factures
INSERT INTO detail_facture (id_facture, designation, quantite, prix_unitaire, montant_total)
VALUES
    -- Facture 1
    (1, 'Location de salle pour la reunion', 1, 150000.00, 150000.00),
    (1, 'Papeterie pour la prise de notes', 20, 5000.00, 100000.00),
    (1, 'Catering pour les participants', 10, 25000.00, 250000.00),

    -- Facture 2
    (2, 'Honoraires du formateur', 1, 200000.00, 200000.00),
    (2, 'Materiel de formation', 10, 15000.00, 150000.00),
    (2, 'Frais de transport pour les participants', 15, 10000.00, 150000.00),

    -- Facture 3
    (3, 'Location de salle pour l atelier', 1, 100000.00, 100000.00),
    (3, 'Materiel pour les ateliers pratiques', 30, 5000.00, 150000.00),
    (3, 'Cadeaux pour les participants',  10, 10000.00, 100000.00),

    -- Facture 4
    (4, 'Honoraires du conferencier', 1, 300000.00, 300000.00),
    (4, 'Impression de supports de conference',  50, 2000.00, 100000.00),
    (4, 'Publicite pour l evenement', 1, 50000.00, 50000.00),

    -- Facture 5
    (5, 'Frais de transport pour les intervenants', 5, 30000.00, 150000.00),
    (5, 'Location de salle pour le seminaire', 1, 200000.00, 200000.00),
    (5, 'Catering pour les participants', 20, 15000.00, 300000.00),

    -- Facture 6
    (6, 'Impression de depliants',  100, 1000.00, 100000.00),
    (6, 'Honoraires des intervenants', 2, 50000.00, 100000.00),
    (6, 'Transport des materiels de sensibilisation', 1, 50000.00, 50000.00),

    -- Facture 7
    (7, 'Publicite et communication', 1, 75000.00, 75000.00),
    (7, 'Cadeaux pour les participants',  20, 5000.00, 100000.00),
    (7, 'Location de materiel de presentation', 5, 20000.00, 100000.00),

    -- Facture 8
    (8, 'Achat de plants d arbres', 500, 500.00, 250000.00),
    (8, 'Transport des volontaires', 10, 10000.00, 100000.00),
    (8, 'Publicite pour l evenement', 1, 50000.00, 50000.00),

    -- Facture 9
    (9, 'Jeux et materiels pour les enfants', 30, 2000.00, 60000.00),
    (9, 'Transport des benevoles', 10, 15000.00, 150000.00),
    (9, 'Catering pour les enfants', 20, 5000.00, 100000.00),

    -- Facture 10
    (10, 'Location d une salle pour la collecte', 1, 150000.00, 150000.00),
    (10, 'Publicite pour la collecte de fonds', 1, 100000.00, 100000.00),
    (10, 'Catering pour les participants', 15, 20000.00, 300000.00),

    -- Facture 11
    (11, 'Location de salle pour la reunion', 1, 150000.00, 150000.00),
    (11, 'Papeterie pour la prise de notes', 20, 5000.00, 100000.00),
    (11, 'Catering pour les participants', 10, 25000.00, 250000.00),

    -- Facture 12
    (12, 'Honoraires du formateur', 1, 200000.00, 200000.00),
    (12, 'Materiel de formation', 10, 15000.00, 150000.00),
    (12, 'Frais de transport pour les participants', 15, 10000.00, 150000.00),

    -- Facture 13
    (13, 'Location de salle pour l atelier', 1, 100000.00, 100000.00),
    (13, 'Materiel pour les ateliers pratiques', 30, 5000.00, 150000.00),
    (13, 'Cadeaux pour les participants',  10, 10000.00, 100000.00),

    -- Facture 14
    (14, 'Honoraires du conferencier', 1, 300000.00, 300000.00),
    (14, 'Impression de supports de conference', 50, 2000.00, 100000.00),
    (14, 'Publicite pour l evenement', 1, 50000.00, 50000.00),

    -- Facture 15
    (15, 'Frais de transport pour les intervenants', 5, 30000.00, 150000.00),
    (15, 'Location de salle pour le seminaire', 1, 200000.00, 200000.00),
    (15, 'Catering pour les participants', 20, 15000.00, 300000.00),

    -- Facture 16
    (16, 'Impression de depliants', 100, 1000.00, 100000.00),
    (16, 'Honoraires des intervenants', 2, 50000.00, 100000.00),
    (16, 'Transport des materiels de sensibilisation', 1, 50000.00, 50000.00),

    -- Facture 17
    (17, 'Publicite et communication', 1, 75000.00, 75000.00),
    (17, 'Cadeaux pour les participants',  20, 5000.00, 100000.00),
    (17, 'Location de materiel de presentation', 5, 20000.00, 100000.00),

    -- Facture 18
    (18, 'Achat de plants d arbres', 500, 500.00, 250000.00),
    (18, 'Transport des volontaires', 10, 10000.00, 100000.00),
    (18, 'Publicite pour l evenement', 1, 50000.00, 50000.00),

    -- Facture 19
    (19, 'Jeux et materiels pour les enfants', 30, 2000.00, 60000.00),
    (19, 'Transport des benevoles', 10, 15000.00, 150000.00),
    (19, 'Catering pour les enfants', 20, 5000.00, 100000.00),

    -- Facture 20
    (20, 'Location d une salle pour la collecte', 1, 150000.00, 150000.00),
    (20, 'Publicite pour la collecte de fonds', 1, 100000.00, 100000.00),
    (20, 'Catering pour les participants', 15, 20000.00, 300000.00),

    -- Facture 21
    (21, 'Materiel de sensibilisation', 40, 5000.00, 200000.00),
    (21, 'Publicite pour la campagne', 1, 150000.00, 150000.00),
    (21, 'Transport pour les benevoles', 10, 20000.00, 200000.00),

    -- Facture 22
    (22, 'Logistique pour la collecte de fonds', 1, 250000.00, 250000.00),
    (22, 'Papeterie et fournitures', 15, 5000.00, 75000.00),
    (22, 'Honoraires pour les intervenants', 3, 100000.00, 300000.00),

    -- Facture 23
    (23, 'Catering pour le projet communautaire', 30, 10000.00, 300000.00),
    (23, 'equipements techniques', 5, 40000.00, 200000.00),
    (23, 'Cadeaux pour les participants', 20, 15000.00, 300000.00),

    -- Facture 24
    (24, 'Location de salle pour l evenement social', 1, 200000.00, 200000.00),
    (24, 'Frais bancaires pour les transactions', 1, 50000.00, 50000.00),
    (24, 'Publicite et communication', 1, 100000.00, 100000.00),

    -- Facture 25
    (25, 'Logistique pour l activite sportive', 1, 300000.00, 300000.00),
    (25, 'Transport des equipements sportifs', 5, 40000.00, 200000.00),
    (25, 'Assurances pour les participants', 1, 150000.00, 150000.00),

    -- Facture 26
    (26, 'Papeterie pour la visite de terrain', 10, 3000.00, 30000.00),
    (26, 'Transport pour les participants', 4, 25000.00, 100000.00),
    (26, 'Frais de voyage', 5, 50000.00, 250000.00),

    -- Facture 27
    (27, 'Materiel pour le programme educatif', 20, 15000.00, 300000.00),
    (27, 'Honoraires pour les educateurs', 2, 120000.00, 240000.00),
    (27, 'Publicite pour le programme', 1, 50000.00, 50000.00),

    -- Facture 28
    (28, 'Logistique pour le camp d ete', 1, 400000.00, 400000.00),
    (28, 'Hebergement des participants',  10, 30000.00, 300000.00),
    (28, 'Cadeaux pour les enfants', 20, 10000.00, 200000.00),

    -- Facture 29
    (29, 'Catering pour la reunion', 15, 15000.00, 225000.00),
    (29, 'Papeterie pour les documents', 20, 4000.00, 80000.00),
    (29, 'Services externes pour la logistique',  1, 100000.00, 100000.00),

    -- Facture 30
    (30, 'Transport pour les formateurs', 5, 20000.00, 100000.00),
    (30, 'Materiel de formation', 25, 8000.00, 200000.00),
    (30, 'Assurances pour les participants', 1, 100000.00, 100000.00);

-- Inserer les entrees d'argent pour chaque mois de l'annee 2022
INSERT INTO caisse (id_categorie_caisse, montant, date_entree)
VALUES
    -- Janvier 2022
    (1, 1000000.00, '2022-01-15'),
    (3, 500000.00, '2022-01-22'),
    
    -- Fevrier 2022
    (2, 300000.00, '2022-02-10'),
    (5, 200000.00, '2022-02-18'),
    
    -- Mars 2022
    (6, 100000.00, '2022-03-05'),
    (10, 75000.00, '2022-03-12'),
    
    -- Avril 2022
    (7, 250000.00, '2022-04-07'),
    (11, 60000.00, '2022-04-20'),
    
    -- Mai 2022
    (5, 80000.00, '2022-05-03'),
    (6, 50000.00, '2022-05-15'),
    
    -- Juin 2022
    (7, 120000.00, '2022-06-09'),
    (8, 40000.00, '2022-06-22'),
    
    -- Juillet 2022
    (9, 90000.00, '2022-07-14'),
    (1, 110000.00, '2022-07-25'),
    
    -- Août 2022
    (4, 220000.00, '2022-08-10'),
    (2, 310000.00, '2022-08-21'),
    
    -- Septembre 2022
    (10, 95000.00, '2022-09-06'),
    (5, 130000.00, '2022-09-18'),
    (11, 600000.00, '2022-09-20'),
    
    -- Octobre 2022
    (6, 70000.00, '2022-10-03'),
    (7, 150000.00, '2022-10-22'),
    
    -- Novembre 2022
    (6, 250000.00, '2022-11-05'),
    (8, 85000.00, '2022-11-10'),
    (2, 60000.00, '2022-11-20'),
    
    -- Decembre 2022
    (1, 9000000.00 , '2022-12-10'),
    (8, 1920000.00 , '2022-12-15'),
    (9,360000.00,'2022-12-15'),
    (10, 130000.00, '2022-12-01');

-- Inserer les entrees d'argent pour chaque mois de l'annee 2023
INSERT INTO caisse (id_categorie_caisse, montant, date_entree)
VALUES
    -- Janvier 2023
    (1, 1500000.00, '2023-01-10'),
    (3, 550000.00, '2023-01-22'),
    
    -- Fevrier 2023
    (2, 320000.00, '2023-02-08'),
    (5, 210000.00, '2023-02-18'),
    
    -- Mars 2023
    (6, 120000.00, '2023-03-05'),
    (10, 80000.00, '2023-03-15'),
    
    -- Avril 2023
    (7, 260000.00, '2023-04-07'),
    (8, 65000.00, '2023-04-20'),
    
    -- Mai 2023
    (10, 90000.00, '2023-05-03'),
    (9, 55000.00, '2023-05-15'),
    
    -- Juin 2023
    (5, 130000.00, '2023-06-09'),
    (10, 42000.00, '2023-06-22'),
    
    -- Juillet 2023
    (5, 95000.00, '2023-07-14'),
    (1, 115000.00, '2023-07-25'),
    
    -- Août 2023
    (4, 230000.00, '2023-08-10'),
    (2, 320000.00, '2023-08-21'),
    
    -- Septembre 2023
    (10, 98000.00, '2023-09-06'),
    (5, 140000.00, '2023-09-18'),
    (11, 500000.00, '2023-09-20'),
    
    -- Octobre 2023
    (6, 75000.00, '2023-10-03'),
    (7, 155000.00, '2023-10-22'),
    
    -- Novembre 2023
    (6, 300000.00, '2023-11-05'),
    (8, 87000.00, '2023-11-10'),
    (2, 62000.00, '2023-11-20'),
    
    -- Decembre 2023
    (1, 500000.00 , '2023-12-05'),
    (8, 1920000.00 , '2023-12-01'),
    (9,360000.00,'2023-12-01'),
    (10, 135000.00, '2023-12-01');

-- Inserer les entrees d'argent pour chaque mois de l'annee 2024
INSERT INTO caisse (id_categorie_caisse, montant, date_entree)
VALUES
    -- Janvier 2024
    (1, 200000.00, '2024-01-08'),
    (3, 600000.00, '2024-01-21'),
    
    -- Fevrier 2024
    (2, 350000.00, '2024-02-05'),
    (4, 180000.00, '2024-02-17'),
    
    -- Mars 2024
    (6, 140000.00, '2024-03-10'),
    (10, 95000.00, '2024-03-22'),
    
    -- Avril 2024
    (7, 270000.00, '2024-04-03'),
    (5, 70000.00, '2024-04-18'),
    
    -- Mai 2024
    (1, 85000.00, '2024-05-07'),
    (2, 60000.00, '2024-05-20'),
    
    -- Juin 2024
    (3, 150000.00, '2024-06-08'),
    (4, 45000.00, '2024-06-24'),
    
    -- Juillet 2024
    (5, 100000.00, '2024-07-12'),
    (1, 130000.00, '2024-07-26'),
    
    -- Août 2024
    (4, 240000.00, '2024-08-09'),
    (2, 330000.00, '2024-08-22');

-- Inserer un test de donnees dans la table cotisation
INSERT INTO cotisation (montant, id_type_cotisation) VALUES 
(24000, 1),   -- Cotisation annuelle des membres actifs
(6000, 2);   -- Cotisation annuelle des parents


-- Inserer les paiements de cotisation 
INSERT INTO cotisation_actif (id_membre_adherent, date_payement, montant)
VALUES
-- 2022 actifs
(1, '2022-01-01', 24000.00), (2, '2022-01-01', 24000.00), (3, '2022-01-01', 24000.00), (4, '2022-01-01', 24000.00),
(5, '2022-01-01', 24000.00), (6, '2022-01-01', 24000.00), (7, '2022-01-01', 24000.00), (8, '2022-01-01', 24000.00),
(9, '2022-01-01', 24000.00), (10, '2022-01-01', 24000.00), (11, '2022-01-01', 24000.00), (12, '2022-01-01', 24000.00),
(13, '2022-01-01', 24000.00), (14, '2022-01-01', 24000.00), (15, '2022-01-01', 24000.00), (16, '2022-01-01', 24000.00),
(17, '2022-01-01', 24000.00), (18, '2022-01-01', 24000.00), (19, '2022-01-01', 24000.00), (20, '2022-01-01', 24000.00),
(21, '2022-01-01', 24000.00), (22, '2022-01-01', 24000.00), (23, '2022-01-01', 24000.00), (24, '2022-01-01', 24000.00),
(25, '2022-01-01', 24000.00), (26, '2022-01-01', 24000.00), (27, '2022-01-01', 24000.00), (28, '2022-01-01', 24000.00),
(29, '2022-01-01', 24000.00), (30, '2022-01-01', 24000.00), (31, '2022-01-01', 24000.00), (32, '2022-01-01', 24000.00),
(33, '2022-01-01', 24000.00), (34, '2022-01-01', 24000.00), (35, '2022-01-01', 24000.00), (36, '2022-01-01', 24000.00),
(37, '2022-01-01', 24000.00), (38, '2022-01-01', 24000.00), (39, '2022-01-01', 24000.00), (40, '2022-01-01', 24000.00),
(41, '2022-01-01', 24000.00), (42, '2022-01-01', 24000.00), (43, '2022-01-01', 24000.00), (44, '2022-01-01', 24000.00),
(45, '2022-01-01', 24000.00), (46, '2022-01-01', 24000.00), (47, '2022-01-01', 24000.00), (48, '2022-01-01', 24000.00),
(49, '2022-01-01', 24000.00), (50, '2022-01-01', 24000.00), (51, '2022-01-01', 24000.00), (52, '2022-01-01', 24000.00),
(53, '2022-01-01', 24000.00), (54, '2022-01-01', 24000.00), (55, '2022-01-01', 24000.00), (56, '2022-01-01', 24000.00),
(57, '2022-01-01', 24000.00), (58, '2022-01-01', 24000.00), (59, '2022-01-01', 24000.00), (60, '2022-01-01', 24000.00),
(61, '2022-01-01', 24000.00), (62, '2022-01-01', 24000.00), (63, '2022-01-01', 24000.00), (64, '2022-01-01', 24000.00),
(65, '2022-01-01', 24000.00), (66, '2022-01-01', 24000.00), (67, '2022-01-01', 24000.00), (68, '2022-01-01', 24000.00),
(69, '2022-01-01', 24000.00), (70, '2022-01-01', 24000.00), (71, '2022-01-01', 24000.00), (72, '2022-01-01', 24000.00),
(73, '2022-01-01', 24000.00), (74, '2022-01-01', 24000.00), (75, '2022-01-01', 24000.00), (76, '2022-01-01', 24000.00),
(77, '2022-01-01', 24000.00), (78, '2022-01-01', 24000.00), (79, '2022-01-01', 24000.00), (80, '2022-01-01', 24000.00),


-- 2023 actifs
(1, '2023-01-01', 24000.00), (2, '2023-01-01', 24000.00), (3, '2023-01-01', 24000.00), (4, '2023-01-01', 24000.00),
(5, '2023-01-01', 24000.00), (6, '2023-01-01', 24000.00), (7, '2023-01-01', 24000.00), (8, '2023-01-01', 24000.00),
(9, '2023-01-01', 24000.00), (10, '2023-01-01', 24000.00), (11, '2023-01-01', 24000.00), (12, '2023-01-01', 24000.00),
(13, '2023-01-01', 24000.00), (14, '2023-01-01', 24000.00), (15, '2023-01-01', 24000.00), (16, '2023-01-01', 24000.00),
(17, '2023-01-01', 24000.00), (18, '2023-01-01', 24000.00), (19, '2023-01-01', 24000.00), (20, '2023-01-01', 24000.00),
(21, '2023-01-01', 24000.00), (22, '2023-01-01', 24000.00), (23, '2023-01-01', 24000.00), (24, '2023-01-01', 24000.00),
(25, '2023-01-01', 24000.00), (26, '2023-01-01', 24000.00), (27, '2023-01-01', 24000.00), (28, '2023-01-01', 24000.00),
(29, '2023-01-01', 24000.00), (30, '2023-01-01', 24000.00), (31, '2023-01-01', 24000.00), (32, '2023-01-01', 24000.00),
(33, '2023-01-01', 24000.00), (34, '2023-01-01', 24000.00), (35, '2023-01-01', 24000.00), (36, '2023-01-01', 24000.00),
(37, '2023-01-01', 24000.00), (38, '2023-01-01', 24000.00), (39, '2023-01-01', 24000.00), (40, '2023-01-01', 24000.00),
(41, '2023-01-01', 24000.00), (42, '2023-01-01', 24000.00), (43, '2023-01-01', 24000.00), (44, '2023-01-01', 24000.00),
(45, '2023-01-01', 24000.00), (46, '2023-01-01', 24000.00), (47, '2023-01-01', 24000.00), (48, '2023-01-01', 24000.00),
(49, '2023-01-01', 24000.00), (50, '2023-01-01', 24000.00), (51, '2023-01-01', 24000.00), (52, '2023-01-01', 24000.00),
(53, '2023-01-01', 24000.00), (54, '2023-01-01', 24000.00), (55, '2023-01-01', 24000.00), (56, '2023-01-01', 24000.00),
(57, '2023-01-01', 24000.00), (58, '2023-01-01', 24000.00), (59, '2023-01-01', 24000.00), (60, '2023-01-01', 24000.00),
(61, '2023-01-01', 24000.00), (62, '2023-01-01', 24000.00), (63, '2023-01-01', 24000.00), (64, '2023-01-01', 24000.00),
(65, '2023-01-01', 24000.00), (66, '2023-01-01', 24000.00), (67, '2023-01-01', 24000.00), (68, '2023-01-01', 24000.00),
(69, '2023-01-01', 24000.00), (70, '2023-01-01', 24000.00), (71, '2023-01-01', 24000.00), (72, '2023-01-01', 24000.00),
(73, '2023-01-01', 24000.00), (74, '2023-01-01', 24000.00), (75, '2023-01-01', 24000.00), (76, '2023-01-01', 24000.00),
(77, '2023-01-01', 24000.00), (78, '2023-01-01', 24000.00), (79, '2023-01-01', 24000.00), (80, '2023-01-01', 24000.00);

INSERT INTO cotisation_parental (id_parent_tuteur, date_payement, montant)
VALUES
--  2022 parents
(1, '2022-01-01', 6000.00), (2, '2022-01-01', 6000.00), (3, '2022-01-01', 6000.00), (4, '2022-01-01', 6000.00),
(5, '2022-01-01', 6000.00), (6, '2022-01-01', 6000.00), (7, '2022-01-01', 6000.00), (8, '2022-01-01', 6000.00),
(9, '2022-01-01', 6000.00), (10, '2022-01-01', 6000.00), (11, '2022-01-01', 6000.00), (12, '2022-01-01', 6000.00),
(13, '2022-01-01', 6000.00), (14, '2022-01-01', 6000.00), (15, '2022-01-01', 6000.00), (16, '2022-01-01', 6000.00),
(17, '2022-01-01', 6000.00), (18, '2022-01-01', 6000.00), (19, '2022-01-01', 6000.00), (20, '2022-01-01', 6000.00),
(21, '2022-01-01', 6000.00), (22, '2022-01-01', 6000.00), (23, '2022-01-01', 6000.00), (24, '2022-01-01', 6000.00),
(25, '2022-01-01', 6000.00), (26, '2022-01-01', 6000.00), (27, '2022-01-01', 6000.00), (28, '2022-01-01', 6000.00),
(29, '2022-01-01', 6000.00), (30, '2022-01-01', 6000.00), (31, '2022-01-01', 6000.00), (32, '2022-01-01', 6000.00),
(33, '2022-01-01', 6000.00), (34, '2022-01-01', 6000.00), (35, '2022-01-01', 6000.00), (36, '2022-01-01', 6000.00),
(37, '2022-01-01', 6000.00), (38, '2022-01-01', 6000.00), (39, '2022-01-01', 6000.00), (40, '2022-01-01', 6000.00),
(41, '2022-01-01', 6000.00), (42, '2022-01-01', 6000.00), (43, '2022-01-01', 6000.00), (44, '2022-01-01', 6000.00),
(45, '2022-01-01', 6000.00), (46, '2022-01-01', 6000.00), (47, '2022-01-01', 6000.00), (48, '2022-01-01', 6000.00),
(49, '2022-01-01', 6000.00), (50, '2022-01-01', 6000.00), (51, '2022-01-01', 6000.00), (52, '2022-01-01', 6000.00),
(53, '2022-01-01', 6000.00), (54, '2022-01-01', 6000.00), (55, '2022-01-01', 6000.00), (56, '2022-01-01', 6000.00),
(57, '2022-01-01', 6000.00), (58, '2022-01-01', 6000.00), (59, '2022-01-01', 6000.00), (60, '2022-01-01', 6000.00),

-- 2023 parents
(1, '2023-01-01', 6000.00), (2, '2023-01-01', 6000.00), (3, '2023-01-01', 6000.00), (4, '2023-01-01', 6000.00),
(5, '2023-01-01', 6000.00), (6, '2023-01-01', 6000.00), (7, '2023-01-01', 6000.00), (8, '2023-01-01', 6000.00),
(9, '2023-01-01', 6000.00), (10, '2023-01-01', 6000.00), (11, '2023-01-01', 6000.00), (12, '2023-01-01', 6000.00),
(13, '2023-01-01', 6000.00), (14, '2023-01-01', 6000.00), (15, '2023-01-01', 6000.00), (16, '2023-01-01', 6000.00),
(17, '2023-01-01', 6000.00), (18, '2023-01-01', 6000.00), (19, '2023-01-01', 6000.00), (20, '2023-01-01', 6000.00),
(21, '2023-01-01', 6000.00), (22, '2023-01-01', 6000.00), (23, '2023-01-01', 6000.00), (24, '2023-01-01', 6000.00),
(25, '2023-01-01', 6000.00), (26, '2023-01-01', 6000.00), (27, '2023-01-01', 6000.00), (28, '2023-01-01', 6000.00),
(29, '2023-01-01', 6000.00), (30, '2023-01-01', 6000.00), (31, '2023-01-01', 6000.00), (32, '2023-01-01', 6000.00),
(33, '2023-01-01', 6000.00), (34, '2023-01-01', 6000.00), (35, '2023-01-01', 6000.00), (36, '2023-01-01', 6000.00),
(37, '2023-01-01', 6000.00), (38, '2023-01-01', 6000.00), (39, '2023-01-01', 6000.00), (40, '2023-01-01', 6000.00),
(41, '2023-01-01', 6000.00), (42, '2023-01-01', 6000.00), (43, '2023-01-01', 6000.00), (44, '2023-01-01', 6000.00),
(45, '2023-01-01', 6000.00), (46, '2023-01-01', 6000.00), (47, '2023-01-01', 6000.00), (48, '2023-01-01', 6000.00),
(49, '2023-01-01', 6000.00), (50, '2023-01-01', 6000.00), (51, '2023-01-01', 6000.00), (52, '2023-01-01', 6000.00),
(53, '2023-01-01', 6000.00), (54, '2023-01-01', 6000.00), (55, '2023-01-01', 6000.00), (56, '2023-01-01', 6000.00),
(57, '2023-01-01', 6000.00), (58, '2023-01-01', 6000.00), (59, '2023-01-01', 6000.00), (60, '2023-01-01', 6000.00);

--Presence
INSERT INTO presence (id_activite, id_membre_adherent)
VALUES
(1, 1),(1, 2),(1, 3),(1, 4),(1, 5),(1, 6),(1, 7),(1, 8), -- Section Coordination
(2, 1),(2, 2),(2, 3),(2, 4),(2, 5),(2, 6),(2, 7),(2, 8), -- Section Coordination
(3, 11),(3, 12),(3, 25),(3, 26),(3, 27),(3, 28), -- Section Citoyennete
(4, 11),(4, 12),(4, 25),(4, 26),(4, 27),(4, 28), -- Section Citoyennete
(5, 9),(5, 10),(5, 21),(5, 22),(5, 23),(5, 24), -- Section Social  
(6, 9),(6, 10),(6, 21),(6, 22),(6, 23),(6, 24), -- Section Social 
(7, 13),(7, 14),(7, 29),(7, 30),(7, 31),(7, 32), -- Section education 
(8, 13),(8, 14),(8, 29),(8, 30),(8, 31),(8, 32), -- Section education 
(9, 1), (9, 2), (9, 3), (9, 4), (9, 5), (9, 6), (9, 7), (9, 8),  -- Section Coordination
(9, 9), (9, 10), (9, 21), (9, 22), (9, 41),  -- Section Social
(10, 1), (10, 2), (10, 3), (10, 4), (10, 5), (10, 6), (10, 7), (10, 8),  -- Section Coordination
(10, 9), (10, 10), (10, 21), (10, 22), (10, 41),  -- Section Social
(11, 1), (11, 2), (11, 3), (11, 4), (11, 5), (11, 6), (11, 7), (11, 8),  -- Section Coordination
(12, 1), (12, 2), (12, 3), (12, 4), (12, 5), (12, 6), (12, 7), (12, 8),  -- Section Coordination
(13, 1), (13, 2), (13, 3), (13, 4), (13, 5), (13, 6), (13, 7), (13, 8),  -- Section Coordination
(13, 11), (13, 12), (13, 25), (13, 26), (13, 44),  -- Section Citoyennete
(14, 1), (14, 2), (14, 3), (14, 4), (14, 5), (14, 6), (14, 7), (14, 8),  -- Section Coordination
(14, 11), (14, 12), (14, 25), (14, 26), (14, 44),  -- Section Citoyennete
(15, 1), (15, 2), (15, 3), (15, 4), (15, 5), (15, 6), (15, 7), (15, 8),  -- Section Coordination
(15, 13), (15, 14), (15, 29), (15, 30), (15, 48),  -- Section education
(16, 1), (16, 2), (16, 3), (16, 4), (16, 5), (16, 6), (16, 7), (16, 8),  -- Section Coordination
(16, 13), (16, 14), (16, 29), (16, 30), (16, 48),  -- Section education
(17, 1), (17, 2), (17, 3), (17, 4), (17, 5), (17, 6), (17, 7), (17, 8),  -- Section Coordination
(17, 15), (17, 16), (17, 33), (17, 34), (17, 51),  -- Section Soutien aux Parents
(18, 1), (18, 2), (18, 3), (18, 4), (18, 5), (18, 6), (18, 7), (18, 8),  -- Section Coordination
(18, 15), (18, 16), (18, 33), (18, 34), (18, 51),  -- Section Soutien aux Parents
(19, 1), (19, 2), (19, 3), (19, 4), (19, 5), (19, 6), (19, 7), (19, 8),  -- Section Coordination
(19, 17), (19, 18), (19, 37), (19, 38), (19, 55),  -- Section Hygiene
(20, 1), (20, 2), (20, 3), (20, 4), (20, 5), (20, 6), (20, 7), (20, 8),  -- Section Coordination
(20, 17), (20, 18), (20, 37), (20, 38), (20, 55),  -- Section Hygiene
(21, 1), (21, 2), (21, 3), (21, 4), (21, 5), (21, 6), (21, 7), (21, 8),  -- Section Coordination
(21, 19), (21, 20), (21, 41), (21, 42), (21, 59),  -- Section Environnement
(22, 1), (22, 2), (22, 3), (22, 4), (22, 5), (22, 6), (22, 7), (22, 8),  -- Section Coordination
(23, 1), (23, 2), (23, 3), (23, 4), (23, 5), (23, 6), (23, 7), (23, 8),  -- Section Coordination
(23, 9), (23, 10), (23, 21), (23, 22), (23, 41),  -- Section Social
(24, 1), (24, 2), (24, 3), (24, 4), (24, 5), (24, 6), (24, 7), (24, 8),  -- Section Coordination
(25, 1), (25, 2), (25, 3), (25, 4), (25, 5), (25, 6), (25, 7), (25, 8),  -- Section Coordination
(25, 15), (25, 16), (25, 33), (25, 34), (25, 51),  -- Section Soutien aux Parents
(26, 1), (26, 2), (26, 3), (26, 4), (26, 5), (26, 6), (26, 7), (26, 8),  -- Section Coordination
(26, 13), (26, 14), (26, 29), (26, 30), (26, 48),  -- Section education
(27, 1), (27, 2), (27, 3), (27, 4), (27, 5), (27, 6), (27, 7), (27, 8);  -- Section Coordination
-- (27, 13), (27, 14), (27, 29), (27, 30), (27, 48),  -- Section education
-- (28, 1), (28, 2), (28, 3), (28, 4), (28, 5), (28, 6), (28, 7), (28, 8),  -- Section Coordination
-- (29, 1), (29, 2), (29, 3), (29, 4), (29, 5), (29, 6), (29, 7), (29, 8),  -- Section Coordination
-- (29, 19), (29, 20), (29, 41), (29, 42), (29, 59);  -- Section Environnement
-- (30, 1), (30, 2), (30, 3), (30, 4), (30, 5), (30, 6), (30, 7), (30, 8),  -- Section Coordination
-- (30, 15), (30, 16), (30, 33), (30, 34), (30, 51); -- Section Soutien aux Parents


-- Reunion 1: Reunion de planification annuelle
INSERT INTO reunions (id_activite, ordre_du_jour, proces_verbal, rapport)
VALUES
(1, 'Planification des activites annuelles, repartition des tâches, fixation des objectifs.', 
'Les membres ont discute de la planification annuelle et ont reparti les tâches. Objectifs fixes pour l annee à venir.', 
'Un plan detaille des activites pour l annee 2022 a ete etabli. Les roles ont ete clairement definis.');

-- Reunion 2: Reunion d'evaluation trimestrielle
INSERT INTO reunions (id_activite, ordre_du_jour, proces_verbal, rapport)
VALUES
(2, 'evaluation des performances du trimestre, ajustements necessaires, discussion des defis rencontres.', 
'Les performances ont ete evaluees, et plusieurs ajustements ont ete proposes pour ameliorer l efficacite. Les defis rencontres ont ete discutes et des solutions ont ete proposees.', 
'Le rapport trimestriel montre des progres satisfaisants, avec des ajustements mineurs à apporter.');

-- Reunion 3: Reunion du comite de direction
INSERT INTO reunions (id_activite, ordre_du_jour, proces_verbal, rapport)
VALUES
(11, 'Discussion sur les strategies de l association, analyse des projets en cours, prise de decisions importantes.', 
'Le comite de direction a discute des strategies futures et a pris des decisions cles concernant les projets en cours. Une analyse approfondie des progres a ete faite.', 
'Les decisions prises lors de cette reunion sont cruciales pour le succes des projets à venir.');

-- Reunion 4: Reunion des chefs de section
-- INSERT INTO reunions (id_activite, ordre_du_jour, proces_verbal, rapport)
-- VALUES
-- (12, 'Coordination entre les chefs de section, partage des experiences, planification des activites à venir.', 
-- 'Les chefs de section ont partage leurs experiences et ont coordonne leurs efforts pour les activites futures. Une planification detaillee a ete effectuee pour les prochains mois.', 
-- 'Les sections sont maintenant alignees sur les objectifs communs, avec un plan clair pour les activites futures.');

-- Logistique
INSERT INTO categorie_logistique (nom_categorie)
VALUES 
('Materiel de bureau'),        -- Inclut des articles comme des stylos, des papiers, des agrafeuses, etc.
('Equipements sportifs'),      -- Inclut des ballons, des filets, des maillots, etc.
('Materiel informatique'),     -- Inclut des ordinateurs, des imprimantes, des câbles, etc.
('Materiel pedagogique'),      -- Inclut des tableaux blancs, des marqueurs, des livres, etc.
('Vetements et uniformes'),    -- Inclut des t-shirts, des casquettes, des uniformes, etc.
('Materiel de communication'), -- Inclut des microphones, des haut-parleurs, des projecteurs, etc.
('Materiel de premiers secours'), -- Inclut des trousses de premiers secours, des pansements, etc.
('Materiel d entretien'),      -- Inclut des produits de nettoyage, des balais, des poubelles, etc.
('Nourriture et boissons'),    -- Inclut des bouteilles d'eau, des snacks, des repas, etc.
('Materiel evenementiel');     -- Inclut des chaises, des tentes, des banderoles, etc.


--Type de mouvement des logistiques 
INSERT INTO type_mouvement (nom_type_mouvement)
VALUES 
('entree'),    -- Pour les mouvements d'entree de stock
('sortie');    -- Pour les mouvements de sortie de stock



--logistique 
INSERT INTO logistique (nom_article, id_categorie_logistique, description)
VALUES
-- Categorie: Materiel de Bureau
('Stylos Bic', 1, 'Lot de stylos à bille, encre bleue'),
('Papiers A4', 1, 'Rame de papiers A4, 500 feuilles'),
('Trombones', 1, 'Boite de 100 trombones metalliques'),

-- Categorie: Materiel Informatique
('Ordinateur Portable HP', 2, 'Ordinateur portable HP, Core i5, 8 Go RAM'),
('Imprimante Laser', 2, 'Imprimante laser monochrome, connectivite Wi-Fi'),
('Cle USB 32 Go', 2, 'Cle USB 3.0, 32 Go'),

-- Categorie: Materiel evenementiel
('Tables Pliantes', 3, 'Tables pliantes en plastique, 1.8 m'),
('Chaises Empilables', 3, 'Chaises empilables en plastique, couleur bleue'),
('Projecteur Video', 3, 'Projecteur video LED, resolution 1080p'),

-- Categorie: Produits Sanitaires
('Gel Hydroalcoolique', 4, 'Bouteilles de gel hydroalcoolique, 500 ml'),
('Masques Chirurgicaux', 4, 'Boite de 50 masques chirurgicaux à usage unique'),
('Gants en Latex', 4, 'Boite de 100 gants en latex, taille M'),

-- Categorie: Materiel de Sport
('Ballons de Football', 5, 'Ballons de football en cuir, taille 5'),
('Cones de Delimitation', 5, 'Cones de delimitation en plastique, 30 cm'),
('Maillots de Sport', 5, 'Maillots de sport, taille L, couleur rouge'),

-- Categorie: Materiel de Communication
('Haut-parleurs Portables', 6, 'Haut-parleurs Bluetooth portables, 10W'),
('Micros Sans Fil', 6, 'Microphones sans fil avec recepteur, frequence UHF'),
('Affiches Publicitaires', 6, 'Affiches publicitaires en papier, format A1'),

-- Categorie: Materiel Medical
('Tensiometres', 7, 'Tensiometres numeriques avec brassard, ecran LCD'),
('Thermometres Infrarouge', 7, 'Thermometres sans contact, precision ±0.2°C'),
('Bandages elastiques', 7, 'Bandages elastiques, 10 cm x 4 m'),

-- Categorie: Produits Alimentaires
('Bouteilles d eau', 8, 'Bouteilles d eau minerale 500 ml'),
('Barres energetiques', 8, 'Barres energetiques aux fruits, 50 g'),
('Boites de Conserves', 8, 'Boites de conserve de haricots verts, 400 g'),

('T-shirts', 5, 'T-shirts pour les evenements et activites de l association.'),
('Gilets', 5, 'Gilets pour les membres et benevoles.'),
('Polos', 5, 'Polos pour le personnel administratif.'),
('Casquettes', 5, 'Casquettes pour les evenements en plein air.'),
('Vestes', 5, 'Vestes pour les membres en hiver.');

--Mouvements
INSERT INTO mouvement_logistique (id_logistique, id_type_mouvement, quantite, date_mouvement, description)
VALUES
-- 2022 Movements
(1, 1, 500, '2022-01-15', 'Achat de 500 stylos Bic pour les bureaux.'),
(2, 1, 200, '2022-01-20', 'Achat de 200 rames de papier A4.'),
(3, 1, 50, '2022-02-05', 'Achat de 50 boites de trombones.'),
(4, 1, 10, '2022-03-10', 'Achat de 10 ordinateurs portables HP.'),
(6, 1, 10, '2022-06-18', 'Achat de 10 cles USB 32 Go.'),
(9, 1, 5, '2022-07-25', 'Achat de 5 projecteurs video pour evenements.'),
(10, 1, 20, '2022-08-02', 'Achat de 20 bouteilles de gel hydroalcoolique.'),
(11, 1, 20, '2022-09-10', 'Achat de 20 masques chirurgicaux pour evenement.'),
(13, 1, 2, '2022-10-18', 'Achat de 2 ballons de football.'),
(16, 1, 1, '2022-11-25', 'Achat 1 haut-parleur portable utilise pour conference.'),
(25, 1, 300, '2022-01-10', 'Achat de 300 t-shirts pour les evenements.'),
(26, 1, 100, '2022-02-15', 'Achat de 100 gilets pour les benevoles.'),
(27, 1, 50, '2022-03-05', 'Achat de 50 polos pour le personnel administratif.'),
(28, 1, 200, '2022-04-12', 'Achat de 200 casquettes pour un evenement en plein air.'),
(29, 1, 70, '2022-05-20', 'Achat de 70 vestes pour les membres en hiver.'),
(25, 2, 50, '2022-06-15', 'Distribution de 50 t-shirts lors d un evenement sportif.'),
(26, 2, 30, '2022-07-10', 'Distribution de 30 gilets pour les benevoles d un evenement.'),
(27, 2, 20, '2022-08-18', 'Distribution de 20 polos au personnel administratif.'),
(28, 2, 100, '2022-09-25', 'Distribution de 100 casquettes lors d un evenement de sensibilisation.'),

-- 2023 Movements
(2, 1, 100, '2023-01-12', 'Reapprovisionnement de 100 rames de papier A4.'),
(3, 2, 10, '2023-02-01', '10 boites de trombones utilisees au bureau.'),
(5, 1, 1, '2023-03-08', 'Achat de 1 imprimantes laser pour les bureaux.'),
(17, 1, 10, '2023-04-14', '10 micros sans fil alloues pour evenement.'),
(10, 1, 5, '2023-05-19', 'Achat de 5 bouteilles de gel hydroalcoolique.'),
(23, 1, 20, '2023-06-22', 'Achat 20 barres energetiques utilisees pour evenement sportif.'),
(21, 1, 20, '2023-07-05', 'Achat de 20 bandages elastiques pour premiers soins.'),
(16, 1, 1, '2023-08-16', 'Achat de 1 haut-parleur portable.'),
(19, 1, 3, '2023-09-07', 'achat 3 tensiometres utilises lors d un evenement medical.'),
(20, 1, 5, '2023-10-15', 'Achat de 5 thermometres infrarouge.'),
(25, 1, 200, '2023-01-08', 'Reapprovisionnement de 200 t-shirts pour les nouveaux evenements.'),
(26, 2, 50, '2023-02-14', 'Distribution de 50 gilets lors d un evenement communautaire.'),
(27, 2, 30, '2023-03-10', 'Distribution de 30 polos au personnel lors d un seminaire.'),
(29, 1, 40, '2023-04-15', 'Reapprovisionnement de 40 vestes pour l hiver.'),
(25, 2, 80, '2023-05-25', 'Distribution de 80 t-shirts pour une campagne de sensibilisation.'),
(28, 1, 100, '2023-06-20', 'Reapprovisionnement de 100 casquettes pour l ete.'),
(26, 1, 70, '2023-07-12', 'Achat de 70 gilets pour les nouveaux benevoles.'),
(29, 2, 30, '2023-08-05', 'Distribution de 30 vestes lors d un evenement hivernal.'),

-- 2024 Movements
(2, 1, 150, '2024-01-05', 'Achat de 150 rames de papier A4.'),
(4, 1, 1, '2024-02-13', '1 ordinateur portable utilise pour la gestion.'),
(6, 1, 3, '2024-03-11', 'Achat de 3 cles USB 32 Go.'),
(17, 1, 2, '2024-04-14', 'Achat de 2 micros sans fil pour conferences.'),
(11, 2, 10, '2024-06-18', 'Sortie de 10 masques chirurgicaux.'),
(21, 2, 10, '2024-08-22', '10 bandages elastiques utilises lors d une campagne de sante.'),
(25, 2, 100, '2024-01-15', 'Distribution de 100 t-shirts lors d un marathon.'),
(26, 2, 40, '2024-02-10', 'Distribution de 40 gilets lors d un evenement communautaire.'),
(27, 1, 50, '2024-03-05', 'Reapprovisionnement de 50 polos pour le personnel.'),
(29, 2, 20, '2024-04-18', 'Distribution de 20 vestes lors d un evenement en plein air.'),
(28, 2, 60, '2024-05-22', 'Distribution de 60 casquettes lors d un festival.'),
(25, 1, 150, '2024-06-30', 'Reapprovisionnement de 150 t-shirts pour la saison estivale.'),
(26, 2, 30, '2024-07-17', 'Distribution de 30 gilets lors d un evenement humanitaire.'),
(27, 2, 25, '2024-08-25', 'Distribution de 25 polos lors d une reunion du personnel.');


