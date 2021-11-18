<?php
    require('config/config.php');
    require('config/db.php');
    
    // check for submit
    if(isset($_POST['delete'])){
        // echo 'submitted';
        // Get form data
        $delete_id = mysqli_real_escape_string($conn ,$_POST['delete_id']);

        $query = "DELETE FROM mailings WHERE id = {$delete_id}";

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
    <div class="container">
        <a href="<?php echo ROOT_URL;?>" class="btn btn-default my-3">Back</a>
        <div class="card px-3 py-3 mx-2 my-2 ">
            <h1><?php echo $mailing['firstname']; ?></h1>
            <small>
                Working as <?php echo $mailing['designation']; ?> <br> lives in <?php echo $mailing['address1']; ?> , <?php echo $mailing['city']; ?>, <?php echo $mailing['res_state']; ?>
            </small>
            <br>
            <small>
               Secondary Address :  <?php echo $mailing['address2']; ?>
            </small>
            <br>
            <p>
                Email id :  <?php echo $mailing['emailid']; ?>
            </p>
            <hr>
        </div>
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="pull-right my-3" method = "POST">
            <input type="hidden" name="delete_id" value="<?php echo $mailing['id']; ?>">
            <input type="submit" name="delete" value="Delete" class="btn btn-outline-danger">
        </form>
        <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $mailing['id']; ?>"
        class="btn btn-outline-warning" >Edit</a>
            
    </div>
    <script src="./script11.js"></script>
<?php include('inc/footer.php'); ?>

