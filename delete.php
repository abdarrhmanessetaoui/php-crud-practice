<?php
require 'config.php';

$ref = $_GET['ref'];

$stmt = $pdo->prepare("DELETE FROM produit WHERE reference = :ref");
$stmt->bindValue(':ref', $ref);
$stmt->execute();

header("Location: index.php");
exit;
