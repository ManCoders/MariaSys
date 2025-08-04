<?php 
include '../../authentication/settings.php';
$parentInfo = get_user_info();
$Parent = $parentInfo["parentInfo"];
?>
<style>
    .nav-tabs .nav-link {
        color: #666;
        border: 1px solid transparent;
        padding: 12px 16px;
    }

    .nav-tabs .nav-link.active {
        color: #333;
        background-color: #f8f9fa;
        border-color: #ddd #ddd #f8f9fa;
    }

    .nav-tabs .nav-link:hover {
        border-color: #e9ecef #e9ecef #f8f9fa;
        background-color: #f8f9fa;
        color: #495057;
    }

    .profile-photo {
        border: 3px solid #f8f9fa;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .settings-card {
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
    }

    .status-badge {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-enabled {
        background-color: #e8f5e8;
        color: #2d5a2d;
        border: 1px solid #c3e6c3;
    }

    .status-disabled {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .form-label {
        color: #555;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .text-danger {
        color: #721c24 !important;
    }

    .alert-light-info {
        background-color: #e8f4fd;
        border: 1px solid #b3d7ff;
        color: #0c5460;
    }

    .alert-light-warning {
        background-color: #fff3cd;
        border: 1px solid #ffda6a;
        color: #664d03;
    }
</style>

<section class="p-2">
    <div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0"><i class="fa fa-cog text-primary me-2"></i>Account Settings</h4>
                <small class="text-muted">Manage your parent account information and preferences</small>
            </div>
        </div>

        <!-- Settings Tabs -->
        <div class="card settings-card">

            <div class="card-body">
                <div class="tab-content" id="settingsTabContent">
                    <!-- Profile Information Tab -->
                    <div class="tab-pane fade show active" id="profile" role="tabpanel">
                        <form action="../../authentication/settings.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="settings" value="true">
                            <input type="hidden" name="user_id" value="<?= $parentID ?>">
                            <input type="hidden" name="user_type" value="PARENT">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="mb-3">
                                        <img src="../../authentication/uploads/<?= htmlspecialchars($Parent["parent_picture"]) ?>"
                                            alt="Profile Photo" class="rounded-circle profile-photo mb-3" width="150"
                                            height="150" id="profilePhoto">
                                        <br>
                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                            id="changePhotoBtn">
                                            <i class="fa fa-camera me-1"></i>Change Photo
                                        </button>
                                        <input type="file" name="parent_picture" id="photoUpload" accept="image/*"
                                            style="display: none;">
                                        <input type="hidden" name="current_profile_image" value="<?= $Parent["parent_picture"] ?>" >
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">First Name *</label>
                                            <input type="text" class="form-control" name="firstname" id="firstName"
                                                value="<?= htmlspecialchars($Parent["firstname"]) ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Middle Name *</label>
                                            <input type="text" class="form-control" name="middlename" id="middleName"
                                                value="<?= htmlspecialchars($Parent["middlename"]) ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Last Name *</label>
                                            <input type="text" class="form-control" name="lastname" id="lastName"
                                                value="<?= htmlspecialchars($Parent["lastname"]) ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Email Address *</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="<?= htmlspecialchars($Parent["email"]) ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Phone Number *</label>
                                            <input type="tel" class="form-control" name="cpno" id="phone"
                                                value="<?= htmlspecialchars($Parent["cpno"]) ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Province *</label>
                                            <input type="text" value="<?= htmlspecialchars($Parent["province"]) ?>"
                                                class="form-control" name="province">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">City *</label>
                                            <input type="text" value="<?= htmlspecialchars($Parent["city"]) ?>"
                                                class="form-control" name="city">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Barangay *</label>
                                            <input type="text" value="<?= htmlspecialchars($Parent["barangay"]) ?>"
                                                class="form-control" name="barangay">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" name="birthDay" id="birthdate"
                                                value="<?= htmlspecialchars($Parent["dateofbirth"]) ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Occupation</label>
                                            <input type="text" class="form-control" name="occupation" id="occupation"
                                                value="<?= htmlspecialchars($Parent["occupation"]) ?>">
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-save me-1"></i>Save Profile Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card settings-card mt-3">
            <div class="card-body">
                <h5><i class="fa-solid fa-lock"></i> Change Password </h5>
                <form action="../../authentication/settings.php" method="POST">
                    <input type="hidden" name="passsword" value="true">
                    <input type="hidden" name="user_id" value="<?= $parentID ?>">
                    <input type="hidden" name="user_type" value="PARENT">
                    <div class="column">
                        <div class="column my-2">
                            <label for="">Current Password</label>
                            <input type="password" required class="form-control" name="Current_password" id="Current_password">
                        </div>
                        <div class="column my-2">
                            <label for="">New Password</label>
                            <input type="password" required class="form-control" name="New_password" id="New_password">
                        </div>
                        <div class="column my-2">
                            <label for="">Confirm Password</label>
                            <input type="password" required class="form-control" name="Confirm_password" id="Confirm_password">
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save me-1"></i>Save Passoword
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<script>
    function showNotification(message, type = 'success') {
        // You can implement a toast notification system here
        alert(message);
    }

    // Profile form handler
    $('#profileForm').submit(function(e) {
        e.preventDefault();
        
        // Validate required fields
        const requiredFields = ['firstName', 'lastName', 'email', 'phone', 'address'];
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!$('#' + field).val().trim()) {
                isValid = false;
                $('#' + field).addClass('is-invalid');
            } else {
                $('#' + field).removeClass('is-invalid');
            }
        });
        
        if (isValid) {
            showNotification('Profile updated successfully!');
        } else {
            showNotification('Please fill in all required fields.', 'error');
        }
    });

    // Password form handler
    $('#passwordForm').submit(function(e) {
        e.preventDefault();
        
        const newPassword = $('#newPassword').val();
        const confirmPassword = $('#confirmPassword').val();
        
        if (newPassword.length < 8) {
            showNotification('Password must be at least 8 characters long.', 'error');
            return;
        }
        
        if (newPassword !== confirmPassword) {
            showNotification('New password and confirmation do not match.', 'error');
            return;
        }
        
        showNotification('Password updated successfully!');
        $('#passwordForm')[0].reset();
    });

    // Notification form handler
    $('#notificationForm').submit(function(e) {
        e.preventDefault();
        showNotification('Notification settings saved successfully!');
    });

    // Privacy form handler
    $('#privacyForm').submit(function(e) {
        e.preventDefault();
        showNotification('Privacy settings saved successfully!');
    });

    // Photo upload handler
    $('#changePhotoBtn').click(function() {
        $('#photoUpload').click();
    });

    $('#photoUpload').change(function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#profilePhoto').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    // Two-factor authentication toggle
    $('#toggle2FA').click(function() {
        const status = $('#twoFactorStatus');
        const button = $(this);
        
        if (status.text() === 'Disabled') {
            status.removeClass('status-disabled').addClass('status-enabled').text('Enabled');
            button.text('Disable 2FA').removeClass('btn-outline-primary').addClass('btn-outline-warning');
            showNotification('Two-factor authentication enabled successfully!');
        } else {
            status.removeClass('status-enabled').addClass('status-disabled').text('Disabled');
            button.text('Enable 2FA').removeClass('btn-outline-warning').addClass('btn-outline-primary');
            showNotification('Two-factor authentication disabled.');
        }
    });

    // Delete account handlers
    $('#deleteAccountBtn').click(function() {
        $('#deleteAccountModal').modal('show');
    });

    $('#deleteConfirmation').on('input', function() {
        const confirmation = $(this).val();
        $('#confirmDeleteBtn').prop('disabled', confirmation !== 'DELETE');
    });

    $('#confirmDeleteBtn').click(function() {
        showNotification('Account deletion request submitted. You will receive an email with further instructions.', 'info');
        $('#deleteAccountModal').modal('hide');
        $('#deleteConfirmation').val('');
    });

    // Phone number formatting
    $('#phone, #emergencyContactPhone').on('input', function() {
        let value = $(this).val().replace(/\D/g, '');
        if (value.length > 11) {
            value = value.substring(0, 11);
        }
        $(this).val(value);
    });

    // Email validation
    $('#email').on('blur', function() {
        const email = $(this).val();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (email && !emailRegex.test(email)) {
            $(this).addClass('is-invalid');
            showNotification('Please enter a valid email address.', 'error');
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    // Initialize tooltips (if using Bootstrap tooltips)
    $(document).ready(function() {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>

<?php if (
        isset($_GET['update']) || 
        isset($_GET['changePass']) || 
        isset($_GET['NewPassword']) || 
        isset($_GET['incorrectPass'])
    ): ?>
    <script>
        // Trigger file upload when "Change Photo" button is clicked
        document.getElementById("changePhotoBtn").addEventListener("click", function () {
            document.getElementById("photoUpload").click();
        });

        // Preview image when a file is selected
        document.getElementById("photoUpload").addEventListener("change", function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById("profilePhoto").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Tooltip initializer
        document.addEventListener("DOMContentLoaded", function () {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // SweetAlert2 messages (still inside DOMContentLoaded)
            const messages = {
                update: { icon: 'success', title: 'Profile updated successfully!' },
                changePass: { icon: 'success', title: 'Password changed successfully!' },
                NewPassword: { icon: 'error', title: 'New passwords do not match!' },
                incorrectPass: { icon: 'error', title: 'Current password is incorrect!' }
            };

            for (const key in messages) {
                const value = new URLSearchParams(window.location.search).get(key);
                if (value) {
                    Swal.fire({
                        toast: true,
                        icon: messages[key].icon,
                        title: messages[key].title,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didClose: () => removeUrlParams([key])
                    });
                    break;
                }
            }

            function removeUrlParams(params) {
                const url = new URL(window.location);
                params.forEach(param => url.searchParams.delete(param));
                window.history.replaceState({}, document.title, url.toString());
            }
        });
    </script>
<?php endif; ?>
