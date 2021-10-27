

<!--Header-->
<?php require_once('views/shared/header.php') ?>

<!--Breadcrumb-->
<br/><br/>
<nav aria-label="breadcrumb" class="bg-dark">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav><br /><br />

<!-- Divider -->
<div class="text-center size" id="PS4"><h1>- YOUR CART -</h1></div> <br /> <br />

<!--Cart-->
<div class="container mb-5 col-10" style="min-height:60vh">

<div class="card">

    <div class="card-header bg-primary text-light">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
         CART
    </div>
        <!-- PRODUCT -->      
 <div class="card-body">
  <form method="post" action="<?php echo BASE_URL; ?>?controller=cart&action=ordering" name="fcart" >          
<?php 
                  
    if(Session::get("cart"))
    {                        
        $cart = Session::get("cart");
        $totalprice = 0;    
        foreach ($cart as $key => $product) {
            $subtotal = $product['price'] * $product['quantity'];
            $totalprice += $subtotal;
        ?>               
            <div class="row">
                <div class="col-12 col-sm-12 col-md-2 text-center">
                    <img class="img-responsive" src="<?php echo BASE_URL; ?>public/uploads/product/<?php echo $product['image'];?>" alt="prewiew" width="120" height="80">
                </div>
                <div class="col-12 text-sm-center text-md-left col-md-6">
                    <h4 class="product-name"><strong><?php echo $product['name']; ?></strong></h4>
                </div>
                <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                    <div class="col-3 col-sm-3 col-md-3 text-md-right" style="padding-top: 5px">
                        <h6>$<strong><?php echo $product['price'] ?> <span class="text-muted">x</span></strong></h6>
                    </div>
                    <div class="col-4 col-sm-4 col-md-3">
                        <div class="quantity">
                            <input type="number" name="quantity-<?php echo $product['id'] ?>" value="<?php echo $product['quantity'] ?>" step="1" max="10" min="0" title="Qty" class="qty">
                        </div>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3 text-md-right" style="padding-top: 5px">
                        <h6>= <strong>$<?php echo $subtotal; ?></strong></h6>
                    </div>
                    <div class="col-2 col-sm-2 col-md-2 text-right">
                        <a href="<?php echo BASE_URL; ?>?controller=cart&action=remove&id=<?php echo $product['id'] ?>">
                            <button type="button" name="btnClose" class="btn btn-outline-danger btn-xs">
                                <i class="fa fa-close"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <hr>
        <?php                             
        }                   
    }
    else{ 
    ?>      
        <div style="text-align: center;font-size: 25px">Your Cart is empty. Please add some products.</div>
        <center><img class="img-responsive" src="<?php echo BASE_URL; ?>public/uploads/product/matbuon.jpg" style="width:10%;vertical-align: : center;"></center>
        <?php 
        $totalprice=0;      
    }           
    ?> 
    
    <?php 
        if(isset($customer)) {
            $name_customer = $customer['Name'];
            $email_customer = $customer['Email'];
            $phone_customer = $customer['Phone'];
            $address_customer = $customer['Address'];
        } else {
            $name_customer = '';
            $email_customer = '';
            $phone_customer = '';
            $address_customer = '';
        }
    ?>

    </div>  
        <!-- END PRODUCT -->
    <div class="card-footer">
        <div class="float-right" style="margin: 10px">

            <a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Checkout</a>
            <button type="submit" formaction="<?php echo BASE_URL; ?>?controller=cart&action=update" name="btnUpdate" style="margin-right: 20px" class="btn btn-primary pull-right" >Update</button>
            <a href="<?php echo BASE_URL; ?>" class="btn btn-primary pull-right" style="margin-right: 20px">Continue shopping</a>
            <!--Modal verification form-->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold" style="color:red">Verification</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body mx-3">
                                <div class="md-form mb-5">
                                    <h4>Name<span style="color: red">*</span></h4><br />
                                    <input type="text" name="txtName"  class="form-control validate" value="<?php echo $name_customer; ?>" placeholder="Your name...">
                                </div>
                                <div class="md-form mb-5">
                                    <h4>Email<span style="color: red">*</span></h4><br />
                                    <input type="text" name="txtEmail"  class="form-control validate" value="<?php echo $email_customer; ?>" placeholder="Your email...">
                                </div>
                                <div class="md-form mb-5">
                                    <h4>Phone<span style="color: red">*</span></h4><br />
                                    <input type="text" name="txtPhone"  class="form-control validate" value="<?php echo $phone_customer; ?>" placeholder="Your phone...">
                                </div>
                                <div class="md-form mb-5">
                                    <h4>Address<span style="color: red">*</span></h4><br />
                                    <input type="text" name="txtAddress"  class="form-control validate" value="<?php echo $address_customer; ?>" placeholder="Your address...">
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button name="btnOrdering" type="submit" class="btn btn-outline-primary rounded-pill">Submit</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-left" style="margin: 5px">
           Total price: <b><?php echo $totalprice;?>€</b>
        </div>
    </div>
    </form>
</div>

</div>
</form>

<?php require_once('views/shared/footer.php') ?>

