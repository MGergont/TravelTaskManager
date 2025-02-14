<?php

declare(strict_types=1);

namespace Src\Utils;

class ImageTool {
    private $name;
    private $image;

    public function __construct($name, $image) {
        $this->name = $name;
        $this->image = $image;
    }

    public function save() {
        $uploadPath = $this->uploadImage();
        if ($uploadPath) {
            return $uploadPath;
        }
        return 'BRAK';
    }

    private function uploadImage() {
        $imageTmpPath = $this->image['tmp_name'];
        $imageName = $this->image['name'];
        $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageExtension, $allowedExtensions)) {
            flash("addApartment", "Niedozwolony format pliku.");
            return false;
        }

        $newImageName = uniqid('img_', true) . '.' . $imageExtension;
        $uploadPath = './resources/image/' . $newImageName;

        if (move_uploaded_file($imageTmpPath, $uploadPath)) {
            return $newImageName;
        } else {
            flash("addApartment", "Wystąpił błąd podczas przenoszenia pliku.");
            return false;
        }
    }

}

