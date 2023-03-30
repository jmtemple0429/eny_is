<?php namespace App\Imports;
    abstract class BaseImport { 
        public function normalizeText($text) {
            return ucwords(strtolower($text));
        }
    }