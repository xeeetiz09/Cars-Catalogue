<?php
require_once 'TestFunctionFolder/TestingFunction.php';

// TESTING STORY ADDING FUNCTIONALITY
class StoryPostValidity extends PHPUnit\Framework\TestCase {

  // TESTING IF THE ADMIN'S NAME IS EMPTY
  public function testIfNameIsEmpty(){
    $story = [
        'staff_name' => '',
        'context' => 'BIG GIVEAWAY ON THE WAY',
        'post_date' => '2022-11-02',
    ];
    $test = CheckStoryValidation($story);
    $this->assertFalse($test);
  }

  // TESTING IF THE ADMIN'S NAME IS EMPTY
  public function testIfContextIsEmpty(){
    $story = [
        'staff_name' => 'Claire',
        'context' => '',
        'post_date' => '2022-11-02',
    ];
    $test = CheckStoryValidation($story);
    $this->assertFalse($test);
  }

  // TESTING IF THE POST DATE IS EMPTY
  public function testIfDateIsEmpty(){
    $story = [
        'staff_name' => 'Claire',
        'context' => 'BIG GIVEAWAY ON THE WAY',
        'post_date' => '',
    ];
    $test = CheckStoryValidation($story);
    $this->assertFalse($test);
  }

  // TESTING IF THE STORY'S DATA IS VALID
  public function testIfDataIsValid(){
    $story = [
        'staff_name' => 'Claire',
        'context' => 'BIG GIVEAWAY ON THE WAY',
        'post_date' => '2022-11-02',
    ];
    $test = CheckStoryValidation($story);
    $this->assertTrue($test);
  }

}
