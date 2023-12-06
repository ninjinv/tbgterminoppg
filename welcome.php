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
    <title>Profile</title>
</head>
<body>

<nav>
    <ul>
      <li><a href="tbg.php">Play</a></li>
      <li class="dropdown">
        <a href="welcome.php">Profile</a>
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

<a href="tbg.php">Click here to play</a>
<a href="logout.php">Logout</a>

<div id="tutorialPopup" class="popup">
    <div class="popup-content">
        <p>Welcome! Would you like to see the tutorial?</p>
        <button onclick="showTutorial()">Yes</button>
        <button onclick="skipTutorial()">No</button>
    </div>
</div>

<?php



?>

<!-- <script>
    function showTutorial() {
        // Redirect to the tutorial page or perform any actions needed
        window.location.href = 'tutorial.php';
    }

    function skipTutorial() {
        // Continue with displaying the game content
        document.getElementById('tutorialPopup').style.display = 'none';
    }

    // Show the tutorial popup after the page loads if the user registered within the last 5 minutes
    window.onload = function () {
        var registrationTime = <?php echo isset($_SESSION['registration_time']) ? $_SESSION['registration_time'] : 0; ?>;
        var currentTime = Math.floor(new Date().getTime() / 1000); // Convert milliseconds to seconds

        if (currentTime - registrationTime <= 300) {
            // Display the tutorial popup
            document.getElementById('tutorialPopup').style.display = 'block';
        }
    };
</script> -->
<script src="script.js"></script>

</body>
</html>