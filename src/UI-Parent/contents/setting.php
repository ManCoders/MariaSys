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
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                <ul class="nav nav-tabs card-header-tabs" id="settingsTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" 
                                data-bs-target="#profile" type="button" role="tab">
                            <i class="fa fa-user me-1"></i>Profile Information
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="security-tab" data-bs-toggle="tab" 
                                data-bs-target="#security" type="button" role="tab">
                            <i class="fa fa-lock me-1"></i>Security
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="notifications-tab" data-bs-toggle="tab" 
                                data-bs-target="#notifications" type="button" role="tab">
                            <i class="fa fa-bell me-1"></i>Notifications
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="privacy-tab" data-bs-toggle="tab" 
                                data-bs-target="#privacy" type="button" role="tab">
                            <i class="fa fa-shield-alt me-1"></i>Privacy
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="settingsTabContent">
                    <!-- Profile Information Tab -->
                    <div class="tab-pane fade show active" id="profile" role="tabpanel">
                        <form id="profileForm">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="mb-3">
                                        <img src="https://via.placeholder.com/150x150/6c757d/ffffff?text=Parent" 
                                             alt="Profile Photo" class="rounded-circle profile-photo mb-3" width="150" height="150" id="profilePhoto">
                                        <br>
                                        <button type="button" class="btn btn-outline-secondary btn-sm" id="changePhotoBtn">
                                            <i class="fa fa-camera me-1"></i>Change Photo
                                        </button>
                                        <input type="file" id="photoUpload" accept="image/*" style="display: none;">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">First Name *</label>
                                            <input type="text" class="form-control" id="firstName" value="Maria" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Last Name *</label>
                                            <input type="text" class="form-control" id="lastName" value="Santos" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Email Address *</label>
                                            <input type="email" class="form-control" id="email" value="maria.santos@email.com" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Phone Number *</label>
                                            <input type="tel" class="form-control" id="phone" value="09123456789" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Complete Address *</label>
                                        <textarea class="form-control" id="address" rows="3" required>123 Main Street, Barangay Centro, Polomolok, South Cotabato, 9504</textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" id="birthdate" value="1985-06-15">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Occupation</label>
                                            <input type="text" class="form-control" id="occupation" value="Teacher">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Emergency Contact Name</label>
                                            <input type="text" class="form-control" id="emergencyContactName" value="Juan Santos">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Emergency Contact Number</label>
                                            <input type="tel" class="form-control" id="emergencyContactPhone" value="09987654321">
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

                    <!-- Security Tab -->
                    <div class="tab-pane fade" id="security" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                    <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                                        <h6 class="mb-0" style="color: #555;">Change Password</h6>
                                    </div>
                                    <div class="card-body">
                                        <form id="passwordForm">
                                            <div class="mb-3">
                                                <label class="form-label">Current Password *</label>
                                                <input type="password" class="form-control" id="currentPassword" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">New Password *</label>
                                                <input type="password" class="form-control" id="newPassword" required>
                                                <small class="text-muted">Must be at least 8 characters long</small>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Confirm New Password *</label>
                                                <input type="password" class="form-control" id="confirmPassword" required>
                                            </div>
                                            <button type="submit" class="btn btn-warning">
                                                <i class="fa fa-key me-1"></i>Update Password
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                    <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                                        <h6 class="mb-0" style="color: #555;">Two-Factor Authentication</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <strong>Status:</strong> 
                                                <span class="status-badge status-disabled" id="twoFactorStatus">Disabled</span>
                                            </div>
                                            <button class="btn btn-outline-primary btn-sm" id="toggle2FA">
                                                Enable 2FA
                                            </button>
                                        </div>
                                        <p style="color: #666; font-size: 14px;">
                                            Two-factor authentication adds an extra layer of security to your account by requiring a verification code from your phone.
                                        </p>
                                    </div>
                                </div>

                                <div class="card mt-3" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                    <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                                        <h6 class="mb-0" style="color: #555;">Login Sessions</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <strong style="color: #555;">Current Session:</strong><br>
                                            <small class="text-muted">Chrome on Windows - 192.168.1.100</small><br>
                                            <small class="text-muted">Active now</small>
                                        </div>
                                        <div class="mb-2">
                                            <strong style="color: #555;">Mobile App:</strong><br>
                                            <small class="text-muted">Android App - 192.168.1.101</small><br>
                                            <small class="text-muted">2 hours ago</small>
                                        </div>
                                        <button class="btn btn-outline-danger btn-sm">
                                            <i class="fa fa-sign-out-alt me-1"></i>Sign out all sessions
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications Tab -->
                    <div class="tab-pane fade" id="notifications" role="tabpanel">
                        <form id="notificationForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                                            <h6 class="mb-0" style="color: #555;">Email Notifications</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="emailAttendance" checked>
                                                <label class="form-check-label" for="emailAttendance" style="color: #555;">
                                                    Attendance updates
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="emailGrades" checked>
                                                <label class="form-check-label" for="emailGrades" style="color: #555;">
                                                    Grade updates
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="emailEvents">
                                                <label class="form-check-label" for="emailEvents" style="color: #555;">
                                                    School events and announcements
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="emailHealth" checked>
                                                <label class="form-check-label" for="emailHealth" style="color: #555;">
                                                    Health and medical updates
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="emailBehavior" checked>
                                                <label class="form-check-label" for="emailBehavior" style="color: #555;">
                                                    Behavior reports
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="emailFeedback" checked>
                                                <label class="form-check-label" for="emailFeedback" style="color: #555;">
                                                    Feedback responses
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                                            <h6 class="mb-0" style="color: #555;">SMS Notifications</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="smsAttendance" checked>
                                                <label class="form-check-label" for="smsAttendance" style="color: #555;">
                                                    Daily attendance summary
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="smsEmergency" checked>
                                                <label class="form-check-label" for="smsEmergency" style="color: #555;">
                                                    Emergency alerts
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="smsEvents">
                                                <label class="form-check-label" for="smsEvents" style="color: #555;">
                                                    Important event reminders
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="smsMedical" checked>
                                                <label class="form-check-label" for="smsMedical" style="color: #555;">
                                                    Medical/health alerts
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mt-3" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                                            <h6 class="mb-0" style="color: #555;">Push Notifications</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="pushEnabled" checked>
                                                <label class="form-check-label" for="pushEnabled" style="color: #555;">
                                                    Enable push notifications
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="pushQuiet">
                                                <label class="form-check-label" for="pushQuiet" style="color: #555;">
                                                    Quiet hours (9 PM - 7 AM)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save me-1"></i>Save Notification Settings
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Privacy Tab -->
                    <div class="tab-pane fade" id="privacy" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                    <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                                        <h6 class="mb-0" style="color: #555;">Privacy Settings</h6>
                                    </div>
                                    <div class="card-body">
                                        <form id="privacyForm">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="shareProfile">
                                                <label class="form-check-label" for="shareProfile" style="color: #555;">
                                                    Allow sharing my profile with other parents
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="shareContact">
                                                <label class="form-check-label" for="shareContact" style="color: #555;">
                                                    Allow sharing my contact information for school events
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="dataCollection" checked>
                                                <label class="form-check-label" for="dataCollection" style="color: #555;">
                                                    Allow data collection for improving services
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="marketingEmails">
                                                <label class="form-check-label" for="marketingEmails" style="color: #555;">
                                                    Receive educational and promotional emails
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-save me-1"></i>Save Privacy Settings
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                    <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                                        <h6 class="mb-0" style="color: #555;">Data Management</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <h6 style="color: #555;">Download Your Data</h6>
                                            <p style="color: #666; font-size: 14px;">
                                                Download a copy of all your personal data and your children's academic records.
                                            </p>
                                            <button class="btn btn-outline-secondary btn-sm">
                                                <i class="fa fa-download me-1"></i>Request Data Export
                                            </button>
                                        </div>
                                        <hr>
                                        <div class="mb-3">
                                            <h6 style="color: #555;">Data Retention</h6>
                                            <p style="color: #666; font-size: 14px;">
                                                Your data is retained according to school policy and educational regulations.
                                            </p>
                                            <button class="btn btn-outline-secondary btn-sm">
                                                <i class="fa fa-info-circle me-1"></i>View Data Policy
                                            </button>
                                        </div>
                                        <hr>
                                        <div class="mb-3">
                                            <h6 class="text-danger">Danger Zone</h6>
                                            <p style="color: #666; font-size: 14px;">
                                                Permanently delete your account and all associated data.
                                            </p>
                                            <button class="btn btn-outline-danger btn-sm" id="deleteAccountBtn">
                                                <i class="fa fa-trash me-1"></i>Delete Account
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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