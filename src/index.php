<!-- <?php include '../header.php';?>
 -->
<h2 class="text-center mt-5">
    <a href="index.php" class="text-decoration-none text-dark"><?php echo get_option('system_title'); ?></a>
    <span class="text-muted">|</span>
    <a href="index.php" class="text-decoration-none text-dark">Login</a>
</h2>

<main id="main" class="login-page">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-12 mx-auto">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4 class="card-title">Login Access</h4>
                        <p class="card-text"><?php echo get_option('system_description'); ?></p>
                    </div>
                    <div class="card-body">
                        <form id="login-form" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="username" placeholder="Username: "
                                    required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password: "
                                    required>
                            </div>
                            <div class="mb-3 text-center">
                                <input type="submit" value="Login" class="btn btn-primary"></input>
                            </div>
                            <div class="mb-3 text-center">
                                <a href="register.php" class="text-decoration-none">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include '../footer.php'?>