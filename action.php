<?php

$dbconn = pg_connect("host=localhost port=5432 dbname=guestbook user=postgres");

$name = htmlspecialchars($_POST['name'],ENT_QUOTES);
$note = htmlspecialchars($_POST['note'],ENT_QUOTES);

$query = pg_query_params($dbconn, 'INSERT INTO guestbook (author, notes) VALUES ($1,$2)', array($name,$note));
if ( $query ) {
          echo  "Adaugat!";
      }else{
              echo "Esec!";
      }

?>
