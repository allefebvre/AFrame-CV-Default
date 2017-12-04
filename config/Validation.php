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
    
    public static function mailValidation (string $value) :bool {
        filter_var($value, FILTER_VALIDATE_EMAIL) == FALSE ? $bool=FALSE : $bool=TRUE;
        return $bool;
    }

    public static function dateValidation (string $value) :bool {
        preg_match("#^[1-2]([0-9]){3}-[0-1][0-9]-[0-3][0-9]$#", $value) == FALSE ? $bool=FALSE : $bool=TRUE;
        return $bool;
    }  
    
    public static function publicationValidation (string $reference, string $authors, string $title, string $date, array &$dViewError) :bool {
        $bool = TRUE;
        if($reference === "") {
            $bool = FALSE;
            $dViewError[] = "You did not fill the field Reference !";
        }
        if($authors === "") {
            $bool = FALSE;
            $dViewError[] = "You did not fill the field Authors !";
        }
        if($title === "") {
            $bool = FALSE;
            $dViewError[] = "You did not fill the field Title !";
        }
        if($date === "") {
            $bool = FALSE;
            $dViewError[] = "You did not fill the field Date !";
        } else {
            $validateDate = Validation::dateValidation($date);
            if(!$validateDate) {
                $bool = FALSE;     
                $dViewError[] = "'$date' : Wrong format for the date, please use this format YYYY-MM-DD !";               
            }
        }
        
        return $bool;
    }
    
    public static function informationValidation (string $status, string $name, string $firstName, string $mail, array &$dViewError) :bool {
        $bool = TRUE;
        if($status === "") {
            $bool = FALSE;
            $dViewError[] = "You did not fill the field Status !";
        }
        if($name === "") {
            $bool = FALSE;
            $dViewError[] = "You did not fill the field Name !";
        }
        if($firstName === "") {
            $bool = FALSE;
            $dViewError[] = "You did not fill the field First Name !";
        }
        if($mail !== "") {
            $validateMail = Validation::mailValidation($mail);
            if(!$validateMail) {
                $bool = FALSE;
                $dViewError[] = "'$mail' : Wrong format for the mail !";
            }
        }
        
        return $bool;
    }
    
    public static function educationValidation (string $date, string $education, array &$dViewError) :bool {
        $bool = TRUE;
        if($date === "") {
            $bool = FALSE;
            $dViewError[] = "You did not fill the field Date !";
        }
        if($education === "") {
            $bool = FALSE;
            $dViewError[] = "You did not fill the field Education !";
        }
        
        return $bool;
    }
    
    public static function workExpValidation (string $date, string $workExp, array &$dViewError) :bool {
        $bool = TRUE;
        if($date === "") {
            $bool = FALSE;
            $dViewError[] = "You did not fill the field Date !";
        }
        if($workExp === "") {
            $bool = FALSE;
            $dViewError[] = "You did not fill the field Work Experience !";
        }
        
        return $bool;
    }
    
    public static function skillValidation (string $category, string $details, array &$dViewError) :bool {
        $bool = TRUE;
        if($category === "") {
            $bool = FALSE;
            $dViewError[] = "You did not fill the field Category !";
        }
        if($details === "") {
            $bool = FALSE;
            $dViewError[] = "You did not fill the field Details !";
        }
        
        return $bool;
    }
    
    public static function diverseValidation (string $diverse, array &$dViewError) :bool {
        $bool = TRUE;
        if($diverse === "") {
            $bool = FALSE;
            $dViewError[] = "You did not fill the field Diverse !";
        }
        
        return $bool;
    }
}

?>