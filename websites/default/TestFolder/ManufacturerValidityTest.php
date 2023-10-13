<?php

require_once 'TestFunctionFolder/TestingFunction.php';

// TESTING MANUFACTURER'S NAME ADDING FUNCTIONALITY
class ManufacturerValidityTest extends PHPUnit\Framework\TestCase {

   // TESTING IF THE MANUFACTURER'S NAME INPUT FIELD IS EMPTY
   public function testIfManufacturerNameIsEmpty() {
      $manufacturerName = '';
      $test = ManufacturerCheck($manufacturerName);
      $this->assertFalse($test);
   }

    // TESTING IF THE MANUFACTURER'S NAME INPUT FIELD IS NOT EMPTY
   public function testIfManufacturerNameIsNotEmpty() {
      $manufacturerName = 'FORD';
      $test = ManufacturerCheck($manufacturerName);
      $this->assertTrue($test);
   }
}
