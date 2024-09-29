<?php
namespace App\Models;
use App\Model;

class User extends Model
{
    public string $table = "users";
    public array $attributes = [
        'id' => 'int',
        'username' => 'string',
        'password' => 'string',
        'email' => 'string',
        'type'=> 'string',
    ] ;


    public function like(int $post_id)
    {
        $data = [
            'post_id' => $post_id,
            'user_id' =>$this->id
        ];
        try {
            parent::$DB->insert("recommended_post", $data);
        } catch (\Exception $e) {
            \App\Tools::flashMessage("Valami hiba történt.");
            return false;
        }
        \App\Tools::flashMessage("Mentve");
        return true;
    }
    public function detach_like($like_id)
    {
        try {
            parent::$DB->delete("recommended_post", $like_id);
        } catch (\Exception $e) {
            \App\Tools::FlashMessage("Valami hiba történt.");
            echo $e;
            return false;
        }
        return true;
    }
    public function un_like(int $post_id)
    {
        $data = [
            'post_id' => $post_id,
            'user_id' =>$this->id
        ];
        try {
            parent::$DB->insert("unrecommended_post", $data);
        } catch (\Exception $e) {
            \App\Tools::flashMessage("Valami hiba történt.");
            return false;
        }
        \App\Tools::flashMessage("Mentve");
        return true;
    }
    public function detach_un_like($like_id)
    {
        try {
            parent::$DB->delete("unrecommended_post", $like_id);
        } catch (\Exception $e) {
            \App\Tools::FlashMessage("Valami hiba történt.");
            echo $e;
            return false;
        }
        return true;
    }
    public function isLiked(int $post_id)
    {
        $filter = [
           'post_id' => $post_id,
            'user_id' =>$this->id
        ];
        $db_result = parent::$DB->filter("recommended_post", $filter);
        if (empty($db_result))
            return false;
        $db_result = $db_result[0]["id"];

        return $db_result;
    }
    public function isUnliked(int $post_id)
    {
        $filter = [
            'post_id' => $post_id,
            'user_id' =>$this->id
        ];
        $db_result = parent::$DB->filter("unrecommended_post", $filter);
        if (empty($db_result))
            return false;
        $db_result = $db_result[0]["id"];

        return $db_result;
    }
    public function InsertComment(array $post)
    {
        $data['comment'] = str_replace("'", "", $post['comment']);
        $data['post_id'] = $post['post_id'];
        $data['user_id'] = $this->id;
        if (empty($data['comment'])) {
            \App\Tools::FlashMessage("Az érték nem helyes.");
            return false;
        } else {
            try {
                parent::$DB->insert("comment", $data);
            } catch (\Exception $e) {
                \App\Tools::FlashMessage("Valami hiba történt.");
                echo $e;
                return false;
            }
        }
    }
    public function DeleteComment(int $id)
    {
        try {
            parent::$DB->delete("comment", $id);
        } catch (\Exception $e) {
            \App\Tools::FlashMessage("Valami hiba történt.");
            echo $e;
            return false;
        }
    }
    public function UpdateComment($comment,$id){
        $commentNameSpace = new Comment;
        $commentNameSpace->getItemById($id);
        $commentNameSpace->set('comment',$comment);
        try {
            if($commentNameSpace->update()){
               \APP\Tools::FlashMessage('Sikeresen megváltoztatta hozzászólását.','success');
            return true;
            }
        } catch (\Exception $e) {
            \App\Tools::FlashMessage("Valami hiba történt.");
            echo $e;
            return false;
        }
    }
    public function UpdateUserPassword($post)
    {
        if ($post) {
            $data['password'] =  \App\Tools::Crypt($post['password']);
            $this->set('password', $data['password']);
            try {
                if ($this->update()) {
                    $destroy = new SessionController;
                    $destroy->destroy();
                    header("Location:/");
                    \App\Tools::FlashMessage('Sikeresen megváltoztatta jelszavát.', 'success');
                }
            } catch (\Exception $e) {
                \App\Tools::FlashMessage("Valami hiba történt.");
                echo $e;
                return false;
            }
        } else {
            \App\Tools::FlashMessage('Hiba.', 'danger');
            return false;
        }
    }
    public function UpdateProfileData($post)
    {
        if ($post) {
            $this->set('username', $post['username']);
            try {
                if ($this->update()) {
                    $destroy = new SessionController;
                    $destroy->destroy();
                    header("Location:/");
                    \App\Tools::FlashMessage('Sikeresen megváltoztatta jelszavát.', 'success');
                }
            } catch (\Exception $e) {
                \App\Tools::FlashMessage("Valami hiba történt.");
                echo $e;
                return false;
            }
        }else {
            \App\Tools::FlashMessage('Hiba.', 'danger');
            return false;
        }
    }
}
