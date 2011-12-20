
<?php
$username = "root";
$password = "";
$hostname = "localhost";
$dbh = mysql_connect($hostname, $username, $password)
	or die("Unable to connect to MySQL");
print "Connected to MySQL<br>";
?>

<form action="addBurger.php" method="get">

    What Burger you want to add? <br>
    name:
    <input type="text" name="bName"></input> <br>
    price:
    <input type="text" name="bPrice"></input> <br>
    <input type="submit" value="Submit"></input>

</form>

<?php
    
    $bName = $_GET["bName"];
    $bPrice = $_GET["bPrice"];
    
    if(strcmp($bName, "") && strcmp($bPrice, "")) {
        
        $myArray = array (
            'name' => "$bName",
            'price' => "$bPrice"
        );
        
        $query = "INSERT INTO `teest`.`burger` (`id`, `name`, `price`) VALUES (NULL, '$bName', '$bPrice');";
        mysql_query($query) or die (mysql_error());
        
        echo "You just fucking added a Burger called $myArray[name] for $myArray[price]";
        
        mysql_close($dbh);
    }

?>
