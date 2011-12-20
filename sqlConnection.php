<?php

    class sqlConnection {
        
        function __construct() {
            $username = "root";
            $password = "";
            $hostname = "localhost";
            $dbh = mysql_connect($hostname, $username, $password)
            or die("Unable to connect to MySQL");
            print "Connected to MySQL<br>";
        }
        function __destruct() {
            mysql_close();
        }
    }

?>
