<?php 
include '../../authentication/settings.php';
$teacherInfo = get_user_info();
$Teacher = $teacherInfo["teacherInfo"];
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
                            <input type="hidden" name="user_id" value="<?= $teacherID ?>">
                            <input type="hidden" name="user_type" value="TEACHER">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="mb-3">
                                        <img src="../../authentication/uploads/<?= htmlspecialchars($Teacher["teacher_picture"]) ?>" 
                                             alt="Profile Photo" class="rounded-circle profile-photo mb-3" width="150" height="150" id="profilePhoto">
                                        <br>
                                        <button type="button" class="btn btn-outline-secondary btn-sm" id="changePhotoBtn">
                                            <i class="fa fa-camera me-1"></i>Change Photo
                                        </button>
                                        <input type="file" name="teacher_picture" id="photoUpload" accept="image/*" style="display: none;">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">First Name *</label>
                                            <input type="text" readonly class="form-control" name="firstname" id="firstName" value="<?= htmlspecialchars($Teacher["firstname"]) ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Middle Name *</label>
                                            <input type="text" readonly class="form-control" name="middlename" id="middleName" value="<?= htmlspecialchars($Teacher["middlename"]) ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Last Name *</label>
                                            <input type="text" readonly class="form-control" name="lastname" id="lastName" value="<?= htmlspecialchars($Teacher["lastname"]) ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Teacher ID</label>
                                            <input type="text" readonly class="form-control" name="employeeid" id="employeeid" value="<?= htmlspecialchars($Teacher["employeeid"]) ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Department</label>
                                            <input type="text" class="form-control" name="department" id="department" value="<?= htmlspecialchars($Teacher["department"]) ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Position</label>
                                            <input type="text" class="form-control" name="position" id="position" value="<?= htmlspecialchars($Teacher["position"]) ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Email Address *</label>
                                            <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($Teacher["email"]) ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Phone Number *</label>
                                            <input type="tel" class="form-control" name="cpno" id="phone" value="<?= htmlspecialchars($Teacher["cpno"]) ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Province *</label>
                                             <input type="text" value="<?= htmlspecialchars($Teacher["province"]) ?>" class="form-control" name="province">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">City *</label>
                                            <input type="text" value="<?= htmlspecialchars($Teacher["city"]) ?>" class="form-control" name="city">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Barangay *</label>
                                            <input type="text" value="<?= htmlspecialchars($Teacher["barangay"]) ?>" class="form-control" name="barangay">
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
                <h5><i class="fa-solid fa-lock"></i> Password Security Authentication</h5>
                <form action="../../authentication/settings.php" method="POST">
                    <input type="hidden" name="passsword" value="true">
                    <input type="hidden" name="user_id" value="<?= $teacherID ?>">
                    <input type="hidden" name="user_type" value="TEACHER">
                    <div class="column">
                        <div class="column my-2">
                            <label for="">Current Password</label>
                            <input type="password" class="form-control" name="Current_password" id="Current_password">
                        </div>
                        <div class="column my-2">
                            <label for="">New Password</label>
                            <input type="password" class="form-control" name="New_password" id="New_password">
                        </div>
                        <div class="column my-2">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" name="Confirm_password" id="Confirm_password">
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

    <!-- Delete Account Confirmation Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #f8d7da; border-bottom: 1px solid #f5c6cb;">
                    <h5 class="modal-title" style="color: #721c24;">Delete Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-light-warning">
                        <i class="fa fa-exclamation-triangle me-2"></i>
                        <strong>Warning:</strong> This action cannot be undone!
                    </div>
                    <p style="color: #555;">Deleting your account will permanently remove:</p>
                    <ul style="color: #666;">
                        <li>Your profile information</li>
                        <li>All feedback and communication history</li>
                        <li>Notification preferences</li>
                        <li>Account settings</li>
                    </ul>
                    <p style="color: #555;"><strong>Note:</strong> Your children's academic records will remain in the school system for regulatory compliance.</p>
                    
                    <div class="mb-3">
                        <label class="form-label">Type "DELETE" to confirm:</label>
                        <input type="text" class="form-control" id="deleteConfirmation" placeholder="Type DELETE here">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn" disabled>
                        <i class="fa fa-trash me-1"></i>Delete My Account
                    </button>
                </div>
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
                showNotification('Profile photo updated successfully!');
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