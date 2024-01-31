# Online Examination System for Employees

Online Examination System for Employees developed by a group of undergraduate students at SLIIT (Sri Lanka Institute of Information Technology) as the final project for their Year 1 Semester 2 'Internet & Web Technologies' module 2022.

## Sample Login credentials:

- Employee:
  - Email   : employee@gmail.com
  - Password: User@123

- Exam Admin:
  - Email   : examadmin@gmail.com
  - Password: User@123

- Admin:
  - Email   : admin@gmail.com
  - Password: any password will work

### `NOTE: Ensure that you have properly configured and started XAMPP before running the system.`

## Instructions : 

### `Install XAMPP`: 

 - Download and install XAMPP, which is a local server software that allows you to run PHP applications on your computer. 
 - You can download XAMPP from the Apache Friends website.

	Xampp download link : https://www.apachefriends.org/download.html

### `Install a text editor`: 

 - Choose a text editor such as Notepad++, Sublime Text 3 or visual studio code to edit the source code.
 - These text editors provide features specifically designed for programming.

 ### `Download links` : 

- Notepad++          : https://notepad-plus-plus.org/downloads/
- Sublime Text       : https://www.sublimetext.com/3
- Visual Studio Code : https://code.visualstudio.com/download

### Copy the "OnlineExaminationSystemForEmployees" folder.

### `Paste the folder in the root directory`:
 
 - Navigate to the root directory of your XAMPP installation. The location may vary depending on where you installed XAMPP.
 - Paste the "OnlineExaminationSystemForEmployees" folder inside the "htdocs" folder (e.g., C:\xampp\htdocs).

### `Open PHPMyAdmin`: 

 - Launch your web browser and go to http://localhost/phpmyadmin/. This will open PHPMyAdmin, a web-based interface for managing databases.

### `Create a database`: 

 - Inside PHPMyAdmin, create a new database named "onlineexaminationsystem".

### `Import the SQL file`: 

 - Locate the "onlineexaminationsystem.sql" file, which should be inside the "database" folder of the project file.
 - Import this SQL file into the "onlineexaminationsystem" database in PHPMyAdmin. This will set up the necessary tables and data for the system.

 ### `NOTE : Change the username and password inside the 'src/php/config.php' file to your PHPMyAdmin username and password.`

### `Run the script`: 

 - Finally, open your web browser and access the "OnlineExaminationSystemForEmployees".
 - Enter the following URL to access: http://localhost/OnlineExaminationSystemForEmployees/src/login.php
 - This will run the script and load the system in your browser.
