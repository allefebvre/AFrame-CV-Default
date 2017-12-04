<?php

class Validation {

    public static function cleanEmail($value) {
        return filter_var($value, FILTER_SANITIZE_EMAIL);
    }

    public static function cleanString($value) {
        return filter_var($value, FILTER_SANITIZE_STRING);
    }

    public static function cleanInt($value) {
        return filter_var($value, FILTER_SANITIZE_NUMBER_INT);
    }

    public static function cleanFloat($value) {
        return filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT);
    }

}

?>