<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        Comments
      </h2>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Products</a></li>
        <li class="active">List comments</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List comments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead>
				    <tr>
				      <th>ID</th>
				      <th>User</th>
				      <th>Product Name</th>
				      <th>Content</th>
              <th>Status</th>
				      <th colspan="2" style="text-align: center;">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  		<?php 	
							while($row = $listComment->fetch_assoc()) {
							 	$id = $row['id'];
						?>
				            <tr>
				              <td><?php echo $id?></td>
				            <td><?php echo $model->get_NameUser_id($row['user_id'])['name']?></td>
				              <td><?php echo $model->get_NameProduct($row['product_id'])['name']?></td>
				              <td><?php echo $row['content']?></td>
                      <td><?php if ($row['status'] == 1) echo 'Enable'; else echo 'Disable';?></td>
				              <td>
				              	<a href="admin.php?controller=comment&action=enable&id=<?php echo $id ?>" class="badge badge-warning">Enable</a>
				                
				              </td>
				              <td>
				              	<a href="admin.php?controller=comment&action=disable&id=<?php echo $id ?>" class="badge badge-danger">Disable</a>
				                
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