<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        ĐĂNG KÝ
      </h2>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Register</li>
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
              <h3 class="box-title">Register</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 mb20">
                                <h3 class="mb10">Create Your Account</h3>
                                <p>Please fill all Resgister form Fields Below. </p>
                            </div>
                    <form class="forms-sample" action="admin.php?controller=user&action=register" method="POST" enctype="multipart/form-data">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>User name</label>
                                <label class="control-label sr-only" for="username"></label>
                                <input id="username" name="username" type="text" class="form-control" placeholder="Create Your UserName"  required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Password</label>
                                <label class="control-l abel  sr-only" for="password"></label>
                                <input id="password" name="password" type="password" class="form-control" placeholder="Create your password"  required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Name</label>
                                <label class="control-label sr-only" for="name"></label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Enter Your Name"  required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <label class="control-label sr-only" for="phone"></label>
                                <input id="phone" name="phone" type="text" class="form-control" placeholder=" Number"  required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Email</label>
                                <label class="control-label sr-only" for="email"></label>
                                <input id="email" name="email" type="text" class="form-control" placeholder="Enter your email id"  required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Birthday</label>
                                <label class="control-label sr-only" for="birthday"></label>
                                <input id="birthday" name="birthday" type="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Avatar</label>
                                <label class="control-label sr-only" for="avatar"></label>
                                <input id="avatar" name="avatar" type="file" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <button class="btn btn-primary btn-block mb10" name="register">Register</button>
                            <div>
                                <p>Have an Acount? <a href="admin?controller=user&action=login" >Login</a></p>
                            </div>
                        </div>
                    </form>
                    </div>
                        <!-- /.form -->
                    </div>
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