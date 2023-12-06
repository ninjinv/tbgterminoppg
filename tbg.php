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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Text-Based Game</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>



<nav class="navbar">
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



    <div class="game-container">

        <div class=elementToFadeInAndOut>
            <h1 class="chapters">Chapter 1</h1>
        </div>

        <div class="scene1 nr1">
            <img src="pics/scene.jpg" alt="Scene">
        </div>
        <div class="money nr2">
            <span>Money:</span>
            <span id="money">500</span>
        </div>
        <div class="textChoices nr3">
            <div class="containerTextOut">
            <div class="containerText">
                <p class="story-text text1">You wake up, looking up at the ceiling.</p>
                <p class="story-thoughts text1">"I feel exhausted.."</p>
                <p class="story-question text1">What do you do?</p>
            </div>
            </div>
            <div class="allChoice">
                <div class="choices">
                    <button class="btnChoice" onclick="getUp()">Get up from the bed.</button>
                    <button class="btnChoice" onclick="lieStill()">Lie still, get more sleep</button>
                </div>

                <div>
                    <button class="btnChoice reset" onclick="resetGame()">Start Over</button>
                </div>

                

            </div>
        </div>

        <!--
        <div class="nr4">
            <button id="saveProgress" onclick="saveProgress()">Save Level Progress</button>
        </div>
        -->

    </div>

    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <p id="confirmationMessage">Are you sure you want to start over?</p>
            <div class="modal-buttons">
                <button id="cancelButton">Cancel</button>
                <button id="yesButton" class="greyButton" aria-disabled="true">Yes</button>
            </div>
            <div id="countdownTimer"></div>
        </div>
    </div>

    <!-- <p class="animated-text">>>></p> -->
    

    <form id="checkpointForm" action="player_progress.php">
        <button class="btnChoice" id="checkpointButton" onclick="checkpoint()">Checkpoint</button>
    </form>

    <script src="script.js"></script>
</body>
</html>