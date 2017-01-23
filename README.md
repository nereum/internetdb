# internetdb
MySQL database with all Internet network addresses - definitions and load script

Instructions
The script create_internetdb will make all the steps necessay to create a MySQL database with two tables:
networks
contries

The "networks" table store all the Internet networks associated with the country code. 
I'm using te information provided by IPdeny (http://www.ipdeny.com/). 

The "countries" table provides the country code and theirs names.

Adittionaly there is a script in PHP (php-cli) that return the country information of one or a list of IPs.

The script has the follow assumptions:
. is possible connect without password with user root (probably this will not e true in many installations)
. there is Internet access to get network blocks and countries using curl

# Output

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

# How to use check_ip to check for an IP address

$ ./check_ip 172.217.28.100<br>
172.217.28.100  us United States                  gru06s09-in-f4.1e100.net
