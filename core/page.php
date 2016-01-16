<?php
mysql_connect('localhost','root','');
mysql_select_db('site_info');
//var_dump($_POST);
$tmp = mysql_query("SELECT * from articles where id=".$_POST['id']);
$assoc = mysql_fetch_assoc($tmp);
$result = array();

$result[0] = $assoc['title'];
$result[1] = $assoc['content'];
$result[2] = $assoc['date_of_pub'];
echo json_encode($result);