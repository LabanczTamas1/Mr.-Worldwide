<?php
namespace App\Models;
use App\Model;

class Country extends Model
{
    protected string  $table = "countries";
    public array $attributes = [
        'id' => 'int',
        'counry_name' => 'string',
    ] ;
}