

<section class="p-2">
    <div class="sub-section">
        <div class="d-flex justify-content-between align-items-center mb-0">
            <div>
                <h4 class="fs-5 "><i class="fa fa-folder-open text-primary me-2"></i>Teacher Registration</h4>
                <span>Manage and process teacher registration application</span>
            </div>
            <button class="btn btn-success btn-sm" id="addNewBtn"
                data-bs-toggle="modal" data-bs-target="#childModal">
                <i class="fa fa-user-plus me-2"></i> Add New Teacher
            </button>
        </div>
        <table class="table table-bordered table-hover mb-0" id="student-tbl-2">
            <thead class="table-light text-sm p-0 text-dark">
                <tr>
                    <th class="text-center" style="width:4%">#</th>
                    <th>Teacher Name</th>
                    <th>Grade/Section</th>
                    <th>Contact Number</th>
                    <th>Date Submitted</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody id="tb_data_body-2"></tbody>
        </table>
    </div>

    <style>
        .modal-lg{
            width: 60%;
        }
    </style>

    <!-- Modal -->
    <div class="modal fade" id="childModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">

                <form id="register-form" method="post">
                    <div class="modal-header bg-danger ">
                        <h4 class="text-white modal-title">Register Access</h4>
                       
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Account Type</label>
                                <select class="form-select" name="user_role" required>
                                    <option value="" disabled selected>Select Account Type</option>
                                    <option value="Teacher">Teachers</option>
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
                                <input type="text" maxlength="12" pattern="\d{12}" class="form-control" name="cpnumber" required>
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
                    </div>


                    <!-- Submit Button -->
                    <div class="modal-footer m-0 text-danger">
                        <button type="submit" class="btn btn-danger ">
                            <i class="fas fa-user-plus me-1"></i> Register
                        </button>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger ">
                            <i class="fas fa-cancel me-1"></i> Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

