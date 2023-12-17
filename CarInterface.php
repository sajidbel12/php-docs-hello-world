<?php
include 'db.php'; // Include the database connection file

$sql = "SELECT * FROM car_";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Reservation System</title>
    <link rel="stylesheet" href="body.css">
</head>

<body>
    <div>
        <h1>Welcome to Car Reservation interface</h1>
        <p>Choose a car to reserve:</p>

        <!-- PHP code to fetch and display rooms -->
        <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<div>';
            echo '<p>Car : ' . $row['carName'] . '</p>';
            echo '<p>Availability: ' . $row['disponibilite'] . '</p>';

            // Add a link to view room details
            echo '<a href="onecar.php?carName=' . $row['carName'] . '">View Details of the car</a>';

            echo '</div>';
        }
        ?>
    </div>
</body>

</html>

