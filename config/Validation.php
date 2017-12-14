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
        filter_var($mail, FILTER_VALIDATE_EMAIL) == FALSE ? $validate=FALSE : $validate=TRUE;
        return $validate;
    }

    /**
     * Check that date is valid
     * format : YYYY-MM-DD
     * @param string $date
     * @return bool
     */
    public static function dateValidation (string $date) :bool {
        preg_match("#^(19|20)([0-9]){2}-(0?[1-9]|1[012])-(0?[1-9]|[12][0-9]|3[01])$#", $date) == FALSE ? $validate=FALSE : $validate=TRUE;
        return $validate;
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
        $validate = TRUE;
        if($reference === "") {
            $validate = FALSE;
            $dViewError[] = "You did not fill the field 'Reference' !";
        }
        if($authors === "") {
            $validate = FALSE;
            $dViewError[] = "You did not fill the field 'Authors' !";
        }
        if($title === "") {
            $validate = FALSE;
            $dViewError[] = "You did not fill the field 'Title' !";
        }
        if($date === "") {
            $validate = FALSE;
            $dViewError[] = "You did not fill the field 'Date' !";
        } else {
            $validateDate = Validation::dateValidation($date);
            if(!$validateDate) {
                $validate = FALSE;     
                $dViewError[] = "'$date' : Wrong format for the date, please use this format YYYY-MM-DD !";               
            }
        }
        
        return $validate;
    }
    
    /**
     * Check that field of a Section's form is valid
     * @param string $title
     * @param array $dViewError
     * @return bool
     */
    public static function sectionValidation (string $title, array &$dViewError) :bool {
        $validate = TRUE;
        if($title === "") {
            $validate = FALSE;
            $dViewError[] = "You did not fill the field 'Title' !";
        }
        
        return $validate;
    }
    
    /**
     * Check that field of a Resume's form is valid
     * @param string $content
     * @param array $dViewError
     * @return bool
     */
    public static function resumeValidation (string $content, array &$dViewError) :bool {
        $validate = TRUE;
        if($content === "") {
            $validate = FALSE;
            $dViewError[] = "You did not fill the field 'Content' !";
        }
        
        return $validate;
    }
    
    /**
     * Check that fields of a change password's form are valid
     * @param string $passwordOld
     * @param string $password
     * @param string $passwordConf
     * @param array $dViewError
     * @return bool
     */
    public static function changePasswordValidation (string $passwordOld, string $password, string $passwordConf, array &$dViewError) :bool {
        $validate = TRUE;
        $login = new Login();
        if (!$login->verifyPassword($passwordOld)) {
            $validate = FALSE;
            $dViewError[] = "Wrong old password !";
        }
        if($password === "") {
            $validate = FALSE;
            $dViewError[] = "You did not fill the field 'New password' !";
        }
        if($passwordConf === "") {
            $validate = FALSE;
            $dViewError[] = "You did not fill the field 'New password again' !";
        }
        if ($password !== $passwordConf) {
            $validate = FALSE;
            $dViewError[] = "New Passwords are not the same !";
        }
        
        return $validate;
    }
    
    /**
     * Check that fields of a clogin's form are valid
     * @param string $login
     * @param string $password
     * @param array $dViewError
     * @return bool
     */
    public static function loginValidation(string $login, string $password, array &$dViewError) :bool {
        $validate = TRUE;
        if ($login != null && $login != "" && $password != null && $password != "") {
            $login2 = new Login();
            $result = $login2->login("$login", "$password");
            if ($result != "") {
                setcookie("token", $result, time() + 3600 * 4);
            } else {
                $validate = FALSE;
                $dViewError[] = "Wrong Login/Password !";
            }
        } else {
            $validate = FALSE;
            $dViewError[] = "Please enter Login and Password !";
        }
        
        return $validate;
    }
}

?>