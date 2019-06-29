
  <canvas id="veebipood" width="800" height="800" style="border:1px solid #000000;"></canvas>
  <script type="text/javascript" src="JS\veebipood.js"></script>








<div class="Main">
<form action="upload.php" method="POST"
        enctype="multipart/form-data">
        <input    name="userTextInput" type="text" id="userInput" placeholder="Text" />
        <br>
        <button   type="button" class="change" name="imguning"  onclick="loadImage()">Add image</button>
        <button   type="button" class="change" name="putton"  onclick="writeText()">Write</button>
        <br>
        <label for='file'>Filename:</label>
        <input type='file' name='file' id='imgfile' /> 
        <br />
        <input name="submit" type="submit" class="change" value="Save!" /> 
</form>



<form>
  <p>Choose the size of the picture(if in need)!&darr;</p>
  <input  name="laius" id="canvasWidth" class="dimensions" placeholder="width:800px" />
  <input  name="korgus" id="canvasHeight" class="dimensions"  placeholder="height:800px" />
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

</div>











<!-- Bootstrap script/ not CSS'ed

		<div class="container">
      <header class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">Project name</h3>
      </header>
 
      <main role="main">

        <div class="jumbotron">
          <h1 class="display-3">Jumbotron heading</h1>
          <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
        </div>

        <div class="row marketing">
          <div class="col-lg-6">
            <h4>Subheading</h4>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

            <h4>Subheading</h4>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

            <h4>Subheading</h4>
            <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
          </div>

          <div class="col-lg-6">
            <h4>Subheading</h4>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

            <h4>Subheading</h4>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

            <h4>Subheading</h4>
            <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
          </div>
        </div>

      </main>

      <footer class="footer">
        <p>&copy; Company 2017</p>
      </footer>

    </div> 
    -->
