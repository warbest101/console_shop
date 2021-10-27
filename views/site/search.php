<?php require_once('views/shared/header.php') ?>
<?php require_once('views/shared/slider.php') ?>

<div class="text-center size" id="Feats"><h1>Searched: <?php echo $data['key']; ?></h1></div> <br /> <br />
<div class="container">
    <div class="row">
    <?php
        if($data['product'] == false) {
            ?>
                <p class="text-center" style="font-size: 20px">Not thing found</p>
            <?php
        } else {
            while($product = $data["product"]->fetch_assoc())
            {
                ?>
                <!--Một hàng hóa-->
                    <div class="col-sm-4 mb-xl-5">
                        <form method="POST" action="<?php echo BASE_URL; ?>?controller=cart&action=add">
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
                                        <button type="submit" class="btn btn-outline-primary text-uppercase float-right mb-2 mr-2 rounded-pill">
                                            ADD TO CART
                                        </button>
                                        <h6 style="color:forestgreen" class="float-left shop-item-price ml-3 mt-2"><i class="fa fa-dollar"></i><?php echo $product['Price']?></h6>                                
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--End Một hàng hóa-->       
                <?php
            }            
        }

    ?>       
    </div>
</div><br /> <br />
<?php require_once('views/shared/footer.php') ?>