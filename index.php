<?php 

include_once 'PHP/header.php';

?>

<body>

<section class="main-container">
  <div class="main-wrapper">
    <h2>Home</h2>
    <?php
      if (isset($_SESSION['u_id'])) {
        echo "<p style='opacity:0.25;position:absolute;top:10px;left:10px;'>You are logged in!<p>";
      }
    ?>
  </div>
</section>

<header>
  <nav>
    <div class="main-wrapper">
      <ul>
        <li><a href="index.php">Home</a></li>
        <?php
        if (isset($_SESSION['u_id'])) {
          echo '<li><a href="administration.php">Profile</a></li>';
        }
        ?>
      </ul>
      <div class="nav-login">
        <?php
        if (isset($_SESSION['u_id'])) {
          echo '<form action="includes/logout.inc.php" method="POST"> 
                <button type="submit" name="submit">Logout</button>
              </form>';
        } else {
          echo '<form action="includes/login.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username/e-mail">
                <input type="password" name="pwd" placeholder="password">
                        <button type="submit" name="submit">Login</button>
              </form>
                <a href="signup.php">Sign up</a>';
        }
        ?>
      </div>
    </div>
  </nav>
</header>

<?php

include_once 'canvas.php';

?>
  

<?php 

include_once 'PHP/footer.html';

?>