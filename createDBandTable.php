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
$databaseName = $_POST["nameDB"];
$tableName = $_POST["nameTable"];

if (isset($_POST["nameDB"]) && isset($_POST["nameTable"])) {
    //connect to MySQL and create database
    $pdo_conn = new PDO("mysql:host=$servername", $username, $password);
    $sql_createDB = "CREATE DATABASE " .$_POST["nameDB"];
    $pdo_statement = $pdo_conn->prepare($sql_createDB);
    $pdo_statement->bindValue(":database_name", $databaseName);
    $pdo_statement->execute();

    //connect to database and create table
    $use_database = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $password);
    $sql_createTable = " CREATE TABLE $tableName (id int(11) NOT NULL AUTO_INCREMENT,
 firstName varchar(255) CHARACTER SET utf8 NOT NULL,lastName text CHARACTER SET utf8 NOT NULL,
 hireDate datetime NOT NULL, PRIMARY KEY (id)) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
";
    $pdo_statement = $use_database->prepare($sql_createTable);
    $pdo_statement->execute();
    //перенаправляем на следующую страницу передавая две переменные
    header("Location: insert_INTO.php?nameDB=".$_POST["nameDB"]."&nameTable=".$_POST["nameTable"]);
}
$datetime = date("Y-m-d H:i:s", time());
$use_database = null;
$pdo_conn = null;
?>
<form action="" method="post">
    <input type="text" name="nameDB" placeholder="nameDB" required><br/>
    <input type="text" name="nameTable" placeholder="nameTable" required><br/>
    <input type="submit" value="create db and table"><br/>
<!--    <input type="submit" formaction="insert_INTO.php" value="redirect to table"><br/>-->
</form>