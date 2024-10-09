CREATE OR REPLACE FUNCTION update_classes_et_annee_scolaire() 
RETURNS VOID AS $$
BEGIN
    UPDATE membres_enfants
    SET 
        classe = CASE 
                    WHEN classe = 'terminale' THEN 'termine'
                    WHEN classe = 'premiere' THEN 'terminale'
                    WHEN classe = 'seconde' THEN 'premiere'
                    WHEN classe = '3eme' THEN 'seconde'
                    WHEN classe = '4eme' THEN '3eme'
                    WHEN classe = '5eme' THEN '4eme'
                    WHEN classe = '6eme' THEN '5eme'
                    WHEN classe = '7eme' THEN '6eme'
                    WHEN classe = '8eme' THEN '7eme'
                    WHEN classe = '9eme' THEN '8eme'
                    WHEN classe = '10eme' THEN '9eme'
                    WHEN classe = '11eme' THEN '10eme'
                    WHEN classe = '12eme' THEN '11eme'
                    ELSE classe  -- Si la classe ne change pas
                 END,
        annee_scolaire = (TO_CHAR(CURRENT_DATE, 'YYYY') || '-' || TO_CHAR(CURRENT_DATE + INTERVAL '1 year', 'YYYY'))
    WHERE classe <> 'termine';  -- Ne pas mettre à jour ceux qui ont terminé leur cycle
END;
$$ LANGUAGE plpgsql;


SELECT update_classes_et_annee_scolaire();


0 0 1 9 * psql -U your_username -d your_database -c "SELECT update_classes_et_annee_scolaire();"
