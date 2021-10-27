<?php require_once('views/shared/header.php') ?>

<?php
    $customer = $data['customer']->fetch_assoc();
?>

<!--Breadcrumb-->
<br/><br/>
<nav aria-label="breadcrumb" class="bg-dark">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Account</li>
    </ol>
</nav><br /><br />

<!--Product Deatail s-->
<div class="container">
    <div class="card">
        <div class="row">
            <div class="col-sm-5 border-right">
                <img src="<?php echo BASE_URL; ?>public/images/user.png" style="width:100%">
            </div>
            <div class="col-sm-7">
                    <article class="card-body p-5">
                        <dl>
                            <dt>Name:</dt>
                            <dd>
                                <p>
                                    <?php echo $customer['Name']?>
                                </p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>Username:</dt>
                            <dd>
                                <p>
                                    <?php echo $customer['Username']?>
                                </p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>Email:</dt>
                            <dd>
                                <p>
                                    <?php echo $customer['Email']?>
                                </p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>Phone:</dt>
                            <dd>
                                <p>
                                    <?php echo $customer['Phone']?>
                                </p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>Address:</dt>
                            <dd>
                                <p>
                                    <?php echo $customer['Address']?>
                                </p>
                            </dd>
                        </dl>
                        <hr>
                        <a href="" class="btn btn-lg btn-outline-primary text-uppercase" data-toggle="modal" data-target="#changePasswordModal"> 
                            Change Password
                        </a>
                        <?php require_once('views/site/change_password.php') ?>
                        <a href="" class="btn btn-lg btn-outline-primary text-uppercase" data-toggle="modal" data-target="#editAccountModal"> 
                            Update Account
                        </a>
                        <?php require_once('views/site/edit_account.php') ?>
                    </article>
            </div>
        </div>
    </div>
</div><br /><br /><br />
<?php require_once('views/shared/footer.php') ?>