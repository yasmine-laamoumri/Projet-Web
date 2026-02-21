<?php
$servername = 'db';
$username = 'app';
$password = 'app';
$database = 'app';
//On essaie de se connecter
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];

try{
$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
//On définit le mode d'erreur de PDO sur Exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo 'Connexion réussie';
$sql = "INSERT INTO test(nom,prenom) VALUES(:nom,:prenom)";
$stmt = $conn->prepare($sql);
$stmt->execute([':nom' => $nom, ':prenom' => $prenom]);
}
/*On capture les exceptions si une exception est lancée et on affiche
*les informations relatives à celle-ci*/
catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Bonjour</h1>
<h2><?php echo $_POST['prenom'].' '.$_POST['nom'];?>
</body>
</html>