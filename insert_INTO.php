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
//получаем переменные из  createDBandTable.php
$nameDB = $_GET["nameDB"];
$nameTab = $_GET["nameTable"];
//
$dsn = "mysql:host=$servername;dbname=$nameDB";
if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["hireDate"])) {
    //connect to database
    try {
        $use_database = new PDO($dsn, $username, $password);
        $use_database->setAttribute(":ATTR_ERRMODE", ":ERRMODE_EXCEPTION");
    } catch (PDOException $myExcept) {
        echo "Подключение не удалось: <br/>" . $myExcept->getMessage();
    }
    //insert data
    $sql_useDB = "INSERT INTO  $nameTab (firstName, lastName, hireDate) VALUES ( :firstName, :lastName, :hireDate)";
    $pdo_statement = $use_database->prepare($sql_useDB);
    $pdo_statement->bindValue(":firstName", $_POST["firstName"]);
    $pdo_statement->bindValue(":lastName", $_POST["lastName"]);
    $pdo_statement->bindValue(":hireDate", $_POST["hireDate"]);
    $pdo_statement->execute();
}
$datetime = date("Y-m-d H:i:s", time());
$use_database = null;
?>
<form action="" method="post">
    <input type="text" name="firstName" placeholder="firstName" required><br/>
    <input type="text" name="lastName" placeholder="lastName" required><br/>
    <input type="text" name="hireDate"  required value="<?php echo $datetime; ?>"><br/>
    <input type="submit">
</form>