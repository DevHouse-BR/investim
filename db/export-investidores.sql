SELECT
	id,
	name,
    company,
	email,
    skype,
    phone as tel,
    mobile,
    country,
    state,
    locality as city,
    REPLACE(REPLACE(icq, ',00', ''), '.', '') as max_price,
    '0' as min_price,
    CASE blog WHEN 1 THEN '1' WHEN 2 THEN '0' END as third_party_capital,
    web as prefered_city,
    REPLACE(REPLACE(info, '\n', '<br>'), '\r', '') as sector,
    REPLACE(REPLACE(bio, '\n', '<br>'), '\r', '') as description,
    '0000-00-00 00:00:00' as subscription,
    '0' as enabled
FROM `investim-old`.jos_properties_profiles
	INTO OUTFILE 'D:\\investidores.csv'
	FIELDS TERMINATED BY ',' 
	OPTIONALLY ENCLOSED BY '"' 
	ESCAPED BY '\\' ;
	-- LINES TERMINATED BY '\\n\\r' ;