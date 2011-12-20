<?php
    include('sqlConnection.php');
    $connection = new sqlConnection;
?>

<form action="getBurgers.php" method="POST">
Choose the waiter and the table to get all Burgers 
which got served to this table by your chosen waiter <br>

<?php
    
    $waiters = mysql_query("select * from BURGER_HOUSE.Waiter") or die(mysql_error());
    $tables = mysql_query("select * from BURGER_HOUSE.Table") or die(mysql_error());
    
?>

<select name="waiter">
    
    <?php
    
        while($waiter = mysql_fetch_array($waiters)) {
            echo '<option value="' . $waiter["WID"] . '">' .
                  $waiter["WLastName"] . ", " . $waiter["WFirstName"] . '</option>';
        }
    
    ?>
    
    
</select>
<select name="table">
    
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
        $waiter = mysql_query("select * from BURGER_HOUSE.Waiter where WID = wid");
        $name = mysql_fetch_object($waiter);
        $table = $_POST["table"];
        $burgers = mysql_query("select * from BURGER_HOUSE.Serve where TID = $tid and WID = $wid");
        
        
        echo ("To the table number $table our waiter $name->WFirstName 
               $name->WLastName served ");
        
        while ($burger = mysql_fetch_array($burgers)) {
            $temp = mysql_query("select BName from BURGER_HOUSE.Burger where BID = $burger");
            echo $temp;
        }      
    }

?>

<form method="link" action="index.html">
<input type="submit" value="Back to Main">
</form>