# watcher-server-api
This is a server rest api for watcher crime system

# How to run the server

#Step 1

#---Windows----#
Download Xampp on windows(this will come with php , apache and mysql) 
Add the filepath of C://Xampp/php and C://Xampp/mysql/bin to the environment  variable path
Download vscode or any editor of your choice

#----linux----#
Download php 8.0 and mysql and configure apache server
Download vcode or any editor of your choice

#Step 2

#---windows---#
Copy the project to C://xampp/htdocs

#----linux-----#
You can use the directory of your choice

#Step 3

#----windows---#
Run the Xampp as an Administrator and start apache and mysql
Click on Admin next to Mysql to open Admin panel
Create a database name called "Watcher"
import watcher.sql from the project to the database

#-----linux-----#
From the terminal,
Start your apache server by running "sudo systemctl start apache2.service" on debian, other distro do research
Login to your mysql with "mysql -u root -p" 
Create a database with "CREATE DATABASE watcher;
Import watcher.sql to to your database

#Step 4
#-----windows-----#
From command prompt running as administrator from the project directory, run 
php -S 127.0.0.1:8080 (use another port if 3000 is taken)
Use thunder-client a vscode extenstion or insominia to test the api endpoint

#----linux----#
Run from terminal in the project directory, run
sudo php -S 127.0.0.1:8080 (use another port if 3000 is taken)
Use thunder-client a vscode extenstion or insominia to test the api endpoint
