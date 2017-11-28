<?php
/**
 * Created by PhpStorm.
 * User: eduard
 * Date: 26.11.17
 * Time: 8:36
 */

$username = "root";
$password = "edd_14235";
$dsn = "mysql:host=localhost;dbname=employees";
    //connect to database
    try {
        $use_database = new PDO($dsn, $username, $password);
        $use_database->setAttribute(":ATTR_ERRMODE", ":ERRMODE_EXCEPTION");
    } catch (PDOException $myExcept) {
        echo "Подключение не удалось: <br/>" . $myExcept->getMessage();
    }
    try {
        //delete data
        $sql_useDB = "DELETE from  article WHERE id = :id";
        $pdo_statement = $use_database->prepare($sql_useDB);
        $pdo_statement->bindValue(":id", $_GET["id"]);
        $pdo_statement->execute();
    }catch (Exception $e){
        echo $e->getMessage();
    }
$use_database = null;
?>