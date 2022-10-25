# Charity Walking Webapp
## Introduction
Project built using PHP. Deployment used Linux, Apache, MySQL and PHP (LAMP stack). Of course, HTML, CSS, and JS were also used.

It has page routing, session and cookie handling, and was entirely self-hosted on a VPS running Linux. 

## Deployment Guide
For LAMP:
1. Install Apache (tested on Ubuntu 16.04, 18.04, 20.04)
2. Install MySQL (version 8.0+)
3. Install PHP (version 5.0+)
4. (*Optional*) Install PHPMyAdmin (or use MySQL in console)
4. Upload files to your Apache directory (by default var/www/html on Ubuntu)
5. Run SQL found in /resources/sql/setup.sql
6. Create admin user through console or via PHPMyAdmin panel
