<?php
    include('sqlConnection.php');
    $connection = new sqlConnection;
?>
<?php
 if (isset ($_POST["stylesheet"])) {
	 //echo $_POST["stylesheet"];
	 
	 $result = mysql_query("SELECT Waiter.WFirstName, Waiter.WLastName, Table.TID, Burger.BName, SideDishes.SName, Serve.STimeStamp FROM Waiter, `Table`, Burger, SideDishes, Serve WHERE Waiter.WID = Serve.WID AND Table.TID = Serve.TID AND Burger.BID = Serve.BID AND SideDishes.SID = Serve.SID") or die(mysql_error());
	 
	 //$result = mysql_query("SELECT * FROM `Table`") or die(mysql_error());

	  $body = '<?xml version="1.0" encoding="UTF-8" ?>
	  			<?xml-stylesheet type="text/xsl" href="'.$_POST['stylesheet'].'" ?>
				<serves>';
				
	  while($entry = mysql_fetch_array($result)) {
		  $body .= '<SERVE>
		  <WAITER>
		  	<FIRSTNAME>'.$entry['WFirstName'].'</FIRSTNAME>
			<LASTNAME>'.$entry['WLastName'].'</LASTNAME>
		  </WAITER>
		  <TABLE>
		  	<NUMBER>'.$entry['TID'].'</NUMBER>
		  </TABLE>
		  <BURGER>
		  	<BNAME>'.$entry['BName'].'</BNAME>
		  </BURGER>
		  <SIDEDISHES>
		  	<SNAME>'.$entry['SName'].'</SNAME>
		  </SIDEDISHES>
		  </SERVE>';
		  }
	$body .= '</serves>';
	$body = utf8_encode($body);
	
	@header("Content-Type: text/xml; charset=UTF-8");
	echo $body;
	exit();
	 } ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h1>Get all serves </h1>
<hr />
<p>Please select a Stylesheet and where to generate.</p>
<form id="form" name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <p>Stylesheet: 
 
  <select name="stylesheet" id="stylesheet" style="width:200px;">
  <option value="test">Please select a Stylesheet</option>
  <option value="stylesheet1.xsl">Stylesheet1</option>
  <option value="stylesheet1.xsl">Stylesheet2</option>
  </select>
    
    
  </p>
  <p><input type="submit"/></p>
</form>

<p>&nbsp;</p>

<hr />
<p><a href="index.html">Index</a></p>
</body>
</html>
