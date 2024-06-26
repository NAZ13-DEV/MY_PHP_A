<?php
    if(isset($_POST["submit"])){
        require_once 'function.inc.php';
        $pwd =  sanitizeData($_POST["pwd"]);
        $username = sanitizeData($_POST["username"]);

        require_once 'dbhandler.inc.php';

        if (emptyloginInput($username,$pwd) !== false) {
            header("location: ../login.php?error=empty-input");
            exit();
          }
          loginUser($conn, $username, $pwd);

    }
    header("location: login.php");
    exit();




?>