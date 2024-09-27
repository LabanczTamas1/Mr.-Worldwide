<?php
namespace App\Models;
use App\Model;

class Country extends Model
{
    public string  $table = "countries";
    public array $attributes = [
        'id' => 'int',
        'country_name' => 'string',
    ] ;
}