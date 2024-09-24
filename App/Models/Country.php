<?php
namespace App\Models;
use App\Model;

class City extends Model
{
    protected $table = "countries";
    public array $attributes = [
        'id' => 'int',
        'counry_name' => 'string',
    ] ;
}