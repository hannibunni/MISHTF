<?php
    include('sqlConnection.php');
    $connection = new sqlConnection;
?>

<form action="getBurgers.php" method="POST">
Choose the waiter and the table to get all Burgers 
which got served to this table by your chosen waiter <br>

<?php
    
    $waiters = mysql_query("select * from `Waiter`") or die(mysql_error());
    $tables = mysql_query("SELECT * from `Table`") or die(mysql_error());
    
?>

<select name="waiter">
    <?php
        while($waiter = mysql_fetch_array($waiters)) {
            if ($_POST["waiter"] == $waiter["WID"]) {
                echo '<option selected = yes value="' . $waiter["WID"] . '">' .
                    $waiter["WLastName"] . " " . $waiter["WFirstName"] . '</option>';
            }
            else {
                echo '<option value="' . $waiter["WID"] . '">' .
                    $waiter["WLastName"] . " " . $waiter["WFirstName"] . '</option>';
            }
        }
    
    ?>
    
    
</select>
<select name="table">
    <?php
    
        while($table = mysql_fetch_array($tables)) {
            if ($_POST["table"] == $table["TID"]) {
                echo '<option selected = yes value="' . $table["TID"] . '">' . "Table Number: " .
                    $table["TID"] . '</option>';
            }
            else {
                echo '<option value="' . $table["TID"] . '">' . "Table Number: " .
                    $table["TID"] . '</option>'; 
            }
            
        }
    
    ?>
    
</select>
<input type="submit">
</form>

<?php

    if (isset ($_POST["waiter"]) && isset ($_POST["table"])) {
        $wid = $_POST["waiter"];
        $tid = $_POST["table"];
        $waiter = mysql_query("select * from Waiter where WID = $wid");
        $name = mysql_fetch_object($waiter); 
        
        $result = mysql_query("select BName from Burger where BID in 
                                    (select BID from Serve where WID = $wid and TID = $tid)");
        
        while ($burger = mysql_fetch_array($result)) {
            echo $burger["BName"] . " at table " . $tid . " by " 
                    . $name->WFirstName . " " . $name->WLastName; ?><br><?php
        } 

    }

?>

<form method="link" action="index.html">
<input type="submit" value="Back to Main">
</form>