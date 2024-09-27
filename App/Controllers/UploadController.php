<?php

namespace App\Controllers;

use App\Models\Posts;
use App\Helper;
use App\Tools;

class UploadController {

    public function InsertPost($post, $files) {
        if (empty($post['continent']) || empty($post['country']) || empty($post['city']) || empty($post['description'])) {
            Tools::FlashMessage("Minden mezőt ki kell tölteni!", 'danger');
            return false;
        }


        $image = $files['image'];
        if ($image['error'] !== UPLOAD_ERR_OK) {
            Tools::FlashMessage("Hiba történt a kép feltöltése közben!", 'danger');
            return false;
        }


        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($image['type'], $allowedMimeTypes)) {
            Tools::FlashMessage("A kép formátuma nem megfelelő! Csak JPEG, PNG, és GIF formátumok engedélyezettek.", 'danger');
            return false;
        }


        $uploadDir = __DIR__ . '/../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $uploadFileName = uniqid() . '-' . basename($image['name']);
        $uploadFilePath = $uploadDir . $uploadFileName;
        
        if (!move_uploaded_file($image['tmp_name'], $uploadFilePath)) {
            Tools::FlashMessage("Nem sikerült a fájl mentése.", 'danger');
            return false;
        }


        $dataarray = [
            'postname' => $post['city'] . ' - ' . $post['country'],
            'slug' => Tools::slugify($post['city']),
            'description' => $post['description'],
            'image' => $uploadFileName,
            'continent_id' => $this->getContinentId($post['continent']),
            'country_id' => $this->getCountryId($post['country']),
            'city_id' => $this->getCityId($post['city']),
            'user_id' => Helper::user()->id,
            'post_date' => date('Y-m-d H:i:s')
        ];

        // Create a new post//
        $postModel = new Posts();
        if ($postModel->save($dataarray)) {
            Tools::FlashMessage("Sikeres feltöltés!", 'success');
            header('Location: /posts/view/' . $dataarray['slug']);
        } else {
            Tools::FlashMessage("Nem sikerült a poszt mentése!", 'danger');
        }
    }

    
    private function getContinentId($continentName) {
        // TODO
    }

    private function getCountryId($countryName) {
        // TODOka
    }

    private function getCityId($cityName) {
        // TODO???
    }
}
