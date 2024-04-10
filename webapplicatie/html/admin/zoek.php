<?php
include_once ('connectie.php');

// Verkrijg de zoekterm van het formulier
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Bereid de SQL-query voor met een voorwaarde om gerechten te filteren op basis van de zoekterm
$sql = "SELECT Gerechten, Omschrijving, Prijs FROM Gerechten WHERE Gerechten LIKE :query OR Omschrijving LIKE :query";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':query', "%$query%", PDO::PARAM_STR);
$stmt->execute();

// Toon de zoekresultaten
while ($result = $stmt->fetch()) {
    echo '<div class="gerechtblok">';
    echo '<div class="gerechtnaam">' . $result['Gerechten'] . '</div>';
    echo '<div class="gerechtbeschrijving">' . $result['Omschrijving'] . '</div>';
    echo '<div class="gerechtprijs">' . $result['Prijs'] . '</div>';
    echo '<div class="gerechtfoto"><img src="path/to/image/' . $result['Gerechten'] . '.jpg" alt="' . $result['Gerechten'] . '"></div>';
    echo '</div>';
}
?>