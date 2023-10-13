<?php
require_once 'TestFunctionFolder/TestingFunction.php';

// TESTING CAR ADDING FUNCTIONALITY
class CarValidityTest extends PHPUnit\Framework\TestCase {

  // TESTING IF THE CAR'S NAME INPUT FIELD IS EMPTY
  public function testIfCarNameIsEmpty(){
    $car_credentials = ['car_name' => '', 
    'engine' => 'Diesel', 
    'mileage' => '7', 
    'prev_price' => '12000', 
    'cur_price' => '10000',
    'postedBy' => 'Fred', 
    'manufacturerId' => '3', 
    'description' => 'Available in black, blue and red color',
    'archived' => 'N'];
    $test = CarCheck($car_credentials);
    $this->assertFalse($test);
  }

   // TESTING IF THE CAR'S ENGINE INPUT FIELD IS EMPTY
  public function testIfEngineIsEmpty(){
    $car_credentials = ['car_name' => 'Camaro', 
    'engine' => '', 
    'mileage' => '7', 
    'prev_price' => '12000', 
    'cur_price' => '10000',
    'postedBy' => 'Fred', 
    'manufacturerId' => '3', 
    'description' => 'Available in black, blue and red color',
    'archived' => 'N'];
    $test = CarCheck($car_credentials);
    $this->assertFalse($test);
  }

  // TESTING IF THE CAR'S MILEAGE INPUT FIELD IS EMPTY
  public function testIfMileageIsEmpty(){
    $car_credentials = ['car_name' => 'Camaro', 
    'engine' => 'Diesel', 
    'mileage' => '', 
    'prev_price' => '12000',
    'cur_price' => '10000',
    'postedBy' => 'Fred', 
    'manufacturerId' => '3', 
    'description' => 'Available in black, blue and red color',
    'archived' => 'N'];
    $test = CarCheck($car_credentials);
    $this->assertFalse($test);
  }

   // TESTING IF THE CAR'S PRICE INPUT FIELD IS EMPTY
  public function testIfPriceIsEmpty(){
    $car_credentials = ['car_name' => 'Camaro', 
    'engine' => 'Diesel', 
    'mileage' => '', 
    'prev_price' => '',
    'cur_price' => '10000',
    'postedBy' => 'Fred', 
    'manufacturerId' => '3', 
    'description' => 'Available in black, blue and red color',
    'archived' => 'N'];
    $test = CarCheck($car_credentials);
    $this->assertFalse($test);
  }

   // TESTING IF THE ADMIN'S NAME IS EMPTY
  public function testIfAdminNameIsEmpty(){
    $car_credentials = ['car_name' => 'Camaro', 
    'engine' => 'Diesel', 
    'mileage' => '7', 
    'prev_price' => '12000',
    'cur_price' => '10000',
    'postedBy' => '', 
    'manufacturerId' => '3', 
    'description' => 'Available in black, blue and red color',
    'archived' => 'N'];
    $test = CarCheck($car_credentials);
    $this->assertFalse($test);
  }

   // TESTING IF THE CAR'S MANUFACTURER ID IS EMPTY
  public function testIfManufacturerIdIsEmpty(){
    $car_credentials = ['car_name' => 'Camaro', 
    'engine' => 'Diesel', 
    'mileage' => '7', 
    'prev_price' => '12000',
    'cur_price' => '10000', 
    'postedBy' => 'Fred', 
    'manufacturerId' => '', 
    'description' => 'Available in black, blue and red color',
    'archived' => 'N'];
    $test = CarCheck($car_credentials);
    $this->assertFalse($test);
  }

   // TESTING IF THE CAR'S DESCRIPTION INPUT FIELD IS EMPTY
  public function testIfDescriptionIsEmpty(){
    $car_credentials = ['car_name' => 'Camaro', 
    'engine' => 'Diesel', 
    'mileage' => '7', 
    'prev_price' => '12000',
    'cur_price' => '10000', 
    'postedBy' => 'Fred', 
    'manufacturerId' => '3', 
    'description' => '',
    'archived' => 'N'];
    $test = CarCheck($car_credentials);
    $this->assertFalse($test);
  }

   // TESTING IF THE CAR'S MILEAGE IS INVALID (I.E CONTAINS WORDS INSTEAD OF NUMBERS)
  public function testIfMileageIsNotValid(){
    $car_credentials = ['car_name' => 'Camaro', 
    'engine' => 'Diesel', 
    'mileage' => 'word', 
    'prev_price' => '12000',
    'cur_price' => '10000', 
    'postedBy' => 'Fred', 
    'manufacturerId' => '3', 
    'description' => 'Available in black, blue and red color',
    'archived' => 'N'];
    $test = CarCheck($car_credentials);
    $this->assertFalse($test);
  }

   // TESTING IF THE CAR'S PRICE IS INVALID (I.E CONTAINS WORDS INSTEAD OF NUMBERS)
  public function testIfPriceIsNotValid(){
    $car_credentials = ['car_name' => 'Camaro', 
    'engine' => 'Diesel', 
    'mileage' => '7', 
    'prev_price' => 'word',
    'cur_price' => '10000',
    'postedBy' => 'Fred', 
    'manufacturerId' => '3', 
    'description' => 'Available in black, blue and red color',
    'archived' => 'N'];
    $test = CarCheck($car_credentials);
    $this->assertFalse($test);
  }

   // TESTING IF THE CAR'S DETAIL ALREADY EXISTS
  public function testIfCarAlreadyExists(){
    $car_credentials = ['car_name' => 'Camaro', 
    'engine' => 'Diesel', 
    'mileage' => '7', 
    'prev_price' => '12000',
    'cur_price' => '10000',
    'postedBy' => 'Fred', 
    'manufacturerId' => '3', 
    'description' => 'Available in black, blue and red color',
    'archived' => 'N'];
    $test = CarCheck($car_credentials);
    $this->assertFalse($test);
  }

   // TESTING IF THE CAR'S DETAIL IS VALID
  public function testIfCarIsValid(){
    $car_credentials = ['car_name' => 'Camaro', 
    'engine' => 'Diesel', 
    'mileage' => '7', 
    'prev_price' => '12000',
    'cur_price' => '10000',
    'postedBy' => 'Fred', 
    'manufacturerId' => '3', 
    'description' => 'Available in black, blue and red color',
    'archived' => 'N'];
    $test = CarCheck($car_credentials);
    $this->assertTrue($test);
  }

}
