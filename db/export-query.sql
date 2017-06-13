use `investim-old`;

SELECT
	p.id as id,
    p.name as titulo,
    p.ref as ref,
    t.name as tipo,
	c.name as categoria,
    REPLACE(p.text, '<html />', '') as descricao,
    p.available as disponibilidade,
    
  /*  <select name="available" style="width:150px;"> 
			<option value="0">Disponível</option>
            <option value="1">Alugado</option>
            <option value="2">Vendido</option>
            <option value="3">Em Oferta</option>
            <option value="4">Sujeito a Contrato</option>
            <option value="5">Em Contrato</option>
            <option selected="selected" value="6">Indisponível</option>
         </select>
 */   
    
    REPLACE(REPLACE(p.extra71, ',00', ''), '.', '') as preco,
    p.extra50 as razao_social,
    p.extra51 as cnpj,
    p.extra59 as constituicao,
    p.extra60 as tributacao,
    p.extra81 as ativos,
    REPLACE(REPLACE(p.extra62, ',00', ''), '.', '') as valor_estoque,
    p.extra82 as produtos,
    p.extra83 as servicos,
    p.extra63 as fundacao,
    p.extra84 as motivo_venda,
    REPLACE(REPLACE(p.extra64, ',00', ''), '.', '') as vol_vendas_a_1,
    REPLACE(REPLACE(p.extra65, ',00', ''), '.', '') as vol_vendas_a_2,
    REPLACE(REPLACE(p.extra66, ',00', ''), '.', '') as vol_vendas_a_3,
    REPLACE(REPLACE(p.extra67, ',00', ''), '.', '') as faturamento_mensal,
    REPLACE(REPLACE(p.extra68, ',00', ''), '.', '') as lucro_bruto,
    p.extra69 as margem_lucro,
    REPLACE(REPLACE(p.extra70, ',00', ''), '.', '') as lucro_liquido,
    
    CASE p.extra1 WHEN 1 THEN 'proprio' WHEN 2 THEN 'alugado' END as imovel,
    
    p.extra85 as endividamento,
    p.extra86 as condicoes_venda,
    p.extra72 as numero_funcionarios,
    p.extra87 as diferencial,
    p.address as endereco,
    p.extra53 as endereco_complemento,
    p.extra54 as endereco_bairro,
    l.name as cidade,
    s.name as estado,
    pais.name as pais,
    p.extra52 as _contato_responsavel,
    p.extra55 as _contato_telefone,
    p.extra56 as _contato_email,
    p.extra57 as _contato_skype
    

FROM  
	jos_properties_products p,
    jos_properties_type t,
    jos_properties_category c,
    jos_properties_locality l,
    jos_properties_state s,
    jos_properties_country pais

WHERE
	p.type = t.id
	AND
    t.parent = c.id
    AND
    p.lid = l.id
    AND
    s.id = p.sid
    AND
    pais.id = p.cyid
    
ORDER BY id;