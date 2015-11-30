DELIMITER $$
CREATE TRIGGER delete_form_a_b AFTER DELETE
    on p_form_a
    FOR EACH ROW 
    BEGIN
        DELETE FROM p_form_b_bahan_baku WHERE OLD.id = p_form_a ; 
        DELETE FROM p_form_b_bahan_pelengkap WHERE OLD.id = p_form_a ; 
    END;
DELIMITER ;

DELIMITER $$
CREATE TRIGGER delete_identity AFTER DELETE
    on p_form_identity
    FOR EACH ROW 
    BEGIN        
        DELETE FROM p_form_a WHERE OLD.id = p_form_identity ; 
        DELETE FROM p_form_b_bahan_baku WHERE OLD.id = p_form_identity ; 
        DELETE FROM p_form_b_bahan_pelengkap WHERE OLD.id = p_form_identity ; 
    END;
DELIMITER ;