DELIMITER $$

CREATE TRIGGER decrementar_qtd
    BEFORE INSERT ON historico_vendas
    FOR EACH ROW

BEGIN

    DECLARE qtd_produto INT;

    SET qtd_produto = (
        SELECT quantidade 
        FROM produtos
        WHERE id = NEW.produto_id
    );

    IF qtd_produto >= NEW.quantidade THEN 
        UPDATE produtos
        SET quantidade = quantidade - NEW.quantidade
        WHERE id = NEW.produto_id;
    ELSE
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Stock insuficiente';
    END IF;

END \\

DELIMITER ;