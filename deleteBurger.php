<?php
    include('sqlConnection.php');
    $connection = new sqlConnection;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Delete Burger</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>

        <h1>Delete Burger</h1>
        <hr />
        <p>Choose the Burger you want to delete:</p>
         <br>

<form action="deleteBurger.php" method="POST">


<?php
    if(isset ($_POST["burger"])) {
        $burger = $_POST["burger"];
        $query  = "DELETE FROM `Burger` WHERE BName='$burger';";
        
        mysql_query($query) or die (mysql_error());
    }
    
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
<br>
<hr />
<br>
<?php
    if(isset ($_POST["burger"])) {
        $burger = $_POST["burger"];
        
        echo ("'$burger' has been deleted!");
    }
?>
<br />
<br />

<form method="link" action="index.html">
  <input type="submit" value="Back to Main">
</form>
</body>
</html>
