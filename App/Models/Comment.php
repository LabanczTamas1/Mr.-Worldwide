<?php

namespace App\Models;

use App\Model;

class Comment extends Model
{
    public string $table = 'comment';

    public array $attributes = [
        'id' => 'int',
        'comment' => 'string',
        'user_id' => 'int',
        'post_id' => 'int'
    ];
    public function delete_all ($column,$post_id){

        parent::$DB->delete_all($this->table,$column,$post_id);
    }

}
