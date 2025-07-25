<?php include '../header.php';
initInstaller()
    ?>

<body>

    <div class="container">
        <div class="row align-items-center justify-content-between m-4">
            <!-- Logo Column -->
            <div class="col-md-4 w-65 text-center">
                <img src="../assets/image/system_logo/<?php echo get_option('system_logo'); ?>" alt="Logo" class="img-fluid m-3">
            </div>

            <!-- Login Form Column -->
            <div class="col-md-4">
                <div class="shadow-lg bg-white rounded">
                    <div class="card-header text-center">
                        <div class="school-logo">
                            <img src="../assets/image/system_logo/<?php echo get_option('system_logo'); ?>" class="w-25" alt="logo">
                        </div>
                        <h4 class="card-title text-danger fw-bold mb-2">Login Access</h4>
                        <p class="card-text text-muted small">
                            <?php echo get_option('system_description'); ?>
                        </p>
                    </div>

                    <form id="login-form" method="post">
                        <div class="m-4">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-user text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" name="username"
                                    placeholder="Username" required>
                            </div>
                        </div>

                        <div class="m-4">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input type="password" class="form-control border-start-0" name="password"
                                    placeholder="Password" required>
                            </div>
                        </div>
                        

                        <div class="m-4">
                            <button type="submit" class="btn btn-danger btn-login w-100">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </button>
                        </div>

                        <div class="text-center p-3">
                            <small class="text">Don't have an account?</small><br>
                            <a href="register.php" class="text-decoration-none text-danger m-3 fw-semibold">
                                Create Account
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>



<?php include '../footer.php' ?>