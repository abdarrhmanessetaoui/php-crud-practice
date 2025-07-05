<?php
require 'config.php';

$stmt = $pdo->prepare("SELECT * FROM produit");
$stmt->execute();
?>

<h2>Product List</h2>
<a href="create.php">Add Product</a>
<table border="1">
    <tr>
        <th>Reference</th>
        <th>Libelle</th>
        <th>Prix</th>
        <th>Date Achat</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <tr>
        <td><?= htmlspecialchars($row['reference']) ?></td>
        <td><?= htmlspecialchars($row['libelle']) ?></td>
        <td><?= htmlspecialchars($row['prixUnitaire']) ?></td>
        <td><?= htmlspecialchars($row['dateAchat']) ?></td>
        <td>
            <a href="edit.php?ref=<?= urlencode($row['reference']) ?>">Edit</a>
            <a href="delete.php?ref=<?= urlencode($row['reference']) ?>" onclick="return confirm('Delete?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>