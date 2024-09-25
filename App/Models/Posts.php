<?php
namespace App\Models;
use App\Model;

class City extends Model
{
    protected string  $table = "posts";
    public array $attributes = [
        'id' => 'int',
        'postname' => 'string',
        'slug' => 'string',
        'description'=> 'string',
        'image'=> 'string',
        'country_id'=> 'int',
        'city_id'=> 'int',
        'continent_id'=> 'int',
        'user_id'=> 'int',
        'post_date'=> 'string',
    ] ;
}