#Database movie creation

CREATE DATABASE IF NOT EXISTS movie DEFAULT CHARACTER SET utf8 COLLATE = utf8_bin;

#Table creation

CREATE TABLE `movie` . `movies` (
	id int unsigned auto_increment primary key,
	title VARCHAR(255) ,
    actors VARCHAR(255) ,
    director VARCHAR(255),
    producer VARCHAR(255),
	year_of_prod YEAR,
    `language` VARCHAR(255),
    category ENUM('action', 'drama', 'thriller', 'horror', 'comedy'),
    storyline TEXT
) engine = InnoDB default character set  = utf8 collate = utf8_bin;