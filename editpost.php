<?php
    require('config/config.php');
    require('config/db.php');

    // check for submit
    if(isset($_POST['submit'])){
        echo 'submitted';
        // Get form data
        $update_id = mysqli_real_escape_string($conn ,$_POST['update_id']);
        $fname = mysqli_real_escape_string($conn ,$_POST['fname']);
        $addr1 = mysqli_real_escape_string($conn, $_POST['addr1']);
        $desig= mysqli_real_escape_string($conn, $_POST['desig']);
        $addr2= mysqli_real_escape_string($conn, $_POST['addr2']);
        $city= mysqli_real_escape_string($conn, $_POST['city']);
        $state= mysqli_real_escape_string($conn, $_POST['state']);
        $email= mysqli_real_escape_string($conn, $_POST['email']);

        $query = "UPDATE mailings SET
                    firstname = '$fname',
                    designation = '$desig',
                    address1 = '$addr1',
                    address2 ='$addr2',
                    city = '$city',
                    res_state = '$state',
                    emailid = '$email'
                WHERE id = {$update_id}";

        if(mysqli_query($conn,$query)){
            header('Location: '.ROOT_URL.'');
        }
        else {
            echo 'ERROR: '. mysqli_error($conn);
        }
    }

    // get id
    $id =   $_GET['id'] ;

    // Create query
    $query = "SELECT * FROM mailings WHERE id = {$id}";


    // get result
    $result = mysqli_query($conn , $query);

    // Fetch data(this assoc is used to turn it into an associative array)
    $mailing = mysqli_fetch_assoc($result);
    // var_dump($posts);

    // Free the result
    mysqli_free_result($result);

    // CLose Connection
    mysqli_close($conn);

?>


<?php include('inc/header.php'); ?>
    <div class="container my-4">
        <h1>Edit Post</h1>
        
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <fieldset>
            
            <div class="form-group">
            <label class="form-label mt-4">Email address</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Enter email" value="<?php echo $mailing['emailid']; ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
            <label class="form-label mt-4">First Name</label>
            <input type="text" class="form-control" name="fname" placeholder="Enter your firstname" value="<?php echo $mailing['firstname']; ?>">
            </div>
            <div class="form-group">
            <label class="form-label mt-4">Designation</label>
            <input type="text" class="form-control" name="desig" placeholder="Enter your designation" value="<?php echo $mailing['designation']; ?>">
            </div>
            <div class="form-group">
            <label class="form-label mt-4">Address 1</label>
            <textarea class="form-control" id="addr1" name="addr1" rows="3"><?php echo $mailing['address1']; ?></textarea>
            </div>
            <div class="form-group">
            <label class="form-label mt-4">Address 2</label>
            <textarea class="form-control" id="addr2" name="addr2" rows="3"><?php echo $mailing['address2']; ?></textarea>
            </div>
            <div class="form-group">
            <label class="form-label mt-4">City</label>
            <input type="text" class="form-control" name="city" placeholder="Enter your City" value="<?php echo $mailing['city']; ?>">
            </div>
            <div class="form-group">
            <label class="form-label mt-4">State</label>
            <input type="text" class="form-control" name="state" placeholder="Enter your State" value="<?php echo $mailing['res_state']; ?>">
            </div> 
            <input type="hidden" name="update_id" value="<?php echo $mailing['id']; ?>"> 
            <input type="submit" name="submit" value = "Submit" class="btn btn-outline-success my-4">  
        </fieldset>
        </form>
    </div>
<?php include('inc/footer.php'); ?>