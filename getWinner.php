<?php
require_once 'bootLoader.php';
require_once 'vendor/autoload.php';

$transport = new Swift_SmtpTransport('smtp.mailtrap.io', 25);
$transport-> setUsername('26631653202e8d');
$transport-> setPassword('bd62e745a9144c');
$message = new Swift_Message("Ваша ставка победила!");
//$message->setTo(["orel580563@mail.ru" => "Кекс"]);
//$content = "<h1>Поздравляем с победой</h1>";
//$message->setBody($content, "text/html");
$message->setFrom("YetiCave@mail.ru", "YetiCave");
// Отправка сообщения
$mailer = new Swift_Mailer($transport);
//$mailer->send($message);

$closedItems = getClosedItems();
foreach ($closedItems as $closedItem) 
{
	$winningBet = getClosedItemBet($closedItem['id']);
    if ($winningBet)
    {  
       var_dump($closedItem);

       $content = include_template('email.php',
       ['userName' => $winningBet[0]['name'],
       'lot_id' => $closedItem['id'],
       'lot_name' => $closedItem['title']
       ]);
       $message->setTo([$winningBet[0]['email'] => "Кекс"]);
       $message->setBody($content, "text/html");
       $mailer->send($message);
       //setItemWinner($closedItem['id'], $winningBet[0]['bid']);
    }
    //сброс finish_date
}

?>
