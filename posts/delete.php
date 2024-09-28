<?php
Use App\Tools;
require_once __DIR__ . '/../lib/autoload.php';
$postItem = new \App\Models\Posts;
$postItem->getItemBy('slug',$_GET['slug']);


$postItem->delete();

Tools::FlashMessage('Sikeresen Törölve lett','success');
header('Location:/');

?>
