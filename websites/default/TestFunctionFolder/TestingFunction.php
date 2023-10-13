<?php

// TESTING FUNCTION TO TEST ALL THE DATA VALIDATIONS AND REQUIREMENTS

// CHECKING IF ADMIN LOGIN CREDENTIALS IS VALID, INVALID OR EMPTY
function AdminLoginCheck($admin_credential){
  $test = true;
  if ($admin_credential['username'] == ""){
    $test = false;
  }
  if ($admin_credential['password'] == ""){
    $test = false;
  }
  return $test;
}

// CHECKING IF CREDENTIALS REQUIRED FOR ADDING ADMIN IS VALID, INVALID OR EMPTY
function AdminAddCheck($admin_credential){
  $test = true;
  if ($admin_credential['username'] == ""){
    $test = false;
  }
  if ($admin_credential['email'] == ""){
    $test = false;
  }
  if ($admin_credential['password'] == ""){
    $test = false;
  }
  return $test;
}

// CHECKING IF DATA REQUIRED FOR ADDING CAR IS VALID, INVALID OR EMPTY
function CarCheck($car_credentials){
  $test = true;
  if ($car_credentials['car_name'] == ""){
    $test = false;
  }
  if ($car_credentials['engine'] == ""){
    $test = false;
  }
  if ($car_credentials['mileage'] == ""){
    $test = false;
  }
  if ($car_credentials['prev_price'] == ""){
    $test = false;
  }
  if ($car_credentials['postedBy'] == ""){
    $test = false;
  }
  if ($car_credentials['manufacturerId'] == ""){
    $test = false;
  }
  if ($car_credentials['description'] == ""){
    $test = false;
  }
  return $test;
}

// CHECKING IF DATA REQUIRED FOR ADDING MANUFACTURER IS EMPTY OR NOT
function ManufacturerCheck($manufacturerName){
  $test = true;
  if ($manufacturerName == '') {
    $test = false;
  }
  return $test;
}

// CHECKING IF DATA REQUIRED FOR SENDING ENQUIRY IS EMPTY OR NOT
function CheckEnquiryValidation($visitorData){
  $test = true;
  if ($visitorData['name' ]== ''){
    $test = false;
  }
  if ($visitorData['email'] == ''){
    $test = false;
  }
  if ($visitorData['telephone'] == ''){
    $test = false;
  }
  if ($visitorData['enquiry'] == ''){
    $test = false;
  }
  if ($visitorData['enquiry_date'] == ''){
    $test = false;
  }
  return $test;
}

// CHECKING IF DATA REQUIRED FOR UPLOADING STORY IS EMPTY OR NOT
function CheckStoryValidation($story){
  $test = true;
  if ($story['staff_name' ]== ''){
    $test = false;
  }
  if ($story['context'] == ''){
    $test = false;
  }
  if ($story['post_date'] == ''){
    $test = false;
  }
  return $test;
}

// CHECKING IF DATA REQUIRED FOR ANNOUNCING JOB IS EMPTY OR NOT
function CheckJobValidation($jobAnnouncementData){
  $test = true;
  if ($jobAnnouncementData['job_title']==''){
    $test = false;
  }
  if ($jobAnnouncementData['job_description']==''){
    $test = false;
  }
  if ($jobAnnouncementData['vacancy']==''){
    $test = false;
  }
  return $test;
  }

?>
