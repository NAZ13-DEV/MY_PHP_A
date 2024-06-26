<?php

include_once 'Header.php'

    ?>









<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 mx-auto">

        <?php
        if(isset($_GET["error"])){
            if($_GET["error"]=="none"){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Sign Up Successful.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>' ;

            }
        }


        ?>



            <h1 class="text-center display-5"> Login</h1>
            <form action="includes/login.inc.php" method="post">


                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="eg.Chinedu_23" name="username">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="*********" name="pwd">
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit" name="submit">Login</button>
                </div>


            </form>
        </div>
    </div>
</div>





<?php

include_once 'footer.php'

    ?>