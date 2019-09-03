<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        Users
      </h2>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
        <li class="active">List users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead>
			        <tr>
			          <th>ID</th>
                <th>Role</th>
			          <th>Username</th>
			          <th>Contact</th>
			          <th>Birthday</th>
			          <th>Avatar</th>
			          <th colspan="2" style="text-align: center;">Action</th>
			        </tr>
			      </thead>
			      <tbody>
			      		<?php 
							while($row = $listUser->fetch_assoc()) {
							 	$id = $row['id'];
						?>
			                <tr>
			                  <td><?php echo $row['id']?></td>
                        <td><?php echo $row['role']?></td>
			                  <td><?php echo $row['username']?></td>
			                  <td>Name: <?php echo $row['name']?><br>
			                  Email: <?php echo $row['email']?><br>
			                  Phone: <?php echo $row['phone']?></td>
			                  <td><?php echo $row['birthday']?></td>
			                  <td><img src="webroot/admin/uploads/avatar/<?php echo $row['avatar']?>" alt="image" width="100px"></td>
			                  <td>
			                  	<a href="admin.php?controller=user&action=edit_user&id=<?php echo $row['id'] ?>" class="badge badge-warning">Edit</a>
			                    
			                  </td>
			                  <td>
			                  	<a href="admin.php?controller=user&action=delete_user&id=<?php echo $row['id'] ?>" class="badge badge-danger">Delete</a>
			                    
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
