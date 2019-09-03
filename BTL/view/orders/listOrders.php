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
        <li class="active">List orders</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List orders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead>
				    <tr>
				      <th>ID</th>
				      <th>User</th>
				      <th>Created</th>
				      <th>Status</th>
				      <th colspan="2" style="text-align: center;">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  		<?php 	
							while($row = $listOrder->fetch_assoc()) {
							 	$id = $row['id'];
						?>
				            <tr>
				              <td><?php echo $row['id']?></td>
				            <td><?php echo $model->get_NameUser_id($row['user_id'])['name']?></td>
				            <td><?php echo $row['created'];?></td>
				              <td><?php if ($row['status'] == 0) 
				              				echo 'Mới đặt hàng';
				              			else if ($row['status'] == 1) 
				              				echo 'Đã duyệt';?>				
				              </td>
				               <td>
				              	<a href="admin.php?controller=order&action=listOrder_Details&id=<?php echo $row['id'] ?>" class="badge badge-warning">List Order_details</a>
				                
				              </td>
				              <td>
				              	<a href="admin.php?controller=order&action=edit_order&id=<?php echo $row['id'] ?>" class="badge badge-warning">Duyệt đơn hàng</a>
				                
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