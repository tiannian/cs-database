<?php

define("SQL_TYPE","pgsql");
define("SQL_HOST","db");
define("SQL_PORT","5432");
define("SQL_USERNAME","postgres");
define("SQL_PASSWORD","postgres");
define("SQL_DATABASE","htu");

define("SQL_INFO",SQL_TYPE . ":".
            "host=" . SQL_HOST .
            ";port=" . SQL_PORT .
            ";dbname=" . SQL_DATABASE);
            
function pdo_init(){
    return new PDO(SQL_INFO, SQL_USERNAME, SQL_PASSWORD, array(
        PDO::ATTR_PERSISTENT => true
    ));
}
?>