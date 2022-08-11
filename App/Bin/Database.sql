drop database if exists tutorialCRUD;

create database tutorialCRUD;
use tutorialCRUD;

create table Accounts(
    idAccount int not null auto_increment,
    usernameAccount varchar(50) not null,
    emailAccount varchar(50) not null,
    passwordAccount varchar(50) not null,
    siteAccount varchar(50) not null,

    primary key (idAccount)
);