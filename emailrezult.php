<?php


        $image = new Imagick();
        $draw = new ImagickDraw();
        $pixel = new ImagickPixel( 'white' );
        $image->newImage(620, 877, $pixel);
        $draw->setFillColor('black');
        $draw->setFont('arial');
        $draw->setFontSize( 20 );
        $image->annotateImage($draw, 10, 45, 0, 'The quick brown fox jumps over the lazy dog');
        $image->setImageFormat('png');
        header('Content-type: image/png');
        echo $image;

if (mail("petrov120482@gmail.com", "the subject", "Example message",
"From: webmaster@example.com \r\n")) {
    echo "messege acepted for delivery";
} else {
    echo "some error happen";
}
