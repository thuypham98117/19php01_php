<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        Orders
      </h2>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Orders</a></li>
        <li><a href="#">List orders</a></li>
        <li class="active">List order_details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List order_details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead>
				    <tr>
				      <th>ID</th>
				      <th>Order_id</th>
				      <th>Product</th>
				      <th>Quantity</th>
				      <th>Price</th>
				    </tr>
				  </thead>
				  <tbody>
				  		<?php 	
							while($row = $listOrder_Details->fetch_assoc()) {
							 	$id = $row['id'];
						?>
				            <tr>
				              <td><?php echo $id?></td>
				            <td><?php echo $row['order_id']?></td>
				            <td><?php echo $model->get_NameProduct($row['product_id'])['name'];
				            	?>	
				            	<img src="webroot/admin/uploads/products/<?php echo $model->get_ImageProduct($row['product_id'])['image']?>" alt="image" height="50px" >
				            </td>
				              <td><?php echo $row['quantity'];?></td>
				              <td><?php echo number_format($row['price']);?> VNĐ</td>
				            </tr>
				        <?php 
				        	}
				        ?>
				    
				  </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->