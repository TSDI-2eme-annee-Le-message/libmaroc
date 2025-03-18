<?php
session_start();
include 'connexion.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$is_admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

$stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$livres = $conn->query("SELECT * FROM livres")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Personnel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2>Bienvenue, <?php echo htmlspecialchars($user['username']); ?>!</h2>
        <a href="logout.php" class="btn">Se déconnecter</a>
    </header>
    <section>
        <h3>Informations personnelles</h3>
        <form method="POST" action="update_profile.php">
            <input type="text" name="nom" placeholder="Nom" value="<?php echo htmlspecialchars($user['nom'] ?? ''); ?>">
            <input type="text" name="email" placeholder="Email" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>">
            <button type="submit">Mettre à jour</button>
        </form>
    </section>
    <section>
        <h3>Ajouter des livres à votre liste</h3>
        <form method="POST" action="ajouter_liste.php">
            <select name="livre_id">
                <?php foreach ($livres as $livre): ?>
                    <option value="<?php echo $livre['id']; ?>">
                        <?php echo htmlspecialchars($livre['titre']); ?> - <?php echo htmlspecialchars($livre['auteur']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Ajouter à ma liste</button>
        </form>
    </section>
    <section>
        <h3>Ajouter au panier</h3>
        <form method="POST" action="ajouter_panier.php">
            <select name="livre_id">
                <?php foreach ($livres as $livre): ?>
                    <option value="<?php echo $livre['id']; ?>">
                        <?php echo htmlspecialchars($livre['titre']); ?> - <?php echo htmlspecialchars($livre['auteur']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Ajouter au panier</button>
        </form>
    </section>
    <?php if ($is_admin): ?>
        <section>
            <h3>Administration</h3>
            <a href="ajouter_des_livres.php" class="admin-link">Ajouter un livre</a>
        </section>
    <?php endif; ?>
</body>
</html>
