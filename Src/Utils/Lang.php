<?php

declare(strict_types=1);

namespace Src\Utils;

class Lang {
    private string $language;
    private string $page;
    private array $translations = [];
    
    public function __construct(string $language = 'pl') {
        $this->setLanguage($language,);
    }

    public function setLanguage(string $language): void {
        $this->language = $language;
    }

    public function setTamplate(string $page): void {
        $this->page = $page;
    }

    public function get(): array{
        $this->loadTranslations();
        return $this->translations[$this->page];
    }

    private function loadTranslations() {
        $filePath =  './resources/lang/' . $this->language . '.php';

        if (file_exists($filePath)) {
            $this->translations = include($filePath);
        } else {
            $this->translations = [];
        }
    }
}