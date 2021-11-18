<?php
    require('config/config.php');
    require('config/db.php');

    $flag = 0;
    $mailings2 = 0;

    // check for submit
    if(isset($_POST['search'])){
        // echo 'submitted';
        // Get form data
        $search_email = mysqli_real_escape_string($conn ,$_POST['search_email']);

        $query2 = "SELECT * FROM mailings WHERE emailid LIKE '$search_email'";

        // get result
        $result2 = mysqli_query($conn , $query2);

        // Fetch data
        $mailings2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

        // Free the result
        mysqli_free_result($result2);

        $flag = 1;
    
    }

    $query = 'SELECT * FROM mailings ORDER BY firstname DESC';

    // get result
    $result = mysqli_query($conn , $query);

    // Fetch data
    $mailings = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if($flag === 1){
        $mailings = $mailings2;
    }

    // Free the result
    mysqli_free_result($result);

    // CLose Connection
    mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
    <div class="container my-5">
        <h1 class = " mx-2 my-2">Mailings</h1>
        <?php foreach($mailings as $mailing) : ?>
            <div class="card px-4 py-4 my-3">
                <h3>
                    <?php echo $mailing['firstname']; ?>
                </h3>
                <small>
                    Working as <?php echo $mailing['designation']; ?> <br> lives in <?php echo $mailing['address1']; ?>
                </small>
                
                <a class="btn btn-outline-secondary my-2" href="<?php echo ROOT_URL;?>mailing.php?id=<?php echo $mailing['id']; ?>">Read More</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php include('inc/footer.php'); ?>