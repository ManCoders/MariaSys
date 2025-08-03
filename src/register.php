<?php include '../header.php'; ?>

<body>
    <main>
        <div class="container m-1">
            <div class="row align-items-center justify-content-center m-2">

                <div class="col-md-7">
                    <div class="p-3 shadow-sm border rounded bg-white">
                        <div class="text-center">
                            <img src="../assets/image/system_logo/<?php echo get_option('system_logo'); ?>" alt="Logo"
                                class="img-fluid" style="max-height: 100px;">
                            <h4 class="text-danger fw-bold">Register Access</h4>
                            <p class="text-muted small"><?php echo get_option('system_description'); ?></p>
                        </div>

                        <form id="register-form" method="post">
                            <div class="row">
                                <div class="col-md-3">
                                <label class="form-label">Account Type</label>
                                <select class="form-select" name="user_role" required>
                                    <option value="" disabled selected>Select Account Type</option>
                                    <option  value="Teacher">Teachers</option>
                                    <option selected value="Parent">Parents</option> 
                                </select>
                            </div>
                                
                                <div class="col-md-3 ">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="firstName" required>
                                </div>
                                <div class="col-md-3 ">
                                    <label class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" name="middleName" required>
                                </div>
                                <div class="col-md-3 ">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="lastName" required>
                                </div>
                            </div>


                            <!-- Birth & Gender -->
                            <div class="row">
                                <div class="col-md-6 ">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="dateofbirth" required>
                                </div>
                                <div class="col-md-6 ">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Contact Info -->
                            <div class="row">
                                <div class="col-md-6 ">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="col-md-6 ">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" name="cpnumber" required>
                                </div>
                            </div>

                            <!-- Account Info -->
                            <div class="row">
                                <div class="col-md-4 ">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" required>
                                </div>
                                <div class="col-md-4 ">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="col-md-4 ">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="cpassword" required>
                                </div>
                            </div>
                            <div class="form-check form-check mx-auto mt-3">
                                <input class="" type="checkbox" id="agree" name="agree" required>
                                <label class="form-check-label" for="agree">
                                    I agree to the
                                    <a href="#" class="text-danger text-decoration-none">Terms and
                                        Conditions</a>
                                </label>
                            </div>


                            <!-- Submit Button -->
                            <div class="d-grid col-md-5 mx-auto mt-3 text-danger">
                                <button type="submit" class="btn btn-danger ">
                                    <i class="fas fa-user-plus me-1"></i> Register
                                </button>
                            </div>

                            <!-- Login Link -->
                            <div class="text-center mt-0">
                                <small class="text-muted">Already have an account?</small><br>
                                <a href="index.php" class="text-decoration-none text-danger fw-semibold">Login Here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </main>
</body>

<?php include '../footer.php'; ?>