DELIMITER $$

CREATE TRIGGER create_venda
	BEFORE INSERT ON historico_vendas
    FOR EACH ROW 

	BEGIN
        INSERT INTO vendas
	    (id, date_time, preco_total)
	        VALUES
	    (DEFAULT, NOW(), NEW.quantidade * NEW.preco_unitario);
    END \\

DELIMITER ;    