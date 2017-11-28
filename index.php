<?php
$nameDB = $_GET["nameDB"];
$nameTab = $_GET["nameTable"];
$db = $nameDB;
$tab = $nameTab;
try {
$pdo = new PDO("mysql:host=localhost;dbname=$nameDB", "root", "edd_14235");
} catch (PDOException $myExcept) {
    echo "Подключение не удалось: <br/>" . $myExcept->getMessage();
}
$sql = "SELECT * FROM $nameTab";
$pdo_statement = $pdo->prepare($sql);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>
<table border="1px">
    <td>
        <a href="createDBandTable.php">Create DB/ connect to it</a>
    </td>
    <td>
        <a href="insert_INTO.php?nameDB=<?php echo $db."&nameTable=".$tab;?>">Insert data</a>
    </td>
    <?php
    foreach ($result as $element) { ?>
        <tr>
            <td> <?php echo $element['firstName']; ?>  </td>
            <td> <?php echo $element['lastName']; ?></td>
            <td> <?php echo $element['hireDate']; ?> </td>
            <td>
                <a href="updateData.php?id=<?php echo $element['id']."&nameDB=".$db."&nameTable=".$tab;?>">Update</a>
            </td>
            <td>
                <a href="deleteData.php?id=<?php echo $element['id']."&nameDB=".$db."&nameTable=".$tab;?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
