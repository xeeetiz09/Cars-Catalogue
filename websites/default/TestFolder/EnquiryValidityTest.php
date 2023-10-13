<?php
require_once 'TestFunctionFolder/TestingFunction.php';

// TESTING THE ENQUIRY SEND BY WEBSITE VISITOR FUNCTIONALITY
class EnquiryValidityTest extends PHPUnit\Framework\TestCase {

  // TESTING IF THE USERNAME FIELD IS EMPTY
  public function testIfVisitorUsernameIsEmpty(){
    $visitorData = [
      'name' => '',
      'email' => 'kshitiz@gmail.com',
      'telephone' => '9876543210',
      'enquiry' => 'Enquiry From Visitor',
      'enquiry_date' => '2022-11-01'
    ];
    $test = CheckEnquiryValidation($visitorData);
    $this->assertFalse($test);
  }

  // TESTING IF THE EMAIL FIELD IS EMPTY
  public function testIfVisitorEmailIsEmpty(){
    $visitorData = [
      'name' => 'Kshitiz Paudel',
      'email' => '',
      'telephone' => '9876543210',
      'enquiry' => 'Enquiry From Visitor',
      'enquiry_date' => '2022-11-01'
    ];
    $test = CheckEnquiryValidation($visitorData);
    $this->assertFalse($test);
  }

   // TESTING IF THE TELEPHONE FIELD IS EMPTY
  public function testIfVisitorTelephoneIsEmpty(){
    $visitorData = [
      'name' => 'Kshitiz Paudel',
      'email' => 'kshitiz@gmail.com',
      'telephone' => '',
      'enquiry' => 'Enquiry From Visitor',
      'enquiry_date' => '2022-11-01'
    ];
    $test = CheckEnquiryValidation($visitorData);
    $this->assertFalse($test);
  }

   // TESTING IF THE ENQUIRY FIELD IS EMPTY
  public function testIfMessageIsEmpty(){
    $visitorData = [
      'name' => 'Kshitiz Paudel',
      'email' => 'kshitiz@gmail.com',
      'telephone' => '9876543210',
      'enquiry' => '',
      'enquiry_date' => '2022-11-01'
    ];
    $test = CheckEnquiryValidation($visitorData);
    $this->assertFalse($test);
  }

   // TESTING IF THE DATE IS EMPTY
  public function testIfDateIsEmpty(){
    $visitorData = [
      'name' => 'Kshitiz Paudel',
      'email' => 'kshitiz@gmail.com',
      'telephone' => '9876543210',
      'enquiry' => 'Enquiry From Visitor',
      'enquiry_date' => ''
    ];
    $test = CheckEnquiryValidation($visitorData);
    $this->assertFalse($test);
  }

  // TESTING IF THE PROVIDED DATA IS VALID
  public function testIfVisitorDataIsValid(){
    $visitorData = [
      'name' => 'Kshitiz Paudel',
      'email' => 'kshitiz@gmail.com',
      'telephone' => '9876543210',
      'enquiry' => 'Enquiry From Visitor',
      'enquiry_date' => '2022-11-01'
    ];
    $test = CheckEnquiryValidation($visitorData);
    $this->assertTrue($test);
  }
}