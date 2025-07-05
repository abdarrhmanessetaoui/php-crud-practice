<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $date = $_POST['date'];

    $stmt = $pdo->prepare("INSERT INTO produit (libelle, prixUnitaire, dateAchat) VALUES (:libelle, :prix, :date)");
    $stmt->bindValue(':libelle', $libelle);
    $stmt->bindValue(':prix', $prix);
    $stmt->bindValue(':date', $date);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>

<h2>Add Product</h2>
<form method="post">
    Libelle: <input type="text" name="libelle" required><br>
    Prix: <input type="number" name="prix" required><br>
    Date Achat: <input type="date" name="date" required><br>
    <button type="submit">Save</button>
</form>