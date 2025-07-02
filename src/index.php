<?php include '../header.php';
initInstaller()
?>

<style>
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    overflow-x: hidden;
}

.login-page {
    height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('assets\image\schoolIMG.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    position: relative;
}

.login-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.school-logo {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    background: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.form-control {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    padding: 12px 15px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.btn-login {
    background: linear-gradient(45deg, #dc3545, #c82333);
    border: none;
    border-radius: 10px;
    padding: 12px 30px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.btn-login:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
}

.system-title {
    color: #dc3545;
    font-weight: 700;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
}

.breadcrumb-nav {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    margin-bottom: 30px;
    padding: 15px 20px;
}
</style>

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