<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" 
  xmlns="http://www.w3.org/1999/xhtml" 
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
  xmlns:fo="http://www.w3.org/1999/XSL/Format">
  
<xsl:output method="xml" encoding="UTF-8" 
  doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" 
  doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" 
  indent="yes"/>

<xsl:template match="/">
	<html xml:lang="en" lang="en">
		<head>
			<title>ALL SERVES</title>
		</head>
		<body>
        <p>Stylesheet 2 - Just the table where smoking is allowed.</p>
			<table border="1">
				<tr>
					<td><strong>Waiter</strong></td>
					<td><strong>Table</strong></td>
					<td><strong>Burger</strong></td>
					<td><strong>SideDishes</strong></td>
				</tr>  
				<xsl:for-each select="serves/SERVE">
                <xsl:if test="TABLE/SMOKE &gt; 0">
					<tr>
						<td><xsl:value-of select="WAITER/LASTNAME"/>&#160;<xsl:value-of select="WAITER/FIRSTNAME" /></td>
						<td><xsl:value-of select="TABLE/NUMBER" /></td>
						<td><xsl:value-of select="BURGER/BNAME"/></td>
						<td><xsl:value-of select="SIDEDISHES/SNAME" /></td>
					</tr>
                    </xsl:if>
				</xsl:for-each>
			</table>
		</body>
	</html>
</xsl:template>
</xsl:stylesheet>
