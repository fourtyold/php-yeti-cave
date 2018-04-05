CREATE TABLE categories (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name CHAR(30),
	is_deleted TINYINT(1)
);

CREATE TABLE lots (
	id INT AUTO_INCREMENT PRIMARY KEY,
	creation_date DATE,
	name CHAR(100),
	description TEXT,
	image CHAR,
	price DECIMAL,
	finish_date DATE,
	price_step DECIMAL,
	fav_count INT,
	is_deleted TINYINT(1)
);

CREATE TABLE bets (
	id INT AUTO_INCREMENT PRIMARY KEY,
	bet_date DATE,
	price DECIMAL,
	is_deleted TINYINT(1)
);

CREATE TABLE users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	reg_date DATE,
	email CHAR(128),
	name CHAR(50),
	password CHAR(40),
	avatar CHAR,
	contacts CHAR,
	is_deleted TINYINT(1)
);

CREATE UNIQUE INDEX email ON users(email);
CREATE INDEX category ON categories(name);
CREATE INDEX lot ON lots(name);
