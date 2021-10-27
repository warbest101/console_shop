<?php require_once('views/shared/header.php') ?>
<?php require_once('views/shared/slider.php') ?>

<div class="text-center size" id="Hot"><h1>- Hot -</h1></div> <br /> <br />
<div class="container">
    <div class="row">
    <?php
        while($product = $data["featured"]->fetch_assoc())
        {
            ?>
            <!--Một hàng hóa-->
            <div class="col-sm-4 mb-xl-5">
                <div class="card rounded scale">
                    <div class="bg-danger text-center text-white">BLACK FRIDAY DEAL</div>
                        <div class="hovereffect">
                            <img class="img-responsive" src="<?php echo BASE_URL; ?>public/uploads/product/<?php echo $product['Pic'];?>" style="width:100%">
                            <div class="overlay">
                                <a class="info" href="<?php echo BASE_URL; ?>?action=product-details&id=<?php echo $product['ID']; ?>">READ MORE</a>
                            </div>
                        </div>
                    <div style="background-color:#f2f2f2">
                        <h5 class="text-center"><?php echo $product['Name']?></h5><br>
                    </div>
                </div>
            </div>
            <!--End Một hàng hóa-->          
            <?php
        }
    ?>       
    </div>
</div><br /> <br />

<!-- Divider -->
<?php 
foreach ($category as $key => $value)
{
    ?>
        <div class="text-center size" id="<?php echo $value[1]; ?>"><h1><?php echo $value[1]; ?></h1></div> <br /> <br />
        <div class="container">
            <div class="row">
            <?php
                while($product = $data['category-'.$value[0]]->fetch_assoc())
                {
                    ?>
                    <!--Một hàng hóa-->
                    <div class="col-sm-4 mb-xl-5">
                        <!-- <form method="POST" action="<?php //echo BASE_URL; ?>?controller=cart&action=add"> -->
                        <form method="POST"  onsubmit="addCart(event)">
                            <input type="hidden" name="id_product" value="<?php echo $product['ID']; ?>">
                            <input type="hidden" name="quantity_product" value="1">
                            <div class="card rounded scale">
                                <div class="hovereffect">
                                    <img class="img-responsive" src="<?php echo BASE_URL; ?>public/uploads/product/<?php echo $product['Pic'];?>" style="width:100%">
                                    <div class="overlay">
                                        <a class="info" href="<?php echo BASE_URL; ?>?action=product-details&id=<?php echo $product['ID']; ?>">READ MORE</a>
                                    </div>
                                </div>
                                <div style="background-color:#f2f2f2" class="p-1">
                                    <h5 class="text-center"><b><?php echo $product['Name']?></b></h5><br>
                                    <div class="clearfix">
                                    <?php 
                                        if(Session::get('customerId') && !empty(Session::get('customerId')))
                                        {
                                            ?>
                                            <button type="submit" class="btn btn-outline-primary text-uppercase float-right mb-2 mr-2 rounded-pill">
                                                ADD TO CART
                                            </button>
                                            <?php
                                        }
                                        else 
                                        {
                                            ?>
                                            <a href="" class="btn btn-outline-primary text-uppercase float-right mb-2 mr-2 rounded-pill" data-toggle="modal" data-target="#NotificationModal"> 
                                                ADD TO CART
                                            </a>
                                            <?php
                                        }
                                    ?>
                                        <h6 style="color:forestgreen" class="float-left shop-item-price ml-3 mt-2"><i class="fa fa-dollar"></i><?php echo $product['Price']?></h6>                                
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--End Một hàng hóa-->            
                    <?php
                }
            ?>
            </div>
        </div><br /> <br />
    <?php
}
?>
<script type="text/javascript">
        function addCart(event){
            event.preventDefault();
            const form = event.currentTarget;
            const formData = new FormData(form);

            const id_product = formData.get('id_product');
            const quantity_product = formData.get('quantity_product');
            
            $.ajax({
                url: "http://localhost/console_shop/cart?action=add",
                method: "POST",
                data: {
                    id_product: id_product,
                    quantity_product: quantity_product
                },
                success: function() {
                    $('#addCartSuccess').modal('show');
                }
            });
            
        }

</script>

<?php require_once('views/shared/footer.php') ?>