<?php 

$dbconn = pg_connect("host=localhost port=5432 dbname=guestbook user=postgres");
$result = pg_query($dbconn, "SELECT * FROM guestbook");
if (!$result) {
  echo "An error occurred.\n";
  exit;
}

echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";
pg_free_result($result);
pg_close($dbconn);

?>
<html>
<body>
<p>Formular pentru adaugarea unei intrari in baza de date. Introduceti datele necesare si apasati Trimite.</p>
<form action="action.php" method="post">
Numele autorului: <input type="text" name="name"><br>
Notite: <input type="text" name="note" value="Optional"><br>
<input type="submit" name="submit" value="Trimite">
</form>

</body>
</html>
