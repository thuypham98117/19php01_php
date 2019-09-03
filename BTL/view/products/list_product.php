<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        Products
      </h2>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Products</a></li>
        <li class="active">List products</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List products</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead>
				    <tr>
				      <th>ID</th>
				      <th>Category</th>
				      <th>Product Name</th>
				      <th>Price</th>
				      <th>Image</th>
				      <th colspan="3" style="text-align: center;">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  		<?php 	
							while($row = $listProduct->fetch_assoc()) {
							 	$id = $row['id'];
						?>
				            <tr>
				              <td><?php echo $row['id']?></td>
				            <td><?php echo $model->getCategory_id($row['product_category_id'])['name']?></td>
				              <td><?php echo wordwrap(ucfirst($row['name']), 20, '<br />');?></td>
				              <td><?php echo $row['price'].' VNĐ';?></td>
				              <td><img src="webroot/admin/uploads/products/<?php echo $row['image']?>" alt="image" height="100px" ></td>
				               <td>
				              	<a href="admin.php?controller=comment&action=listComment&id=<?php echo $row['id'] ?>" class="badge badge-warning">List Comments</a>
				                
				              </td>
				              <td>
				              	<a href="admin.php?controller=product&action=edit_product&id=<?php echo $row['id'] ?>" class="badge badge-warning">Edit</a>
				                
				              </td>
				              <td>
				              	<a href="admin.php?controller=product&action=delete_product&id=<?php echo $row['id'] ?>" class="badge badge-danger">Delete</a>
				                
				              </td>
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