<?php
require_once 'TestFunctionFolder/TestingFunction.php';

// TESTING ADMIN ADDING FUNCTIONALITY
class AdminAddTest extends PHPUnit\Framework\TestCase {

  // TESTING IF THE USERNAME FIELD IS EMPTY
  public function testIfUsernameIsEmpty(){
    $admin_credential = ['username' => '',
      'email' => 'clairescarsnorthampton@hotmail.com',
      'password' => 'opensesame'
    ];
    $test = AdminAddCheck($admin_credential);
    $this->assertFalse($test);
  }

  // TESTING IF THE EMAIL FIELD IS EMPTY
  public function testIfEmailIsEmpty(){
    $admin_credential = ['username' => 'Claire', 'email' => '', 'password' => 'opensesame'];
    $test = AdminAddCheck($admin_credential);
    $this->assertFalse($test);
  }

  // TESTING IF THE PASSWORD FIELD IS EMPTY
  public function testIfPasswordIsEmpty(){
    $admin_credential = ['username' => 'Claire',
      'email' => 'clairescarsnorthampton@hotmail.com',
      'password' => ''];
    $test = AdminAddCheck($admin_credential);
    $this->assertFalse($test);
  }

  // TESTING IF THE PROVIDED CREDENTIALS IS VALID
  public function testIfCredentialIsValid(){
    $admin_credential = ['username' => 'Claire',
      'email' => 'clairescarsnorthampton@hotmail.com', 
      'password' => 'opensesame'];
    $test = AdminAddCheck($admin_credential);
    $this->assertTrue($test);
  }

}
