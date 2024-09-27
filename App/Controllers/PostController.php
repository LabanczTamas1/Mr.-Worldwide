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

    private function city_upload() {
        $city = new City();
        $existing_city = $city->getItemBy('city_name', $this->city);
        if (!$existing_city) {
            $city->attributes["city_name"] =$this->city;
            $city->city_name = $this->city;
            $city->save();
            return $city->id;
        }
        return $existing_city->id;
    }

    private function country_upload() {
        $country = new Country();
        $existing_country = $country->getItemBy('country_name', $this->country);
        if (!$existing_country) {
            $country->attributes["country_name"] = $this->country;
            $country->save();
            return $country->id;
        }
        return $existing_country->id;
    }

    public function InsertPost($post) {
        global $errors;
        global $user;

        $this->city = $post["city"];
        $this->country = $post["country"];

        $city_id = $this->city_upload();
        $country_id = $this->country_upload();
        $data["postname"] = str_replace("'", "", $post['post_name']);
        $data["slug"] = Tools::slugify($data['postname'], '-');
        $data["description"] = str_replace("'", "", $post['description']);
        $img = Image::ImageUpload($_FILES, '/files/blog_image/');
        $data["continent_id"] = intval($post["select"]);
        $data["city_id"] = $city_id;
        $data["country_id"] = $country_id;
        $data["user_id"] = $user->id;
        $data["post_date"] = date('Y-m-d H:i:s');
        if (empty($data['postname']) || empty($data['description']) || empty($post['country']) || empty($post['city'])) {
            Tools::FlashMessage("Adjon meg helyes adatokat.", 'danger');
            return false;
        } else {
            if (is_array($img)) {
                $errors = array_merge($errors, $img);
            } else {
                $data['image'] = $img;
            }

            if (empty($errors)) {
                $post_up = new Posts($data);
                try {
                    if ($post_up->save()) {
                        Tools::FlashMessage($data['post_name'] . ' hozzáadva', 'success');
                        header("Location: /");
                        exit;
                    }
                } catch (\Exception $e) {
                    Tools::FlashMessage("Hiba történt: " . $e->getMessage(), 'danger');
                }
            }
        }
    }
}
