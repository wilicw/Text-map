<!DOCTYPE HTML>
<html>
<head>
	<title>文字圖產生器</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" type="text/css" href="css/semantic.min.css">
</head>

<?php include "jquery.php";?>

<script>
            $(function() {
            	$("#img").hide();
                $("#button").click(function() {
                	var text=$('#text').val();
                	var tcolor=$('#tcolor').val();
                	var bcolor=$('#bcolor').val();
                	var size=$('#size').val();
                	var width=$('#width').val();
                	var height=$('#height').val();
                    $.get("./api.php", {
                        t: text,
                        textcolor: tcolor,
                        backcolor: bcolor,
                        w: width,
                        h:height,
                        size:size,
                        mode:"1"
                    }, function(result) {
                    	$("#img").show();
                        $("#img").attr("src",result);
                    });

                    
                });
            });
        </script>
<body>
<br>
	<div class="ui segment">
  		<form class="ui form">
  			<div class="field">
    			<label>Text</label>
    			<input type="text" id="text" value="">
  			</div>
  			<div class="field">
    			<label>Width</label>
    			<input type="text" id="width" value="">
  			</div>
  			<div class="field">
    			<label>Height</label>
    			<input type="text" id="height" value="">
  			</div>
  			<div class="field">
    			<label>Text size</label>
    			<input type="text" id="size" value="">
  			</div>
  			<div class="field">
    			<label>Text color</label>
    			<input type="text" id="tcolor" value="">
  			</div>
  			<div class="field">
    			<label>Back color</label>
    			<input type="text" id="bcolor" value="">
  			</div>
  			
  			
  			<button class="ui button" id="button" type="button">Submit</button>
		</form>
		<br>
		<div class="ui segment">
			<img id="img" src=""></img>
		</div>
	</div>
</body>