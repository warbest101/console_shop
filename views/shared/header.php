<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>OwO What's this??</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="public/css/additions.css" />
     <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body data-spy="scroll" data-target=".navbar">
	<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
		<a class="navbar-brand bg-danger rounded-circle" href="<?php echo BASE_URL; ?>">ÒwÓ</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
		    <ul class="navbar-nav">
		        <li class="nav-item">
		            <a class="nav-link cool-link" href="<?php echo BASE_URL; ?>"><b>Home</b></a>
		        </li>
		        <li class="nav-item dropdown">
		            <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
		                <b>Shop</b>
		            </a>
		            <div class="dropdown-menu">
		                <a class="dropdown-item" href="<?php echo BASE_URL; ?>#Hot">Hot</a>
		                <?php
		                foreach ($category as $key => $value) 
		                {
		                	?>
		                		<a class="dropdown-item" href="<?php echo BASE_URL."#".$value[1]; ?>"><?php echo $value[1]; ?></a>
		                	<?php
		            	}
		            	?>
		            </div>
		        </li>
		        <li class="nav-item">
		            <a class="nav-link cool-link" href="" data-toggle="modal" data-target="#contactModal"><b>Contact</b></a>
		            <?php require_once('views/site/contact.php'); ?>
		        </li>
		        <li class="nav-item">
		            <a class="nav-link cool-link" href="<?php echo BASE_URL; ?>about"><b>About</b></a>
		        </li>
		        <li class="nav-item">
		        	<form method="POST" action="<?php echo BASE_URL; ?>?action=search">
		        		<input class="form-control" type="text" name="key" placeholder="type in to search...">
		        	</form>
		        </li>

		    </ul>
		    <ul class="navbar-nav ml-auto">
		    <?php
		        if(Session::get('customerId') && !empty(Session::get('customerId')))
		        {
		        	?>
					<!--USER AND LOGOUT-->
					<li class="nav-item dropdown">
					    <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
					        <b><?php echo Session::get('customerName') ?></b>
					    </a>
					    <div class="dropdown-menu">
					    	<a class="dropdown-item" href="<?php echo BASE_URL; ?>account">Profile</a>
							<form method="post" name='fcart' action="<?php echo BASE_URL; ?>?action=logout">
							    <input class="dropdown-item" type="submit" name="btnLogout" value="Logout">
							</form>
					    </div>
					</li>
					<!--MY CART-->
					<li class="nav-item">
					    <a class="nav-link cool-link" href="<?php echo BASE_URL; ?>cart" id="cart">
					        <i class="fa fa-shopping-cart"></i> <b>Cart</b> <span class="badge badge-danger rounded-circle" id="badge"></span>
					    </a>
					</li>				    
					<?php
				}
				else
				{
					?>
					<!--Login-->			             	
					<li class="nav-item">
						    <a class="nav-link cool-link" href="" data-toggle="modal" data-target="#loginModal">
						        <i class="fa fa-sign-in"></i> <b>Login</b> <span class="badge badge-danger rounded-circle"></span>
						    </a>
						    <?php require_once('views/site/login.php'); ?>
					</li>
					<!--Register-->
					<li class="nav-item">
						<a class="nav-link cool-link" href="" data-toggle="modal" data-target="#registerModal">
						    <i class="fa fa-user-plus"></i> <b>Register</b> <span class="badge badge-danger rounded-circle"></span>
						</a>
						<?php require_once('views/site/register.php'); ?>
					</li>
					<?php
				}
			?>
				            
			</ul>
		</div>
	</nav>
