<?php


if (isset($_POST["submit"])) {
    require_once 'function.inc.php' ;

$name =  sanitizeData($_POST["name"]);
$email =  sanitizeData($_POST["email"]);
$username = sanitizeData($_POST["username"]);
$pwd = sanitizeData($_POST["pwd"]);
$confirmpwd = sanitizeData($_POST["confirmpwd"]) ;

require_once 'dbhandler.inc.php';


if (emptySignupInput($name,$email,$username,$pwd,$confirmpwd) !== false) {
  header("location: ../signup.php?error=empty-input");
  exit();
}
if (InvalidEmail($email) !== false) {
  header("location: ../signup.php?error=Invalid-Email");
  exit();
}
if (InvalidUsername($username) !== false) {
  header("location: ../signup.php?error=Invalid-Username");
  exit();
}
if (pwdMatch($pwd,$confirmpwd) !== false) {
  header("location: ../signup.php?error=password-dont-Match");
  exit();
}
if (userAlreadyExist($conn,$username,$email)) {
  header("location: ../signup.php?error=user-Already-Exist");

  exit();
}
createUser($conn,$name,$email,$username,$pwd);
}
else{
    header('location: ../signup.php');
    exit();
}







?>