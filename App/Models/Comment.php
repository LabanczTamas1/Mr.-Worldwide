<?php

namespace App\Models;

use App\Model;

class Comment extends Model
{
    public string $table = 'comments';

    public array $attributes = [
        'id' => 'int',
        'comment' => 'string',
        'user_id' => 'int',
        'post_id' => 'int'
    ];

}
