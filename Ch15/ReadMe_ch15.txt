This folder contains the complete finished version of the Images from Iceland CMS.

Iceland.sql contains the SQL needed to create and initialize all the tables used in Chapter 15. Assuming the book_db database has already been created, open Command Prompt (Windows) or Terminal (OS X), change directory to mysql/bin (unless it's already in your path), and type the following command:

mysql -uroot p book_db < [path]Iceland.sql

When prompted, type in your MySQL root password.

[path] represents the path to the folder where you have stored Iceland.sql.

Note: this will not work if any of the tables used in the Images from Iceland site already exist in book_db.