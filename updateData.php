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

if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["hireDate"])) {
    //connect to database
    try {
        $use_database = new PDO($dsn, $username, $password);
        $use_database->setAttribute(":ATTR_ERRMODE", ":ERRMODE_EXCEPTION");
    } catch (PDOException $myExcept) {
        echo "Подключение не удалось: <br/>" . $myExcept->getMessage();
    }

    $arr = $use_database->errorInfo();
    print_r($arr);
    try {
        //insert data
        $sql_useDB = "UPDATE article SET firstName = :firstName, lastName = :lastName, hireDate = :hireDate WHERE id = :id";
        //$sql_useDB = "UPDATE article SET firstName = :firstName, lastName = :lastName, hireDate = :hireDate WHERE id = 2";

        $pdo_statement = $use_database->prepare($sql_useDB);
        $pdo_statement->bindValue(":id", $_GET["id"]);
        $pdo_statement->bindValue(":firstName", $_POST["firstName"]);
        $pdo_statement->bindValue(":lastName", $_POST["lastName"]);
        $pdo_statement->bindValue(":hireDate", $_POST["hireDate"]);
        $pdo_statement->execute();

    }catch (Exception $e){
        echo $e->getMessage();
    }
    $arr = $pdo_statement->errorInfo();
print_r($arr);
}
$datetime = date("Y-m-d H:i:s", time());
$use_database = null;

?>
<!--<form action="updateData.php?id=--><?php //echo $_GET["id"] ?><!--" method="post">-->
    <form action="updateData.php" method="post">
    <input type="text" name="firstName" placeholder="firstName" required><br/>
    <input type="text" name="lastName" placeholder="lastName" required><br/>
    <input type="text" name="hireDate"  required value="<?php echo $datetime; ?>"><br/>
<!--    <input type="hidden" name="id" value="--><?php //echo $_GET["id"] ?><!--">-->
    <input type="submit">
</form>