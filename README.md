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
. is possible connect withou password with user root (probably this will not e true in many installations)
. there is Internet access to get network blocks and countries using curl

# How to check the load

$ ./check_ip 172.217.28.100
172.217.28.100  us United States                  gru06s09-in-f4.1e100.net



