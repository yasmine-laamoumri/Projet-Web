<?php
$servername = 'db'; // Vérifie si c'est bien 'localhost' ou 'db' selon ton hébergeur/Docker
$username = 'app';
$password = 'app';
$database = 'app';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 1. On récupère les données du formulaire via les 'name' du HTML
        $name    = $_POST['Name'] ?? '';
        $email   = $_POST['Email'] ?? '';
        $subject = $_POST['Subject'] ?? '';
        $message = $_POST['Message'] ?? '';

        // 2. Ta requête SQL (Assure-toi que la table 'test' a ces colonnes)
        $sql = "INSERT INTO test (Name, Email, Subject, Message) VALUES (:name, :email, :subject, :message)";
        
        $stmt = $conn->prepare($sql);
        
        // 3. On lie les valeurs et on exécute
        $stmt->execute([
            ':name'    => $name,
            ':email'   => $email,
            ':subject' => $subject,
            ':message' => $message
        ]);

        $status = "Connexion réussie et message enregistré !";
    }
} catch(PDOException $e) {
    $status = "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat du traitement</title>
</head>
<body>
    <h1><?php echo $status; ?></h1>
    
    <?php if(isset($name)): ?>
        <p>Merci <strong><?php echo htmlspecialchars($name); ?></strong>, votre message a bien été reçu.</p>
    <?php endif; ?>

    <a href="Contact.php">Retour au formulaire</a>
</body>
</html>