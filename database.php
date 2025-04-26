<?php
$host = "localhost";
$port = "5432";
$dbname = "smart_home";
$user = "postgres";
$password = "Cruturov";

$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
$dbconn = pg_connect($conn_string);

if (!$dbconn) {
    die("Eroare: Nu se poate conecta la baza de date PostgreSQL!");
}
?>
