<?php
require 'config.php';

$ref = $_GET['ref'];

$stmt = $pdo->prepare("SELECT * FROM produit WHERE reference = :ref");
$stmt->bindValue(':ref', $ref);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $date = $_POST['date'];

    $update = $pdo->prepare("UPDATE produit SET libelle = :libelle, prixUnitaire = :prix, dateAchat = :date WHERE reference = :ref");
    $update->bindValue(':libelle', $libelle);
    $update->bindValue(':prix', $prix);
    $update->bindValue(':date', $date);
    $update->bindValue(':ref', $ref);
    $update->execute();

    header("Location: index.php");
    exit;
}
?>

<h2>Edit Product</h2>
<form method="post">
    Libelle: <input type="text" name="libelle" value="<?= htmlspecialchars($product['libelle']) ?>" required><br>
    Prix: <input type="number" name="prix" value="<?= htmlspecialchars($product['prixUnitaire']) ?>" required><br>
    Date Achat: <input type="date" name="date" value="<?= htmlspecialchars($product['dateAchat']) ?>" required><br>
    <button type="submit">Update</button>
</form>