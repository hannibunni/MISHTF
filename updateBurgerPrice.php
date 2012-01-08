<?php
    include('sqlConnection.php');
    $connection = new sqlConnection;
?>

<form action="updateBurgerPrice.php" method="POST">
Select a burger to change its price: <br>

<?php
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
</select>
</form>

<?php 
if (!isset($_POST["burger"]) && !isset($_POST["updatePrice"])) {   
?>
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
    <input type="text" name="updatePrice"></input> <br>
    <input type="submit" value="update">
</form>

<?php

    if (isset($_POST["updatePrice"])) {
        $newPrice = $_POST["updatePrice"];
        $bid = $_POST["burger"];
        $result = mysql_query("select * from `Burger` where BID = $bid");
        $name = mysql_fetch_array($result);
        
        if (is_numeric($newPrice)) {
            mysql_query("UPDATE `Burger` SET BPrice='$newPrice' WHERE BID=$bid");
            echo"Changed the price of " . $name["BName"] . " to " . $newPrice . "$"; 
        }
        else {
            echo "Please enter the price as an integer value";
        }
    }
        

?>

<form method="link" action="index.html">
<input type="submit" value="Back to Main">
</form>

