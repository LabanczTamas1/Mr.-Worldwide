<?php
Use App\Tools;
require_once __DIR__ . '/../lib/autoload.php';
$postItem = new \App\Models\Posts;
$postItem->getItemBy('slug',$_GET['slug']);

$comments = new \App\Models\Comment;
$commets = $comments->getItemBy('post_id',$postItem->id);

$db= new App\Database;
$liked_post=$db->getItemByValue('recommended_post','post_id',$postItem->id);
if($liked_post)
{
    $db->delete('recommended_post',$liked_post[0]["id"]);

}
$disliked_post=$db->getItemByValue('unrecommended_post','post_id',$postItem->id);
if($disliked_post)
{
    $db->delete('unrecommended_post',$disliked_post[0]["id"]);

}
if($comments){
    $comments->delete_all($postItem->id);

}

$postItem->delete();

Tools::FlashMessage('Sikeresen Törölve lett','success');
header('Location:/');

?>
