CREATE DATABASE scheduler;

\c scheduler

CREATE TABLE schedule.name {
	id SERIAL PRIMARY KEY,
	firstname varchar(100) NOT NULL,
	lastname varchar(100) NOT NULL
};

CREATE TABLE schedule.contact {
	id SERIAL PRIMARY KEY,
	telephone varchar(100) NOT NULL,
	email varchar(150) NOT NULL UNIQUE
};

CREATE TABLE schedule.address {
	id SERIAL PRIMARY KEY,
	street varchar(100) NOT NULL,
	city varchar(100) NOT NULL,
	state varchar(2) NOT NULL,
	postal varchar(20) NOT NULL,
};

CREATE TABLE schedule.appoint {
	id SERIAL PRIMARY KEY,
	name_id INT NOT NULL REFERENCES schedule.name(id),
	contact_id INT NOT NULL REFERENCES schedule.contact(id),
	address_id INT NOT NULL REFERENCES schedule.address(id),
	time varchar(20) NOT NULL,
	message varchar(255) NOT NULL
};

CREATE TABLE occupy.contractor {
	id SERIAL PRIMARY KEY,
	contractor varchar(100) NOT NULL
};

CREATE TABLE occupy.state {
	id SERIAL PRIMARY KEY,
	state varchar(2) NOT NULL
};

CREATE TABLE occupy.time {
	id SERIAL PRIMARY KEY,
	contractor_id INT NOT NULL REFERENCES occupy.contractor(id),
	time varchar(20) NOT NULL
};
