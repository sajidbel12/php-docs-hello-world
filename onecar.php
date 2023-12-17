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
            <h1>Détails du voiture</h1>
            <p>voiture: <?php echo $car['carName']; ?></p>
            <p>Disponibilité: <?php echo $car['disponibilite']; ?></p>
            <img src="<?php echo $car['imagePath'] . '?sp=r&st=2023-12-17T17:44:49Z&se=2023-12-20T01:44:49Z&sv=2022-11-02&sr=c&sig=QWNjTkjYrbFl8tDjzybCphF2J8r2gS8VjcTfKjbYjzE%3D'; ?>" alt="Image du voiture">
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