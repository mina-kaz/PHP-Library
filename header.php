<?php
  include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title></title>
</head>
<body>
  <header>
      <nav class="nav-header-main">
          <a href="index.php" class="header-logo">
          <img src="" alt="LibraryCatalogeLogo">
          </a>
          <div class="header-login">
            <form action="login.php" method="post"> <!--so that sensitive information do not appear in the url -->
                <input type="text" name="mainuid" placeholder="Email">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="login-submit">Login</button>
            </form>
        </div>

      </nav>
  </header>
</body>
</html>
