<?php include '../header.php'; ?>
<h2 class="text-center mt-5">
    <a href="index.php" class="text-decoration-none text-dark"><?php echo get_option('system_title'); ?></a>
    <span class="text-muted">|</span>
    <a href="index.php" class="text-decoration-none text-dark">Register</a>
</h2>

<main id="main" class="login-page">
    <div class="container position-relative">
        <div class="row">
            <div class="col-md-4 col-12 mx-auto">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4 class="card-title">Register Access</h4>
                        <p class="card-text"><?php echo get_option('system_description'); ?></p>
                    </div>
                    <div class="card-body">

                        <form class="card-body" id="register-form" method="post">
                            <!-- Step 1 -->
                            <div class="tab mb-3"> Account Type:
                                <select class="form-control " name="user_role" required>
                                    <option value="" disabled selected>Account Type:</option>
                                    <option value="teacher">Teachers</option>
                                    <option value="parent">Parents</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <!-- Step 2 -->
                            <div class="tab mb-3"> Complete Name:
                                <input type="text" class="form-control mb-2" name="LastName" placeholder="Last Name"
                                    required>
                                <div class="invalid-feedback"></div>
                                <input type="text" class="form-control mb-2" name="FirstName" placeholder="First Name"
                                    required>
                                <div class="invalid-feedback"></div>
                                <input type="text" class="form-control mb-2" name="MiddleName" placeholder="Middle Name"
                                    required>
                                <div class="invalid-feedback"></div>
                                <input type="text" class="form-control mb-2" name="Suffix"
                                    placeholder="Suffix (e.g. Jr., Sr.)">
                                <div class="invalid-feedback"></div>
                            </div>

                            <!-- Step 3 -->
                            <div class="tab mb-3"> Contact Information:
                                <input type="text" class="form-control mb-2" name="reference_id" placeholder="Reference ID"
                                    required>
                                <div class="invalid-feedback"></div>
                                <input type="email" class="form-control mb-2" name="email" placeholder="Email Address"
                                    required>
                                <div class="invalid-feedback"></div>
                                <input type="text" class="form-control mb-2" name="cpnumber"
                                    placeholder="Contact Number" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <!-- Step 4 -->
                            <div class="tab mb-3"> Account Information:
                                <input type="text" class="form-control mb-2" name="username" placeholder="Username"
                                    required>
                                <div class="invalid-feedback"></div>
                                <input type="password" class="form-control mb-2" name="password" placeholder="Password"
                                    required>
                                <div class="invalid-feedback"></div>
                                <input type="password" class="form-control mb-2" name="cpassword"
                                    placeholder="Confirm Password" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <!-- Step 5 -->
                            <!-- <div class="tab mb-3"> Employee Type:
                                <select class="form-control mb-2" name="position" required>
                                    <option value="" selected>Position:</option>
                                    <option value="1">Doctor</option>
                                    <option value="2">Nurse</option>
                                    <option value="3">Utility</option>
                                </select>

                                <div class="invalid-feedback"></div>
                                <select class="form-control mb-2" name="department" required>
                                    <option value="" selected>Department:</option>
                                    <option value="1">HR</option>
                                    <option value="2">Finances</option>
                                    <option value="3">School</option>
                                </select>
                                <div class="invalid-feedback"></div>
                                <select class="form-control" name="rating" required>
                                    <option value="" selected>Rating:</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Daily">Daily</option>
                                    <option value="Hourly">Hourly</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div> -->

                            <!-- Step 6 -->
                            <div class="tab mb-3"> Local Address:
                                <input type="text" class="form-control mb-2" name="province" placeholder="Province"
                                    required>
                                <div class="invalid-feedback"></div>
                                <input type="text" class="form-control mb-2" name="city" placeholder="City" required>
                                <div class="invalid-feedback"></div>
                                <input type="text" class="form-control mb-2" name="barangay" placeholder="Barangay"
                                    required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <!-- Step 7 -->
                            <div class="tab mb-3"> Personal Information:
                                <input type="date" class="form-control mb-2" name="dateofbirth" required>
                                <div class="invalid-feedback"></div>
                                <select class="form-control mb-2" name="gender" required>
                                    <option value="">Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <div class="invalid-feedback"></div>
                                <select class="form-control" name="status" required>
                                    <option value="">Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Separated">Separated</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <!-- Navigation -->
                            <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span><span class="step"></span><span class="step"></span>
                                <span class="step"></span><span class="step"></span><span class="step"></span><span
                                    class="step"></span>
                            </div>

                            <div style="overflow:auto;">
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary" id="prevBtn"
                                        onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" class="btn btn-primary" id="nextBtn"
                                        onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>

                            <div class="mt-3 text-center">
                                <a href="index.php" class="text-decoration-none">Sign In</a>
                            </div>
                        </form>

                        <script>
                            let currentTab = 0;
                            showTab(currentTab);

                            function showTab(n) {
                                let x = document.getElementsByClassName("tab");
                                x[n].style.display = "block";
                                document.getElementById("prevBtn").style.display = n === 0 ? "none" : "inline";
                                document.getElementById("nextBtn").innerHTML = (n === x.length - 1) ? "Submit" : "Next";
                                fixStepIndicator(n);
                            }

                            function nextPrev(n) {
                                let x = document.getElementsByClassName("tab");
                                //if (n === 1 && !validateFormStep()) return false;
                                if (n === 1 && !validateFormStep(currentTab)) return false;
                                x[currentTab].style.display = "none";
                                currentTab += n;
                                if (currentTab >= x.length) {
                                    $("#register-form").submit(); // triggers AJAX
                                    return false;
                                }
                                showTab(currentTab);
                            }



                            /*                             function validateForm() {
                                                            let x = document.getElementsByClassName("tab");
                                                            let y = x[currentTab].querySelectorAll("input, select");
                                                            let valid = true;
                                                            for (let i = 0; i < y.length; i++) {
                                                                if (y[i].value === "") {
                                                                    y[i].classList.add("invalid");
                                                                    valid = false;
                                                                } else {
                                                                    y[i].classList.remove("invalid");
                                                                }
                                                            }
                                                            if (valid) {
                                                                document.getElementsByClassName("step")[currentTab].classList.add("finish");
                                                            }
                                                            return valid;
                                                        } */

                            /* Update here nei */
                            function validateFormStep(tabIndex) {
                                let valid = true;
                                const tab = document.getElementsByClassName("tab")[tabIndex];
                                const inputs = tab.querySelectorAll("input, select");

                                inputs.forEach(field => {
                                    if (!validateField(field)) valid = false;
                                });

                                if (valid) {
                                    document.getElementsByClassName("step")[tabIndex].classList.add("finish");
                                }

                                return valid;
                            }

                            function fixStepIndicator(n) {
                                let x = document.getElementsByClassName("step");
                                for (let i = 0; i < x.length; i++) {
                                    x[i].classList.remove("active");
                                }
                                x[n].classList.add("active");
                            }


                            function validateField(field) {
                                const value = field.value.trim();
                                const feedback = field.nextElementSibling;
                                let isValid = true;
                                field.classList.remove("is-invalid");
                                let errorMessage = "";

                                switch (field.name) {

                                    case "password":
                                        isValid = value.length >= 8;
                                        errorMessage = "Password must be at least 8 characters.";
                                        break;
                                    case "email":
                                        isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
                                        errorMessage = "Please enter a valid email address.";
                                        break;
                                    case "cpnumber":
                                        isValid = /^\d{11}$/.test(value);
                                        errorMessage = "Contact number must be 11 digits.";
                                        break;
                                    case "cpassword":
                                        const pwd = document.querySelector('input[name="password"]').value;
                                        isValid = value === pwd;
                                        errorMessage = "Passwords do not match.";
                                        break;
                                    case "user_role":
                                        isValid = value !== "";
                                        errorMessage = "Please select an account type.";
                                        break;
                                    case "reference_id":
                                        isValid = /^[A-Za-z0-9]+$/.test(value);
                                        errorMessage = "Reference ID can only contain letters and numbers from admission office.";
                                        break;
                                    case "province":
                                        isValid = /^[A-Za-z\s]+$/.test(value);
                                        errorMessage = "Province can only contain letters.";
                                        break;
                                    case "city":
                                        isValid = /^[A-Za-z\s]+$/.test(value);
                                        errorMessage = "City can only contain letters.";
                                        break;
                                    case "barangay":
                                        isValid = /^[A-Za-z\s]+$/.test(value);
                                        errorMessage = "Barangay can only contain letters.";
                                        break;
                                    case "position":
                                        isValid = value !== "";
                                        errorMessage = "Please select a position.";
                                        break;
                                    case "department":
                                        isValid = value !== "";
                                        errorMessage = "Please select a department.";
                                        break;
                                    case "rating":
                                        isValid = value !== "";
                                        errorMessage = "Please select a rating.";
                                        break;
                                    case "Suffix":
                                        isValid = /^[A-Za-z]+$/.test(value);
                                        errorMessage = "If not applicable, Please put NA.";
                                        break;
                                    case "gender":
                                        isValid = value !== "";
                                        errorMessage = "Please select a gender.";
                                        break;
                                    case "status":
                                        isValid = value !== "";
                                        errorMessage = "Please select a status.";
                                        break;
                                    case "dateofbirth":
                                        const today = new Date();
                                        const birthDate = new Date(value);
                                        isValid = birthDate < today;
                                        errorMessage = "Date of birth cannot be in the future.";
                                        break;
                                    case "FirstName":
                                        isValid = /^[A-Za-z\s]+$/.test(value);
                                        errorMessage = "First name can only contain letters.";
                                        break;
                                    case "MiddleName":
                                        isValid = /^[A-Za-z\s]+$/.test(value);
                                        errorMessage = "If not applicable, Please put NA.";
                                        break;
                                    case "LastName":
                                        isValid = /^[A-Za-z\s]+$/.test(value);
                                        errorMessage = "Last name can only contain letters.";
                                        break;
                                    case "username":
                                        isValid = /^[A-Za-z0-9_]+$/.test(value);
                                        errorMessage = "Username can only contain letters, numbers, and underscores.";
                                        break;

                                    default:
                                        isValid = value !== "";
                                        errorMessage = "This field cannot be empty.";
                                }

                                if (!isValid) {
                                    field.classList.add("is-invalid");
                                    if (feedback) feedback.textContent = errorMessage;
                                }

                                return isValid;
                            }


                            document.addEventListener("DOMContentLoaded", function () {
                                const form = document.getElementById("register-form");
                                const fields = form.querySelectorAll("input");

                                fields.forEach(field => {
                                    field.addEventListener("input", () => validateField(field));
                                });
                            });

                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include '../footer.php'; ?>