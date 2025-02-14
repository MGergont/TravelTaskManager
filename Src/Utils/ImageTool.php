<?php

declare(strict_types=1);

namespace Src\Utils;

class ImageTool {
    private $error;
    private $name;
    private $image;

    public function __construct(string $name, $image, string $error) {
        $this->name = $name;
        $this->error = $error;
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
            flash($this->error, "Niedozwolony format pliku.");
            return false;
        }

        $newImageName = uniqid('img_', true) . '.' . $imageExtension;
        $uploadPath = './resources/image/' .$this->name. '/' . $newImageName;

        if (move_uploaded_file($imageTmpPath, $uploadPath)) {
            return $newImageName;
        } else {
            flash($this->error, "Wystąpił błąd podczas przenoszenia pliku.");
            return false;
        }
    }

}

