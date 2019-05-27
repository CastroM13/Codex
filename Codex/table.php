<?php
// Connect to mssql server
$handle = mssql_connect($SRV-BD-1, $q118_a, $q118ta) or die("Cannot connect to server");

// Select a database
$db = mssql_select_db($BIBLIOTECA, $sqlsrv) or die("Cannot select database"); 

// Execute a query
$query = "SELECT * FROM TB_Usuarios";
$result = mssql_query($query);

// Iterate over results<br />
while($row = mssql_fetch_array($result)) {
    echo $row["id"];
}
?>