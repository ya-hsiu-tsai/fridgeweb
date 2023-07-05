drop database if exists fridgeweb;
create database fridgeweb default character set utf8 collate utf8_general_ci;
grant all on fridgeweb.* to 'staff'@'localhost' identified by 'password';
use fridgeweb;

create table user (
	id int auto_increment primary key, 
	name varchar(200) not null unique, 
	mail varchar(200) not null, 
	password varchar(100) not null
);

create table fridge (
	id int auto_increment primary key,
	name varchar(200) not null unique,
	company varchar(200) not null,
	tel int not null,
	address varchar(200) not null,
	coordinate varchar(200) not null,
	user_id int not null,
	foreign key(user_id) references user(id)
);

create table product (
	id int auto_increment primary key,
	name varchar(200) not null unique,
	kind varchar(200) not null,
	num int not null,
	fridge_id int not null,
	foreign key(fridge_id) references fridge(id)
);

create table comment (
	id int auto_increment primary key,
	content varchar(1024) not null,
	fridge_id int not null,
	foreign key(fridge_id) references fridge(id)
);