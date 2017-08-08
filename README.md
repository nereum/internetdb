# internetdb

MySQL database with all Internet network addresses - definitions and load script

## Getting Started

The script "create_internetdb" will make all the steps necessary to create a MySQL database with three tables:<br>

. networks
. countries
. countries_iso31661

The "networks" table store all the Internet networks associated with the country code.

All the data is provided by IPdeny (http://www.ipdeny.com/).

The "countries" table provides the country code and theirs names. I'm using the information provided by Wikipedia
about ISO 3166-1 (https://en.wikipedia.org/wiki/ISO_3166-1) and create and load the file iso31661.txt(also included).

Adittionaly there are a script in PHP (php-cli) and Python that can be used to return the network information of given IP or a list of IPs.

This script is intended as a demonstration.

### Prerequisites

All the scripts have the follow assumptions:
. there is a MySQL database and client available;
. is possible connect without password with user root (probably this will not e true in many installations);
. there is an Internet access to get the network addresses by downloading the file all-zones.tar.gz from www.ipdeny.com.


### Usage

To create the database and populate it, just open the script "create_internetdb" with your favorite editor and change the user and passowrd of MySQL. 

The script will stop at every major step of the process (create database, create table, download files, load the files etc) allowing to check its output and stop it if necessary.

Exemple:

$ vi create_internetdb
... change user and password ...

$ chmod 700 create_internetdb

$ ./create_internetdb


### check_ip.php and check_ip.py

Both scripts working in the same way, just pass a IP or list of IPs as arguments and they will connect to database, search and return the information.

If you change the cretencials to connnect to database in the other script you will have to do the same here.

Example:

$ chmod 700 ./check_ip.py ./check_ip.php

$ ./check_ip.py 172.217.28.100
172.217.28.100  us United States                  gru06s09-in-f4.1e100.net

$ ./check_ip.php 172.217.28.100
172.217.28.100  us United States                  gru06s09-in-f4.1e100.net

## Author

* Nereu Matos - [nereum](https://github.com/nereum/)

## License

This project is licensed under the Creative Commons CC0

## Acknowledgments

* I would like to thanks IPdeny for provide freely the data used by this script.

