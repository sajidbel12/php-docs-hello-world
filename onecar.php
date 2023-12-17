<?php
include 'db.php'; // Include the database connection file

$carmm = $_GET['carName'];


$sql = "SELECT carName, disponibilite, imagePath FROM car_ WHERE carName = :carn";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':carn', $carmm);
$stmt->execute();
$car = $stmt->fetch(PDO::FETCH_ASSOC);


if ($car) {
    // Output HTML content
    ?>
    <!DOCTYPE html>
    <html lang="en">
   
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Détails du voiture</title>
        <link rel="stylesheet" href="body.css">
    </head>
   
    <body>
        <div>
            <h1>Détails du Médecin</h1>
            <p>id du médecin: <?php echo $medecin['carName']; ?></p>
            <p>Disponibilité: <?php echo $medecin['disponibilite']; ?></p>
            <img src="<?php echo $room['imageDoc'] . 'sp=r&st=2023-12-17T17:19:00Z&se=2023-12-21T01:19:00Z&spr=https&sv=2022-11-02&sr=c&sig=ye5GJdRAGjTlXBoCenOhk5kdz64oTF2Ydzz28%2BNflv0%3D'; ?>" alt="Image du voiture">
            <!-- Afficher l'image du voiture depuis Blob Storage -->
        </div>
    </body>
   
    </html>
    <?php
} else {
    // Médecin non trouvé, vous pouvez rediriger l'utilisateur ou afficher un message d'erreur
    echo "voiture non trouvé.";
}
?>