
# internetdb
MySQL database with all Internet network addresses - definitions and load script<br>

<b>Instructions</b><br>
The script "create_internetdb" will make all the steps necessary to create a MySQL database with two tables:<br>
<ul>
<li>networks
<li>countries
</ul>

The "networks" table store all the Internet networks associated with the country code.<br>
All the data is provided by IPdeny (http://www.ipdeny.com/).<br>

The "countries" table provides the country code and theirs names. I'm using the information provided by Wikipaedia
about ISO 3166-1 (https://en.wikipedia.org/wiki/ISO_3166-1) and create and load the file iso31661.txt(also included).<br> 

Adittionaly there is a script in PHP (php-cli) that return the network information of one or a list of IPs.<br>

The scripts have the follow assumptions:<br>
<ul>
<li> is possible connect without password with user root (probably this will not e true in many installations)
<li> there is Internet access to get network blocks and countries using curl
</ul>

<b>Usage</b><br>

To create the database and populate it, just run the bash script "create_internetdb". The script will stop at every major step of the process (create database, create table, download files, load the files etc).<br>

Follow the output of the script<br>

<pre>
$ ./create_internetdb

This script will create and load "internetdb" database.
If the database already exist, it will backup it first and then recreate it

Press ENTER to continue or CTRL-C to cancel...

. Change work directory to /tmp and clean up temporary files

Press ENTER to continue or CTRL-C to cancel...

. Backup database
 79.0%

Press ENTER to continue or CTRL-C to cancel...

. [Re-]creating database and tables

Tables_in_internetdb
countries
networks

Press ENTER to continue or CTRL-C to cancel...

. Download all-zones
  % Total    % Received % Xferd  Average Speed   Time    Time     Time  Current
                                 Dload  Upload   Total   Spent    Left  Speed
100  542k  100  542k    0     0   189k      0  0:00:02  0:00:02 --:--:--  189k

Press ENTER to continue or CTRL-C to cancel...

. Loading table [networks]...

count(*)
171918

Press ENTER to continue or CTRL-C to cancel...

. Download country_codes.csv
  % Total    % Received % Xferd  Average Speed   Time    Time     Time  Current
                                 Dload  Upload   Total   Spent    Left  Speed
100  3870  100  3870    0     0   5056      0 --:--:-- --:--:-- --:--:--  5065

Press ENTER to continue or CTRL-C to cancel...

. Loading table [countries]...

count(*)
249

Press ENTER to continue or CTRL-C to cancel...

. Clean up temporary files

. Finished.
</pre>

Once the database created and populated is possbile to query it directly or use the php-cli script "check_ip".<br>
Follow an examle of how to check an IP using the script:<br>

<pre>
$ ./check_ip 172.217.28.100
172.217.28.100  us United States                  gru06s09-in-f4.1e100.net
</pre>
