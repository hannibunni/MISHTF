<?php
    class sqlConnection {
        function __construct() {
            $dbname = "BEST_BURGERS";
            $username = "root";
            $password = "";
            $hostname = "localhost";
        
            $dbh = mysql_connect($hostname, $username, $password)
                     or die("Unable to connect to MySQL");
        
            mysql_select_db($dbname);
        }
        function __destruct() {
            mysql_close();
        }
    }
?>
