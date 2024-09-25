<?php
namespace App\Controllers;
use App\Models\User;
use App\Tools;

class RegisterController {
    public function InsertUser($post) {
        $dataarray['username'] = str_replace("'", "", $post['username']);
        $dataarray['email'] = str_replace("'", "", $post['email']);
        $dataarray['type'] = "User";

        if(empty($dataarray['username']) || empty($dataarray['email'])) {
            Tools::FlashMassage("Adjon meg helyes adatokat!", 'danger');
            return false;
        } else {
            if ($post['passwd1'] == $post['passwd2']) {
                $dataarray['pass'] = Tools::Crypt($post['passwd1']);
            } else {
                Tools::FlashMassage("A jelszavak nem egyeznek!", 'danger');
                return false;
            }

            $userNamespace = new User;

            if ($userNamespace -> getItemBy('username', $dataarray['username'])) {
                Tools::FlashMassage("Már létezik ilyen nevű felhasználó!", 'danger');
                return false;
            }

            if ($userNamespace -> getItemBy('email', $dataarray['email'])) {
                Tools::FlashMassage("Már létezik ilyen email cím!", 'danger');
                return false;
            }

            $user = new User($dataarray);

            if ($user -> save()) {
                Tools::FlashMassage("Sikeres regisztráció!", 'success');
                header('Location: userhandle/login');
            }
        }
    }
}