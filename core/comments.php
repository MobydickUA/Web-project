<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db('site_info');
mysql_query("INSERT INTO `comments`(`id`, `article_id`, `text`, `author`, `date_of_pub`) VALUES (NULL,'".$_POST['article_id']."','".$_POST['comment_text']."','".$_SESSION['name']."',NULL)");
$tmp = mysql_query("select * from `comments` order by id DESC");
$assoc = mysql_fetch_array($tmp);
$result = $assoc;
//$result[5] = $_SESSION['name'];
echo json_encode($result);