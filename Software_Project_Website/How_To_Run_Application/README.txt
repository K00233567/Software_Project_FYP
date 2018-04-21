Installation instructions

1.	Install XAMPP
2.	Start XAMPP control panel and start MySQL and Apache
3. 	Once XAMPP is started, go localhost/phpmyadmin
4.	Create a database called 'event_management_system'
5.	Import the database backup, 'backup.sql' found within this folder. The backup should be placed into the
	event_management_system database
6.	Drag and Drop the entire folder into htdocs folder (c:\xampp\htdocs).
7.	In the browser type localhost/Software_Project_Website/index.php (default port is 80, if different port number,
								 put number ahead of localhost i.e. localhost:8081)
8.	The application can now be used as expected

NOTE: Chrome should be used to test the application as Chrome was the main browser used for this application


Below are some default users which are already created once the backup is restored.

User	            	   UserType	    Password
Keith@gmail.com		      Admin		    Keith1234
Brian@gmail.com		      Customer	  Brian1234
Gleneagle@gmail.com	    Business		Gleneagle1234


Open Source Software used
Bootstrap, jquery and Google Maps API are all used within this project. All the neccessary files for these
are already included.
