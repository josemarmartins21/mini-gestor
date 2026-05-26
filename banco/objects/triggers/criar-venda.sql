DELIMITER $$

CREATE TRIGGER create_venda
	BEFORE INSERT ON produto_venda
    FOR EACH ROW 

	BEGIN
        UPDATE vendas
        SET preco_total = preco_total + NEW.price
        WHERE id = NEW.venda_id; 
    END \\

DELIMITER ;    