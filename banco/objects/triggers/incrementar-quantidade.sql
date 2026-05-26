DELIMITER $$

create trigger incrementar_qtd
    before DELETE on historico_vendas
    for each row

        BEGIN
            update produtos
            set quantidade = quantidade + OLD.quantidade
            where id = OLD.produto_id;
        END ;

DELIMITER ;

