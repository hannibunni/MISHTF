<?php
    include('sqlConnection.php');
    $connection = new sqlConnection;
    
    if (isset ($_POST["stylesheet"]) && 
        isset ($_POST["generate"])   && 
        ($_POST["stylesheet"] != "nostylesheet") &&
        ($_POST["generate"]   != "nogenerator")) {
	 
        $result = mysql_query("SELECT Waiter.WFirstName, Waiter.WLastName, Table.TID, Table.TSmoker, 
                              Burger.BName, SideDishes.SName, SalesSlip.STimeStamp FROM `Waiter`, `Table`, 
                              `Burger`, `SideDishes`, `SalesSlip` WHERE Waiter.WID = SalesSlip.WID 
                              AND Table.TID = SalesSlip.TID AND Burger.BID = SalesSlip.BID 
                              AND SideDishes.SID = SalesSlip.SID") or die(mysql_error());

        $body = '<?xml version="1.0" encoding="UTF-8" ?>
	  			<?xml-stylesheet type="text/xsl" href="'.$_POST['stylesheet'].'" ?>
				<serves>';
				
        while($entry = mysql_fetch_array($result)) {
            $body .= '<SERVE>
            <WAITER>
                <FIRSTNAME>'.$entry['WFirstName'].'</FIRSTNAME>
                <LASTNAME>'. $entry['WLastName'].'</LASTNAME>
            </WAITER>
            <TABLE>
                <NUMBER>'.$entry['TID'].'</NUMBER>
                <SMOKE>'. $entry['TSmoker'].'</SMOKE>
            </TABLE>
            <BURGER>
                <BNAME>'. $entry['BName'].'</BNAME>
            </BURGER>
            <SIDEDISHES>
                <SNAME>'. $entry['SName'].'</SNAME>
            </SIDEDISHES>
            </SERVE>';
        }

        $body .= '</serves>';
        $body = utf8_encode($body);
	
        if(($_POST["generate"] == "server")) {

            # LOAD XML FILE
            $dom_content = new DOMDocument();
            $dom_content->loadXML($body);
		
            # START XSLT
            $processor = new XsltProcessor();
            $dom_stylesheet = new DomDocument();
            $dom_stylesheet->load($_POST['stylesheet']);
            $processor->importStylesheet($dom_stylesheet);	
		
            # PRINT
            @header("Content-Type: text/html; charset=UTF-8");
            echo  $processor->transformToXml($dom_content);
        }
	
        if(($_POST["generate"] == "client")) {
            @header("Content-Type: text/xml; charset=UTF-8");
            echo $body;
		}
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
        <h1>Get  serves </h1>
        <hr />
        <p>Please select a Stylesheet and where to generate.</p>
        <form id="form" name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table width="600" border="0">
                <tr>
                    <td>Stylesheet: </td>
                    <td>
                        <select name="stylesheet" id="stylesheet" style="width:300px;">
                            <option value="nostylesheet">Please select a stylesheet</option>
                            <option value="stylesheet1.xsl">Stylesheet1 - all tables</option>
                            <option value="stylesheet2.xsl">Stylesheet2 - smoking allowed</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Generate: </td>
                    <td>
                        <select name="generate" id="generate" style="width:300px;">
                            <option value="nogenerator">Please select where to generate</option>
                            <option value="server">Server</option>
                            <option value="client">Client</option>    
                        </select>
                    </td>
                </tr>
            </table>
            <p><input type="submit"/></p>
        </form>
    
        <p>&nbsp;</p>
        <hr />
        <p><a href="index.html">Index</a></p>
    </body>
</html>
