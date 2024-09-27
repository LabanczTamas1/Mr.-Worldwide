<?php

namespace App\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Posts;
use App\Helper;
use App\Tools;
use App\Image;

class PostController {
    private string $city;
    private string $country;

    private function uploadCity(): int {
        $cityModel = new City();
        $existingCity = $cityModel->getItemBy('city_name', $this->city);
        
        if (!$existingCity) {
            $cityModel->attributes["city_name"] = $this->city;
            $cityModel->save();
        }

        return $cityModel->getItemBy('city_name', $this->city)->id;
    }

    private function uploadCountry(): int {
        $countryModel = new Country();
        $existingCountry = $countryModel->getItemBy('country_name', $this->country);
        
        if (!$existingCountry) {
            $countryModel->attributes["country_name"] = $this->country;
            $countryModel->save();
        }

        return $countryModel->getItemBy('country_name', $this->country)->id;
    }

    public function insertPost(array $post): bool {
        global $errors, $user;

        $this->city = $post["city"];
        $this->country = $post["country"];

        $cityId = $this->uploadCity();
        $countryId = $this->uploadCountry();

        $data = [
            "postname" => str_replace("'", "", $post['post_name']),
            "slug" => Tools::slugify($post['post_name'], '-'),
            "description" => str_replace("'", "", $post['description']),
            "continent_id" => intval($post["select"]),
            "city_id" => $cityId,
            "country_id" => $countryId,
            "user_id" => $user->id,
            "post_date" => date('Y-m-d H:i:s'),
        ];

        $img = Image::ImageUpload($_FILES, '/files/blog_image/');
        if (is_array($img)) {
            $errors = array_merge($errors, $img);
        } else {
            $data['image'] = $img;
        }

        if ($this->validatePostData($data, $post)) {
            return $this->savePost($data);
        }
        
        return false;
    }

    private function validatePostData(array $data, array $post): bool {
        if (empty($data['postname']) || empty($data['description']) || empty($post['country']) || empty($post['city'])) {
            Tools::FlashMessage("Adjon meg helyes adatokat.", 'danger');
            return false;
        }
        return true;
    }

    private function savePost(array $data): bool {
        $postEntry = new Posts($data);
        try {
            if ($postEntry->save()) {
                Tools::FlashMessage($data['postname'] . ' hozzáadva', 'success');
                header("Location: /");
                exit;
            }
        } catch (\Exception $e) {
            Tools::FlashMessage("Hiba történt: " . $e->getMessage(), 'danger');
            print_r($data);
            die();
        }
        return false;
    }
}
