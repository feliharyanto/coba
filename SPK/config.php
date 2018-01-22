<?php

$db->host='localhost';
$db->user='root';
$db->password='';
$db->name='raskin';

$wwwroot='./';

$link=mysql_connect($db->host,$db->user,$db->password);
mysql_select_db($db->name);

?>