<?php include './layout/customers/header.php';?>
<section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login_form_inner">
                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 form-group ">
                                <h3 class="mb10 primary-btn">Create Your Account</h3>
                                <p>Please fill all Resgister form Fields Below. </p>
                            </div>
                            <form class="row login_form" action="index.php?controller=user&action=register" method="POST" enctype="multipart/form-data">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <label>User name</label>
                                        <label class="control-label sr-only" for="username"></label>
                                        <input id="username" name="username" type="text" class="form-control" placeholder="Create Your UserName"  required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <label>Password</label>
                                        <label class="control-l abel  sr-only" for="password"></label>
                                        <input id="password" name="password" type="password" class="form-control" placeholder="Create your password"  required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <label>Re-Password</label>
                                        <label class="control-l abel  sr-only" for="password"></label>
                                        <input id="re_password" name="re_password" type="password" class="form-control" placeholder="Re-password"  required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <label>Name</label>
                                        <label class="control-label sr-only" for="name"></label>
                                        <input id="name" name="name" type="text" class="form-control" placeholder="Enter Your Name"  required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <label>Phone</label>
                                        <label class="control-label sr-only" for="phone"></label>
                                        <input id="phone" name="phone" type="text" class="form-control" placeholder=" Number"  required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <label>Email</label>
                                        <label class="control-label sr-only" for="email"></label>
                                        <input id="email" name="email" type="text" class="form-control" placeholder="Enter your email id"  required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <label>Birthday</label>
                                        <label class="control-label sr-only" for="birthday"></label>
                                        <input id="birthday" name="birthday" type="date" class="form-control" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <label>Avatar</label>
                                        <label class="control-label sr-only" for="avatar"></label>
                                        <input id="avatar" name="avatar" type="file" class="form-control" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group ">
                                    <button class="primary-btn" name="register">Register</button>
                                    <div>
                                        <p>Have an Acount? <a href="index?controller=user&action=login" >Login</a></p>
                                    </div>
                                </div>
                            </form>
                 </div>
                </div>
            </div>
        </div>
    </section>
<?php include './layout/customers/footer.php';?>