<?php
    include 'sqlConnection.php';
    $connection = new sqlConnection;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Get Waiter Statistic</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>

        <h1>Get Waiter Statistic</h1>
        <hr />
        <p>Choose a waiter to see the statistic of the Burgers served by him.</p>
        <br>

<form action="waiterStatistic.php" method="POST">
  <table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="125">Waiter:</td>
    <td width="475"><?php        
    $waiters = mysql_query("select * from Waiter") or die (mysql_error());
?>
    
<select name="waiter">            
    <?php
        while ($waiter = mysql_fetch_array($waiters)) {
            if ($_POST["waiter"] == $waiter["WID"]) {
                echo '<option selected = yes value = "' . $waiter["WID"] . '"> ' . 
                      $waiter["WLastName"] . " " . $waiter["WFirstName"] . '</option>';
            } else {
                echo '<option value = "' . $waiter["WID"] . '"> ' . 
                      $waiter["WLastName"] . " " . $waiter["WFirstName"] . '</option>';
            }
        }
    ?>
</select></td>
  </tr>
  <tr>
    <td>Smoker Table:</td>
    <td><?php
    if (isset ($_POST["smokertable"]))
        echo '<input type="checkbox" name="smokertable" checked>';
    else
        echo '<input type="checkbox" name="smokertable">';
?></td>
  </tr>
</table>
    

    


<br>
<input type="submit">

        <br>
        <hr />
        <br>
        
</form>

<?php
    if (isset ($_POST["waiter"])) {
        $wid = $_POST["waiter"];
        
        if (isset($_POST["smokertable"])) 
            $smoker = 1;
        else
            $smoker = 0;
            
        $result = mysql_query("SELECT * FROM Burger WHERE BID IN 
                                (SELECT BID FROM `SalesSlip` WHERE WID = $wid AND TID IN 
                                    (SELECT TID FROM  `Table` WHERE TSmoker = $smoker AND TID IN 
                                        (SELECT TID FROM `SalesSlip` WHERE WID = $wid)))");
        
        if (mysql_num_rows($result) == 0)
            echo "No entries for the selected values found";
                   
        while ($burger = mysql_fetch_array($result)) {
            echo $burger["BName"]; ?><br><?php
        }        
    }
?>
<br />
<br />
<form method="link" action="index.html">
<input type="submit" value="Back to Main">
</form>
</body>
</html>
