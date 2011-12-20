<?php
    include('sqlConnection.php');
    $connection = new sqlConnection;
?>

<form action="addBurger.php" method="POST">

    What Burger you want to add? <br>
    name:
    <input type="text" name="bName"></input> <br>
    price:
    <input type="text" name="bPrice"></input> <br>
    <input type="submit" value="Submit"></input>

</form>

<?php

    if (isset ($_POST["bName"]) && $_POST["bPrice"]) {
        
        $bName = $_POST["bName"];
        $bPrice = $_POST["bPrice"];
        $query = "INSERT INTO `BURGER_HOUSE`.`Burger` (`BID`, `BName`, `BPrice`)
                  VALUES (NULL, '$bName', '$bPrice');";
        
        mysql_query($query) or die (mysql_error());
        echo ("Burger $bName has been added to database");
    }
?>

<form method="link" action="index.html">
<input type="submit" value="Back to Main">
</form>