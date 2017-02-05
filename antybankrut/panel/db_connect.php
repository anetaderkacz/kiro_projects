<?php

@error_reporting(E_ALL ^ E_NOTICE);

$db_function_typ="mysqli";

include_once("include/db_function.php");

//Host - login - hasło - nazwa bazy danych
$db_connect = db_connect("localhost", "mergi_admin", "Srebrny@13","mergi_antybankrut",3306);

db_query("SET CHARACTER SET utf8");

//Prefix tabel
$pre="ban_";

//Do zmienej install nalezy podac "ok" gdy skrypt jest zainstalowany
$install="ok";

include_once("include/safe.php");

?>