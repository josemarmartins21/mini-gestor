DELIMITER $$

CREATE TRIGGER decrementar_qtd
BEFORE INSERT ON historico_vendas
FOR EACH ROW
BEGIN

    DECLARE qtd_produto INT;

    SET qtd_produto = (
        SELECT qtd 
        FROM produtos
        WHERE id = NEW.produto_id
    );

    IF qtd_produto >= NEW.qtd THEN 
        UPDATE produtos
        SET qtd = qtd - NEW.qtd
        WHERE id = NEW.produto_id;
    ELSE
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Stock insuficiente';
    END IF;

END $$

DELIMITER ;