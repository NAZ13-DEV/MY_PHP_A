<?php

function sanitizeData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function emptySignupInput($name,$email,$username,$pwd,$confirmpwd){
$result = "";
if(empty($name) || empty($email) || empty($username) || empty($pwd)|| empty($confirmpwd)){
$result= true;
}else{
    $result= false;
}
return $result ;
}

function InvalidEmail
($email){
$result = "";
if(!filter_var($email, FILTER_VALIDATE_EMAIL) ){
$result= true;
}else{
    $result= false;
}
return $result ;
}

function InvalidUsername($username) {
    if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_.-]{2,15}$/",$username)) {
        $result = true;
      }
      else{
        $result = false;
      }
      return $result ;
}
function pwdMatch($pwd,$confirmpwd) {
  if($pwd !== $confirmpwd) {
    $result = true;
  }
  else{
    $result = false;
  }
  return $result ;
}

function userAlreadyExist($conn,$username,$email){
    $sql = "SELECT * FROM users WHERE username=? OR email=?";

    $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../Signup.php?error=stmtfailed");
    exit();
   }
   // bind parameter to stmt
   mysqli_stmt_bind_param($stmt,"ss", $username, $email);
   // executing statement
   mysqli_stmt_execute($stmt);
   // retrieve result from executed statemnt
   $retrieveData = mysqli_stmt_get_result($stmt);
   // fetch and store in an associative array
   $row = mysqli_fetch_assoc($retrieveData);
   mysqli_stmt_close($stmt);
   if ($row) {
    return $row;
   }
   else{
    $result = false;
    return $result;
   }
  

}

function createUser($conn,$name,$email,$username,$pwd){
    $sql = "INSERT INTO users(name, email,username,pwd) VALUES (?,?,?,?)";

    $stmt = mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../Signup.php?error=stmtfailed");
    exit();
   }
   $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
   // bind parameter to stmt
   mysqli_stmt_bind_param($stmt,"ssss", $name, $email,  $username,$hashedPwd);
   // executing statement
   mysqli_stmt_execute($stmt);

   mysqli_stmt_close($stmt);
   header("location: ../login.php?error=none");
   exit();

}

function emptyloginInput($username,$pwd){
  $result = "";
  if(empty($username) || empty($pwd)){
  $result= true;
  }else{
      $result= false;
  }
  return $result ;
  }


  function loginUser($conn, $username, $pwd){
    $getUser = userAlreadyExist($conn, $username, $username);
    if($getUser == false){
      header("location: ../login.php?error=WrongCredentials");
        exit();
    }
    // $Checkpwd= $getUser["pwd"];
    $unhashPwd = password_verify($pwd, $getUser["pwd"]);
    if($unhashPwd == false){{
      header("location: ../login.php?error=WrongPassword");
      exit();
    }
  }
  else{
    session_start();
    $_SESSION["username"]=  $getUser["username"];
    $_SESSION["name"]=  $getUser["name"];
    $_SESSION["email"]=  $getUser["email"];
    header("location: ../index.php");
    exit();
  }

}



?>