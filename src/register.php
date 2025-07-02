<?php include '../header.php'; ?>

<style>
.login-page {
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('assets/images/schoolIMG.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 40px 0;
}

.register-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.school-logo {
    width: 60px;
    height: 60px;
    margin: 0 auto 15px;
    background: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.form-control, .form-select {
    border-radius: 8px;
    border: 2px solid #e9ecef;
    padding: 10px 12px;
    transition: all 0.3s ease;
    margin-bottom: 10px;
}

.form-control:focus, .form-select:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.btn-register {
    background: linear-gradient(45deg, #28a745, #20c997);
    border: none;
    border-radius: 8px;
    padding: 12px 30px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.btn-register:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
}

.step-indicator {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 8px;
    padding: 8px 15px;
    margin-bottom: 20px;
    border-left: 4px solid #dc3545;
}

.breadcrumb-nav {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    margin-bottom: 20px;
    padding: 15px 20px;
}

.system-title {
    color: #dc3545;
    font-weight: 700;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
}

/* Multi-step form styles */
.tab {
    display: none;
}

.tab.active {
    display: block;
}

/* Step indicator */
.step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
}

.step.active {
    opacity: 1;
}

.step.finish {
    background-color: #dc3545;
}

.invalid {
    border-color: #dc3545 !important;
}

.is-invalid {
    border-color: #dc3545 !important;
}

.navigation-buttons {
    text-align: center;
    margin-top: 20px;
}

.navigation-buttons button {
    margin: 0 5px;
}
</style>

<div class="breadcrumb-nav">
    <h2 class="text-center mb-0">
        <a href="index.php" class="text-decoration-none system-title"><?php echo get_option('system_title'); ?></a>
        <span class="text-muted mx-2">|</span>
        <span class="text-dark">Register</span>
    </h2>
</div>

<main id="main" class="login-page">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 col-12">
                <div class="card register-card border-0">
                    <div class="card-header text-center bg-transparent border-0 pt-4">
                        <div class="school-logo">
                            <i class="fas fa-user-plus text-success" style="font-size: 1.5rem;"></i>
                        </div>
                        <h4 class="card-title text-success fw-bold mb-2">Register Access</h4>
                        <p class="card-text text-muted small"><?php echo get_option('system_description'); ?></p>
                        
                        <!-- Step indicators -->
                        <div style="text-align:center;margin-top:20px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <form id="register-form" method="post">
                            <!-- Step 1: Account Type -->
                            <div class="tab">
                                <div class="step-indicator">
                                    <small class="text-muted fw-semibold">
                                        <i class="fas fa-user-tag me-1"></i>Account Type
                                    </small>
                                </div>
                                <select class="form-control" name="user_role" required>
                                    <option value="" disabled selected>Select Account Type</option>
                                    <option value="teacher">👨‍🏫 Teachers</option>
                                    <option value="parent">👨‍👩‍👧‍👦 Parents</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <!-- Step 2: Complete Name -->
                            <div class="tab">
                                <div class="step-indicator">
                                    <small class="text-muted fw-semibold">
                                        <i class="fas fa-id-card me-1"></i>Complete Name
                                    </small>
                                </div>
                                <input type="text" class="form-control" name="LastName" placeholder="Last Name" required>
                                <div class="invalid-feedback"></div>
                                <input type="text" class="form-control" name="FirstName" placeholder="First Name" required>
                                <div class="invalid-feedback"></div>
                                <input type="text" class="form-control" name="MiddleName" placeholder="Middle Name" required>
                                <div class="invalid-feedback"></div>
                                <input type="text" class="form-control" name="Suffix" placeholder="Suffix (e.g. Jr., Sr.)">
                                <div class="invalid-feedback"></div>
                            </div>

                            <!-- Step 3: Contact Information -->
                            <div class="tab">
                                <div class="step-indicator">
                                    <small class="text-muted fw-semibold">
                                        <i class="fas fa-address-book me-1"></i>Contact Information
                                    </small>
                                </div>
                                <input type="text" class="form-control" name="reference_id" placeholder="Reference ID" required>
                                <div class="invalid-feedback"></div>
                                <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                                <div class="invalid-feedback"></div>
                                <input type="text" class="form-control" name="cpnumber" placeholder="Contact Number" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <!-- Step 4: Account Information -->
                            <div class="tab">
                                <div class="step-indicator">
                                    <small class="text-muted fw-semibold">
                                        <i class="fas fa-key me-1"></i>Account Information
                                    </small>
                                </div>
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                                <div class="invalid-feedback"></div>
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                <div class="invalid-feedback"></div>
                                <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <!-- Step 5: Address -->
                            <div class="tab">
                                <div class="step-indicator">
                                    <small class="text-muted fw-semibold">
                                        <i class="fas fa-map-marker-alt me-1"></i>Address Information
                                    </small>
                                </div>
                                <input type="text" class="form-control" name="province" placeholder="Province" required>
                                <div class="invalid-feedback"></div>
                                <input type="text" class="form-control" name="city" placeholder="City" required>
                                <div class="invalid-feedback"></div>
                                <input type="text" class="form-control" name="barangay" placeholder="Barangay" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <!-- Step 6: Personal Information -->
                            <div class="tab">
                                <div class="step-indicator">
                                    <small class="text-muted fw-semibold">
                                        <i class="fas fa-user me-1"></i>Personal Information
                                    </small>
                                </div>
                                <label class="form-label small text-muted">Date of Birth</label>
                                <input type="date" class="form-control" name="dateofbirth" required>
                                <div class="invalid-feedback"></div>
                                <select class="form-control" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <div class="invalid-feedback"></div>
                                <select class="form-control" name="status" required>
                                    <option value="">Civil Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <!-- Step 7: Summary -->
                            <div class="tab">
                                <div class="step-indicator">
                                    <small class="text-muted fw-semibold">
                                        <i class="fas fa-check-circle me-1"></i>Review & Submit
                                    </small>
                                </div>
                                <div class="alert alert-info">
                                    <h6><i class="fas fa-info-circle me-2"></i>Almost Done!</h6>
                                    <p class="mb-0 small">Please review your information and click Submit to create your account.</p>
                                </div>
                            </div>

                            <!-- Navigation buttons -->
                            <div class="navigation-buttons">
                                <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">
                                    <i class="fas fa-arrow-left me-1"></i>Previous
                                </button>
                                <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">
                                    Next<i class="fas fa-arrow-right ms-1"></i>
                                </button>
                            </div>
                            
                            <div class="text-center mt-3">
                                <small class="text-muted">Already have an account?</small><br>
                                <a href="index.php" class="text-decoration-none text-danger fw-semibold">
                                    Login Here
                                </a>
                            </div>
                        </form>

                        <script>
                            let currentTab = 0;
                            showTab(currentTab);

                            function showTab(n) {
                                let x = document.getElementsByClassName("tab");
                                if (n >= x.length) {
                                    document.getElementById("register-form").submit();
                                    return false;
                                }
                                if (n < 0) {
                                    return false;
                                }
                                for (let i = 0; i < x.length; i++) {
                                    x[i].style.display = "none";
                                }
                                x[n].style.display = "block";
                                
                                document.getElementById("prevBtn").style.display = (n === 0) ? "none" : "inline";
                                document.getElementById("nextBtn").innerHTML = (n === (x.length - 1)) ? '<i class="fas fa-check me-1"></i>Submit' : 'Next<i class="fas fa-arrow-right ms-1"></i>';
                                
                                fixStepIndicator(n);
                            }

                            function nextPrev(n) {
                                let x = document.getElementsByClassName("tab");
                                if (n === 1 && !validateFormStep(currentTab)) return false;
                                x[currentTab].style.display = "none";
                                currentTab += n;
                                if (currentTab >= x.length) {
                                    $("#register-form").submit();
                                    return false;
                                }
                                showTab(currentTab);
                            }

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
                                        errorMessage = "Reference ID can only contain letters and numbers.";
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