<?php
namespace App\Controllers;

use App\Models\User;
use App\Tools;

class RegisterController {
    public function InsertUser($post) {
        $dataarray['username'] = str_replace("'", "", $post['username']);
        $dataarray['email'] = str_replace("'", "", $post['email']);
        $dataarray['type'] = "User";

        // Validate required fields and passwords
        if (empty($dataarray['username']) || empty($dataarray['email'])) {
            Tools::FlashMessage("Please provide valid username and email.", 'danger');
            return false;
        } elseif ($post['passwd1'] !== $post['passwd2']) {
            Tools::FlashMessage("Passwords do not match.", 'danger');
            return false;
        }

        // Check for existing username and email
        $userNamespace = new User;
        if ($userNamespace->getItemBy('username', $dataarray['username'])) {
            Tools::FlashMessage("Username already exists.", 'danger');
            return false;
        } elseif ($userNamespace->getItemBy('email', $dataarray['email'])) {
            Tools::FlashMessage("Email already exists.", 'danger');
            return false;
        }

        // Create and save the user
        $dataarray['password'] = Tools::Crypt($post['passwd1']);
        $user = new User($dataarray);
        if ($user->save()) {
            Tools::FlashMessage("Successful registration!", 'success');
            header('Location: /userhandle/login');
        } else {
            // Handle save errors (consider specific error handling)
            Tools::FlashMessage("Error occurred during registration.", 'danger');
            return false;
        }
    }
}