#!/usr/bin/php -q
<?php

  $sql="
     select n.country, c.name
       from networks n
       left outer join countries c on n.country=c.country
      where inet_aton(:ip) between istart_ip and iend_ip
  ";

#  $sql="
#     select n.country, c.name
#       from networks n
#       left outer join countries c on n.country=c.country
#      where istart_ip<=inet_aton(:ip)
#      order by istart_ip desc
#      limit 0,1
#  ";

  if ( count($argv) <= 1 ) {
    printf("\nUsage: check_ip.py <ip1> ... [ipN]\n");
    exit(1);
  }

  $db = new PDO('mysql:host=localhost;dbname=internetdb;charset=utf8;socket=/mysql/mysql.sock','root','',
                array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
  );

  $st = $db->prepare($sql);

  $ip="";
  $st->bindParam(':ip', $ip, PDO::PARAM_STR);

  for($i=1;$i<count($argv);$i++) {
    $ip=$argv[$i];
    list($country, $country_name ) = array ( "NF", "NOT FOUND" );
    if ( preg_match("/([0-9]{1,3}\.){3}[0-9]{1,3}/",$ip) === 1 ) {
      $st->execute();
      $st->bindColumn(1, $country);
      $st->bindColumn(2, $country_name);
      $st->fetch(PDO::FETCH_BOUND);
    }
    printf("%-15s %2s %-30s %s\n",$ip,$country,$country_name,@gethostbyaddr($ip));
  }
?>
