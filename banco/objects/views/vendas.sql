create or replace view todas_vendas AS SELECT 
		UCASE(p.name) AS nome, 
		hv.preco_uni, 
		hv.qtd,
		v.total,
		date(v.date_time) AS data
FROM produtos AS p JOIN historico_vendas AS hv
ON hv.produto_id = p.id
JOIN vendas AS v 
ON v.id = hv.venda_id
ORDER BY v.date_time;