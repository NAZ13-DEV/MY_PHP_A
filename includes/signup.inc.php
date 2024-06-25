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
  header("location: ../signup.php?error=emptyinput");
  exit();
}
if (InvalidEmail($email) !== false) {
  header("location: ../signup.php?error=InvalidEmail");
  exit();
}
if (InvalidUsername($username) !== false) {
  header("location: ../signup.php?error=InvalidUsername");
  exit();
}
if (pwdMatch($pwd,$confirmpwd) !== false) {
  header("location: ../signup.php?error=passworddontMatch");
  exit();
}
if (userAlreadyExist($conn,$username,$email)) {
  header("location: ../signup.php?error=userAlreadyExist");
  exit();
}
createUser($conn,$name,$email,$username,$pwd);
}
else{
    header('location: ../signup.php');
    exit();
}







?>