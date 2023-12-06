<?php

include 'db.con.php';

session_start();

if(isset($_SESSION['username'])){
    // The user is logged in
    $username = $_SESSION['username'];
    // Display user-specific content or your protected page content
    
    // You can also provide a logout link here.
} else {
    // If the user is not logged in, you can redirect them to the login page
    header('location: index.php');
}



?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Account</title>
</head>
<body>

<nav>
    <ul>
      <li><a href="tbg.php">Play</a></li>
      <li class="dropdown">
        <a>Profile</a>
        <ul class="dropdown-content">
          <li><a href="welcome.php">Profile</a></li>
          <li><a href="account.php">Account settings</a></li>
          <li><a href="logout.php">Log out</a></li>
        </ul>
      </li>
      <li><a href="#">Information</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
</nav>

<?php

?>

<a href="tbg.php">Click here to play</a>
<a href="logout.php">Logout</a>

<script src="script.js"></script>
</body>
</html>