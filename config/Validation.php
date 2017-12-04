<?php

class Validation {

    /**
     * Clean a mail
     * (Remove all characters except letters, numbers, and !#$%&'*+-=?^_`{|}~@.[])
     * @param string $mail
     * @return string
     */
    public static function cleanMail (string $mail) :string {
        return filter_var($mail, FILTER_SANITIZE_EMAIL);
    }
    
    /**
     * Clean a string
     * (Remove tags, and remove or encode special characters)
     * @param string $string
     * @return string
     */
    public static function cleanString (string $string) :string {
        return filter_var($string, FILTER_SANITIZE_STRING);
    }
    
    /**
     * Clean an int
     * (Remove all characters except digits, plus and minus signs)
     * @param int $int
     * @return int
     */
    public static function cleanInt (int $int) :int {
        return filter_var($int, FILTER_SANITIZE_NUMBER_INT);
    }
    
    /**
     * Check that mail is valid
     * @param string $mail
     * @return bool
     */
    public static function mailValidation (string $mail) :bool {
        filter_var($mail, FILTER_VALIDATE_EMAIL) == FALSE ? $bool=FALSE : $bool=TRUE;
        return $bool;
    }

    /**
     * Check that date is valid
     * (YYYY-MM-DD)
     * @param string $date
     * @return bool
     */
    public static function dateValidation (string $date) :bool {
        preg_match("#^(19|20)([0-9]){2}-(0?[1-9]|1[012])-(0?[1-9]|[12][0-9]|3[01])$#", $date) == FALSE ? $bool=FALSE : $bool=TRUE;
        return $bool;
    }  
    
    /**
     * Check that fields of Publication's forms are valid
     * @param string $reference
     * @param string $authors
     * @param string $title
     * @param string $date
     * @param array $dViewError
     * @return bool
     */
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
    
    /**
     * Check that fields of a Information's form are valid
     * @param string $status
     * @param string $name
     * @param string $firstName
     * @param string $mail
     * @param array $dViewError
     * @return bool
     */
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
    
    /**
     * Check that fields of a Education's form are valid
     * @param string $date
     * @param string $education
     * @param array $dViewError
     * @return bool
     */
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
    
    /**
     * Check that fields of a WorkExp's form are valid
     * @param string $date
     * @param string $workExp
     * @param array $dViewError
     * @return bool
     */
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
    
    /**
     * Check that fields of a Skill's form are valid
     * @param string $category
     * @param string $details
     * @param array $dViewError
     * @return bool
     */
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
    
    /**
     * Check that fields of a Diverse's form are valid
     * @param string $diverse
     * @param array $dViewError
     * @return bool
     */
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