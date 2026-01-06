<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
<html>
<body>

<h2>Trainees List</h2>

<table border="1">
<tr>
<th>Name</th>
<th>Email</th>
<th>Workshop</th>
<th>Action</th>
</tr>

<xsl:for-each select="trainees/trainee">
<tr>
<td><xsl:value-of select="name"/></td>
<td><xsl:value-of select="email"/></td>
<td><xsl:value-of select="workshop"/></td>
<td>
<form method="post" action="delete.php">
<input type="hidden" name="index" value="{position()-1}"/>
<input type="submit" value="Delete"/>
</form>
</td>
</tr>
</xsl:for-each>

</table>

<h3>New Trainee</h3>

<form method="post" action="insert.php">
<input type="text" name="name" placeholder="name"/>
<input type="text" name="email" placeholder="email"/>
<input type="text" name="workshop" placeholder="workshop"/>
<input type="submit" value="Add"/>
</form>

</body>
</html>
</xsl:template>

</xsl:stylesheet>