Env: windows 10, Mysql, Apache, PHP

Files in folder:
1.all the javascript function are saved in folder js
2.all the framework files are saved in folder css and fonts
3.images are stored in folder images
4.some existing resume are stored in folder temptid, you also can upload your resume through our jobster.
5.we start from the "login.php"


Before log in to Jobster, first to load data into your database:

1.copy all the files in folder schema into your database and name it lobster.
2.set your database password as 'zhangsihao915'.

NOTE: there are two .sql files in folder schema about student and company. Load _insert2.txt into your database, cause we encrypted the password in Jobster。 As for _insert.txt. It helps you to check the original password

Then, We can start jobster 

1.copy all the content into your PC under ./Apache/htdoc .
2.run Apache server.
3.Type http://localhost/login.php in url on your web server.
4.Follow instructions and Enjoy!
 

