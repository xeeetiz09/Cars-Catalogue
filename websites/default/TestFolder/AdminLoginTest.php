<?php
require_once 'TestFunctionFolder/TestingFunction.php';

// TESTING ADMIN LOGIN
class AdminLoginTest extends PHPUnit\Framework\TestCase {

  // TESTING IF THE USERNAME FIELD IS EMPTY
  public function testIfUsernameIsEmpty(){
    $admin_credential = ['username' => '', 'password' => 'opensesame'];
    $test = AdminLoginCheck($admin_credential);
    $this->assertFalse($test);
  }

  // TESTING IF THE PASSWORD FIELD IS EMPTY
  public function testIfPasswordIsEmpty(){
    $admin_credential = ['username' => 'Claire', 'password' => ''];
    $test = AdminLoginCheck($admin_credential);
    $this->assertFalse($test);
  }

  // TESTING IF THE PROVIDED CREDENTIALS IS VALID
  public function testIfCredentialIsValid(){
    $admin_credential = ['username' => 'Claire', 'password' => 'opensesame'];
    $test = AdminLoginCheck($admin_credential);
    $this->assertTrue($test);
  }

}
