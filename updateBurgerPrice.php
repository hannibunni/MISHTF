<?php
    include('sqlConnection.php');
    $connection = new sqlConnection;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Update Burger Price</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>

        <h1>Update Burger Price</h1>
        <hr />
        <p>Select a burger to change its price.</p>
        <br>
<form action="updateBurgerPrice.php" method="POST">
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="125">Burger:</td>
    <td width="475"><?php
    $burgers = mysql_query("select * from `Burger`;") or die (mysql_error());
?>
      <select name="burger" onchange="this.form.submit()">
        <?php 
if (!isset($_POST["burger"])) {   
?>
        <option>-</option>
        <?php } ?>
        <?php
    while($burger = mysql_fetch_array($burgers)) {
        if ($_POST["burger"] == $burger["BID"]) {
            echo ('<option selected value="' . $burger["BID"] . '">' . 
                $burger["BName"] . '</option>');
        }
        else {
            echo ('<option value="' . $burger["BID"] . '">' . 
                $burger["BName"] . '</option>'); 
        }
    } 
?>
      </select></td>
  </tr>
</table>
</form>

<?php 
if (!isset($_POST["burger"]) && !isset($_POST["updatePrice"])) {   
?>
<br />        <br>
        <hr />
        <br>
<form method="link" action="index.html">
  <input type="submit" value="Back to Main">
</form>
<?php } ?>

<?php

    if (!isset($_POST["burger"]) && !isset($_POST["updatePrice"]))
        return;
    
    if (!isset($_POST["updatePrice"])){
        $bid = $_POST["burger"];
        $result = mysql_query("select * from `Burger` where BID = $bid");
        $price = mysql_fetch_array($result);
        echo $price["BName"] . " currently is " . $price["BPrice"] . "$";  
    }
    
?>

<br>
<br>
<form action="updateBurgerPrice.php" method="POST">
    If you want to change the price of the currently selected Burger enter the new value here
    <br>
    <?php
   
    $bid = $_POST["burger"];
    
    echo '<input type="hidden" name="burger" value="'.$bid.'">';
    
    ?>
    Price [0-99]<input type="text" name="updatePrice"></input> <br>
    <br />
    <input type="submit" value="update">
</form>

<?php

    if (isset($_POST["updatePrice"])) {
        $newPrice = $_POST["updatePrice"];
        $bid = $_POST["burger"];
        $result = mysql_query("select * from `Burger` where BID = $bid");
        $name = mysql_fetch_array($result);
        
        if (is_numeric($newPrice) && $newPrice >=0 && $newPrice <= 99) {
            mysql_query("UPDATE `Burger` SET BPrice='$newPrice' WHERE BID=$bid");
            echo"Changed the price of " . $name["BName"] . " to " . $newPrice . "$"; 
        }
        else {
            echo "Please enter the price as an integer value [0-99]";
        }
    }
        

?>
        <br>
        <hr />
        <br>
<form method="link" action="index.html">
<input type="submit" value="Back to Main">
</form>

</body>
</html>