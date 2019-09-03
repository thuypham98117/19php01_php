<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        ĐĂNG NHẬP
      </h2>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Login</li>
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
              <h3 class="box-title">Login</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form action="admin.php?controller=user&action=login" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="label">Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                    <input type="password" class="form-control" placeholder="*********" name="password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                </div>
                <div class="form-group">
                  <input type="submit" name="login"class="btn btn-primary submit-btn btn-block" value="Login">
                </div>
                
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="admin.php?controller=user&action=register" class="text-black text-small" >Create new account</a>
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