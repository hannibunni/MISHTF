<?php
    include('sqlConnection.php');
    $connection = new sqlConnection;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Add Burger</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>

        <h1>Add Burger</h1>
        <hr />
        <p>Please select a Stylesheet and where to generate.</p>

<form action="addBurger.php" method="POST">

    <p>What Burger you want to add? </p>
    <table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="128">Name:</td>
        <td width="472"><input type="text" name="bName"></input></td>
      </tr>
      <tr>
        <td>Price</td>
        <td><input type="text" name="bPrice"></input></td>
      </tr>
    </table>
    
    <input type="submit" value="Submit"></input>
</form>

<br>
<hr />
<br>

<?php
    if (isset ($_POST["bName"]) && $_POST["bPrice"]) {
        
        $bName  = $_POST["bName"];
        $bPrice = $_POST["bPrice"];
        $query  = "INSERT INTO `Burger` (`BID`, `BName`, `BPrice`)
                   VALUES (NULL, '$bName', '$bPrice');";
        
        mysql_query($query) or die (mysql_error());
        echo ("Burger $bName has been added to database");
    }
?>

<br />
<br>

<form method="link" action="index.html">
<input type="submit" value="Back to Main">
</form>

</body>
</html>
