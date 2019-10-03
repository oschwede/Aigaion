# Aigaion

Web based reference manager

## Announcement

Aigaion is a great reference manager, suitable for personal or corporate user. It is quite old but the concept behind it is very interesting and helpful.

The update process is slow because it is done on my free time but with community contribution I hope it can be maintained for a long time.

## Changelog

* 2/10/2019 - Today the project was migrated to aigaion organization.
* 31/7/2019 - With pull request from @mahermanns, aigaion is able to run on modern php (>v7) by removing direct reference to mysql functions and migrating to mysqli lib.


## Installation

Aigaion relies on modrewrite from web server. It comes with .htaccess suitable for apache.
Please modify as needed.

### Clean install
    
This documentation is for installing Aigaion 2.5 from scratch, with an empty database
    
    1)  Copy the Aigaion 2.5 files from the www folder to <WEBROOT>/<aigaion2_rootdir>/
    2)  Create a new MySQL database '<db_aigaion2>', with an appropriate user. The database is empty.
    3)  Unpack <WEBROOT>/<aigaion2_rootdir>/install/install.zip into the directory 
        <WEBROOT>/<aigaion2_rootdir>/install/
    4)  make a directory where attachments will be stored, and make it writable. By default, 
        Aigaion expects this directory to be <WEBROOT>/<aigaion2_rootdir>/attachments
    5)  Point your browser to http://<server>/<aigaion2_rootdir>/install/install.php
    6) Install will create a new <aigaion2_rootdir>index.php with specific information
    7) One may want to adjust php.ini to allow upload of big files

    From there on, follow the instructions on the screen.

### UPGRADE FROM AIGAION 2.x

    1) Perform a backup of the current files in "<WEBROOT>"
    2) Perform a backup of the database
    3) Delete the old Aigaion files (except the "attachments" folder)
    4) Copy the new Aigaion files from the "www" folder to "<WEBROOT>/<aigaion2_rootdir>/"
    5) Delete "index.php", "default_index.php" and the "install/" folder
    6) Rename "sample_index.php" to "index.php" and edit values according to the values in your old "index.php"
    7) login as database admin to upgrade the database structure

### UPGRADE FROM AIGAION 1.x

This documentation is for updating Aigaion 2.5 from an Aigaion 1.x installation
    
    1)  Copy the Aigaion 2.5 files from the www folder to <WEBROOT>/<aigaion2_rootdir>/
    2)  Create a new MySQL database '<db_aigaion2>', with an appropriate user. The database is empty.
    3)  Unpack <WEBROOT>/<aigaion2_rootdir>/install/install.zip into the directory 
        <WEBROOT>/<aigaion2_rootdir>/install/
    4)  Point your browser to http://<server>/<aigaion2_rootdir>/install/install.php

From there on, follow the instructions on the screen.

After installing, please run the maintenance checks (under Site Maintenance)