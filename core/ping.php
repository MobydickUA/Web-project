<?php
mysql_connect('localhost','root','');
mysql_select_db('site_info');
$tmp = mysql_query("select count(*) from messages where (sender = '".$_SESSION['name']."' and achiever = '".$_SESSION['achiever']."') or (sender = '".$_SESSION['achiever']."' and achiever = '".$_SESSION['name']."');");
$res = mysql_fetch_array($tmp);
return json_encode($res[0]);