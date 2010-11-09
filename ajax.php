<?php
$wp_config = file_get_contents ("../../../wp-config.php");

$db_name = array();
$db_host = array();
$db_user = array();
$db_pass = array();
$db_pref = array();

preg_match ("/.*DB_NAME\', \'(.*)\'.*/", $wp_config, $db_name);
preg_match ("/.*DB_HOST\', \'(.*)\'.*/", $wp_config, $db_host);
preg_match ("/.*DB_USER\', \'(.*)\'.*/", $wp_config, $db_user);
preg_match ("/.*DB_PASSWORD\', \'(.*)\'.*/", $wp_config, $db_pass);
preg_match ("/.*table_prefix[^\']+\'([^\']+)\'.*/", $wp_config, $db_pref);

$mysql = mysql_connect ($db_host[1], $db_user[1], $db_pass[1]);
mysql_select_db ($db_name[1], $mysql);
?>
