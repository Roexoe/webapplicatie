<?php
include_once('connectie.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $stmt = $pdo->prepare('DELETE FROM Gerechten WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header('Location: admin.php');
    exit;
}