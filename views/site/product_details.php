<!--Header-->
<?php
    include("views/shared/header.php");
?>

<?php
    $product = $data['product_details']->fetch_assoc();
?>

<!--Breadcrumb-->
<br/><br/>
<nav aria-label="breadcrumb" class="bg-dark">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="<?php echo BASE_URL; ?>#<?php echo $product['name_product_category']?>"><?php echo $product['name_product_category']?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $product['Name']?></li>
    </ol>
</nav><br /><br />



<!--Product Deatail s-->
<div class="container">
    <div class="card">
        <div class="row">
            <div class="col-sm-5 border-right">
                <img src="<?php echo BASE_URL; ?>public/uploads/product/<?php echo $product['Pic'];?>" style="width:100%">
            </div>
            <div class="col-sm-7">
                <form method="post" onsubmit="addCart(event)">
                    <input type="hidden" name="id_product" value="<?php echo $product['ID']?>">
                    <article class="card-body p-5">
                        <h3 class="title mb-3"><?php echo $product['Name']?></h3>
                        <p class="price-detail-wrap">
                            <span class="price h3 text-warning">
                                <span style="color:forestgreen">$<?php echo $product['Price']?></span>
                            </span>
                        </p> <!--price-detail-wrap -->
                        <dl>
                            <dt>Category:</dt>
                            <dd>
                                <p>
                                    <?php echo $product['name_product_category']?>
                                </p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>Description:</dt>
                            <dd>
                                <p>
                                    <?php echo $product['Description']?>
                                </p>
                            </dd>
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <dl class="param param-inline">
                                    <dt>Quantity: </dt>
                                    <dd>
                                        <div class="quantity"><input type="number" name="quantity_product"step="1" max="<?php echo $product['Quantity'] ?>" min="1" value="1" title="Qty" class="qty"></div>
                                    </dd>
                                </dl>
                            </div> 
                        </div>
                        <hr>
                        <?php
                            if(Session::get('customerId') && !empty(Session::get('customerId')))
                            {
                                ?>
                                <!--CODE WRITE THERE-->
                               
                                <button class="btn btn-lg btn-outline-primary text-uppercase" type="submit" name="btnAdd"> 
                                   <i class="fa fa-shopping-cart">Add to cart</i>
                                </button>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a href="" class="btn btn-lg btn-outline-primary text-uppercase" data-toggle="modal" data-target="#NotificationModal"> 
                                    <i class="fa fa-shopping-cart"></i>  Add to cart
                                </a>
                                <?php
                            }
                        ?>
                    </article>
                </form>
            </div>
        </div>
    </div>
</div><br /><br /><br />

<script type="text/javascript">
        function addCart(event){
            event.preventDefault();
            const form = event.currentTarget;
            const formData = new FormData(form);

            const id_product = formData.get('id_product');
            const quantity_product = formData.get('quantity_product');
            
            $.ajax({
                url: "http://localhost/console_shop/?controller=cart&action=add",
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

<?php
    include("views/shared/footer.php");
?>

