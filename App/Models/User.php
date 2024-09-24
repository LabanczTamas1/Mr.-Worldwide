<?php
namespace App\Models;
use App\Model;

class City extends Model
{
    protected $table = "users";
    public array $attributes = [
        'id' => 'int',
        'username' => 'string',
        'password' => 'string',
        'email' => 'string',
        'type'=> 'string',
    ] ;
}