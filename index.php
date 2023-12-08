<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Innlogging</title>
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

<p>Vennligst logg inn:</p>
<form id="formL" method="post" action="login.php">
    <label class="inputL" for="brukernavn">Brukernavn:</label>
    <input type="text" name="brukernavn" placeholder="brukernavn" value="<?php
    if (empty($_POST['brukernavn'])){
      $_POST['brukernavn'] = '';
      } else {
        echo htmlentities($_POST['brukernavn']);
        };
        ?>" required /><br />
    <label class="inputL" for="passord">Passord:</label>
    <input type="password" name="passord" placeholder="passord" value="<?php
    if (empty($_POST['passord'])){
      $_POST['passord'] = '';
      } else {
        echo htmlentities($_POST['passord']);
        };
        ?>" required /><br />
    <input type="submit" value="Logg inn" name="submit" />
</form>
<p>Eller klikk <a href="registration.php">her</a> for å registrere ny bruker</p>
<script src="script.js"></script>
</body>
</html>
