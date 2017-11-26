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

if (isset($_POST["id"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["hireDate"])) {
    //connect to MySQL and create database
    $databaseName = $_POST["nameDB"];
    $pdo_conn = new PDO("mysql:host=$servername", $username, $password);
    $sql_createDB = "CREATE DATABASE " .$_POST["nameDB"];
    $pdo_statement = $pdo_conn->prepare($sql_createDB);
    $pdo_statement->bindValue(":database_name", $databaseName);
    $pdo_statement->execute();


    $use_database = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $password);
    $sql_createTable = "CREATE TABLE `listEmployees` (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,lastname VARCHAR(30) NOT NULL,hire_Date TIMESTAMP)";
    $pdo_statement = $use_database->prepare($sql_createTable);
    $pdo_statement->execute();


    $sql_useDB = "INSERT INTO listEmployees (id, firstName, lastName, hireDate) VALUES ( :id, :firstName, :lastName, :hireDate)";

    $pdo_statement = $use_database->prepare($sql_useDB);
    $pdo_statement->bindValue(":id", $_POST["id"]);
    $pdo_statement->bindValue(":firstName", $_POST["firstName"]);
    $pdo_statement->bindValue(":lastName", $_POST["lastName"]);
    $pdo_statement->bindValue(":hireDate", $_POST["hireDate"]);
    $pdo_statement->execute();
}
$datetime = date("Y-m-d H:i:s", time());
$use_database = null;
$pdo_conn = null;
?>

<form action="" method="post">
    <input type="text" name="nameDB" placeholder="name of database" required><br/>
    <input type="text" name="id" placeholder="id_person" required><br/>
    <input type="text" name="firstName" placeholder="firstName" required><br/>
    <input type="text" name="lastName" placeholder="lastName" required><br/>
    <input type="text" name="hireDate"  required value="<?php echo $datetime; ?>"> hire date
    <br/><input type="submit">
</form>