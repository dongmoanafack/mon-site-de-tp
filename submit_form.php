<?php
$servername = "localhost"; // ou l'adresse IP de votre serveur
$username = "votre_nom_utilisateur"; // Remplacez par votre nom d'utilisateur
$password = "votre_mot_de_passe"; // Remplacez par votre mot de passe
$dbname = "contact_db";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Préparer et lier
$stmt = $conn->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $phone, $message);

// Définir les paramètres et exécuter
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$stmt->execute();

echo "Nouveau enregistrement créé avec succès";

$stmt->close();
$conn->close();
?>