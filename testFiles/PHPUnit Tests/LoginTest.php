<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase {
    
    private $connection;
    private $login;

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/Login.php';
        require 'config/config.php';        
    }
    
    /**
     * @before
     */
    public function setUp(){
        require 'config/config.php';  
        $this->connection = new Connection($base, $login, $password);
        $this->login = new Login($this->connection);
    }
    
    public function testLogin() {

        $this->assertEquals("", $this->login->login("root", "12"));
        $this->assertEquals("", $this->login->login("", ""));
        $toTest = $this->login->login("root", "root");
        $this->connection->executeQuery("SELECT * FROM Token;");
        $token = $this->connection->getResults();
        $this->assertEquals($token[0][0], $toTest);        
    }

    public function testVerifyPassword() {
        $this->assertTrue($this->login->verifyPassword("root"));
        $this->assertFalse($this->login->verifyPassword("12"));
        $this->assertFalse($this->login->verifyPassword(""));
    }

    public function testChangePassword() {
        $this->connection->executeQuery("SELECT Password FROM Login;");
        $oldPassword = $this->connection->getResults();
        $this->login->changePassword("root12");
        $this->connection->executeQuery("SELECT Password FROM Login;");
        $newPassword = $this->connection->getResults();
        $this->assertNotEquals($oldPassword, $newPassword);
        
    }

    public function verifyTokenTest() {
        
    }

    public function setTokenTest() {
        
    }

    public function generateTokenTest() {
        
    }

    public function deleteToken() {
        
    }

}
