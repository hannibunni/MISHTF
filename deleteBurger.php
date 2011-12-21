<?php
    include('sqlConnection.php');
    $connection = new sqlConnection;
?>

<form action="deleteBurger.php" method="POST">
Choose the Burger you want to delete: <br>

<?php
    $burgers = mysql_query("select * from `Burger`;") or die (mysql_error());
?>

<select name="burger">
<?php
    while($burger = mysql_fetch_array($burgers)) {
        echo ('<option value="' . $burger["BName"] . '">' . 
            $burger["BName"] . '</option>');
    }    
?>
</select>

<input type="submit" value="delete">
</form>

<?php
    if(isset ($_POST["burger"])) {
        $burger = $_POST["burger"];
        $query  = "DELETE FROM `Burger` WHERE BName='$burger';";
        
        mysql_query($query) or die (mysql_error());
        
        echo ("'$burger' has been deleted!");
    }
?>

<form method="link" action="index.html">
<input type="submit" value="Back to Main">
</form>