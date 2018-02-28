CREATE DATABASE YetiCave;
USE YetiCave;

CREATE TABLE category (
id INT AUTO_INCREMENT,
name VARCHAR(64) UNIQUE NOT NULL,

PRIMARY KEY(id)
);

CREATE INDEX name_category ON category(name);

CREATE TABLE user (
id INT AUTO_INCREMENT,
date_rigistration DATETIME NOT NULL,
email VARCHAR(30) UNIQUE NOT NULL,
name VARCHAR(20) NOT NULL,
password VARCHAR(100) UNIQUE NOT NULL,
avatar VARCHAR(64) UNIQUE,
contact VARCHAR(30) NOT NULL,

PRIMARY KEY(id)
);

CREATE TABLE lot (
id INT AUTO_INCREMENT,
date_of_create DATETIME NOT NULL,
name VARCHAR(128) NOT NULL,
description TEXT NOT NULL,
picture VARCHAR(64) NOT NULL,
start_price INT UNSIGNED NOT NULL,
date_of_completion DATETIME NOT NULL,
step INT UNSIGNED NOT NULL,

id_author INT NOT NULL,
id_winner INT,
id_category INT NOT NULL,

PRIMARY KEY(id),
FOREIGN KEY(id_author) REFERENCES user(id),
FOREIGN KEY(id_winner) REFERENCES user(id),
FOREIGN KEY(id_category) REFERENCES category(id)
);

CREATE INDEX name_lot ON lot(name);
CREATE INDEX description ON lot(description(255));

CREATE TABLE bet (
id INT AUTO_INCREMENT,
date DATETIME,
sum INT UNSIGNED,

id_user INT NOT NULL,
id_lot INT NOT NULL,

PRIMARY KEY(id),
FOREIGN KEY(id_user) REFERENCES user(id),
FOREIGN KEY(id_lot) REFERENCES lot(id)
);
