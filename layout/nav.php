
<div id="register-modal" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Register</h3>
      </div>
      <div class="modal-body">
       <form role="form" method="post" id="registerForm" action="<?php echo $_SERVER['PHP_SELF']?>" autocomplete="off">

				<?php
				//check for any errors
				if(isset($registererror)){
					foreach($registererror as $rerror){
						echo '<p class="bg-danger">'.$rerror.'</p>';
					}
				}

				?>

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" value="<?php if(isset($registererror)){ echo $_POST['username']; } ?>" tabindex="1">
				</div>
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Adresse" value="<?php if(isset($registererror)){ echo $_POST['email']; } ?>" tabindex="2">
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Passwort" tabindex="3">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Passwort" tabindex="4">
						</div>
					</div>
				</div>
			
      </div>
      <div class="modal-footer">
       	<div class="form-group pull-right"><input type="submit" id="loginPost" name="register-form" value="Register" class="btn btn-success"> <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</button></div>
			
        </form>
      </div>
    </div>
  </div>
</div>


<nav class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#login_dropdown">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">WPF Gallery</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="login_dropdown">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
         <?php  if( $user->is_logged_in() ){ ?>
        <li><a href="manage.php">Bilder verwalten</a></li>
        <?php } ?>
     
      </ul>

      <ul class="nav navbar-nav navbar-right">
	       <?php  if( $user->is_logged_in() ){ ?>
	     <li> <form action="search.php" method="GET" class="navbar-form" role="search">
        <div class="form-group">
          <input type="text" class="form-control" name="query" placeholder="<?php if(isset($_GET['query'])) { echo $_GET['query']; } else { echo 'Suchen...';  } ?>">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form></li>

      <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> Hallo <?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
         
        
        <ul class="dropdown-menu">
            <li><a href="profile.php">Profil</a></li>
             <li><a href="settings.php">Settings</a></li>
            <li class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>        

         </li>
     
      <?php }  else { ?>
     <li><a href="#" data-toggle="modal" data-target="#register-modal">Register</a></li>
        <li class="dropdown">

          <a href="#" id="logintoggle" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> Login <span class="caret"></span></a>
         <div class="dropdown-menu form-login stop-propagation" role="menu">
	      
	         <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" autocomplete="off">
		          
 
        <div class="form-group">
            <label for="username">
               Username
            </label> 
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php if(isset($loginerror)){ echo $_POST['username']; } ?>">
        </div>
        <div class="form-group">
            <label for="password">
               Passwort
            </label> 
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        
	    </div>
	         
        <input type="submit"  name="login-form" value="Submit"  class="btn btn-success btn-block">
        </form>
         </div>
        
        </li>
        <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->

</nav>

  <?php
            //check for any errors
            if (isset($loginerror)) {
                foreach ($loginerror as $lerror) {
                    echo '<div class="row"><div class="col-md-8"><p class="bg-danger">' . $lerror . '</p></div></div>';
                }
            ?><script type="text/javascript"> $("#logintoggle").click(); </script> 
            <?php } ?> 
            
            <?php
            if (isset($show_modal) && $show_modal): ?> <script type="text/javascript"> $(document).ready(function() { $('#register-modal').modal('show'); }); </script> 
            <?php endif; ?> 
            
            <?php
            if (isset($erfolg) && $erfolg) {
                echo '<div class="row"><div class="col-md-8"><p class="bg-success">Registration successful. Now Login please.</p></div></div>'; ?> <script type="text/javascript"> $("#logintoggle").click(); </script> 
            <?php } ?>
