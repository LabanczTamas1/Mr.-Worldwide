<?php
namespace App\Models;

use App\Model;

class City extends Model
{
    public string $table = "cities";

    public array $attributes = [
        'id' => 'int',
        'city_name' => 'string',
    ];
}
