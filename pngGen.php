<?php
session_start();
function drawImage($adress,$font, $date, $place, $weather)
{
	$im = @imagecreatefrompng($adress);

    /* Если не удалось */
    if(!$im)
    {
        /* Создаем пустое изображение */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        /* Выводим сообщение об ошибке */
        imagestring($im, 1, 5, 5, 'Ошибка загрузки ' . $adress, $tc);
    }
	
	imagettftext($im, 15, 0, 335, 193, $bgc, $font, $date);
	imagettftext($im, 15, 0, 295, 216, $bgc, $font, $place);
	imagettftext($im, 15, 0, 475, 241, $bgc, $font, $weather . '!');

    return $im;
}

header('Content-Type: image/png');

$img = drawImage('Loli.png','ANTQUAI.ttf', '27 декабря','В банкетном зале ДАИР','солнечная погода');

imagepng($img);
imagedestroy($img);
//echo '<img src="Loli.png"/>';


?>