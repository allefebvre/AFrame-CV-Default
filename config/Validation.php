<?php
class Validation {
     public static function cleanMail (string $value) :string {
        return filter_var($value, FILTER_SANITIZE_EMAIL);
    }
    
    public static function cleanString (string $value) :string {
        return filter_var($value, FILTER_SANITIZE_STRING);
    }
    
    public static function cleanInt (int $value) :int {
        return filter_var($value, FILTER_SANITIZE_NUMBER_INT);
    }
    
    public static function validationMail (string $value) :bool {
        filter_var($value, FILTER_VALIDATE_EMAIL) == FALSE ? $bool=FALSE : $bool=TRUE;
        return $bool;
    }
}
?>