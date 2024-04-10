<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </html><link rel="stylesheet" type="text/css" href="style.css">
    <title>Il Viaggio dei Sapori Bistro</title>
</head>
<body>
    
</body>

<header>
<header>
<div class="header-options">
    <button type="button" onclick="location.href='menu.php';">Menu</button>
    <button class="logo" type="button" onclick="location.href='menu.php';">Il Viaggio dei Sapori Bistro</button>
    <button type="button" onclick="location.href='index.php';">Login</button>
  </div>


</header>
 
  <?php


  if (isset($_SESSION['username'])) {
    // Display the user's name, logout button, or other page elements if the user is already logged in.
    echo 'Welcome, ' . $_SESSION['username'] . '! <button type="button" onclick="logout();">Logout</button>';
  }
  ?>
</header>