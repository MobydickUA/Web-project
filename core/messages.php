<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db('site_info');
mysql_query("insert into `messages`(`ID`, `sender`, `achiever`, `text`, `date`) VALUES (NULL,'".$_SESSION['name']."', '".$_SESSION['achiever']."' ,'".$_POST['text']."',NULL )");
$tmp = mysql_query("select * from `messages` order by id DESC");
$assoc = mysql_fetch_array($tmp);
$result = $assoc;
$result[5] = $_SESSION['name'];
echo json_encode($result);