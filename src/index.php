<?php include '../header.php';
initInstaller()
?>

<div class="breadcrumb-nav">
    <h2 class="text-center mb-0">
        <a href="index.php" class="text-decoration-none system-title"><?php echo get_option('system_title'); ?></a>
        <span class="text-muted mx-2">|</span>
        <span class="text-dark">Login</span>
    </h2>
</div>

<main id="main" class="login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-3 col-12">
                <div class="card login-card border-0">
                    <div class="card-header text-center bg-transparent border-0 pt-4">
                        <div class="school-logo">
                            <i class="fas fa-graduation-cap text-danger" style="font-size: 2rem;"></i>
                        </div>
                        <h4 class="card-title text-danger fw-bold mb-2">Login Access</h4>
                        <p class="card-text text-muted small"><?php echo get_option('system_description'); ?></p>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <form id="login-form" method="post">
                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-user text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control border-start-0" name="username" 
                                           placeholder="Username" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control border-start-0" name="password" 
                                           placeholder="Password" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger btn-login w-100">
                                    <i class="fas fa-sign-in-alt me-2"></i>Login
                                </button>
                            </div>
                            <div class="text-center">
                                <small class="text-muted">Don't have an account?</small><br>
                                <a href="register.php" class="text-decoration-none text-danger fw-semibold">
                                    Create Account
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../footer.php'?>