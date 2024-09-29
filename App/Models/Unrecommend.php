<?php
namespace App\Models;
use App\Model;

class Unrecommend extends Model
{
    public string  $table = "unrecommended_post";
    public array $attributes = [
        'id' => 'int',
        'post_id' => 'int',
        'user_id' => 'int'
    ] ;
}