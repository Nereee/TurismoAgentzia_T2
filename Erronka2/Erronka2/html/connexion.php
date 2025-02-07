<?php

// Datu baserako konexioko parametroak
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_bidai_agentzia";

// Konexioa egin
$conn = new mysqli($servername, $username, $password, $dbname);

// Konexioa egiaztatu
if ($conn->connect_error) {
    die("Fallo en la conexión: " . $conn->connect_error);
}
