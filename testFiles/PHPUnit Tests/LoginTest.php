<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase {

    static private $connection;
    static private $login;

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/Login.php';
        require 'config/config.php';
        self::$connection = new Connection($base, $login, $password);
        self::$login = new Login(self::$connection);
    }

    public function testLogin() {
        $login = new Login();
        $login = new Login(self::$connection);       
        $login->changePassword("root");
        $this->assertEquals("", $login->login("root", "12"));
        $this->assertEquals("", $login->login("", ""));
        $toTest = $login->login("root", "root");
        self::$connection->executeQuery("SELECT * FROM Token;");
        $token = self::$connection->getResults();
        $this->assertEquals($token[0][0], $toTest);
    }

    public function testVerifyPassword() {
        $this->assertTrue(self::$login->verifyPassword("root"));
        $this->assertFalse(self::$login->verifyPassword("12"));
        $this->assertFalse(self::$login->verifyPassword(""));
    }

    public function testChangePassword() {
        self::$connection->executeQuery("SELECT Password FROM Login;");
        $oldPassword = self::$connection->getResults();
        self::$login->changePassword("root12");
        self::$connection->executeQuery("SELECT Password FROM Login;");
        $newPassword = self::$connection->getResults();
        $this->assertNotEquals($oldPassword, $newPassword);
        self::$login->changePassword("root");
    }

    public function testVerifyToken() {
        $toTest = self::$login->login("root", "root");
        $this->assertTrue(self::$login->verifyToken($toTest));
    }

    public function testDeleteToken() {
        self::$connection->executeQuery("SELECT * FROM Token");
        $oldNbRows = self::$connection->getNbResults();
        self::$login->deleteToken();
        self::$connection->executeQuery("SELECT * FROM Token");
        $newNbRows = self::$connection->getNbResults();
        $this->assertNotEquals($oldNbRows, $newNbRows);
    }

}
