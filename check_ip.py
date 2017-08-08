#!/usr/bin/env python

import MySQLdb
import sys
import re
import socket

if len(sys.argv) < 2:
  print('\nUsage: check_ip.py <ip1> ... [ipN]\n')
  exit(1)

db=MySQLdb.Connect('localhost','root','','internetdb',charset='utf8')

c=db.cursor()

sql="""
  select n.country, c.name
    from networks n
    left outer join countries c on n.country=c.country
   where inet_aton(%s) between istart_ip and iend_ip
"""

p=re.compile(r'([0-9]{1,3}\.){3}[0-9]{1,3}')

for ip in sys.argv:
  if p.match(ip):
    c.execute(sql,( ip,))
    rows=c.fetchall()
    if len(rows):
      for row in rows:
        ( h, alias_list, ip_list ) = socket.gethostbyaddr(ip)
        print('%-15s %2s %-30s %s' % ( ip, row[0], row[1], h ))
    else:
      print('%-15s %2s %-30s %s' % ( ip, 'NF', 'NOT FOUND', ''))

c.close()

db.close()
