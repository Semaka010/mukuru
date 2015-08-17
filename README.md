# mukuru
Mukuru assessment application
*** INTRODUCTION ***
This web application was developed using Cakephp 3.x (http://cakephp.org/) and MySQL 5.x running on an apache webserver.
*** INSTALLATION ***
  1. Extract the zip file to an apache web server
  2. Create a MySQL database with name of your choise
  3. Import the database file /config/schema/database.sql
  3. Go to the extracted folder navigate to /config/app.php
  4. Change the Datasource to match you database
  5. access the app from you browser (http://youdomainname)
*** NOTES ***
  1. administrator link have been deactivated because the requiments states that user login is not required. These links can be access by directly entering their url on the browser.
  2. API for updating exchange rates can be access via url : http://domain/exchange_rates/apiadd
