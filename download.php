<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  
  // // Send email notification
  $to = 'training@peakwareacademy.com';
  $subject = 'Training calendar download request';
  $message = 'Name: '.$name."\r\n".'Email: '.$email;
  $headers = 'From: '.$email."\r\n".'Reply-To: '.$email."\r\n";
  mail($to, $subject, $message, $headers);

  
  // Download the training calendar file
  $file_url = 'https://peakwareacademy.com/training_calendar.pdf';
  header('Content-Type: application/octet-stream');
  header("Content-Transfer-Encoding: Binary"); 
  header("Location:https://peakwareacademy.com/training_calendar.pdf");
  header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
  readfile($file_url);
  exit;
}
?>

