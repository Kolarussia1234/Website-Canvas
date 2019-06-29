<?php
require_once 'includes/dbh.inc.php';
error_reporting(E_ALL & ~E_NOTICE);
$id = $_GET['id'];
$sqlrequest = "SELECT * FROM images WHERE id = $id"; 
$result = mysqli_query($conn,$sqlrequest);
$row = mysqli_fetch_row($result); 
?>

<?php 

include_once 'PHP/header.php';

?>

<body>
<section class="main-container">
  <div class="main-wrapper">
    <h2>Edit canvas</h2>
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
<div style='margin-bottom:1px;'>
	<canvas id="veebipood" width="800" height="800" style="border:1px solid #000000;"></canvas>
  <script type="text/javascript" src="JS\veebipood.js"></script>

	<form id="form">
		<button  type="button" class="change"  onclick="loadCanvas()">Load</button>
    <input  id="textLoadd" type="hidden" value="<?php echo ($row[2]);?>">
</form>

</div>

<form id="form">
      <button   type="button" class="change" name="imguning"  onclick="loadImage()">Add image</button>
      <button   type="button" class="change" name="putton"  onclick="writeText()">Write</button>
</form> 


<form action="update.php" method="post"
        enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id;?>" name="id" />
        <input id="fileName" type="hidden" value="<?php echo ($row[1]);?>">
        <input name ="userTextOutput "type="text" id="userInput" placeholder="Text" />
        <br>
        <label for='file'>Filename:</label>
          <input type='file' name='file' id='imgfile' /> 
            <br />
        <input name="submit" type="submit" class="change" value="Save!" />
</form>



<form>
  <p>Choose the size of the picture(if in need)!&darr;</p>
    <input  name="laius" id="canvasWidth" class="dimensions" placeholder="width:800px" >
    <input  name="korgus" id="canvasHeight" class="dimensions"  placeholder="height:800px" >
</form>



<form>
  <p>Choose the color of the text!&swarr;</p>
      <select id="colours">
          <option value="black">Black</option>
          <option value="red">Red</option>
          <option value="green">Green</option>
          <option value="blue">Blue</option>
      </select>
   <button type="button" class="change" name="deleteTextt" onclick="deleteText()">Delete text</button>
</form>



<form>
  <p>You can choose the font too!&darr;</p>
    <select id="fonts">
        <option>Times New Roman</option>
        <option>Arial</option>
        <option>Verdana</option>
        <option>Palatino Linotype</option>
        <option>Impact</option>
    </select>
</form>



</body>



<?php 

include_once 'PHP/footer.html';

?>