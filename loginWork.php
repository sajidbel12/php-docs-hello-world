<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'db.php'; // Include the database connection file

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Check if the user exists and get isAdmin value
        $sql = "SELECT  idUser FROM user_ WHERE NameUser = :username AND pass = :password";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user !== false) {
            $_SESSION['userId'] = $user['idUser'];

            if ($user['isUser']) {
                // Admin user, redirect to AdminInterface.php
                header("Location: CarInterface.php");
                exit();
            } else {
                // Non-admin user, redirect to roomReser.php
                header("Location: CarInterface.php");
                exit();
            }
        }
    } catch (PDOException $e) {
        // Log the error
        error_log("Error checking user credentials: " . $e->getMessage());
        // Return an error response if needed
        http_response_code(500);
        exit();
    }
} else {
    // Invalid request method
    header("Location: CarInterface.php");
    exit();
}
?>
