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

echo "Insert data";

if (isset($_POST["id"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["hireDate"])) {
    //connect to database
    $use_database = new PDO("mysql:host=$servername;dbname=test", $username, $password);
    //insert data
    $sql_useDB = "INSERT INTO test (id, firstName, lastName, hireDate) VALUES ( :id, :firstName, :lastName, :hireDate)";

    $pdo_statement = $use_database->prepare($sql_useDB);
    $pdo_statement->bindValue(":id", $_POST["id"]);
    $pdo_statement->bindValue(":firstName", $_POST["firstName"]);
    $pdo_statement->bindValue(":lastName", $_POST["lastName"]);
    $pdo_statement->bindValue(":hireDate", $_POST["hireDate"]);
    $pdo_statement->execute();
}
$datetime = date("Y-m-d H:i:s", time());
$use_database = null;
?>

<form action="" method="post">
    <input type="text" name="id" placeholder="id_person" required><br/>
    <input type="text" name="firstName" placeholder="firstName" required><br/>
    <input type="text" name="lastName" placeholder="lastName" required><br/>
    <input type="text" name="hireDate"  required value="<?php echo $datetime; ?>"> hire date
    <br/><input type="submit">
</form>