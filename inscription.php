<?php
session_start();
include 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    // Vérifier si l'utilisateur existe déjà
    $stmt = $conn->prepare("SELECT id FROM utilisateurs WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Nom d\'utilisateur ou email déjà utilisé.');</script>";
    } else {
        // Hacher le mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insérer le nouvel utilisateur
        $stmt = $conn->prepare("INSERT INTO utilisateurs (username, password, nom, email, role) VALUES (?, ?, ?, ?, 'user')");
        $stmt->bind_param("ssss", $username, $hashed_password, $nom, $email);

        if ($stmt->execute()) {
            echo "<script>alert('Inscription réussie !'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Erreur lors de l\'inscription.');</script>";
        }
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - MarocLib</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
    <h1 class="mb-0"><a href="index.php" style="color: white; text-decoration: none;">MarocLib</a></h1>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="login.php">Connexion</a>
        </nav>
    </header>
    <main>
        <div class="form-container">
            <h2>Inscription</h2>
            <form method="POST">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <input type="text" name="nom" placeholder="Nom complet" required>
                <input type="email" name="email" placeholder="Email" required>
                <button type="submit">S'inscrire</button>
            </form>
            <p>Déjà inscrit(e) ? <a href="login.php">Connectez-vous ici</a></p>
        </div>
    </main>
</body>
</html>