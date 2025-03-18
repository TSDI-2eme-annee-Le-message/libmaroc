<?php
include 'connexion.php';

$result = $conn->query("SELECT * FROM livres");
$livres = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Livres</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Liste des Livres</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Catégorie</th>
        </tr>
        <?php foreach ($livres as $livre): ?>
            <tr>
                <td><?php echo $livre['id']; ?></td>
                <td><?php echo htmlspecialchars($livre['titre']); ?></td>
                <td><?php echo htmlspecialchars($livre['auteur']); ?></td>
                <td><?php echo htmlspecialchars($livre['categorie']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
