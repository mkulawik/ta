<?php

//$items_per_group = 10;


$mysqli = new mysqli("localhost","ta","cthulu###888","voiceactor");

//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

define('APP_DB_MODE', 'DEBUG');
define('APP_DB_DIE_ON_FAIL', true);
define('APP_DB_SHOW_SQL', false);
define('TOTAL_RECORDS', 15);

?>

