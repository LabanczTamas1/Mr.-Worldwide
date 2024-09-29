<?php
namespace App\Models;
use App\Model;

class Recommend extends Model
{
    public string  $table = "recommended_post";
    public array $attributes = [
        'id' => 'int',
        'post_id' => 'int',
        'user_id' => 'int'
    ] ;
}