<?php
session_start();
$captcha_code = '';
$captcha_image = imagecreatetruecolor(100, 30);
$background_color = imagecolorallocate($captcha_image, 255, 255, 255);
$text_color = imagecolorallocate($captcha_image, 0, 0, 0);
$font_size = 5;

imagefilledrectangle($captcha_image, 0, 0, 100, 30, $background_color);

for ($i = 0; $i < 6; $i++) {
    $captcha_code .= chr(rand(97, 122));
}

$_SESSION['captcha_code'] = $captcha_code;

imagestring($captcha_image, $font_size, 10, 10, $captcha_code, $text_color);
header('Content-Type: image/jpeg');
imagejpeg($captcha_image);
imagedestroy($captcha_image);
?>
