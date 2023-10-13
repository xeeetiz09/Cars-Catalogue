<?php
require_once 'TestFunctionFolder/TestingFunction.php';

// TESTING JOB ANNOUNCEMENT FUNCTIONALITY
class JobAnnValidityTest extends PHPUnit\Framework\TestCase {

  // TESTING IF THE JOB'S TITLE IS EMPTY
  public function testIfTitleIsEmpty(){
    $jobAnnouncementData = [
      'job_title' => '',
      'job_description' => 'BIG GIVEAWAY ON THE WAY',
      'vacancy' => '1',
    ];
    $test = CheckJobValidation($jobAnnouncementData);
    $this->assertFalse($test);
  }

 // TESTING IF THE JOB'S DESCRIPTION IS EMPTY
  public function testIfDescriptionIsEmpty(){
    $jobAnnouncementData = [
      'job_title' => 'Manager',
      'job_description' => '',
      'vacancy' => '1',
    ];
    $test = CheckJobValidation($jobAnnouncementData);
    $this->assertFalse($test);
  }

  // TESTING IF THE JOB'S VACANCY IS EMPTY
  public function testIfVacancyIsEmpty(){
    $jobAnnouncementData = [
      'job_title' => 'Manager',
      'job_description' => 'BIG GIVEAWAY ON THE WAY',
      'vacancy' => '',
    ];
    $test = CheckJobValidation($jobAnnouncementData);
    $this->assertFalse($test);
  }

  // TESTING IF THE JOB'S DATA IS VALID
  public function testIfDataIsValid(){
    $jobAnnouncementData = [
      'job_title' => 'Manager',
      'job_description' => 'BIG GIVEAWAY ON THE WAY',
      'vacancy' => '1',
    ];
    $test = CheckJobValidation($jobAnnouncementData);
    $this->assertTrue($test);
  }
  
}