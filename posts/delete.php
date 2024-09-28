<?php
Use App\Tools;
requireonce _DIR . '/../lib/autoload.php';
$postItem = new \App\Models\Posts;
$postItem->getItemBy('slug',$_GET['slug']);


$postItem->delete();

Tools::FlashMessage('Sikeresen Törölve lett','success');
header('Location:/');

?>
