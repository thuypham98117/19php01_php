<?php 
    $total = 0;
    if (isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $id => $value) {
            # code...
            $total += $_SESSION['cart'][$id]['price']*$_SESSION['cart'][$id]['quantity'];
        }
    }
?>
<?php include 'header.php';?>
<!-- page-header -->
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                    foreach ($_SESSION['cart'] as $id => $value) {
                            ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="./webroot/admin/uploads/products/<?php echo $model->get_Product($id)['image'];?>" alt="">                                       
                                        </div>
                                        <div class="media-body">
                                            <p><?php echo $model->get_Product($id)['name'];?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5><?php echo number_format($_SESSION['cart'][$id]['price']);?> VNĐ </h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" name="qty" id="sst" maxlength="12" value="<?php echo $_SESSION['cart'][$id]['quantity'];?>" title="Quantity:"
                                            class="input-text qty">
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                            class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                            class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <h5><?php echo number_format($_SESSION['cart'][$id]['price']*$_SESSION['cart'][$id]['quantity']);?> VNĐ </h5>
                                </td>
                            </tr>
                            <tr class="bottom_button">
                            </tr>
                        <?php }?>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5><?php echo number_format($total)?>VNĐ </h5>
                                </td>
                            </tr>
                            
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="index.php?controller=product&action=list_product">Continue Shopping</a>
                                        <a class="primary-btn" href="index.php?controller=product&action=order" onclick="alert('Bạn đã đặt hàng thành công')">Order</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
<!-- /.cart-section -->
<?php include 'footer.php';?>