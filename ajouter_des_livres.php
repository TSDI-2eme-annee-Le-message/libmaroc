<?php
include 'connexion.php';

$message = "";

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = trim($_POST['titre']);
    $auteur = trim($_POST['auteur']);
    $prix = trim($_POST['prix']);
    $categorie = trim($_POST['categorie']);

    // Vérifier si un fichier a été uploadé
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = basename($_FILES['image']['name']);
        $image_path = "images/" . $image_name;
        
        // Déplacer le fichier uploadé
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
            // Insérer dans la base de données
            $sql = "INSERT INTO livres (titre, auteur, prix, categorie, image) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdss", $titre, $auteur, $prix, $categorie, $image_name);
            
            if ($stmt->execute()) {
                $message = "<div class='alert alert-success'>Livre ajouté avec succès !</div>";
            } else {
                $message = "<div class='alert alert-danger'>Erreur lors de l'ajout du livre.</div>";
            }
        } else {
            $message = "<div class='alert alert-warning'>Erreur lors du téléchargement de l'image.</div>";
        }
    } else {
        $message = "<div class='alert alert-warning'>Veuillez sélectionner une image valide.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4 text-center">Ajouter un Nouveau Livre</h2>
    
    <?= $message ?>

    <form action="" method="post" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
        <div class="mb-3">
            <label for="titre" class="form-label">Titre du Livre</label>
            <input type="text" class="form-control" name="titre" required>
        </div>
        
        <div class="mb-3">
            <label for="auteur" class="form-label">Auteur</label>
            <input type="text" class="form-control" name="auteur" required>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix (MAD)</label>
            <input type="number" step="0.01" class="form-control" name="prix" required>
        </div>

        <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie</label>
            <select class="form-control" name="categorie" required>
                <option value="Roman">Roman</option>
                <option value="Science">Science</option>
                <option value="Histoire">Histoire</option>
                <option value="Art">Art</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image de Couverture</label>
            <input type="file" class="form-control" name="image" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Ajouter le Livre</button>
    </form>

    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-secondary">Retour à l'accueil</a>
    </div>
</body>
</html>
