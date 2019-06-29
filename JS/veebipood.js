var canvas = document.getElementById('veebipood');
var ctx = canvas.getContext('2d');
//var imageObj = new Image();





var img;

function loadImage() {
        var input, file, fr;
        var imgWidth = document.getElementById("canvasWidth").value;
        var imgHeight = document.getElementById("canvasHeight").value; 


        if (typeof window.FileReader !== 'function') {
            alert("The file API isn't supported on this browser yet.");
            return;
        }

        input = document.getElementById('imgfile');
        if (!input) {
            alert("Um, couldn't find the imgfile element.");
        }
        else if (!input.files ) {
            alert("This browser doesn't seem to support the `files` property of file inputs.");
        }
        else if (!input.files[0]) {
            alert("Please select a file before clicking 'Add image'");
        }
        else{
            file = input.files[0];
            fr = new FileReader();
            fr.onload = createImage;
            fr.readAsDataURL(file);
        }

        function createImage() {
            img = new Image();
            img.onload = imageLoaded;
            img.src = fr.result;
        }

        function imageLoaded() {
            //saveing();
            writeText();
            img.width = canvas.width;
            img.height = canvas.height;
        	if(imgWidth && imgHeight >= 0){
            img.width = imgWidth;
            img.height = imgHeight;
        		ctx.clearRect(0,0, canvas.width, canvas.height);
        		ctx.drawImage(img, 0, 0, img.width, img.height);
        	} else{
              ctx.drawImage(img, 0, 0, img.width, img.height);
          }
		}


    }

function editImage() {
        var pic;
        var imgWidth = document.getElementById("canvasWidth").value;
        var imgHeight = document.getElementById("canvasHeight").value; 


        if (typeof window.FileReader !== 'function') {
            alert("The file API isn't supported on this browser yet.");
            return;
        }

        pic = document.getElementById('fileName').value;
        pic.onload = createImage();
        if (!pic) {
            alert("Um, couldn't find the Image element.");
        }

        function createImage() {
            img = new Image(); 
            img.src = pic;
            img.onload = imageLoaded;
        }

        function imageLoaded() {
            loadText();
            img.width = canvas.width;
            img.height = canvas.height;

          if (imgWidth && imgHeight > 0) {
            ctx.clearRect(0,0, canvas.width, canvas.height);
            ctx.drawImage(img, 0, 0, imgWidth, imgHeight);
            //img.width = imgWidth;
            //img.height = imgHeight;
          }
          else{
              ctx.drawImage(img, 0, 0, img.width, img.height);
          }
    }

    }

function loadText(){
  var colour = document.getElementById("colours").value;
  var input = document.getElementById("textLoadd").value;
  ctx.fillStyle = colour;
  var fontInput = document.getElementById("fonts").value;

$(function(){

    var canvas=document.getElementById("veebipood");
    var ctx=canvas.getContext("2d");

    // variables used to get mouse position on the canvas
    var $canvas=$("#veebipood");
    var canvasOffset=$canvas.offset();
    var offsetX=canvasOffset.left;
    var offsetY=canvasOffset.top;
    var scrollX=$canvas.scrollLeft();
    var scrollY=$canvas.scrollTop();

    // variables to save last mouse position
    // used to see how far the user dragged the mouse
    // and then move the text by that distance
    var startX;
    var startY;

    // some text objects
    var texts=[];

    // text
    texts.push({text:input,x:20,y:20});

    // calculate width of each text for hit-testing purposes
    ctx.font = "30px " + fontInput;
    for(var i=0;i<texts.length;i++){
        var text=texts[i];
        text.width=ctx.measureText(text.text).width;
        text.height=16;
    }

    // this var will hold the index of the selected text
    var selectedText=-1;

    // START: draw all texts to the canvas
    draw();

    // clear the canvas draw all texts
    function draw(){
        if (img == null) {
                ctx.clearRect(0,0,canvas.width,canvas.height);
            for(var i=0;i<texts.length;i++){
                var text=texts[i];
                ctx.fillText(text.text,text.x,text.y);
        }
    } else{
            ctx.clearRect(0,0,canvas.width,canvas.height);
            ctx.drawImage(img, 0, 0, img.width, img.height);
        for(var i=0;i<texts.length;i++){
            var text=texts[i];
            ctx.fillText(text.text,text.x,text.y);
        }
    }
}

    // test if x,y is inside the bounding box of texts[textIndex]
    function textHittest(x,y,textIndex){
        var text=texts[textIndex];
        return(x>=text.x && 
            x<=text.x+text.width &&
            y>=text.y-text.height && 
            y<=text.y);
    }

    // handle mousedown events
    // iterate through texts[] and see if the user
    // mousedown'ed on one of them
    // If yes, set the selectedText to the index of that text
    function handleMouseDown(e){
      e.preventDefault();
      startX=parseInt(e.clientX-offsetX);
      startY=parseInt(e.clientY-offsetY);

      // Put your mousedown stuff here
      for(var i=0;i<texts.length;i++){
          if(textHittest(startX,startY,i)){
              selectedText=i;
          }
      }
    }

    // done dragging
    function handleMouseUp(e){
      e.preventDefault();
      selectedText=-1;
    }

    // also done dragging
    function handleMouseOut(e){
      e.preventDefault();
      selectedText=-1;
    }

    // handle mousemove events
    // calc how far the mouse has been dragged since
    // the last mousemove event and move the selected text
    // by that distance
    function handleMouseMove(e){
      if(selectedText<0){return;}
      e.preventDefault();
      mouseX=parseInt(e.clientX-offsetX);
      mouseY=parseInt(e.clientY-offsetY);

      // Put your mousemove stuff here
      var dx=mouseX-startX;
      var dy=mouseY-startY;
      startX=mouseX;
      startY=mouseY;

      var text=texts[selectedText];
      text.x+=dx;
      text.y+=dy;
      draw();
    }

    // listen for mouse events
    $("#veebipood").mousedown(function(e){handleMouseDown(e);});
    $("#veebipood").mousemove(function(e){handleMouseMove(e);});
    $("#veebipood").mouseup(function(e){handleMouseUp(e);});
    $("#veebipood").mouseout(function(e){handleMouseOut(e);});

}); // end $(function(){});

}     


function deleteText(){
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	loadImage();
}

ctx.font = "30px Arial";

//function pildiLaadimine(){
//	imageObj.src = fr.result;
//	context.clearRect(0,0,canvas.width,canvas.height);
//	imageObj.onload = function(){
//	context.drawImage(imageObj, 0, 0);
//}

//}




function writeText(){
	var colour = document.getElementById("colours").value;
	var input = document.getElementById("userInput").value;
	ctx.fillStyle = colour;
  var fontInput = document.getElementById("fonts").value;

$(function(){

    var canvas=document.getElementById("veebipood");
    var ctx=canvas.getContext("2d");

    // variables used to get mouse position on the canvas
    var $canvas=$("#veebipood");
    var canvasOffset=$canvas.offset();
    var offsetX=canvasOffset.left;
    var offsetY=canvasOffset.top;
    var scrollX=$canvas.scrollLeft();
    var scrollY=$canvas.scrollTop();

    // variables to save last mouse position
    // used to see how far the user dragged the mouse
    // and then move the text by that distance
    var startX;
    var startY;

    // some text objects
    var texts=[];

    // text
    texts.push({text:input,x:20,y:20});

    // calculate width of each text for hit-testing purposes
    ctx.font = "30px " + fontInput;
    for(var i=0;i<texts.length;i++){
        var text=texts[i];
        text.width=ctx.measureText(text.text).width;
        text.height=16;
    }

    // this var will hold the index of the selected text
    var selectedText=-1;

    // START: draw all texts to the canvas
    draw();

    // clear the canvas draw all texts
    function draw(){
        if (img == null) {
                ctx.clearRect(0,0,canvas.width,canvas.height);
            for(var i=0;i<texts.length;i++){
                var text=texts[i];
                ctx.fillText(text.text,text.x,text.y);
        }
    } else{
            ctx.clearRect(0,0,canvas.width,canvas.height);
            ctx.drawImage(img, 0, 0, img.width, img.height);
        for(var i=0;i<texts.length;i++){
            var text=texts[i];
            ctx.fillText(text.text,text.x,text.y);
        }
    }
}

    // test if x,y is inside the bounding box of texts[textIndex]
    function textHittest(x,y,textIndex){
        var text=texts[textIndex];
        return(x>=text.x && 
            x<=text.x+text.width &&
            y>=text.y-text.height && 
            y<=text.y);
    }

    // handle mousedown events
    // iterate through texts[] and see if the user
    // mousedown'ed on one of them
    // If yes, set the selectedText to the index of that text
    function handleMouseDown(e){
      e.preventDefault();
      startX=parseInt(e.clientX-offsetX);
      startY=parseInt(e.clientY-offsetY);

      // Put your mousedown stuff here
      for(var i=0;i<texts.length;i++){
          if(textHittest(startX,startY,i)){
              selectedText=i;
          }
      }
    }

    // done dragging
    function handleMouseUp(e){
      e.preventDefault();
      selectedText=-1;
    }

    // also done dragging
    function handleMouseOut(e){
      e.preventDefault();
      selectedText=-1;
    }

    // handle mousemove events
    // calc how far the mouse has been dragged since
    // the last mousemove event and move the selected text
    // by that distance
    function handleMouseMove(e){
      if(selectedText<0){return;}
      e.preventDefault();
      mouseX=parseInt(e.clientX-offsetX);
      mouseY=parseInt(e.clientY-offsetY);

      // Put your mousemove stuff here
      var dx=mouseX-startX;
      var dy=mouseY-startY;
      startX=mouseX;
      startY=mouseY;

      var text=texts[selectedText];
      text.x+=dx;
      text.y+=dy;
      draw();
    }

    // listen for mouse events
    $("#veebipood").mousedown(function(e){handleMouseDown(e);});
    $("#veebipood").mousemove(function(e){handleMouseMove(e);});
    $("#veebipood").mouseup(function(e){handleMouseUp(e);});
    $("#veebipood").mouseout(function(e){handleMouseOut(e);});

}); // end $(function(){});

}


/*function create(){
  $.ajax({
    type: "POST",
    url: "projects.php"
})
.done(function(respond){console.log("done: "+respond);})
.fail(function(respond){console.log("fail");})
.always(function(respond){console.log("always");})
} */


 /* function saveing(){
    writeText();

    //var titleToSave = document.getElementById("userNameCanvas").value;
    var textToSave = document.getElementById("userInput").value;
    //Text is saved as an URL, but this is not needed because the type
    //Blob is already chosen in the database.No need to make a URL
    //to the Blob.
    //var textToSaveAsBlob = new Blob([textToSave], {type:"text/plain"});
    //var textToSaveAsURL = window.URL.createObjectURL(textToSaveAsBlob);

$.ajax({
    type: "POST",
    url: "PHP/upload.php",
    data: {image : textToSave},
    //data: {title: titleToSave}
})
.done(function(respond){console.log("done: "+respond);})
.fail(function(respond){console.log("fail");})
.always(function(respond){console.log("always");})


//var textToSave = document.getElementById("userInput").value;
  //var dataUrl = textToSave.toDataURL();
  //var data = { image:dataUrl, date: Date.now() }; 
  //var string = JSON.stringify(data);
  //var textToSaveAsBlob = new Blob([string], {type:"application/json"});

//  var data = { image:dataUrl, date: Date.now() };
//  var string = JSON.stringify(data);

//var file = new Blob([string], {
//        type: 'application/json'
//      });

// var dataUrl = canvas.toDataURL();

} */

function loadCanvas(){
    editImage();









    //var neededData; 
    //$.getJSON('includes/loadCanvas.php', function(jsonData) {
    //neededData = jsonData; 
    //});       
  //$.ajax({ 
  //  type: 'POST',
  //  url: 'includes/loadCanvas.inc.php'
  //});
  //alert(neededData);
}


