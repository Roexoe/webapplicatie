<?php
include_once("connectie.php");
include_once("header.php");

/**
 * @var PDO $pdo
 */

// Controleer of er een zoekopdracht is ingediend
if (isset($_GET['query'])) {
    // Zoekopdracht uitvoeren
    $query = '%' . $_GET['query'] . '%';
    $sql = "SELECT Gerechten, Omschrijving, Prijs, Foto FROM Gerechten WHERE Gerechten LIKE :query_gerechten OR Omschrijving LIKE :query_omschrijving";
    $stmt = $pdo->prepare($sql);



    $stmt->bindParam(':query_gerechten', $query, PDO::PARAM_STR);
    $stmt->bindParam(':query_omschrijving', $query, PDO::PARAM_STR);      
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


 else {
    // Geen zoekopdracht, haal alle gerechten op
    $sql = "SELECT Gerechten, Omschrijving, Prijs, Foto FROM Gerechten";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Menu</title>
</head>
<body>
    <form action="menu.php" method="get">
        <input type="text" name="query" placeholder="Zoek een gerecht...">
        <input type="submit" value="Zoek">
    </form>
    <div class="menu-container">
        <?php foreach ($results as $result): ?>
            <div class="gerechtblok">
                <div class="gerechtnaam"><?= $result['Gerechten'] ?></div>
                <div class="gerechtbeschrijving"><?= $result['Omschrijving'] ?></div>
                <div class="gerechtprijs"><?= $result ['Prijs'] ?></div>
                <?php if (!empty($result['Foto'])): ?>
                    <img width="100" src="<?= htmlspecialchars($result['Foto']) ?>" alt="Gerecht foto">
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
