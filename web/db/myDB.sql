CREATE DATABASE scheduler;

\c scheduler

CREATE TABLE appoint (
	id SERIAL PRIMARY KEY,
	contractor_id INT NOT NULL REFERENCES occupy.contractor(id),
	firstname varchar(100) NOT NULL,
	lastname varchar(100) NOT NULL,
	telephone varchar(100) NOT NULL,
	email varchar(150) NOT NULL UNIQUE,
	street varchar(100) NOT NULL,
	city varchar(100) NOT NULL,
	state varchar(2) NOT NULL,
	postal varchar(20) NOT NULL,
	time varchar(20) NOT NULL,
	message varchar(255) NOT NULL
);

CREATE TABLE occupy.contractor (
	id SERIAL PRIMARY KEY,
	contractor varchar(100) NOT NULL,
	state varchar(2) NOT NULL
);


CREATE TABLE occupy.time (
	id SERIAL PRIMARY KEY,
	contractor_id INT NOT NULL REFERENCES occupy.contractor(id),
	time varchar(20) NOT NULL
);
