<?php

class Login {
    private $connection;
    
    public function __construct() {
        global $base, $login, $password;
        $this->connection = new Connection($base, $login, $password);
    }
    
    /**
     * Check login and password are correct in Database
     * And set the token connection
     * @param string $login
     * @param string $password
     * @return string
     */
    public function login(string $login, string $password) : string {
        $query = "SELECT COUNT(*) FROM Login WHERE Login.Login = :login AND Password = :password;";
        $this->connection->executeQuery($query, array(
            ':login' => array($login, PDO::PARAM_STR),
            ':password' => array($password, PDO::PARAM_STR)
        ));
        $results = $this->connection->getResults();
        if($results[0][0] > 0){
            $token = $this->setToken();
            return $token;
        } else {
            return "";
        }
    }
    
    /**
     * Update the password in Database
     * @param string $oldPassword
     * @param string $newPassword
     * @return bool
     */
    public function changePassword(string $oldPassword, string $newPassword) : bool {
        $query = "SELECT COUNT(*) FROM Login WHERE Password = :oldPassword;";
        $this->connection->executeQuery($query, array(
            ':oldPassword' => array($oldPassword, PDO::PARAM_STR)
        ));
        $result = $this->connection->getResults();
        if($result[0][0] == 0){
            return FALSE;
        }
        $query = "UPDATE Login SET Password = :newPassword;";
        $this->connection->executeQuery($query, array(
            ':newPassword' => array($newPassword, PDO::PARAM_STR)
        ));
        
        return TRUE;
    }
    
    /**
     * Check if a token is in Database
     * @param string $token
     * @return bool
     */
    public function verifyToken(string $token) : bool {
        $query = "SELECT COUNT(*) FROM Token WHERE Token.Token = :token;";
        $this->connection->executeQuery($query, array(
            ':token' => array($token, PDO::PARAM_STR)
        ));
        $results = $this->connection->getResults();
        return $results[0][0] == 1;
    }

    /**
     * Insert a Token in Database
     * @return string
     */
    private function setToken() : string {
        $this->deleteToken();
        
        $token = $this->generateToken();
        $query = "INSERT INTO Token (`Token`) VALUES (:token);";
        $this->connection->executeQuery($query, array(
            ':token' => array($token, PDO::PARAM_STR)
        ));
        return $token;
    }
    
    /**
     * Generate a random Token
     * @return string
     */
    private function generateToken() : string {
        $tab = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n' , 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $token = "";
        $max = count($tab) -1;
        for ($index = 0; $index < 30; $index++) {
            $token .= $tab[rand(0, $max)];
        }
        return $token;
    }
    
    /**
     * Delete a Token in Database
     */
    public function deleteToken(){
        $query = "DELETE FROM Token;";
        $this->connection->executeQuery($query);
    }
}