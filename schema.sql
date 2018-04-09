CREATE DATABASE yeticave;

USE yeticave;

CREATE TABLE category (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name CHAR(30),
	is_deleted TINYINT(1)
);

CREATE TABLE lot (
	id INT AUTO_INCREMENT PRIMARY KEY,
	creation_date DATETIME,
	name CHAR(128),
	description TEXT,
	img_url CHAR(64),
	start_price INT,
	finish_date DATETIME,
	price_step INT,
	fav_count INT,
	author_id INT,
	winner_id INT,
	category_id INT,
	is_deleted TINYINT(1)
);

CREATE TABLE bet (
	id INT AUTO_INCREMENT PRIMARY KEY,
	bet_date DATETIME,
	cost INT,
	user_id INT,
	lot_id INT,
	is_deleted TINYINT(1)
);

CREATE TABLE user (
	id INT AUTO_INCREMENT PRIMARY KEY,
	reg_date DATETIME,
	email CHAR(64),
	name CHAR(64),
	password CHAR(64),
	avatar_url CHAR(64),
	contacts TEXT,
	is_deleted TINYINT(1)
);

CREATE INDEX lot_name ON lot(name);
CREATE INDEX lot_author_id ON lot(author_id);
CREATE INDEX lot_winner_id ON lot(winner_id);
CREATE INDEX lot_category_id ON lot(category_id);

CREATE UNIQUE INDEX category_name ON category(name);

CREATE UNIQUE INDEX email ON user(email);

CREATE INDEX bet_user_id ON bet(user_id);
CREATE INDEX bet_lot_id ON bet(lot_id);
