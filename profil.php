<?php

include 'db.con.php';
// Start the session
session_start();

if(isset($_SESSION['username'])){
    // The user is logged in
    $username = $_SESSION['username'];
} else {
    // If the user is not logged in, you can redirect them to the login page
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Hei, <?php echo $username; ?></h2>
    <a href="logout.php">Logout</a>
    <script src="script.js"></script>
</body>
</html>