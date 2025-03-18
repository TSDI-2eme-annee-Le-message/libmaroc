<?php
$host = 'localhost';
$dbname = 'maroclib';
$username = 'root';
$password = 'Toor@1234';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
?>
