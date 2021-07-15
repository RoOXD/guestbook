<?php

$dbconn = pg_connect("host=localhost port=5432 dbname=guestbook user=postgres");

$name = $_POST['name'];
$note = $_POST['note'];

if(ctype_alnum($name)||ctype_alnum($note)){
	$query = pg_query($dbconn, "INSERT INTO guestbook (author, notes) VALUES ('$name','$note')");
	if ( $query ) {
	    echo  "Adaugat!";
	}else{
		echo "Esec!";
	}
}else {echo "Caractere nepermise!";}
?>
