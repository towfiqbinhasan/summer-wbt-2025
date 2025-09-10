<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PublicHome</title>
    <link rel="stylesheet" href="../CSS/PublicHome.css">
</head>
<body>
      <div class="site-wrapper">
    <header class="site-header">
      <div class="brand">
        
        <img src="..//Image/circle-line-simple-design-logo-600nw-2174926871.webp" alt="xCompany logo" class="logo">
        <span class="brand-text">xCompany</span>
      </div>

      <nav class="site-nav" aria-label="Main navigation">
        <a href="../HTML+PHP/PublicHome.php">Home</a>
        <span class="sep">|</span>
        <a href="..//HTML+PHP/Login.html">Login</a>
        <span class="sep">|</span>
        <a href="../HTML+PHP/Registration.html">Registration</a>
      </nav>
    </header>

    <main class="site-main">
      <h2 class="welcome">Welcome to xCompany</h2>

      <?php
      
      if (isset($_SESSION['username'])) {
          echo "<p>Welcome back, " . $_SESSION['username'] . "!</p>";
      }
      ?>
    </main>

    <footer class="site-footer">
      <p>Copyright © <?php echo date("Y"); ?></p> 
  </div>
</body>
</html>

<?php

?>
