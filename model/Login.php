<?php

class Login {
    private $connection;
    
    public function __construct() {
        global $base, $login, $password;
        $this->connection = new Connection($base, $login, $password);
    }
    
    public function login(string $login, string $password) : string {
        $query = "SELECT COUNT(*) FROM Login WHERE Login.Login = '$login' AND Password = '$password';";
        $this->connection->executeQuery($query);
        $results = $this->connection->getResults();
        if($results[0][0] > 0){
        $token = $this->setToken();
        return $token;
        } else {
            return "";
        }
    }
    
    public function changePassword($oldPassword, $newPassword) : bool {
        $query = "SELECT COUNT(*) FROM Login WHERE Password = '$oldPassword';";
        $this->connection->executeQuery($query);
        $result = $this->connection->getResults();
        if($result[0][0] == 0){
            return FALSE;
        }
        $query = "UPDATE `Login` SET `Password` = '$newPassword'";
        $this->connection->executeQuery($query);
        
        return TRUE;
    }
    
    public function verifyToken($token) : bool {
        $query = "SELECT COUNT(*) FROM Token WHERE Token.Token = '$token';";
        $this->connection->executeQuery($query);
        $results = $this->connection->getResults();
        return $results[0][0] == 1;
    }


    private function setToken() : string {
        $query = "DELETE FROM Token";
        $this->connection->executeQuery($query);
        
        $token = $this->generateToken();
        $query = "INSERT INTO `Token` (`Token`) VALUES ('$token')";
        $this->connection->executeQuery($query);
        return $token;
    }
    
    private function generateToken() : string {
        $tab = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n' , 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $token = "";
        $max = count($tab);
        for ($index = 0; $index < 30; $index++) {
            $token .= $tab[rand(0, $max)];
        }
        return $token;
    }
    
    public function deleteToken(){
        $query = "DELETE FROM Token";
        $this->connection->executeQuery($query);
    }
}