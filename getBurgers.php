<?php
    include('sqlConnection.php');
    $connection = new sqlConnection;
?>

<form action="getBurgers.php" method="POST">
Choose the waiter and the table to get all Burgers 
which got served to this table by your chosen waiter <br>

<?php
    
    $waiters = mysql_query("select * from `Waiter`") or die(mysql_error());
    $tables = mysql_query("SELECT * FROM `Table`") or die(mysql_error());
    
?>

<select name="waiter">
    <option>-</option>
    <?php
    
        while($waiter = mysql_fetch_array($waiters)) {
            echo '<option value="' . $waiter["WID"] . '">' .
                  $waiter["WLastName"] . ", " . $waiter["WFirstName"] . '</option>';
        }
    
    ?>
    
    
</select>
<select name="table">
    <option>-</option>
    <?php
    
        while($table = mysql_fetch_array($tables)) {
            echo '<option value="' . $table["TID"] . '">' . "Table Number: " .
                  $table["TID"] . '</option>';
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
        
        echo ("To the table number $tid our waiter $name->WFirstName 
               $name->WLastName served ");
        
        while ($burger = mysql_fetch_array($result)) {
            echo $burger["BName"] . " | ";
        }
    }

?>

<form method="link" action="index.html">
<input type="submit" value="Back to Main">
</form>