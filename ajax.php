<?php
function return_json ($json) {
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    echo json_encode ($json);
    die();
}

if (!($wp_config = file_get_contents ("../../../wp-config.php"))) {
    $error = "Cannot read wp-config.php";
    return_json (array ('code'=>-1, 'error'=>$error));
}

$db_name = array();
$db_host = array();
$db_user = array();
$db_pass = array();
$db_pref = array();

if (!(preg_match ("/.*DB_NAME\', \'(.*)\'.*/", $wp_config, $db_name))) {
    $error = "Cannot find DB_NAME";
    return_json (array ('code'=>-1, 'error'=>$error));
}

if (!(preg_match ("/.*DB_HOST\', \'(.*)\'.*/", $wp_config, $db_host))) {
    $error = "Cannot find DB_HOST";
    return_json (array ('code'=>-1, 'error'=>$error));
}

if (!(preg_match ("/.*DB_USER\', \'(.*)\'.*/", $wp_config, $db_user))) {
    $error = "Cannot find DB_USER";
    return_json (array ('code'=>-1, 'error'=>$error));
}

if (!(preg_match ("/.*DB_PASSWORD\', \'(.*)\'.*/", $wp_config, $db_pass))) {
    $error = "Cannot find DB_PASSWORD";
    return_json (array ('code'=>-1, 'error'=>$error));
}

if (!(preg_match ("/.*table_prefix[^\']+\'([^\']+)\'.*/", $wp_config, $db_pref))) {
    $error = "Cannot find table_prefix";
    return_json (array ('code'=>-1, 'error'=>$error));
}

if (!($mysql = mysql_connect ($db_host[1], $db_user[1], $db_pass[1]))) {
    $error = "Cannot connect to database: ".mysql_error ();
    return_json (array ('code'=>-1, 'error'=>$error));
}

if (!(mysql_select_db ($db_name[1], $mysql))) {
    $error = "Cannot select database: ".mysql_error ();
    return_json (array ('code'=>-1, 'error'=>$error));
}

return_json (array ('code'=>-1, 'error'=>'Unimplemented'));
?>
