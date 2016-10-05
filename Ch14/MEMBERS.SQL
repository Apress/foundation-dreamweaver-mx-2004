create table members (
memberID int unsigned not null auto_increment primary key,
firstname varchar(25) not null,
lastname varchar(25) not null,
email varchar(100) not null,
username varchar(15) not null,
password varchar(50) not null
);
