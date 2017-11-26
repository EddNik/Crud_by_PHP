<?php
/**
 * Created by PhpStorm.
 * User: eduard
 * Date: 26.11.17
 * Time: 8:36
 */

$servername = "localhost";
$username = "root";
$password = "edd_14235";

/*// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Create database
$sql = "CREATE DATABASE test";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();*/
try {
    $pdo_conn = new PDO("mysql:host=$servername",    $username, $password);
    echo "Connection successful";
}
catch (PDOExeption $myexeption){
    //$myexeption = "UPS somthing wrong ";
    echo "Connection faild: " . $myexeption -> getMessage();
}

?>

/*<form action="" method="post">
    <input type="text" name="name" placeholder="name" required>
    <input type="text" name="description" placeholder="description" required>
    <input type="submit">
</form>*/
