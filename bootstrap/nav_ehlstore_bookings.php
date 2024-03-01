<nav class="navbar navbar-admin navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">

 <?php
			  
     if ($admin==1){ //checks if user is in store_admin_staff table
	 $a="admin/index.php"; 	 
	 $rhs="<a href="."admin/help_admin.php".">Admin help</a>";
	  }else{
	 $a="#"; 	 
	 $rhs=NULL;  
	  }	 
  ?>              
            <a class="navbar-brand" href="<?php echo $a ?>">eLearning store</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Equipment loan store for staff</a></li>
                  </ul>
              <ul class="nav navbar-nav navbar-right">
              <li class="nav navbar-nav">
                <?php echo $rhs ?>
         
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
