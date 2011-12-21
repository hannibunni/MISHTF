<?php

include 'sqlConnection.php';
$connection = new sqlConnection;

?>

<form action="waiterStatistic.php" method="POST">
    
    Choose a waiter to see the statistic of the Burgers served by him<br>
    
    <?php
        
        $waiters = mysql_query("select * from Waiter") or die (mysql_error());
    
    ?>
    
    <select name="waiter">
            
          <?php
          
            while ($waiter = mysql_fetch_array($waiters)) {
                if ($_POST["waiter"] == $waiter["WID"]) {
                    echo '<option selected = yes value = "' . $waiter["WID"] . '"> '
                            . $waiter["WLastName"] . " " . $waiter["WFirstName"] . '</option>';
                }
                else {
                    echo '<option value = "' . $waiter["WID"] . '"> '
                            . $waiter["WLastName"] . " " . $waiter["WFirstName"] . '</option>';
                }
            }
          
          ?>
            
    </select>
    
    <?php
    
        if (isset ($_POST["smokertable"]))
            echo '<input type="checkbox" name="smokertable" checked> Smoker Table';
        else
            echo '<input type="checkbox" name="smokertable">';
    ?>
    <br>
    <input type="submit">
    
</form>

<?php

    if (isset ($_POST["waiter"])) {
        $wid = $_POST["waiter"];
        
        if (isset($_POST["smokertable"])) 
            $smoker = 1;
        else
            $smoker = 0;
            
        
        $result = mysql_query("SELECT * FROM Burger WHERE BID IN 
                                (SELECT BID FROM Serve WHERE WID = $wid AND TID IN 
                                    (SELECT TID FROM  `Table` WHERE TSmoker = $smoker AND TID IN 
                                        (SELECT TID FROM Serve WHERE WID = $wid)))");
                   
        while ($burger = mysql_fetch_array($result)) {
            echo $burger["BName"]; ?><br><?php
        }        
    }

?>
<br>
<form method="link" action="index.html">
<input type="submit" value="Back to Main">
</form>