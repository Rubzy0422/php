<?php
// SQL
CREATE BATABASE db_rush00;

CREATE TABLE users(
	idUsers int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	uidUsers TINYTEXT NOT NULL,
	emailUsers TINYTEXT NOT NULL,
	pwdUsers LONGTEXT NOT NULL
);

CREATE TAbLE products(
	id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(100) NOT NULL,
	image varchar(100) NOT NULL,
	price float NOT NULL,
	PRIMARY KEY (id)
);


?>