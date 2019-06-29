<?php
require_once 'includes/dbh.inc.php';
error_reporting(E_ALL & ~E_NOTICE);
$id = $_GET['id'];
$sqlrequest = "SELECT * FROM images";
$result = mysqli_query($conn,$sqlrequest);
?>

<?php
include_once 'PHP/header.php';
?>

<body>
<section class="main-container">
  <div class="main-wrapper">
    <h2>Projects</h2>
  </div>
</section>

<header>
  <nav>
    <div class="main-wrapper">
      <ul>
        <li><a href="administration.php">Home</a></li>
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

<div id="container" class="clearfix" class="row">
  <div id="main-projects" class="row">
      <?php
        while ($row = mysqli_fetch_row($result)) {
          if (empty($row[1])) {
            echo "<div class='col-xs-4' id='project'>";
            //echo "<img title='$row[1]' src='$row1[1]' style='width:197.5px;height:150px;'><br>";
            echo "<div style='width:197.5px;height:150px;'>No picture :C</div>"; 
            echo "<b>$row[2]</b><br>";
            echo "<a href='loadCanvas.php?id=$row[0]'>Load canvas</a>";
            echo " | ";
            echo "<a href='delete.php?id=$row[0]' onclick='return confirm(\"Delete the canvas?\")'>Delete</a>";
            echo "</div>";
          } else{
            echo "<div class='col-xs-4' id='project'>";
            echo "<img title='$row[2]' src='$row[1]' style='width:197.5px;height:150px;'><br>"; 
            echo "<b>$row[2]</b><br>";
            echo "<a href='loadCanvas.php?id=$row[0]'>Load canvas</a>";
            echo " | ";
            echo "<a href='delete.php?id=$row[0]' onclick='return confirm(\"Delete the canvas?\")'>Delete</a>";
            echo "</div>";
          }
          }
        ?>
    </div>
</div>
<?php
include_once 'PHP/footer.html';
?>
