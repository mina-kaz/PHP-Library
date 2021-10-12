<?php
  //did the user clicked the submit button
  if (isset($_POST['signup-submit']))
  {
    require 'database.php';
  }
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    //if sime field is empty
  if (empty($username) || empty($email) || empty($password) ||empty($passwordRepeat))
  {
    //sends the users back to the sign up page
    header("Location:../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit(); //stop the script
  }
  else if (!filter_var($email.FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-ZA-Z0-9]*$/", $username))
  {
    header("Location:../signup.php?error=invalidmailuid"); //don't send incorrect info to the users
    exit();
  }
  else if (!filter_var($email,FILTER_VALIDATE_EMAIL))
  {
    header("Location:../signup.php?error=invalidmail&uid=".$username);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
  {
    header("Location:../signup.php?error=invaliduid&mail=".$mail);
    exit();
  }
  else if ($password! == $passwordRepeat)
  {
    header("Location:../signup.php?error=passwordcheck&uid=".$username."&mail".$email);
    exit();
  } //taken username (connect database and check if the system has it)
  else {
    {
      $sql = "SELECT uidUsers FROM users WHERE uidUsers=? AND pwdUsers=?"
      $stmt = "mysqli_stmt_init " ///DATABASE name
      if (!mysqli_stmt_prepare($stmt, $sql))
      {
        header("Location:../signup.php?error=sqlerror");
        exit();
      }
      else
      {
        mysql_stmt_bind_param($stmt,"ss", $username, $password);
        mysql_stmt_execute($stmt);
        mysql_stmt_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt); // if it exists it will return as 1
        
      }
    }
  }
 ?>
