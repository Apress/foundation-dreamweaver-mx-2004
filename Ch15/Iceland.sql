 create table cms_news (
 newsID int unsigned not null auto_increment primary key,
 storyDate date not null,
 headline varchar(100) not null,
 story text not null
 );
 
  create table cms_contact (
 contactID int unsigned not null auto_increment primary key,
 email varchar(100),
 post varchar(250),
 telephone varchar(25)
 );
 
create table cms_about (
aboutID int unsigned not null auto_increment primary key,
details text not null
);

 insert into cms_contact (email, post, telephone)
 values ('a','b','c');
 insert into cms_about set details='a';
 
 create table cms_admin (
 adminID int unsigned not null auto_increment primary key,
 firstname varchar(25) not null,
 lastname varchar(25) not null,
 username varchar(15) not null,
 password varchar(50) not null
 );