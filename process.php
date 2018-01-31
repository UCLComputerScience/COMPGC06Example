<?php
  include 'azureconnection.php.php';

  if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($link, $_POST['user']);
    $message = mysqli_real_escape_string($link, $_POST['message']);

    date_default_timezone_set('Europe/London');
    $time = date('h:i:s a', time());

    if (!isset($user) || $user == '' || !isset($message) || $message == '') {
      $error = "Please fill in your name and a message";
      header("Location: index.php?error=" . urlencode($error));
      exit();
    }
    else {
      $query = "INSERT INTO messages (user, message, time) 
                VALUES ('$user', '$message', '$time')";
      if (!mysqli_query($link, $query)) {
        die('Error: ' . mysqli_error($link));
      }
      else {
        header('Location: index.php');
        exit();
      }
    }
  }
?>
