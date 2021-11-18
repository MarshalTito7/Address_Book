<?php
    require('config/config.php');
    require('config/db.php');

    // check for submit
    if(isset($_POST['submit'])){
        // echo 'submitted';
        // Get form data
        $fname = mysqli_real_escape_string($conn ,$_POST['fname']);
        $addr1 = mysqli_real_escape_string($conn, $_POST['addr1']);
        $desig= mysqli_real_escape_string($conn, $_POST['desig']);
        $addr2= mysqli_real_escape_string($conn, $_POST['addr2']);
        $city= mysqli_real_escape_string($conn, $_POST['city']);
        $state= mysqli_real_escape_string($conn, $_POST['state']);
        $email= mysqli_real_escape_string($conn, $_POST['email']);

        $query = "INSERT INTO mailings(firstname,designation,address1,address2,city,res_state,emailid) VALUES('$fname','$desig','$addr1','$addr2','$city','$state','$email')";

        if(mysqli_query($conn,$query)){
            header('Location: '.ROOT_URL.'');
        }
        else {
            echo 'ERROR: '. mysqli_error($conn);
        }
    }

?>

<?php include('inc/header.php'); ?>
    <div class="container my-4">
        <h1>Add Post</h1>
        
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <fieldset>
            
            <div class="form-group">
            <label class="form-label mt-4">Email address</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
            <label class="form-label mt-4">First Name</label>
            <input type="text" class="form-control" name="fname" placeholder="Enter your firstname">
            </div>
            <div class="form-group">
            <label class="form-label mt-4">Designation</label>
            <input type="text" class="form-control" name="desig" placeholder="Enter your designation">
            </div>
            <div class="form-group">
            <label class="form-label mt-4">Address 1</label>
            <textarea class="form-control" id="addr1" name="addr1" rows="3"></textarea>
            </div>
            <div class="form-group">
            <label class="form-label mt-4">Address 2</label>
            <textarea class="form-control" id="addr2" name="addr2" rows="3"></textarea>
            </div>
            <div class="form-group">
            <label class="form-label mt-4">City</label>
            <input type="text" class="form-control" name="city" placeholder="Enter your City">
            </div>
            <div class="form-group">
            <label class="form-label mt-4">State</label>
            <input type="text" class="form-control" name="state" placeholder="Enter your State">
            </div>  
            <input type="submit" name="submit" value = "Submit" class="btn btn-outline-success my-4">  
        </fieldset>
        </form>
    </div>
    <?php include('inc/footer.php'); ?>