<?php
$con = mysql_connect("localhost", "ta", "cthulu###888") or die ("Can't connect to database.");
mysql_select_db("voiceactor")or die ("Can't connect to database.");

define('APP_DB_MODE', 'DEBUG');
define('APP_DB_DIE_ON_FAIL', true);
define('APP_DB_SHOW_SQL', false);
define('TOTAL_RECORDS', 15);

?>
