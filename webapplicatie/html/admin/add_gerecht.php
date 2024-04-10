<?php
ob_start();
include_once('connectie.php'); 
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
<?php
// Make sure to include the correct file

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $gerecht = $_POST['gerecht'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO Gerechten (Gerechten, Omschrijving, Prijs) VALUES (:gerecht, :omschrijving, :prijs)";
    $stmt = $pdo->prepare($sql);
    
    // Execute the query
    if ($stmt->execute([
        ':gerecht' => $gerecht,
        ':omschrijving' => $omschrijving,
        ':prijs' => $prijs
    ])) {
        // Redirect back to the admin panel
        header('Location: admin.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $pdo->errorInfo()[2]; // Use $pdo->errorInfo() instead of $conn->error
        exit();
    }
}
?>



<!-- Form for adding a new dish -->
<form action="add_gerecht.php" method="post">
    <label for="gerecht">Gerecht:</label>
    <input type="text" name="gerecht" id="gerecht" required><br>
    <label for="omschrijving">Omschrijving:</label>
    <textarea name="omschrijving" id="omschrijving" rows="4" cols="50" required></textarea><br>
    <label for="prijs">Prijs:</label>
    <input type="number" step="0.01" name="prijs" id="prijs" required><br>
    <input class="button" type="submit" name="submit" value="Opslaan" class="submit-button">
</form>
    
</body>
</html>