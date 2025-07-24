<?php include '../header.php'; ?>
<body>
    <main>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="text-center mb-4">
                        <img src="../assets/image/system_logo/logo2.png" alt="Logo" class="img-fluid mb-3" style="max-height: 100px;">
                        <h4 class="text-success fw-bold">Register Access</h4>
                        <p class="text-muted small"><?php echo get_option('system_description'); ?></p>
                    </div>

                    <form id="register-form" method="post" class="card p-4 shadow-sm">
                        <!-- Account Type -->
                        <div class="mb-3">
                            <label class="form-label">Account Type</label>
                            <select class="form-control" name="user_role" required>
                                <option value="" disabled selected>Select Account Type</option>
                                <option value="teacher">👨‍🏫 Teachers</option>
                                <option value="parent">👨‍👩‍👧‍👦 Parents</option>
                            </select>
                        </div>

                        <!-- Name -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="LastName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="FirstName" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Middle Name</label>
                                <input type="text" class="form-control" name="MiddleName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Suffix</label>
                                <input type="text" class="form-control" name="Suffix" placeholder="e.g. Jr., Sr.">
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="mb-3">
                            <label class="form-label">Reference ID</label>
                            <input type="text" class="form-control" name="reference_id" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="cpnumber" required>
                        </div>

                        <!-- Account Info -->
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="cpassword" required>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label class="form-label">Province</label>
                            <input type="text" class="form-control" name="province" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" name="city" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Barangay</label>
                            <input type="text" class="form-control" name="barangay" required>
                        </div>

                        <!-- Personal Info -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dateofbirth" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender</label>
                                <select class="form-control" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Civil Status</label>
                            <select class="form-control" name="status" required>
                                <option value="">Select Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-user-plus me-1"></i> Register
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center mt-3">
                            <small class="text-muted">Already have an account?</small><br>
                            <a href="index.php" class="text-decoration-none text-danger fw-semibold">Login Here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

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
<?php include '../footer.php'; ?>