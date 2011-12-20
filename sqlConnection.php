<?php

    class sqlConnection {
        
        function __construct() {
            $dbname = "HOUSE_OF_BURGER";
            $username = "root";
            $password = "";
            $hostname = "localhost";
            $dbh = mysql_connect($hostname, $username, $password)
            or die("Unable to connect to MySQL");
            mysql_select_db($dbname);
            print "Connected to MySQL<br>";
        }
        function __destruct() {
            mysql_close();
        }
    }

?>
