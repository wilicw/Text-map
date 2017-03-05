<?php
$text  = $_GET['t'];
$thex = "#".$_GET['textcolor'];
$bhex = "#".$_GET['backcolor'];
list($tr, $tg, $tb) = sscanf($thex, "#%02x%02x%02x");
list($br, $bg, $bb) = sscanf($bhex, "#%02x%02x%02x");
$w =$_GET['w'];
$h =$_GET['h'];
$image = imagecreate($w ,$h);
$bbg = imagecolorallocate($image, $br, $bg, $bb);
$size=$_GET['size'];
$font  = 'font.otf';
$angle = 0;
$black = imagecolorallocate($image, $tr, $tg, $tb);
$bbox = imagettfbbox($size, $angle, $font, $text );
$font_width = $bbox[4] / 2;
$font_heigh = $bbox[5] / 2;
$x = $w / 2 - $font_width;
$y = $h / 2 - $font_height+20;
imagettftext($image, $size, 0, $x, $y, $black, $font, $text);
ob_start();
imagepng($image);
$output = base64_encode(ob_get_clean());
imagedestroy($image);
if($_GET['mode']=="1"){
    echo 'data:image/png;base64,'.$output;
}else{
    echo '<img src="data:image/png;base64,'.$output.'"></img>';
}
?>