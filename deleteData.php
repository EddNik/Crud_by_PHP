<?php
/**
 * Created by PhpStorm.
 * User: eduard
 * Date: 26.11.17
 * Time: 8:36
 */

$servername = "localhost";
$nameDB = $_GET["nameDB"];
$nameTab = $_GET["nameTable"];
$dsn = "mysql:host=$servername;dbname=$nameDB";
    //connect to database
    try {
        $use_database = new PDO($dsn, "root", "edd_14235");
        $use_database->setAttribute(":ATTR_ERRMODE", ":ERRMODE_EXCEPTION");
    } catch (PDOException $myExcept) {
        echo "Подключение не удалось: <br/>" . $myExcept->getMessage();
    }
    try {
        //delete data
        $sql_useDB = "DELETE from  $nameTab WHERE id = :id";
        $pdo_statement = $use_database->prepare($sql_useDB);
        $pdo_statement->bindValue(":id", $_GET["id"]);
        $pdo_statement->execute();
    }catch (Exception $e){
        echo $e->getMessage();
    }
header("Location: index.php?nameDB=".$nameDB."&nameTable=".$nameTab);
$use_database = null;
?>