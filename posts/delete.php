<?php
Use App\Tools;
require_once __DIR__. '/../lib/autoload.php';
$postItem = new App\Models\Posts;
$comments = new App\Models\Comment;
$recoms = new App\Models\Recommend;
$decoms = new App\Models\Unrecommend;
$db = new App\Database;

$postItem = $postItem->getItemBy('slug',$_GET['slug']);
$comments = $comments->getItemsBy('post_id', $postItem->id);
$recoms = $recoms->getItemsBy('post_id', $postItem->id);
$decoms = $decoms->getItemsBy('post_id', $postItem->id);
try{
    \App\Image::RemoveUploadedImage('/files/blog_image/'.$postItem->image);
    if($decoms){
        $db->delete_all('unrecommended_post','post_id', $postItem->id);
    }
    if($recoms){
        $db->delete_all('recommended_post','post_id', $postItem->id);
    }
    if($comments){
        $db->delete_all('comment','post_id', $postItem->id);
    }
    if($postItem){
        $postItem->delete();
    }
    Tools::FlashMessage('Sikeresen Törölve lett','success');
    header('Location:/');
}catch(Exception $e){
    Tools::FlashMessage('Hiba: '.$e,'danger');
    header('Location: /');
}
?>
