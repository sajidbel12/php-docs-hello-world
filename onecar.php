<?php
include 'db.php'; // Include the database connection file

// Récupérer le nom du médecin à partir des paramètres de requête
$medecinName = $_GET['carName'];

// Exécuter une requête pour obtenir les détails du médecin
$sql = "SELECT carName, disponibilite, imagePath FROM car_ WHERE carName = :carn";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':carn', $medecinName);
$stmt->execute();
$medecin = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérifier si le médecin existe
if ($medecin) {
    // Output HTML content
    ?>
    <!DOCTYPE html>
    <html lang="en">
   
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Détails du Médecin</title>
        <link rel="stylesheet" href="body.css">
    </head>
   
    <body>
        <div>
            <h1>Détails du Médecin</h1>
            <p>id du médecin: <?php echo $medecin['carName']; ?></p>
            <p>Disponibilité: <?php echo $medecin['disponibilite']; ?></p>
            <img src="<?php echo $room['imageDoc'] . 'sp=r&st=2023-12-17T15:31:27Z&se=2023-12-20T23:31:27Z&spr=https&sv=2022-11-02&sr=c&sig=4BgaWHaVQHOtKepm6k5dMu41VrtWxLnJaAIsg%2FiK%2Fhw%3D'; ?>" alt="Image du medecin">
            <!-- Afficher l'image du médecin depuis Blob Storage -->
        </div>
    </body>
   
    </html>
    <?php
} else {
    // Médecin non trouvé, vous pouvez rediriger l'utilisateur ou afficher un message d'erreur
    echo "Médecin non trouvé.";
}
?>