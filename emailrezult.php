<?php
ob_start();
require_once ('config.php');
require_once 'vendor/autoload.php';


$result1 = mysqli_query($link, "SELECT * FROM register WHERE id=$fff");
$row1 = mysqli_fetch_array($result1);

$result2 = mysqli_query($link, "SELECT * FROM dbtest1 WHERE id=$fff");
$row2 = mysqli_fetch_array($result2);

$result3 = mysqli_query($link, "SELECT * FROM dbtest2 WHERE id=$fff");
$row3 = mysqli_fetch_array($result3);

$result4 = mysqli_query($link, "SELECT * FROM dbtest3 WHERE id=$fff");
$row4 = mysqli_fetch_array($result4);

if ($row2[1]=="Реактивна тривожність НИЗЬКА" && $row3[1]=="Індекс САН  ВИСОКИЙ" && $row4[1]==" ТАК ГОТОВИЙ" ){
$row5 = "ДОПУСТИТИ";
}else $row5 = "НЕ ДОПУСКАТИ";

$image = new Imagick();
$draw = new ImagickDraw();
$pixel = new ImagickPixel( 'white' );
$image->newImage(620, 877, $pixel);
$draw->setFillColor('black');
$draw->setFont('Arial');
$draw->setFontSize( 14 );
$image->annotateImage($draw, 100, 40, 0, $row1[1]." ".$row1[2]." ".$row1[3]);
$image->annotateImage($draw, 100, 60, 0, 'Військвоа частина'." ".$row1[4]);
$image->annotateImage($draw, 100, 80, 0, 'Email:'." ".$row1[5]);
$image->annotateImage($draw, 240, 120, 0, 'РЕЗУЛЬТАТ ТЕСТУ:');
$image->annotateImage($draw, 100, 140, 0, $row2[1]."  ,  ".$row3[1]);
$image->annotateImage($draw, 100, 160, 0,'Готовність до несення служби зі зброєю:'." ".$row4[1]);
$image->annotateImage($draw, 200, 180, 0, 'Пропозиції військовослужбовця:');
$image->annotateImage($draw, 100, 200, 0, $row4[2]);
$image->annotateImage($draw, 100, 240, 0, 'До служби зі зброєю, РЕКОМЕНДОВАНО:'." ".$row5);
$image->annotateImage($draw, 100, 260, 0, 'Час проходження тесту:'." ".$date->format("d-m-Y H:i:s"));
$image->setImageFormat('jpg');
header('Content-Disposition: attachment; filename="imgRezultat.jpg"');
echo $image;



/*$subject="Привет это письмо темы 1";
$email="ip1204@ukr.net";
mail($email, $subject, $message,
    "From: webmaster@petrov.net\r\n"
    ."Reply-To: webmaster@petrov.net\r\n"
    ."X-Mailer: PHP/" . phpversion());*/
// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.ukr.net', 465, 'ssl'))
    ->setUsername('ip1204@ukr.net')
    ->setPassword('v4A16200826')
;
// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
    ->setFrom(['ip1204@ukr.net' => 'John Doe'])
    ->setTo(['ip1204@ukr.net', 'petrov120482@gmail.com' => 'A name'])
    ->setBody('Here is the message itself')
;
// Send the message
$result = $mailer->send($message);
