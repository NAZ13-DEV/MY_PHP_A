<?php

include_once 'Header.php'

  ?>

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-6 mx-auto">
      <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "empty-input") {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong> Oops!</strong> Please fill in empty fields.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
        elseif ($_GET["error"] == "Invalid-Email") {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong> Oops!</strong> Email is Invalid.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
        elseif ($_GET["error"] == "Invalid-Username") {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong> Oops!</strong> Username is Invalid . use an alpha-numeric text without space.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
        elseif ($_GET["error"] == "password-dont-Match") {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong> Oops!</strong> Password Dont Match.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

        }
        elseif ($_GET["error"] == "user-Already-Exist") {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong> Oops!</strong> User or email has already been taken.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

        }
        elseif ($_GET["error"] == "stmtfailed") {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong> Oops!</strong> Technical Issues,Please Try Again.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

        }



      }

      ?>
      <h1 class="text-center display-5"> SIGN UP</h1>
      <form action="includes/signup.inc.php" method="post">

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="@Emeka Pius" name="name">
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"
            name="email">
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Username</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="eg.Chinedu_23"
            name="username">
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="*********" name="pwd">
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Confirm Password"
            name="confirmpwd">
        </div>
        <div class="mb-3">
          <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </div>


      </form>
    </div>
  </div>
</div>


<?php

include_once 'footer.php'

  ?>