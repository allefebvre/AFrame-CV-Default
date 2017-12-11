<?php

class Login {
    //TEST
    private $connection;

    public function __construct($connection = null) {
        global $base, $login, $password;
        if ($connection == null) {
            $this->connection = new Connection($base, $login, $password);
        } else {
            $this->connection = $connection;
        }
    }

    /**
     * Check login and password are correct in Database
     * And set the token connection
     * @param string $login
     * @param string $password
     * @return string
     */
    public function login(string $login, string $password): string {
        $query = "SELECT COUNT(*) FROM Login WHERE Login.Login = :login;";
        $this->connection->executeQuery($query, array(
            ':login' => array($login, PDO::PARAM_STR)
        ));
        $results = $this->connection->getResults();
        if ($results[0][0] > 0 && $this->verifyPassword($password)) {
            $token = $this->setToken();
            return $token;
        } else {
            return "";
        }
    }

    /**
     * Check if a password is in Database
     * @param string $password
     * @return bool
     */
    public function verifyPassword(string $password): bool {
        $query = "SELECT Password FROM Login;";
        $this->connection->executeQuery($query);
        $result = $this->connection->getResults();

        $passwordDB = $result[0]['Password'];

        if (password_verify($password, $passwordDB)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Update the password in Database
     * @param string $newPassword
     */
    public function changePassword(string $newPassword) {
        $query = "UPDATE Login SET Password = :newPassword;";
        $passwordCrypt = password_hash($newPassword, PASSWORD_BCRYPT, ['cost' => 10]);
        $this->connection->executeQuery($query, array(
            ':newPassword' => array($passwordCrypt, PDO::PARAM_STR)
        ));
    }

    /**
     * Check if a token is in Database
     * @param string $token
     * @return bool
     */
    public function verifyToken(string $token): bool {
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
    private function setToken(): string {
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
    private function generateToken(): string {
        $tab = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $token = "";
        $max = count($tab) - 1;
        for ($index = 0; $index < 30; $index++) {
            $token .= $tab[rand(0, $max)];
        }
        return $token;
    }

    /**
     * Delete a Token in Database
     */
    public function deleteToken() {
        $query = "DELETE FROM Token;";
        $this->connection->executeQuery($query);
    }

}
