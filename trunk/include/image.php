<?php
require 'settings.php';
if ($homepageimage == "1") {
	$w = strlen($homepage);
	$wd = round($w / 4, 0, PHP_ROUND_HALF_UP);
	if ($w < 20){
		$wd = '20';
	}
	header("Content-type: image/png");
	$size = 10;
	$width = '700';
	$height = $wd;
	$string = $homepage;

	$im = imagecreatetruecolor(400, 30);
	$image = imagecreate($width, $height);

	$background = ImageColorAllocate($image, 255, 255, 255);
	$color = imagecolorallocate ($image, 0, 0, 0);
	image_create($image, $size, 3, 2, $string, $color, $width);
	imagepng($image);
	imageDestroy($image);
}

function image_create($image, $size, $x, $y, $text, $color, $maxwidth) {
	$fontwidth = ImageFontWidth($size);
	$fontheight = ImageFontHeight($size);

	if ($maxwidth != NULL) {
		$maxchar = floor($maxwidth / $fontwidth);
		$text = wordwrap($text, $maxchar, "\n", 1);
	}

	$lines = explode("\n", $text);
	while (list($numl, $line) = each($lines)) {
		ImageString($image, $size, $x, $y, $line, $color);
		$y += $fontheight;
	}
}

?>
