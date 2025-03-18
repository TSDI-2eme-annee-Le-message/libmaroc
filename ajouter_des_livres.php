<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}
include 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $categorie = $_POST['categorie'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $stmt = $conn->prepare("INSERT INTO livres (titre, auteur, categorie, description, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $titre, $auteur, $categorie, $description, $image);

    if ($stmt->execute()) {
        echo "<script>alert('Livre ajouté avec succès !');</script>";
    } else {
        echo "<script>alert('Erreur : " . $conn->error . "');</script>";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Livre - MarocLib</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container">
        <h1 class="mb-0"><a href="index.php" style="color: white; text-decoration: none;">MarocLib</a></h1>
        </div>
    </header>
    <main class="container my-5">
        <h2 class="mb-4">Ajouter un Livre</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" name="titre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="auteur" class="form-label">Auteur</label>
                <input type="text" name="auteur" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="categorie" class="form-label">Catégorie</label>
                <input type="text" name="categorie" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">URL de l'image</label>
                <input type="text" name="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </main>
</body>
</html> 