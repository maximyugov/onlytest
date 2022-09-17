CREATE DATABASE IF NOT EXISTS onlytest;

DROP TABLE IF EXISTS onlytest.users;

CREATE TABLE onlytest.users
(
    id integer NOT NULL UNIQUE PRIMARY KEY AUTO_INCREMENT,
    name char(255) NOT NULL,
    email char(255) NOT NULL UNIQUE,
    password_hash char(255) NOT NULL
);
