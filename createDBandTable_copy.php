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

echo "Enter, please, your Database name and its description:";

if (isset($_POST["nameDB"]) && isset($_POST["nameTable"])) {
    //connect to MySQL and create database
    $databaseName = $_POST["nameDB"];
    $tableName = $_POST["nameTable"];

    $pdo_conn = new PDO("mysql:host=$servername", $username, $password);
    $sql_createDB = "CREATE DATABASE " .$_POST["nameDB"];
    $pdo_statement = $pdo_conn->prepare($sql_createDB);
    $pdo_statement->bindValue(":database_name", $databaseName);
    $pdo_statement->execute();

    //connect to database and create table
    $use_database = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $password);
    $sql_createTable = "CREATE TABLE  $tableName (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,lastname VARCHAR(30) NOT NULL,hire_Date TIMESTAMP)";
    $pdo_statement = $use_database->prepare($sql_createTable);
    $pdo_statement->execute();

}
$datetime = date("Y-m-d H:i:s", time());
$use_database = null;
$pdo_conn = null;
?>
<form action="" method="post">
    <input type="text" name="nameDB" placeholder="name of database" required><br/>
    <input type="text" name="nameTable" placeholder="name of table" required><br/>
    <br/><input type="submit">
</form>