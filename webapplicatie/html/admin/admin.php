<?php
include_once("connectie.php");
include_once("header.php")
/**
 * @var PDO $pdo
 */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gerechten</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    
</head>
<body>
<div>
    <button class="button" type="button" onclick="location.href='add_gerecht.php';">Voeg een Gerecht toe</button>
</div>
</body>
</form>
</html>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Gerechten</th>
            <th>Omschrijving</th>
            <th>Prijs</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
        </tr>
    </thead>
    <tbody>
<?php
$sql = "SELECT * FROM Gerechten";
$stmt = $pdo->prepare($sql);
$stmt->execute();
while($result = $stmt->fetch()){
    echo "<tr>"
    ."<td>" . $result['id'] . "</td>"
    ."<td>" . $result['Gerechten'] . "</td>"
    ."<td>" . $result['Omschrijving'] . "</td>"
    ."<td>" ."€ " . $result['Prijs'] . "</td>"
    ."<td><a href='edit.php?id=" . $result['id'] . "'>Bewerken</a></td>"
    ."<td><a href='remove.php?id=" . $result['id'] . "' onclick=\"return confirm('Are you sure you want to delete this dish?')\">Verwijderen</a></td>"
    ."</tr>"
    ;
}
?>
</tbody>
</table>
</body>
</html>
