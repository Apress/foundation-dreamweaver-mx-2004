This folder contains all the files used in Chapter 13.

contacts.sql contains the SQL needed to create the contacts table. This can be used to create the table automatically using the MySQL monitor. Assuming the book_db database has already been created, open Command Prompt (Windows) or Terminal (OS X), change directory to mysql/bin (unless it's already in your path), and type the following command:

mysql -uroot p book_db < [path]contacts.sql

When prompted, type in your MySQL root password.

[path] represents the path to the folder where you have stored contacts.sql.

Note: this will not work if the contacts table already exists in book_db.