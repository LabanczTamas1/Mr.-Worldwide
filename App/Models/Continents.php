<?php
namespace App\Models;
use App\Model;

class Continents extends Model
{
    protected string  $table = "continents";
    public array $attributes = [
        'id' => 'int',
        'continent_name' => 'string',
    ] ;
}