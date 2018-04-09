INSERT INTO category SET name = 'Доски и лыжи', is_deleted = 0;
INSERT INTO category SET name = 'Крепления', is_deleted = 0;
INSERT INTO category SET name = 'Ботинки', is_deleted = 0;
INSERT INTO category SET name = 'Одежда', is_deleted = 0;
INSERT INTO category SET name = 'Инструменты', is_deleted = 0;
INSERT INTO category SET name = 'Разное', is_deleted = 0;

INSERT INTO user SET 
	reg_date = '2018-04-05 00:00:00',
	email = 'ignat.v@gmail.com',
	name ='Игнат',
	password ='$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka',
	avatar_url = 'img/avatar.jpg',
	contacts = '8-800-555-35-35',
	is_deleted = 0;

INSERT INTO user SET 
	reg_date = '2018-04-01 00:00:00',
	email = 'kitty_93@li.ru',
	name ='Леночка',
	password ='$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa',
	avatar_url = 'img/avatar.jpg',
	contacts = '8-800-555-35-35',
	is_deleted = 0;

INSERT INTO user SET
	reg_date = '2018-03-20 00:00:00',
	email = 'warrior07@mail.ru',
	name ='Руслан',
	password ='$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW',
	avatar_url = 'img/avatar.jpg',
	contacts = '8-800-555-35-35',
	is_deleted = 0;

INSERT INTO lot SET
	creation_date = '2018-04-06 00:00:00',
	name ='2014 Rossignol District Snowboard',
	description = 'Лыжи хорошие, сноуборды не очень',
	img_url = 'img/lot-1.jpg',
	start_price = 10999,
	finish_date = '2018-04-26 00:00:00',
	price_step = 100,
	fav_count = 0,
	author_id = 1,
	winner_id = null,
	category_id = 1,
	is_deleted = 0;

INSERT INTO lot SET
	creation_date = '2018-04-06 00:00:00',
	name ='DC Ply Mens 2016/2017 Snowboard',
	description = 'Тру сноуборд для настоящих сноубордеров',
	img_url = 'img/lot-2.jpg',
	start_price = 15999,
	finish_date = '2018-04-30 00:00:00',
	price_step = 200,
	fav_count = 0,
	author_id = 1,
	winner_id = null,
	category_id = 1,
	is_deleted = 0;

INSERT INTO lot SET
	creation_date = '2018-04-02 00:00:00',
	name ='Крепления Union Contact Pro 2015 года размер L/XL',
	description = 'Лучшие крепления по версии SnowMag, легкие, мощные, сочные',
	img_url = 'img/lot-3.jpg',
	start_price = 8000,
	finish_date = '2018-04-12 00:00:00',
	price_step = 75,
	fav_count = 0,
	author_id = 2,
	winner_id = null,
	category_id = 2,
	is_deleted = 0;

INSERT INTO lot SET
	creation_date = '2018-04-05 00:00:00',
	name ='Ботинки для сноуборда DC Mutiny Charocal',
	description = 'Так себе ботинки, как и все обувь компании',
	img_url = 'img/lot-4.jpg',
	start_price = 10999,
	finish_date = '2018-04-15 00:00:00',
	price_step = 125,
	fav_count = 0,
	author_id = 2,
	winner_id = null,
	category_id = 3,
	is_deleted = 0;

INSERT INTO lot SET
	creation_date = '2018-04-09 00:00:00',
	name ='Куртка для сноуборда DC Mutiny Charocal',
	description = 'Так себе куртка, прямо как обувь',
	img_url = 'img/lot-5.jpg',
	start_price = 7500,
	finish_date = '2018-04-29 00:00:00',
	price_step = 50,
	fav_count = 0,
	author_id = 3,
	winner_id = null,
	category_id = 4,
	is_deleted = 0;

INSERT INTO lot SET
	creation_date = '2018-04-09 00:00:00',
	name ='Маска Oakley Canopy',
	description = 'ДОрого, богато, лучшие маски в мире (ну после Electric конечно)',
	img_url = 'img/lot-6.jpg',
	start_price = 5400,
	finish_date = '2018-04-29 00:00:00',
	price_step = 50,
	fav_count = 0,
	author_id = 3,
	winner_id = null,
	category_id = 6,
	is_deleted = 0;

INSERT INTO bet SET
	bet_date = '2018-04-06 15:00:00',
	cost = 11099,
	user_id = 2,
	lot_id = 1,
	is_deleted = 0;

INSERT INTO bet SET
	bet_date = '2018-04-06 20:00:00',
	cost = 11199,
	user_id = 3,
	lot_id = 1,
	is_deleted = 0;

SELECT name FROM category;

SELECT * FROM lot
WHERE name = '2014 Rossignol District Snowboard' OR description LIKE 'Лыжи';

UPDATE lot SET name = 'Ботинки для сноуборда DC Mutiny Charocal 42'
WHERE id = 4;

SELECT * FROM bet
WHERE lot_id = 1 ORDER BY bet_date DESC;

SELECT
	lot.name,
	start_price,
	img_url,
	category.name as category_name,
	IFNULL(MAX(bet.cost), lot.start_price) as lot_price,
	COUNT(bet.lot_id) as bets_number
FROM lot
LEFT JOIN bet ON bet.lot_id = lot.id
LEFT JOIN category ON category.id = lot.category_id
WHERE lot.finish_date > NOW()
GROUP BY lot.id
ORDER BY lot.finish_date DESC;