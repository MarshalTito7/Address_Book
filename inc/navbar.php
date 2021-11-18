
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-2 py-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Address Book</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo ROOT_URL; ?>">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROOT_URL; ?>addpost.php">Add Entry</a>
        </li>
    
      </ul>
      <form class="d-flex"  action="<?php echo $_SERVER['PHP_SELF']; ?>"  method = "POST">
        <input class="form-control me-sm-2" type="text" placeholder="Search" name = "search_email">
        <input type="submit" name="search" id="srch_btn" value = "Search" class="btn btn-secondary my-2 my-sm-0"> 
        <!-- <button class="" type="submit" >Search</button> -->
      </form>
    </div>
  </div>
</nav>