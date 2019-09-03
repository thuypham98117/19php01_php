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
        <li class="active">Edit user</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style="margin: 0 auto;float: none;">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit user</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="admin.php?controller=user&action=edit_user&id=<?php echo $id?>" method="POST" enctype="multipart/form-data" role="form">
              <div class="box-body">
                <div class="form-group">
                  <input type="text" class="form-control" name="username" placeholder="Username" required value="<?php echo $editUser['username'] ?>">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Name" required value="<?php echo $editUser['name'] ?>">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required value="<?php echo $editUser['email'] ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                </div>

                <div class="form-group">
                  <label>Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Phone" required value="<?php echo $editUser['phone'] ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Birthday</label>
                    <input type="date" class="form-control" name="birthday" placeholder="Phone" required value="<?php echo $editUser['birthday'] ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                  </div>
                </div>
            <div class="form-group">
              <label>Avatar</label>
               <img src="webroot/admin/uploads/avatar/<?php echo $editUser['avatar'];?>" width="100px;">
               <label><?php echo $editUser['avatar'];?></label>
                <input type="file" class="form-control" name="avatar">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="mdi mdi-check-circle-outline"></i>
                  </span>
                </div>

            </div>                
            <div class="form-group">
              <input type="submit" name="edit_user" value="Update"class="btn btn-primary submit-btn btn-block">
            </div>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (left) -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->