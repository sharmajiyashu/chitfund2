<!doctype html>
<html lang="en">

    <head>
        <?php include APPPATH. 'views/include/css.php'; ?>
    </head>
    <body class=" ">
        <!-- loader Start -->
        <div id="loading">
            <div id="loading-center">
            </div>
        </div>
        <!-- loader END -->

        <div class="wrapper">
            <section class="login-content">
                <div class="container">
                    <div class="row align-items-center justify-content-center height-self-center">
                        <div class="col-lg-8">
                            <div class="card auth-card">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center auth-content">
                                        <div class="col-lg-7 align-self-center">
                                            <div class="p-3">
                                                <h2 class="mb-2">Sign In</h2>
                                                <p>Login to stay connected.</p>
                                                <form id="myform" action="<?php echo base_url(); ?>Login" method="post">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="floating-label form-group">
                                                                <input class="floating-input form-control" type="email" name="email">
                                                                <div><font color='red'> <?php echo form_error('email'); ?> </font></div>
                                                                <label>Email</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="floating-label form-group">
                                                                <input class="floating-input form-control" type="password" name="password" >
                                                                <div><font color='red'> <?php echo form_error('password'); ?> </font></div>
                                                                <label>Password</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Sign In</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 content-right">
                                            <img src="<?php echo base_url(); ?>assets/assets/images/login/chit_fund.png" class="img-fluid image-right" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
       <?php include APPPATH . 'views/include/js.php'; ?>

    </body>

</html>