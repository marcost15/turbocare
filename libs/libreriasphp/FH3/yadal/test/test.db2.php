<?php
/**
 * Test file for the mysql "layer"
 *
 * @package Yadal
 */

include('../class.Yadal.php');



echo "<pre>";
include ('C:\xampp\htdocs\ku\config.inc.php');
// the test table (can be any table)
$table = SCHEMA.".".WORKTABELLE;
//print_r($GLOBALS);

//$conn_string = "DRIVER={IBM DB2 ODBC DRIVER};DATABASE=".$GLOBALS['config']['database'].";" .
//        "HOSTNAME=".$GLOBALS['config']['hostname'].";PORT=".$GLOBALS['config']['port'].";PROTOCOL=TCPIP;UID=".$GLOBALS['config']['user'].";PWD=".$GLOBALS['config']['password'];

//$conn_string = DSN;


// create a new connection
$db = newYadal(DATABASE, "db2");
$db -> connect(DSN, USER, PASSWORD);

echo $table;
// start the test secuence
include( 'test.php' );

?>
