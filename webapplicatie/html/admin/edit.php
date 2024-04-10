<?php
require_once ('connectie.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql = "SELECT * FROM Gerechten WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $sql = "UPDATE Gerechten SET Gerechten = :Gerechten, Omschrijving = :Omschrijving, Prijs = :Prijs WHERE id = :id";
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':Gerechten', $_POST['Gerechten']);
    $stmt->bindParam(':Omschrijving', $_POST['Omschrijving']);
    $stmt->bindParam(':Prijs', $_POST['Prijs']);


    $stmt->execute();

 
    header('Location: admin.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


<!-- Display a form to allow the user to edit the data for the specified row -->
<form method="post" action="edit.php?id=<?php echo $id; ?>">
    <label for="Gerechten">Gerechten:</label>
    <input type="text" name="Gerechten" id="Gerechten" value="<?php echo ($result['Gerechten']); ?>" required>

    <label for="Omschrijving">Omschrijving:</label>
    <textarea name="Omschrijving" id="Omschrijving" required><?php echo ($result['Omschrijving']); ?></textarea>

    <label for="Prijs">Prijs:</label>
    <input type="number" name="Prijs" id="Prijs" step="0.01" value="<?php echo ($result['Prijs']); ?>" required>

    <input type="submit" value="Opslaan">
</form>